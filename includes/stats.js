function getxmlrequest()
{
	if (typeof(XMLHttpRequest) != "undefined")
	{
		return new XMLHttpRequest();
	}
	else
	{
		return false;
	}
}

/* try to grab the query result using ajax, otherwise let the form submit normally */
function checkprepend(form)
{
	values = new Array();
	for (i in form.childNodes)
	{
		if (form.childNodes[i].name != "")
		{
			if (form.childNodes[i].nodeName == "INPUT" && form.childNodes[i].type == "checkbox")
			{
				values.push(form.childNodes[i].name + "=" + form.childNodes[i].checked);
			}
			else if (form.childNodes[i].nodeName == "INPUT")
			{
				values.push(form.childNodes[i].name + "=" + form.childNodes[i].value);
			}
			else if (form.childNodes[i].nodeName == "SELECT")
			{
				values.push(form.childNodes[i].name + "=" + form.childNodes[i].options[form.childNodes[i].selectedIndex].value);
			}
		}
	}

	return !snagdata(values.join("&"), false);
}

/* for the "Link to this view" functionality */
/* the queries we have on the page currently, sans &b=true:
 * actual query => encodeURIComponent(actual query).replace(/%/g, ":")
 */
var items = new Array(); 
/* the queries we currently have minimized, sans &b=true:
 * actual query => encodeURIComponent(actual query).replace(/%/g, ":")
 */
var hide = new Array();

/* ask for the cooresponding query if we don't already have it (query must have the &b=true) */
function snagdata(query, initial)
{
	var iquery = query.replace(/&b=.+$/, "");
	if (typeof(items[iquery]) == "undefined")
	{
		if (request = getxmlrequest())
		{
			var m = /(^[^?#]+)/.exec(parent.location);
			var u = m[1] + "?" + query;

			setprogress(0);
			/* initial requests need to be serialized, otherwise we trample over our request variable */
			request.open("GET", u, !initial);
			if (initial)
			{
				request.send(null);
				handledata(request);
			}
			else
			{
				request.onreadystatechange = function () { handledata(request); };
				request.send(null);
			}

			item_push(query);

			return true;
		}
		else
		{
			return false;
		}
	}
	else
	{
		if (!initial)
		{
			var m = /^([^#]+)/.exec(parent.location);
			var id = items[query.replace(/&b=.+$/, "")];
			document.getElementById(id).className = view + " open";
			parent.location = m[1] + "#" + id;
		}
		return true;
	}

}

/* callback for our ajax request */
function handledata(request)
{
	if (request.readyState == 4)
	{
		var e = first_result();
		/* IE doesn't know about importNode, but it has lots of other problems with prepend mode anyways,
		 * in particular, it won't let us set the class for the new content at all, so we won't let IE get here
		 */
		var doc = document.importNode(request.responseXML.getElementsByTagName("data")[0], true);
		for (i in doc.childNodes)
		{
			if (doc.childNodes[i].nodeName == "div")
			{
				var m = /^(homeitem3col|homeitem) (open|closed)$/.exec(doc.childNodes[i].className);
				if (m)
				{
					doc.childNodes[i].className = view + " " + m[2];
				}

				e.parentNode.insertBefore(doc.childNodes[i], e);

				m = /^([^#]+)(.+)??$/.exec(parent.location);
				/* clear the outline, if there's one */
				if (m[2] != "" && m[2] != "#")
				{
					parent.location = m[1] + "#";
				}
				break;
			}
		}
	}

	setprogress(request.readyState);
}

var progressclose = null;
/* the readyState of our ajax request (1-4), or 0 for not started yet */
function setprogress(prog)
{
	var progress = new Array();
	progress[0] = "Loading";
	progress[1] = "Loading.";
	progress[2] = "Loading..";
	progress[3] = "Loading...";
	progress[4] = "Done.";

	document.getElementById("progress").textContent = progress[prog];

	if (prog == 4)
	{
		progressclose = setTimeout("document.getElementById('progressbox').style.display = 'none'", 2000);
	}
	else
	{
		if (progressclose != null)
		{
			clearTimeout(progressclose);
			progressclose = null;
		}
		document.getElementById("progressbox").style.display = "block";
	}
}

function item_push(query)
{
	query = query.replace(/&b=.+$/, "");
	items[query] = encodeURIComponent(query).replace(/%/g, ":");

	set_link();
}

function item_rm(query)
{
	query = query.replace(/&b=.+$/, "");
	delete items[query];
	if (typeof(hide[query]) != "undefined")
	{
		delete hide[query];
	}

	set_link();
}

/* expand or collapse a query result */
function toggle(elem, direct)
{
	/* call came from the link, so find the correct div */
	if (!direct)
	{
		elem = elem.parentNode.parentNode;
	}
	var id = elem.id;
	var qid = decodeURIComponent(id.replace(/:/g, "%"));
	if (elem.className == view + " open")
	{
		hide[qid] = id;
		elem.className = view + " closed";
	}
	else
	{
		delete hide[qid];
		elem.className = view + " open";
	}

	set_link();
}

function rm(elem)
{
	elem = elem.parentNode.parentNode;

	item_rm(decodeURIComponent(elem.id.replace(/:/g, "%")));
	elem.parentNode.removeChild(elem);
}

var view = "homeitem3col";
function init()
{
	if (getxmlrequest())
	{
		document.body.className = "ajax";

		var e = first_result();
		item_push(decodeURIComponent(e.id.replace(/:/g, "%")));

		/* set the view */
		var m = /v=([^#&]+)/.exec(parent.location);
		if (m)
		{
			set_view(m[1]);
		}

		/* populate the queries */
		m = /&items=([^#&]+)/.exec(parent.location);
		if (m)
		{
			var q = decodeURIComponent(m[1]).split("|");

			for (i in q)
			{
				snagdata(q[i] + "&b=true", true);
			}
		}

		/* hide the appropriate queries */
		m = /&hide=([^#&]+)/.exec(parent.location);
		if (m)
		{
			var h = decodeURIComponent(m[1]).split("|");
			
			for (i in h)
			{
				toggle(document.getElementById(h[i]), true);
			}
		}

		document.getElementById("brief").value = "true";
	}
	else
	{
		document.body.className = "noajax";
	}
}

/* returns the item we should prepend new results before, which is usually the topmost result */
function first_result()
{
	var e = document.getElementById("querybox").parentNode.nextSibling;

	while (!(e.className && e.className.match(/^(?:homeitem3col|homeitem)/)))
	{
		e = e.nextSibling;
		if (e == null)
		{
			return document.getElementById("placeholder");
		}
	}

	return e;
}

/* updates the "Link to this view" link */
function set_link()
{
	var pagelink = document.getElementById("pagelink");
	var m = /^([^?#]+)/.exec(parent.location);
	
	/* iteration order isn't guarenteed to be insertion order, but it is in Konqueror, Firefox and (apparently) IE...
	 * besides, if it isn't, it'll just mean the linked page has the queries in a different order, which is far from fatal
	 */
	var q = new Array();
	var gotfirst = false;
	var qs = "";
	for (i in items)
	{
		if (!gotfirst)
		{
			qs = i;
			gotfirst = true;
		}
		else
		{
			q.push(i);
		}
	}

	/* hashes are objects, not arrays, so we can't .join() them */
	var h = new Array();
	for (i in hide)
	{
		h.push(hide[i]);
	}
	pagelink.href = m[1] + "?" + qs + "&v=" + view + "&hide=" + h.join(encodeURIComponent("|")) + "&items=" + encodeURIComponent(q.join("|"));
}

/* sets the view to 3 or 4 columns */
function set_view(v)
{
	if (view == v)
	{
		return;
	}

	var e = first_result();
	while (e != null)
	{
		var m;
		if (m = /^(homeitem3col|homeitem) (open|closed)$/.exec(e.className))
		{
			if (m[1] != v)
			{
				e.className = v + " " + m[2];
			}
		}

		e = e.nextSibling;
	}

	var ve = document.getElementById("view");
	if (ve.value != v)
	{
		ve.value = v;
	}

	view = v;

	set_link();
}

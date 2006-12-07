function fillselect()
{
	p = document.getElementById("cvsproject");
	proj = p[p.selectedIndex].value;

	r = document.getElementById("release");
	html = "";

	for (var z in projs[proj])
	{
		s = projs[proj][z];
		html += '<option value="' + s + '">' + s + '</option>\n';
	}
	r.innerHTML = html;
}

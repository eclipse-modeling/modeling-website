var eclipse_org_common = { "settings": { "cookies_class": { "name": "eclipse_settings", "enabled": 1 } } };

window.onscroll = function() {
	const footer = document.querySelector("#footer>div>a");
	footer.style.display = document.documentElement.scrollTop > 100 ? 'inline' : 'none';
};

const modelingBase = new URL(".", document.currentScript.src).href;

const projectsEclipse = 'https://projects.eclipse.org/projects/';
const apiProjects = 'https://projects.eclipse.org/api/projects/';
const apiGitHub = 'https://api.github.com/repos/eclipse-platform/www.eclipse.org-eclipse/contents/';

let logo = `${modelingBase}modeling.png`;
let home = `${modelingBase}index.html`;

const modelingProjects = [
	'modeling.acceleo',
	'modeling.agileuml',
	'modeling.amalgam',
	'modeling.capra',
	'modeling.ecoretools',
	'modeling.ecp',
	'modeling.edapt',
	'modeling.eef',
	'modeling.efm',
	'modeling.elk',
	// 'modeling.emf',
	'modeling.emf-parsley',
	'modeling.emf.cdo',
	'modeling.emf.diffmerge',
	'modeling.emf.egf',
	// 'modeling.emf.emf',
	'modeling.emf.mwe',
	'modeling.emf.teneo',
	'modeling.emfcompare',
	'modeling.emfservices',
	'modeling.emfstore',
	// 'modeling.emft',
	'modeling.emft.emfatic',
	'modeling.emft.henshin',
	'modeling.epsilon',
	'modeling.fennec',
	'modeling.gemoc',
	'modeling.gendoc',
	'modeling.gmf-runtime',
	'modeling.graphiti',
	'modeling.hawk',
	// 'modeling.m2t',
	// 'modeling.m2t.xpand',
	'modeling.mdht',
	// 'modeling.mdt',
	// 'modeling.mdt.bpmn2',
	'modeling.mdt.etrice',
	'modeling.mdt.ocl',
	'modeling.mdt.papyrus',
	'modeling.mdt.rmf',
	'modeling.mdt.uml2',
	// 'modeling.mmt',
	'modeling.mmt.atl',
	'modeling.mmt.qvt-oml',
	'modeling.mmt.qvtd',
	'modeling.modisco',
	'modeling.poosl',
	'modeling.sirius',
	'modeling.syson',
	// 'modeling.tmf',
	'modeling.tmf.xtext',
	'modeling.viatra',
	'modeling.xpect',
	'modeling.xsemantics',
	'modeling.xsm',
];

const groups = {
	ui: {
		label: 'User Interface',
		members: ['modeling.emfservices', 'modeling.emf-parsley', 'modeling.ecp', 'modeling.eef']
	},
	graphical: {
		label: 'Graphical',
		members: ['modeling.gmf-runtime', 'modeling.sirius', 'modeling.elk', 'modeling.graphiti', 'ecd.glsp']
	},
	tools: {
		label: 'Tools',
		members: [
			'modeling.ecoretools', 'modeling.emft.emfatic', 'modeling.mdt.etrice', 'modeling.modisco', 'modeling.mdt.ocl',
			'modeling.mdt.papyrus', 'modeling.edapt', 'modeling.epsilon', 'modeling.emfcompare', 'modeling.emf.diffmerge',
			'modeling.emf.mwe', 'modeling.emf.egf', 'modeling.gemoc', 'automotive.sphinx', 'modeling.mdt.uml2', 'modeling.agileuml']
	},
	transformation: {
		label: 'Transformation',
		members: ['modeling.acceleo', 'modeling.viatra', 'modeling.mmt.atl', 'modeling.emft.henshin', 'modeling.mmt.qvt-oml', 'modeling.mmt.qvtd']

	},
	text: {
		label: 'Textual',
		members: ['modeling.tmf.xtext', 'modeling.xsemantics', 'modeling.xpect']
	},
	traceablity: {
		label: 'Traceability',
		members: ['modeling.capra', 'modeling.mdt.rmf']

	},
	runtime: {
		label: 'Runtime',
		members: ['modeling.fennec']

	},
	server: {
		label: 'Server and Storage',
		members: ['modeling.emf.cdo', 'modeling.emfstore', 'modeling.emf.teneo', 'modeling.hawk']
	},
	web: {
		label: 'Web',
		members: ['ecd.emfcloud', 'ecd.glsp', 'modeling.syson']
	},
	more: {
		label: 'More&hellip;',
		members: []
	}
};

{
	const other = modelingProjects.slice();
	for (const group of Object.values(groups)) {
		for (const member of group.members) {
			const index = other.indexOf(member);
			if (index >= 0) {
				other.splice(index, 1);
			}
		}
	}

	groups.more.members = other;
}

const meta = toElements(`
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="${modelingBase}favicon.png"/>
`);

let defaultHeader = toElements(`
	<a href="https://www.eclipse.org/downloads/packages/">Eclipse IDE</a>
	<a href="https://eclipseide.org/working-group/">Working Group</a>
	<a href="https://marketplace.eclipse.org/">Marketplace</a>
`);

let defaultBreadcrumb = toElements(`
	<a href="https://eclipseide.org/">Home</a>
	<a href="https://eclipseide.org/projects/">Projects</a>
`);

let defaultNav = toElements(`
<a class="fa-download" target="_out" href="https://www.eclipse.org/downloads/packages/"
	title="Download: Modeling IDEs">
	Download<p>Modeling IDEs</p>
</a>
<a class="fa-map-o" target="_out" href="https://projects.eclipse.org/projects/modeling/"
	title="Projects: Portal Sites">
	Projects<p>Portal</p>
</a>
<a class="fa-book" target="_out" href="https://help.eclipse.org/" title="Documentation: help.eclipse.org">
	Documentation<p>help.eclipse.org</p>
</a>
<a class="fa-git" href="details.html"
	title="Git: Project Repositories">
	Git<p>Project Repositories</p>
</a>
`);

let defaultAside = toElements(`
<span class="separator"><i class='fa fa-cube'></i> Technologies</span>
<a href="${modelingBase}../emf/index.html">EMF Core</a>
`);

let additionalAside = ``;

const modelingDefaultAside = defaultAside;

function generate() {
	try {
		const head = document.head;
		var referenceNode = head.querySelector('script');
		for (const element of [...meta]) {
			head.insertBefore(element, referenceNode.nextElementSibling)
			referenceNode = element;
		}

		const generators = document.querySelectorAll('[data-generate]');
		for (const element of generators) {
			const generator = element.getAttribute('data-generate');
			const generate = new Function(generator);
			generate.call(element, element);
		}

		const generatedBody = generateBody();
		document.body.replaceChildren(...generatedBody);
	} catch (exception) {
		document.body.prepend(...toElements(`<span>Failed to generate content: <span><b style="color: FireBrick">${exception.message}</b><br/>`));
		console.log(exception);
	}
}

function generateDefaults(element) {
	const parts = [];
	if (!hasElement('header')) {
		parts.push(generateDefaultHeader(document.createElement('div')));
	}
	if (!hasElement('breadcrumb')) {
		parts.push(generateDefaultBreadcrumb(document.createElement('div')));
	}
	if (!hasElement('aside')) {
		parts.push(generateDefaultAside(document.createElement('div')));
	}
	if (!hasElement('nav')) {
		parts.push(generateDefaultNav(document.createElement('div')));
	}
	element.prepend(...parts);
}

function generateBody() {
	const col = document.getElementById('aside') ? 'col-md-18' : ' col-md-24';
	return toElements(`
<div>
	${generateHeader()}
	<main id="content">
		<div class="novaContent container" id="novaContent">
			<div class="row">
				<div class="${col} main-col-content">
					<div class="novaContent" id="novaContent">
						<div class="row">
							${generateBreadcrumb()}
						</div>
						<div class=" main-col-content">
							${generateNav()}
							<div id="midcolumn">
							${generateMainContent()}
							</div>
						</div>
					</div>
				</div>
				${generateAside()}
				${generateAdditionalAside()}
			</div>
		</div>
	</main>
	<footer id="footer">
		<div class="container">
			<a href="#" class="scrollup" onclick="scrollToTop()">Back to the top</a>
		</div>
	</footer>
</div>
`);
}

function generateMainContent() {
	const main = document.body.querySelector('main')
	if (main != null) {
		return main.innerHTML;
	}
	return `
<main>The body specifies no content.</main>
`;
}

function generateDefaultHeader(element) {
	return prependChildren(element, 'header', ...defaultHeader);
}

function generateHeader() {
	const elements = document.querySelectorAll('#header>a');
	const items = Array.from(elements).map(link => {
		link.classList.add('link-unstyled');
		return `
<li class="navbar-nav-links-item">
	${link.outerHTML}
</li>
`;
	});
	const mobileItems = Array.from(elements).map(link => {
		link.className = 'mobile-menu-item mobile-menu-dropdown-toggle';
		return `
<li class="mobile-menu-dropdown">
	${link.outerHTML}
</li>
`;
	});

	return `
<header class="header-wrapper" id="header">
	<div class="header-navbar-wrapper">
		<div class="container">
			<div class="header-navbar">
				<a class="header-navbar-brand" href="https://eclipseide.org/">
					<div class="logo-wrapper">
						<img src="https://eclipse.dev/eclipse.org-common/themes/solstice/public/images/logo/eclipse-ide/eclipse_logo.svg" alt="Eclipse Project" width="150"/>
					</div>
				</a>
				<nav class="header-navbar-nav">
					<ul class="header-navbar-nav-links">
						${items.join('\n')}
					</ul>
				</nav>
				<div class="header-navbar-end">
					<div class="float-right hidden-xs" id="btn-call-for-action">
						<a target="_out" href="https://www.eclipse.org/sponsor/ide/" class="btn btn-huge btn-warning">
							<i class="fa fa-star"></i> Sponsor
						</a>
					</div>
					<button class="mobile-menu-btn" onclick="toggleMenu()">
						<i class="fa fa-bars fa-xl"/></i>
					</button>
				</div>
			</div>
		</div>
	</div>
	<nav id="mobile-menu" class="mobile-menu hidden" aria-expanded="false">
		<ul>
			${mobileItems.join('\n')}
		</ul>
	</nav>
</header>
`;
}

function generateDefaultBreadcrumb(element) {
	return prependChildren(element, 'breadcrumb', ...defaultBreadcrumb);
}

function generateBreadcrumb() {
	const breadcumbs = document.getElementById('breadcrumb')
	if (breadcumbs == null) {
		return '';
	}

	const elements = breadcumbs.children;
	const items = Array.from(elements).map(link => `<li>${link.outerHTML}</li>`);

	const extraBreachcrumb = generateExtraBreadcrumb();
	if (extraBreachcrumb != null) {
		items.push(`<li>${extraBreachcrumb}</li>`);
	}

	return `
<section class="default-breadcrumbs hidden-print breadcrumbs-default-margin"
	id="breadcrumb">
	<div class="container">
		<h3 class="sr-only">Breadcrumbs</h3>
		<div class="row">
			<div class="col-sm-24">
				<ol class="breadcrumb">
					${items.join('\n')}
				</ol>
			</div>
		</div>
	</div>
</section>
`;
}

function generateExtraBreadcrumb() {
	const group = getGroup(true);
	if (group) {
		return `<span>${groups[getGroup()].label}</span>`;
	}
}

function generateDefaultNav(element) {
	return prependChildren(element, 'nav', ...defaultNav);
}

function generateNav() {
	const elements = document.body.querySelectorAll('#nav>a');
	if (elements.length == 0) {
		return '';
	}

	const items = Array.from(elements).map(element => {
		const href = element.getAttribute('href')
		const target = element.getAttribute('target') ?? "_self";
		const title = element.getAttribute('title') ?? '';
		const className = element.className ?? '';
		const content = element.innerHTML;
		return `
<li class="col-xs-24 col-md-12">
	<a class="row" href="${href}" title="${title}"
		target="${target}">
		<i class="col-xs-3 col-md-6 fa ${className}"></i>
		<span class="col-xs-21 c col-md-17">${content}
		</span>
	</a>
</li>
`;
	});

	return `
<div class="header_nav">
	<div class="col-xs-24 col-md-10 vcenter">
		<a href="${home}">
			<img src="${logo}" alt="The Main Index Page" xwidth="50%" xheight="auto" class="img-responsive header_nav_logo"/>
		</a>
	</div><!-- NO SPACES
 --><div class="col-xs-24 col-md-14 vcenter">
		<ul class="clearfix">
			${items.join('\n')}
		</ul>
	</div>
</div>
`;
}

function generateDefaultAside(element) {
	if (defaultAside == modelingDefaultAside) {
		prependChildren(element, 'aside', ...toElements(`
<a class="separator" href="support.html"><i class="fa fa-address-book-o"></i> Support</a>
`));
		const groupKeys = Object.keys(groups).reverse();
		for (const groupKey of groupKeys) {
			prependChildren(element, 'aside', ...toElements(`
<a href="group.html?group=${groupKey}">${groups[groupKey].label}</a>
`));
		}
	}
	return prependChildren(element, 'aside', ...defaultAside);
}

function generateAside() {
	const elements = document.body.querySelectorAll('aside>*,#aside>*');
	if (elements.length == 0) {
		return '';
	}

	const items = Array.from(elements).map(element => {
		const main = element.classList.contains('separator')
		element.classList.add('link-unstyled');
		if (main) {
			element.classList.add('main-sidebar-heading');
			return `
<li class="main-sidebar-main-item main-sidebar-item-indented separator">
	${element.outerHTML}
</li>
`
		} else {
			return `
<li class="main-sidebar-item main-sidebar-item-indented">
	${element.outerHTML}
</li>
`
		}
	});

	return `
<div class="col-md-6 main-col-sidebar-nav">
	<aside class="main-sidebar-default-margin" id="main-sidebar">
		<ul class="ul-left-nav" id="leftnav" role="tablist" aria-multiselectable="true">
			${items.join('\n')}
	</aside>
</div>
`;
}

function generateAdditionalAside() {
	return additionalAside;
}

function sendRequest(location, handler) {
	var request = new XMLHttpRequest();
	request.open('GET', location);
	request.onloadend = function() {
		handler(request);
	};
	request.send();
}

function getProject(projectId, handler) {
	sendRequest(apiProjects + projectId, request => {
		const project = JSON.parse(request.responseText);
		handler(project[0]);
	});
}

function getGroup(withoutDefault) {
	const group = getQueryParameter('group');
	if (!withoutDefault || group) {
		const groupKeys = Object.keys(groups);
		if (groupKeys.includes(group)) {
			return group;
		}
		return groupKeys[0];
	}
}

function generateProjects(target) {
	const group = getGroup();
	const projectIds = groups[group].members;
	const label = groups[group].label;
	document.title = `${label} | Modeling`;
	const elements = [];
	elements.push(...toElements(`<h2>${label}</h2>`));

	for (const projectId of projectIds) {
		elements.push(...toElements(`
<hr/>
<div id="${projectId}">
Loading ${projectId}
</div>		
`));

		generateProject(projectId);
	}

	elements.push(...toElements('<hr/>'))

	target.replaceChildren(...elements);
}

function generateProject(projectId) {
	getProject(projectId, project => {
		const target = document.getElementById(projectId);
		const values = JSON.stringify(project);
		const item = `
<table><tbody><tr>
<td style="vertical-align: top;">
<a target="_out" href="${projectsEclipse}${projectId}"><img class="logo" src="${project.logo}" alt="${projectId}"/></a>
</td>
<td>
<h3>${project.name}<a style="text-decoration: none" target="_out" href="${project.website_url.replace('http:', 'https:')}"> <span style="font-size: 66%">&#x1F517;</span></a></h3>
${project.description}
</td>
</tr></tbody></table>
<!--
<br/>
${values}
-->
`;
		target.innerHTML = item;
	});
}

function generateProjectDetails(target) {
	const elements = [];
	for (const projectId of modelingProjects) {
		elements.push(...toElements(`
<hr/>
<div id="${projectId}">
Loading ${projectId}
</div>		
`));

		generateProjectDetail(projectId);
	}

	elements.push(...toElements('<hr/>'))

	target.replaceChildren(...elements);
}

function generateProjectDetail(projectId) {
	getProject(projectId, project => {
		const target = document.getElementById(projectId);
		var repo = 'missing';
		var type = 'fa-github'
		const gitHubOrg = project.github.org
		if (gitHubOrg) {
			repo = `https://github.com/${gitHubOrg}/`;
		} else {
			const gitHubRepos = project.github_repos;
			if (gitHubRepos.length > 0) {
				repo = gitHubRepos[0].url;
			} else {
				const gitLabOrg = project.gitlab.project_group
				if (gitLabOrg) {
					type = 'fa-gitlab';
					repo = `https://gitlab.eclipse.org/${gitLabOrg}/`;
				}
			}
		}

		const item = `
<table><tbody><tr>
<td style="vertical-align: top;">
<a target="_out" href="${projectsEclipse}${projectId}"><img class="logo" src="${project.logo}" alt="${projectId}"/></a>
</td>
<td>
<h4>${project.name}<a style="text-decoration: none" target="_out" href="${project.website_url.replace('http:', 'https:')}"> <span style="font-size: 66%">&#x1F517;</span></a></h4>
${project.summary}
<div style="margin-top: .5em">
<a target="_out" href="${repo}"><i class="fa ${type}"></i> ${repo}</a>
</div>
</td>
</tr></tbody></table>
`;
		target.innerHTML = item;
	});
}


function generateItem(target) {
	const title = target.getAttribute('title');
	const href = target.querySelector('a');
	const link = href.href;
	const linkTarget = href.getAttribute('target');
	const targetAttribute = linkTarget ? `target="${linkTarget}"` : '';
	const img = target.querySelector('img');
	const logo = img.src;
	href.remove();
	img.remove();

	const item = `
<table><tbody><tr>
<td style="vertical-align: top;">
<a ${targetAttribute} href="${link}"><img class="logo" src="${logo}"/></a>
</td>
<td>
<h3>${title}<a style="text-decoration: none" ${targetAttribute} href="${link}"> <span style="font-size: 66%">&#x1F517;</span></a></h3>
${target.innerHTML}
</td>
</tr></tbody></table>
`;
	target.innerHTML = item;
}

function hasElement(id) {
	return document.getElementById(id) != null;
}

function toElements(text) {
	const wrapper = document.createElement('div');
	wrapper.innerHTML = text;
	return wrapper.children
}

function replaceChildren(element, id, ...children) {
	element.id = id;
	element.replaceChildren(...children);
	return element;
}

function prependChildren(element, id, ...children) {
	element.id = id;
	element.prepend(...children);
	return element;
}

function addBase(htmlDocument, location) {
	const base = htmlDocument.createElement('base');
	base.href = location;
	htmlDocument.head.appendChild(base);
}

function getQueryParameter(id) {
	const location = new URL(window.location);
	const search = new URLSearchParams(location.search);
	return search.get(id);
}

function toggleMenu() {
	const mobileMenu = document.getElementById('mobile-menu')
	if (mobileMenu.classList.contains('hidden')) {
		mobileMenu.classList.remove('hidden');
	} else {
		mobileMenu.classList.add('hidden');
	}
}

function scrollToTop() {
	window.scrollTo({ top: 0, behavior: 'smooth' });
}


CREATE DATABASE IF NOT EXISTS modeling;

-- groups
-- [gid, Project, Component, GroupName, Path] (eg., 3, 'org.eclipse.emf','','emfadmin','/home/data/httpd/*.eclipse.org/modeling/emf/')

DROP TABLE IF EXISTS groups; CREATE TABLE groups (
`project` enum(
	'org.eclipse.modeling',
	'org.eclipse.emf',
	'org.eclipse.emft',
	'org.eclipse.mdt',
	'org.eclipse.m2t'
	) NOT NULL,
`component` enum(
	'',
	'org.eclipse.emf','org.eclipse.emf.ecore.sdo','org.eclipse.emf.query','org.eclipse.emf.transaction','org.eclipse.emf.validation',
	'org.eclipse.emf.cdo','org.eclipse.net4j','org.eclipse.emf.teneo','org.eclipse.emf.compare','org.eclipse.emf.search','org.eclipse.emf.jcrm',
	'org.eclipse.eodm','org.eclipse.ocl','org.eclipse.uml2','org.eclipse.uml2tools','org.eclipse.xsd',
	'org.eclipse.jet','org.eclipse.m2t.core','org.eclipse.m2t.shared','org.eclipse.mtl','org.eclipse.xpand'
	) NOT NULL,
`groupname` varchar(30) NOT NULL,
`path` varchar(255) NOT NULL,
PRIMARY KEY (`project`,`component`,`groupname`,`path`),
UNIQUE KEY `path` (`path`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- developers
-- [did, CommitterID, Name, Email, Role, Company, Location, Website, PhotoURL] (eg., 4, nickb, Nick Boldt, codeslave@ca.ibm.com, Release Engineer, IBM Rational Software Canada, Toronto/Canada, divbyzero.com, divbyzero.com/me.jpg)

DROP TABLE IF EXISTS developers; CREATE TABLE developers (`did` smallint(5) unsigned NOT NULL auto_increment,
`committerid` varchar(16),
`name` varchar(70) NOT NULL,
`email` varchar(70) NOT NULL,
`role` varchar(70),
`company` varchar(255),
`location` varchar(255),
`website` varchar(255),
`photoURL` varchar(255),
PRIMARY KEY (`did`),
UNIQUE KEY `committerid` (`committerid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- teams
-- [project, component, gid, did] (eg., org.eclipse.mdt, org.eclipse.uml2, 3, 4)

DROP TABLE IF EXISTS teams; CREATE TABLE teams (
`groupname` varchar(30) NOT NULL,
`did` smallint(5) unsigned NOT NULL, 
PRIMARY KEY (`groupname`,`did`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-----------

-- 60 rows to start, including deprecated entries and TBD entries
INSERT INTO groups (project,component,groupname,path) VALUES 
	('org.eclipse.modeling','','modeling-home','/cvsroot/org.eclipse/www/modeling/'), 
	('org.eclipse.modeling','','modelingadmin','/home/data/httpd/*.eclipse.org/modeling/'),

	('org.eclipse.emf','org.eclipse.emf','emf-home','/cvsroot/org.eclipse/www/emf/'), 
	('org.eclipse.emf','org.eclipse.emf','emf-home','/cvsroot/tools/emf-home/'),							-- deprecated but still in use -- will split into web and releng 
	('org.eclipse.emf','org.eclipse.emf','emfadmin','/home/data/httpd/*.eclipse.org/modeling/emf/'),
	('org.eclipse.emf','org.eclipse.emf','emfadmin','/home/data/httpd/*.eclipse.org/tools/emf/'),			-- deprecated but still in use (old update site & downloads)
	('org.eclipse.emf','org.eclipse.emf','emf-dev','/cvsroot/tools/org.eclipse.emf/'), 						-- deprecated but still in use -- will move to modeling cvs
	('org.eclipse.emf','org.eclipse.emf.ecore.sdo','emf-dev','/cvsroot/tools/org.eclipse.emf.ecore.sdo/'), 	-- deprecated but still in use -- will move to modeling cvs
	('org.eclipse.emf','org.eclipse.emf','emf-dev','/cvsroot/tools/org.eclipse.emf.releng.build/'), 		-- deprecated but still in use -- will move to modeling cvs

	('org.eclipse.emf','org.eclipse.emf','emf-dev','/cvsroot/modeling/org.eclipse.emf/'),												-- NEW / TBD
	('org.eclipse.emf','org.eclipse.emf','emf-releng','/cvsroot/modeling/org.eclipse.emf/org.eclipse.emf.releng/'), 					-- NEW / TBD
	('org.eclipse.emf','org.eclipse.emf.query','emf-query','/cvsroot/modeling/org.eclipse.emf/org.eclipse.emf.query/'),
	('org.eclipse.emf','org.eclipse.emf.query','emf-query-releng','/cvsroot/modeling/org.eclipse.emf/org.eclipse.emf.query.releng/'),
	('org.eclipse.emf','org.eclipse.emf.transaction','emf-transaction','/cvsroot/modeling/org.eclipse.emf/org.eclipse.emf.transaction/'),
	('org.eclipse.emf','org.eclipse.emf.transaction','emf-transaction-releng','/cvsroot/modeling/org.eclipse.emf/org.eclipse.emf.transaction.releng/'),
	('org.eclipse.emf','org.eclipse.emf.validation','emf-validation','/cvsroot/modeling/org.eclipse.emf/org.eclipse.emf.validation/'),
	('org.eclipse.emf','org.eclipse.emf.validation','emf-validation-releng','/cvsroot/modeling/org.eclipse.emf/org.eclipse.emf.validation.releng/'),
	
	('org.eclipse.emft','','emft-home','/cvsroot/org.eclipse/www/emft/'), 
	('org.eclipse.emft','','emftadmin','/home/data/httpd/*.eclipse.org/modeling/emft/'),
	('org.eclipse.emft','','emftadmin','/home/data/httpd/*.eclipse.org/technology/emft/'),						-- deprecated but still in use (old update site & downloads)
	('org.eclipse.emft','','emft-dev','/cvsroot/technology/org.eclipse.emft/'), 								-- deprecated but still in use -- will move to modeling cvs
	('org.eclipse.emft','','emft-releng','/cvsroot/technology/org.eclipse.emft/releng'), 						-- deprecated but still in use -- will move to modeling cvs
	('org.eclipse.emft','org.eclipse.emf.cdo','emft-cdo','/cvsroot/technology/org.eclipse.emft/cdo'), 			-- deprecated but still in use -- will move to modeling cvs
	('org.eclipse.emft','org.eclipse.net4j','emft-net4j','/cvsroot/technology/org.eclipse.emft/net4j'), 		-- deprecated but still in use -- will move to modeling cvs
	('org.eclipse.emft','org.eclipse.emf.teneo','emft-teneo','/cvsroot/technology/org.eclipse.emft/teneo'), 	-- deprecated but still in use -- will move to modeling cvs

	('org.eclipse.emft','org.eclipse.emf.cdo','emf-cdo','/cvsroot/modeling/org.eclipse.emf/org.eclipse.emf.cdo'), 					 	-- NEW / TBD
	('org.eclipse.emft','org.eclipse.emf.cdo','emf-cdo-releng','/cvsroot/modeling/org.eclipse.emf/org.eclipse.emf.cdo.releng'), 	 	-- NEW / TBD
	('org.eclipse.emft','org.eclipse.net4j','emf-net4j','/cvsroot/modeling/org.eclipse.emf/org.eclipse.net4j'), 					 	-- NEW / TBD
	('org.eclipse.emft','org.eclipse.net4j','emf-net4j-releng','/cvsroot/modeling/org.eclipse.emf/org.eclipse.net4j.releng'), 		 	-- NEW / TBD
	('org.eclipse.emft','org.eclipse.emf.teneo','emf-teneo','/cvsroot/modeling/org.eclipse.emf/org.eclipse.emf.teneo'),				 	-- NEW / TBD
	('org.eclipse.emft','org.eclipse.emf.teneo','emf-teneo-releng','/cvsroot/modeling/org.eclipse.emf/org.eclipse.emf.teneo.releng'),	-- NEW / TBD

	('org.eclipse.emft','org.eclipse.emf.compare','emf-compare','/cvsroot/modeling/org.eclipse.emf/org.eclipse.emf.compare'),
	('org.eclipse.emft','org.eclipse.emf.compare','emf-compare-releng','/cvsroot/modeling/org.eclipse.emf/org.eclipse.emf.compare.releng'),
	('org.eclipse.emft','org.eclipse.emf.search','emf-search','/cvsroot/modeling/org.eclipse.emf/org.eclipse.emf.search'),
	('org.eclipse.emft','org.eclipse.emf.search','emf-search-releng','/cvsroot/modeling/org.eclipse.emf/org.eclipse.emf.search.releng'),
	('org.eclipse.emft','org.eclipse.emf.jcrm','emf-jcrm','/cvsroot/modeling/org.eclipse.emf/org.eclipse.emf.jcrm'),
	('org.eclipse.emft','org.eclipse.emf.jcrm','emf-jcrm-releng','/cvsroot/modeling/org.eclipse.emf/org.eclipse.emf.jcrm.releng'),

	('org.eclipse.mdt','org.eclipse.uml2','uml2-home','/cvsroot/org.eclipse/www/uml2/'), 					-- deprecated but still in use (web redirect)
	('org.eclipse.mdt','org.eclipse.uml2','uml2-home','/cvsroot/tools/uml2-home/'), 						-- deprecated, ready to be removed
	('org.eclipse.mdt','org.eclipse.uml2','uml2-dev','/home/data/httpd/*.eclipse.org/tools/uml2/'), 		-- deprecated but still in use (old update site & downloads)
	('org.eclipse.mdt','org.eclipse.uml2','uml2-dev','/cvsroot/tools/org.eclipse.uml2/'), 					-- deprecated, ready to be removed after Europa?
	('org.eclipse.mdt','org.eclipse.uml2','uml2-releng','/cvsroot/tools/org.eclipse.uml2.releng/'), 		-- deprecated, ready to be removed after Europa?

	('org.eclipse.mdt','','mdt-home','/cvsroot/org.eclipse/www/mdt/'), 
	('org.eclipse.mdt','','mdtadmin','/home/data/httpd/*.eclipse.org/modeling/mdt/'),
	('org.eclipse.mdt','','mdt-dev','/cvsroot/modeling/org.eclipse.mdt/'),
	('org.eclipse.mdt','org.eclipse.xsd','mdt-home','/cvsroot/org.eclipse/www/xsd/'),						-- deprecated but still in use (web redirect)
	('org.eclipse.mdt','org.eclipse.xsd','xsd-dev','/cvsroot/tools/org.eclipse.xsd/'), 						-- deprecated but still in use -- will move to modeling cvs

	('org.eclipse.mdt','org.eclipse.eodm','mdt-eodm','/cvsroot/modeling/org.eclipse.mdt/org.eclipse.eodm/'),
	('org.eclipse.mdt','org.eclipse.eodm','mdt-eodm-releng','/cvsroot/modeling/org.eclipse.mdt/org.eclipse.eodm.releng/'),
	('org.eclipse.mdt','org.eclipse.ocl','mdt-ocl','/cvsroot/modeling/org.eclipse.mdt/org.eclipse.ocl/'),
	('org.eclipse.mdt','org.eclipse.ocl','mdt-ocl-releng','/cvsroot/modeling/org.eclipse.mdt/org.eclipse.ocl.releng/'),
	('org.eclipse.mdt','org.eclipse.uml2','mdt-uml2','/cvsroot/modeling/org.eclipse.mdt/org.eclipse.uml2/'),
	('org.eclipse.mdt','org.eclipse.uml2','mdt-uml2-releng','/cvsroot/modeling/org.eclipse.mdt/org.eclipse.uml2.releng/'),
	('org.eclipse.mdt','org.eclipse.uml2tools','mdt-uml2tools','/cvsroot/modeling/org.eclipse.mdt/org.eclipse.uml2tools/'),
	('org.eclipse.mdt','org.eclipse.uml2tools','mdt-uml2tools-releng','/cvsroot/modeling/org.eclipse.mdt/org.eclipse.uml2tools.releng/'),
	('org.eclipse.mdt','org.eclipse.xsd','mdt-xsd','/cvsroot/modeling/org.eclipse.mdt/org.eclipse.xsd/'),
	('org.eclipse.mdt','org.eclipse.xsd','mdt-xsd-releng','/cvsroot/modeling/org.eclipse.mdt/org.eclipse.xsd.releng/'),

	('org.eclipse.m2t','','m2t-home','/cvsroot/org.eclipse/www/m2t/'), 
	('org.eclipse.m2t','','m2tadmin','/home/data/httpd/*.eclipse.org/modeling/m2t/'),
	('org.eclipse.m2t','','m2t-dev','/cvsroot/modeling/org.eclipse.m2t/')									-- need more groups? https://bugs.eclipse.org/bugs/show_bug.cgi?id=192508
;

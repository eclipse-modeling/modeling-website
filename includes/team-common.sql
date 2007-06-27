
--- mysqldump modeling -u some_user -p --tables developers teams groups team-common.sql.dump  

CREATE DATABASE IF NOT EXISTS modeling;

-- teams
-- [groupname, did, committer] (eg., emf-home, 3, 1)

DROP TABLE IF EXISTS `teams`;
CREATE TABLE `teams` (
  `groupname` varchar(30) NOT NULL,
  `did` smallint(5) unsigned NOT NULL,
  `committer` enum('1','0') default '0',
  PRIMARY KEY  (`groupname`,`did`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `teams` VALUES ('emf-cdo',16,'1'),('emf-cdo-releng',1,'1'),('emf-cdo-releng',16,'1'),('emf-compare',13,'1'),('emf-compare',14,'1'),('emf-compare-releng',1,'1'),('emf-compare-releng',13,'1'),('emf-compare-releng',14,'1'),('emf-dev',1,'1'),('emf-dev',3,'1'),('emf-dev',4,'1'),('emf-dev',5,'1'),('emf-dev',6,'1'),('emf-home',1,'1'),('emf-home',2,'1'),('emf-home',4,'1'),('emf-home',5,'1'),('emf-home',6,'1'),('emf-home',7,''),('emf-jcrm',17,'1'),('emf-jcrm-releng',1,'1'),('emf-jcrm-releng',17,'1'),('emf-net4j',16,'1'),('emf-net4j-releng',1,'1'),('emf-net4j-releng',16,'1'),('emf-query',2,'1'),('emf-query-releng',1,'1'),('emf-query-releng',2,'1'),('emf-releng',1,'1'),('emf-releng',5,'1'),('emf-search',18,'1'),('emf-search-releng',1,'1'),('emf-search-releng',18,'1'),('emf-teneo',15,'1'),('emf-teneo-releng',1,'1'),('emf-teneo-releng',15,'1'),('emf-transaction',2,'1'),('emf-transaction-releng',1,'1'),('emf-transaction-releng',2,'1'),('emf-validation',2,'1'),('emf-validation-releng',1,'1'),('emf-validation-releng',2,'1'),('emfadmin',1,'1'),('emfadmin',2,'1'),('emfadmin',4,'1'),('emfadmin',6,'1'),('emft-cdo',16,'1'),('emft-dev',1,'1'),('emft-home',1,'1'),('emft-net4j',16,'1'),('emft-releng',1,'1'),('emft-teneo',15,'1'),('emftadmin',1,'1'),('emftadmin',4,'1'),('emftadmin',7,''),('emftadmin',13,'1'),('emftadmin',14,'1'),('emftadmin',15,'1'),('emftadmin',16,'1'),('emftadmin',17,'1'),('emftadmin',18,'1'),('m2t-dev',11,'1'),('m2t-dev',12,'1'),('m2t-home',11,'1'),('m2t-home',12,'1'),('m2tadmin',1,'1'),('m2tadmin',7,''),('m2tadmin',11,'1'),('m2tadmin',12,'1'),('mdt-dev',3,'1'),('mdt-eodm',8,'1'),('mdt-eodm',9,'1'),('mdt-eodm',19,'1'),('mdt-eodm',20,'1'),('mdt-eodm',21,'1'),('mdt-eodm-releng',1,'1'),('mdt-eodm-releng',8,'1'),('mdt-eodm-releng',9,'1'),('mdt-eodm-releng',19,'1'),('mdt-eodm-releng',20,'1'),('mdt-eodm-releng',21,'1'),('mdt-home',3,'1'),('mdt-ocl',2,'1'),('mdt-ocl-releng',1,'1'),('mdt-ocl-releng',2,'1'),('mdt-uml2',3,'1'),('mdt-uml2-releng',1,'1'),('mdt-uml2-releng',3,'1'),('mdt-uml2tools',10,'1'),('mdt-uml2tools-releng',1,'1'),('mdt-uml2tools-releng',10,'1'),('mdt-xsd',1,'1'),('mdt-xsd',4,'1'),('mdt-xsd',5,'1'),('mdt-xsd',6,'1'),('mdt-xsd-releng',1,'1'),('mdt-xsd-releng',4,'1'),('mdt-xsd-releng',5,'1'),('mdt-xsd-releng',6,'1'),('mdtadmin',1,'1'),('mdtadmin',2,'1'),('mdtadmin',3,'1'),('mdtadmin',4,'1'),('mdtadmin',7,''),('mdtadmin',8,'1'),('mdtadmin',9,'1'),('mdtadmin',19,'1'),('mdtadmin',20,'1'),('mdtadmin',21,'1'),('modeling-home',1,'1'),('modeling-home',2,'1'),('modeling-home',3,'1'),('modeling-home',4,'1'),('modeling-home',5,'1'),('modeling-home',6,'1'),('modeling-home',7,''),('modelingadmin',1,'1'),('modelingadmin',4,'1'),('uml2-dev',3,'1'),('uml2-home',3,'1'),('uml2-releng',3,'1'),('xsd-dev',1,'1'),('xsd-dev',4,'1'),('xsd-dev',5,'1'),('xsd-dev',6,'1'),('emf-search',22,'1'),('emf-search-releng',22,'1'),('emftadmin',22,'1'),('gmtadmin',32,'1'),('gmt-home',32,'1'),('gmt-dev',32,'1'),('m2m-home',26,'1'),('m2madmin',26,'1'),('m2matl-dev',26,'1'),('gmt-dev',27,'1'),('gmt-home',27,'1'),('gmtadmin',27,'1'),('m2m-home',27,'1'),('m2madmin',27,'1'),('m2matl-dev',27,'1'),('m2minf-dev',27,'1'),('m2mqvt-dev',27,'1'),('modeling-home',27,'1'),('modelingadmin',27,'1'),('mddi-dev',23,'1'),('mddi-home',23,'1'),('mddi-modelbus',23,'1'),('mddi-semanticbinding',23,'1'),('mddiadmin',23,'1'),('modeling-home',23,'1'),('modelingadmin',23,'1'),('mddi-home',24,'1'),('mddi-modelbus',24,'1'),('mddi-semanticbinding',24,'1'),('mddi-dev',25,'1'),('gmt-dev',33,'1'),('gmt-home',33,'1'),('gmtadmin',33,'1'),('modeling-home',33,'1'),('modelingadmin',33,'1'),('gmt-dev',28,'1'),('gmt-home',28,'1'),('gmtadmin',28,'1'),('gmt-dev',26,'1'),('gmt-home',26,'1'),('gmtadmin',26,'1'),('gmt-dev',29,'1'),('gmt-home',29,'1'),('gmtadmin',29,'1'),('gmt-home',30,'1'),('gmtadmin',30,'1');

-- developers
-- [did, CommitterID, Name, Email, Role, Company, Location, Website, PhotoURL] (eg., 4, nickb, Nick Boldt, codeslave@ca.ibm.com, Release Engineer, IBM Rational Software Canada, Toronto/Canada, divbyzero.com, divbyzero.com/me.jpg)

DROP TABLE IF EXISTS `developers`;
CREATE TABLE `developers` (
  `did` smallint(5) unsigned NOT NULL auto_increment,
  `committerid` varchar(16) default NULL,
  `name` varchar(70) NOT NULL,
  `email` varchar(70) NOT NULL,
  `role` varchar(70) default NULL,
  `company` varchar(255) default NULL,
  `location` varchar(255) default NULL,
  `website` varchar(255) default NULL,
  `photoURL` varchar(255) default NULL,
  PRIMARY KEY  (`did`),
  UNIQUE KEY `committerid` (`committerid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- groups
-- [gid, Project, Component, GroupName, Path] (eg., 3, 'org.eclipse.emf','','emfadmin','/home/data/httpd/*.eclipse.org/modeling/emf/')

DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `project` enum(
	'org.eclipse.modeling',
	'org.eclipse.emf',
	'org.eclipse.emft',
	'org.eclipse.gmf',
	'org.eclipse.gmt',
	'org.eclipse.mddi',
	'org.eclipse.mdt',
	'org.eclipse.m2m',
	'org.eclipse.m2t'
) NOT NULL,
  `component` enum(
	'',
	'org.eclipse.emf','org.eclipse.emf.ecore.sdo','org.eclipse.emf.query','org.eclipse.emf.transaction','org.eclipse.emf.validation',
	'org.eclipse.emf.cdo','org.eclipse.net4j','org.eclipse.emf.teneo','org.eclipse.emf.compare','org.eclipse.emf.search','org.eclipse.emf.jcrm',
	'org.eclipse.gmf',
	'org.eclipse.gmt',
	'org.eclipse.mddi','org.eclipse.mddi.semanticbinding','org.eclipse.mddi.qvt','org.eclipse.mddi.modelbus''org.eclipse.mddi.modelbus.orchestration',
	'org.eclipse.eodm','org.eclipse.ocl','org.eclipse.uml2','org.eclipse.uml2tools','org.eclipse.xsd',
	'org.eclipse.m2m','org.eclipse.m2m.atl','org.eclipse.m2m.qvt','org.eclipse.m2m.infrastructure',
	'org.eclipse.jet','org.eclipse.m2t.core','org.eclipse.m2t.shared','org.eclipse.mtl','org.eclipse.xpand'
	) NOT NULL,
  `groupname` varchar(30) NOT NULL,
  `path` varchar(255) NOT NULL,
  PRIMARY KEY  (`project`,`component`,`groupname`,`path`),
  UNIQUE KEY `path` (`path`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 80 rows to start, including deprecated entries and TBD entries
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
	('org.eclipse.m2t','','m2t-dev','/cvsroot/modeling/org.eclipse.m2t/'),									-- need more groups? https://bugs.eclipse.org/bugs/show_bug.cgi?id=192508

	('org.eclipse.gmf','','gmf-dev','/cvsroot/modeling/org.eclipse.gmf'),
	('org.eclipse.gmf','','gmf-home','/cvsroot/org.eclipse/www/gmf/'),
	('org.eclipse.gmf','','gmfadmin','/home/data/httpd/*.eclipse.org/modeling/gmf/'),

	('org.eclipse.gmt','','gmt-dev','/cvsroot/technology/org.eclipse.gmt'),
	('org.eclipse.gmt','','gmt-home','/cvsroot/technology/gmt-home'),
	('org.eclipse.gmt','','gmt-home','/cvsroot/org.eclipse/www/gmt/'),
	('org.eclipse.gmt','','gmtadmin','/home/data/httpd/*.eclipse.org/modeling/gmt/'),
	('org.eclipse.gmt','','gmtadmin','/home/data/httpd/*.eclipse.org/technology/gmt/'),

	('org.eclipse.m2m','','m2m-home','/cvsroot/org.eclipse/www/m2m/'),
	('org.eclipse.m2m','','m2madmin','/home/data/httpd/*.eclipse.org/modeling/m2m/'),
	('org.eclipse.m2m','org.eclipse.m2m.atl','m2matl-dev','/cvsroot/modeling/org.eclipse.m2m/org.eclipse.m2m.atl/'),
	('org.eclipse.m2m','org.eclipse.m2m.qvt','m2mqvt-dev','/cvsroot/modeling/org.eclipse.m2m/org.eclipse.m2m.qvt/'),
	('org.eclipse.m2m','org.eclipse.m2m.infrastructure','m2minf-dev','/cvsroot/modeling/org.eclipse.m2m/org.eclipse.m2m.infrastructure/'),

	('org.eclipse.mddi','','mddi-home','/cvsroot/org.eclipse/www/mddi/'),
	('org.eclipse.mddi','','mddiadmin','/home/data/httpd/*.eclipse.org/modeling/mddi/'),
	('org.eclipse.mddi','','mddi-dev','/cvsroot/technology/org.eclipse.mddi/'),
	('org.eclipse.mddi','org.eclipse.mddi.semanticbinding','mddi-semanticbinding','/cvsroot/technology/org.eclipse.mddi/org.eclipse.mddi.semanticbinding/'), 
	('org.eclipse.mddi','org.eclipse.mddi.qvt','mddi-dev','/cvsroot/technology/org.eclipse.mddi/org.eclipse.mddi.qvt/'), -- should this be in mddi-qvt?
	('org.eclipse.mddi','org.eclipse.mddi.modelbus','mddi-modelbus','/cvsroot/technology/org.eclipse.mddi/org.eclipse.mddi.modelbus/'),
	('org.eclipse.mddi','org.eclipse.mddi.modelbus.orchestration','mddi-dev','/cvsroot/technology/org.eclipse.mddi/org.eclipse.mddi.modelbus.orchestration/') -- should this be in mddi-dev or mddi-modelbus?
;

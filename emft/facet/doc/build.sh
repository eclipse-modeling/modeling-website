#!/bin/sh
CODIR=nightly
svn co http://dev.eclipse.org/svnroot/modeling/org.eclipse.emft.facet/trunk/doc $CODIR
MAINDOC=$CODIR/org.eclipse.emf.facet.doc
xsltproc -o $MAINDOC/toc.html $MAINDOC/toc.xsl $MAINDOC/toc.xml


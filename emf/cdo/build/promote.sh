#!/bin/bash

#/shared/common/apache-ant-1.7.1/bin/ant \
#	-f /shared/modeling/tools/promotion/download-artifacts.xml \
#	-Dbuild.url=https://hudson.eclipse.org/hudson/job/emf-cdo-integration/1565
	
#svn log --xml https://dev.eclipse.org/svnroot/modeling/org.eclipse.emf.cdo/trunk > svn.log

for job in `ls jobs`
do
	lastBuildNumber=`cat jobs/$job/nextBuildNumber`
	nextBuildNumber=`cat /shared/jobs/$job/nextBuildNumber`
done
<?xml version="1.0"?>
<!--
 Copyright (c) 2011 Mia-Software.
 
 All rights reserved. This program and the accompanying materials
 are made available under the terms of the Eclipse Public License v1.0
 which accompanies this distribution, and is available at
 http://www.eclipse.org/legal/epl-v10.html
 
 Contributors:
    Gregoire Dupe (Mia-Software) - Bug 337584 - Documentation set up
-->
<xsl:stylesheet version="1.1"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

	<xsl:output method="html" indent="no" encoding="ISO-8859-1" />


	<xsl:template name="toctpl" match="toc">
		<xsl:param name="location" />
		<h1>
			<xsl:value-of select="@label" />
		</h1>
		<ul>
			<xsl:apply-templates select="topic">
				<xsl:with-param name="location" select="$location" />
			</xsl:apply-templates>
		</ul>
	</xsl:template>

	<xsl:template match="topic" name="topictpl">
		<xsl:param name="location" />
		<li>
			<xsl:choose>
				<xsl:when test="@href">
					<a href="{$location}/{@href}" target="content">
						<xsl:value-of select="@label" />
					</a>
				</xsl:when>
				<xsl:when test="link">
					<xsl:apply-templates select="link">
						<xsl:with-param name="location" select="$location" />
					</xsl:apply-templates>
				</xsl:when>
				<xsl:otherwise>
					<xsl:value-of select="@label" />
				</xsl:otherwise>
			</xsl:choose>

			<xsl:if test="descendant::topic">
				<ul>
					<xsl:apply-templates>
						<xsl:with-param name="location" select="$location" />
					</xsl:apply-templates>
				</ul>
			</xsl:if>
		</li>
	</xsl:template>

	<xsl:template match="link">
		<xsl:apply-templates select="document(@toc)">
			<xsl:with-param name="location" select="concat('./',concat(@toc,'/..'))" />
		</xsl:apply-templates>
	</xsl:template>

</xsl:stylesheet>


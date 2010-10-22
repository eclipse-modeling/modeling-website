<xsl:stylesheet xmlns:xsl='http://www.w3.org/1999/XSL/Transform' version="1.0">

<xsl:template match="rss">
  <xsl:apply-templates select="channel"/>
</xsl:template>


<xsl:template match="channel">
  <ul>
   <xsl:apply-templates select="item[1]|item[2]|item[3]|item[4]"/>
  </ul>
</xsl:template>

<xsl:template match="item">
  <li>
  <h7 class="headlines">
  	<xsl:if test="link"><a href="{link}"><xsl:value-of select="title"/></a></xsl:if>
  	<xsl:if test="not(link)"><xsl:value-of select="title"/></xsl:if>
  </h7>
  <xsl:copy-of select="description/*"/>
  </li>
  
</xsl:template>

</xsl:stylesheet>

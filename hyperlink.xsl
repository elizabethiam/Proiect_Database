<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>
    <xsl:template match="/">
        <html>
            <head>
                <title>Hyperlink XML XSL</title>
            </head>
            <body>
                <!--metoda1-->
                <xsl:element name="a">
                    <xsl:attribute name="href">
                        <xsl:value-of select="root/link1/link_url"/>
                    </xsl:attribute>
                <span>Hermes</span>
        </xsl:element>
        <br/><br/>
        <!--metoda 2-->
        
        <xsl:element name="a">      
  <svg height="30" width="200" xmlns:xlink="http://www.w3.org/1999/xlink">
  <a xlink:href="https://www.instagram.com" target="_blank">
    <text x="0" y="15" fill="blue">Instagram</text>
  </a>
</svg>
   </xsl:element>
<br/><br/>
                <xsl:element name="a">
                                <xsl:attribute name="href">
                                    <xsl:value-of select="root/link2/address"/>
                                </xsl:attribute>
                                <xsl:attribute name="target">
                                    <xsl:value-of select="root/link2/target"/>
                                </xsl:attribute>
                                <xsl:value-of select="root/link2/link_text"/>
                </xsl:element>
                <br/><br/>
       <!--metoda3-->
       
               
  

            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>



<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>

    <xsl:template match="/">
        <html>
            <head>
                <title>view</title>
            </head>
            <body>
                <table width="100%" cellpadding="4" cellspace="2">
               
<xsl:for-each select="root/date">
                        
    <tr>  
        <td style="width:80px">
            <img src="{image}"/>
        <br/><br/>
        </td>
    </tr>
    <tr></tr>
                          <tr>
                            
                            <td style="width:100px"><font size="5"><i><xsl:value-of select="descr"/></i></font></td>
                        
                        </tr>
                        
                           <tr> <th style="width:100px"><font size="4">Price:</font></th></tr>
                           <tr><td style="width:100px"><font size="4">
                               <xsl:value-of select="price"/></font>
                           <br/><br/>
                           </td></tr>
                        
                        </xsl:for-each>
                </table>


            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>

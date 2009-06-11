<?php                                                                                                                       require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");   require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");   require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php");  $App    = new App();    $Nav    = new Nav();    $Menu   = new Menu();       include($App->getProjectCommon());    # All on the same line to unclutter the user's desktop'

    #*****************************************************************************
    #
    # /m2t-web/project-info/m2t-galileo-ip-log.php
    #
    # Author:       Paul Elder
    # Date:         2009-06-11
    #
    # Description: Static snapshot of M2T IP Log.
    #
    #
    #****************************************************************************
    
    #
    # Begin: page-specific settings.  Change these. 
    $pageTitle      = "Approved IP Log for modeling.m2t - Galileo Release (xpand 0.7, acceleo 0.8, jet 1.0)";
    $pageKeywords   = "Eclipse, Modeling, Model to text, M2T, jet, xpand, acceleo, galileo, ip, log, ip log";
    $pageAuthor     = "Paul Elder";
    
    # Add page-specific Nav bars here
    # Format is Link text, link URL (can be http://www.someothersite.com/), target (_self, _blank), level (1, 2 or 3)
    # $Nav->addNavSeparator("My Page Links",    "downloads.php");
    # $Nav->addCustomNav("My Link", "mypage.php", "_self", 3);
    # $Nav->addCustomNav("Google", "http://www.google.com/", "_blank", 3);

    # End: page-specific settings
    #
        
    # Paste your HTML content between the markers!  
ob_start();
?>      

<h1>Approved IP Log for modeling.m2t - Galileo Release (xpand 0.7, acceleo 0.8, jet 1.0)</h1>

<h2>Licenses</h2>

<h2>Third-Party Code</h2>

    <table border="1" cellpadding="3" cellspacing="0">
<tr>
<th>CQ</th>
<th>Third-Party Code</th>
<th>License</th>
<th>Use</th>
</tr>
<tr>
    <td><a href="https://dev.eclipse.org/ipzilla/show_bug.cgi?id=336">336</a></td>
    <td>Apache Tomcat Version:  3.2.4</td>

    <td>Apache Software License 1.1</td>
    <td></td>
    </tr>
    <tr>
    <td><a href="https://dev.eclipse.org/ipzilla/show_bug.cgi?id=1557">1557</a></td>
    <td>ANTLR runtime Version: 3.0</td>
    <td>New BSD license</td>

    <td></td>
    </tr>
    <tr>
    <td><a href="https://dev.eclipse.org/ipzilla/show_bug.cgi?id=1574">1574</a></td>
    <td>xPand Version: 4.2.0</td>
    <td>Eclipse Public License</td>
    <td></td>

    </tr>
    <tr>
    <td><a href="https://dev.eclipse.org/ipzilla/show_bug.cgi?id=1576">1576</a></td>
    <td>org.apache.commons.logging  Version: 1.0.4</td>
    <td>Apache License, 2.0</td>
    <td></td>
    </tr>

    <tr>
    <td><a href="https://dev.eclipse.org/ipzilla/show_bug.cgi?id=1827">1827</a></td>
    <td>ICU4J 3.6.1</td>
    <td>X.Net License (ICU4J License, MIT Style)</td>
    <td>modified source&nbsp;&amp;&nbsp;binary</td>
    </tr>

    <tr>
    <td><a href="https://dev.eclipse.org/ipzilla/show_bug.cgi?id=2511">2511</a></td>
    <td>MTL Version: 0.7.0</td>
    <td>Object Management Group License</td>
    <td>unmodified source </td>
    </tr>
    <tr>

    <td><a href="https://dev.eclipse.org/ipzilla/show_bug.cgi?id=2518">2518</a></td>
    <td>MTL MOF Models To Text Transformation Language Specification Version: 1.0</td>
    <td>Object Management Group License</td>
    <td>unmodified source&nbsp;&amp;&nbsp;binary</td>
    </tr>
    <tr>

    <td><a href="https://dev.eclipse.org/ipzilla/show_bug.cgi?id=2991">2991</a></td>
    <td>ANTLR Version: 3.0 Runtime (PB CQ1359)</td>
    <td>New BSD license</td>
    <td>unmodified source&nbsp;&amp;&nbsp;binary</td>
    </tr>
    <tr>

    <td><a href="https://dev.eclipse.org/ipzilla/show_bug.cgi?id=2992">2992</a></td>
    <td>Commons Logging Version: 1.0.4 (PB CQ133)</td>
    <td>Apache License, 2.0</td>
    <td>unmodified source&nbsp;&amp;&nbsp;binary</td>
    </tr>
    <tr>

    <td><a href="https://dev.eclipse.org/ipzilla/show_bug.cgi?id=3076">3076</a></td>
    <td>Xpand MiddleEnd</td>
    <td>Eclipse Public License</td>
    <td></td>
    </tr>
    <tr>
    <td><a href="https://dev.eclipse.org/ipzilla/show_bug.cgi?id=3116">3116</a></td>

    <td>M2T Xpand XSD Adapter</td>
    <td>Eclipse Public License</td>
    <td></td>
    </tr>
    <tr>
    <td><a href="https://dev.eclipse.org/ipzilla/show_bug.cgi?id=3184">3184</a></td>
    <td>AOP Alliance Version: 1.0 (using from Orbit CQ3087)</td>

    <td>Public Domain</td>
    <td>unmodified binary </td>
    </tr>
    </table>
<p/>
<p><em>No pre-req dependencies</em></p>
<h2>Committers</h2>
<div>This table lists everyone who is, or ever has been, a committer.
        The only reasons to remove someone from this list are (i) if they never
        were a committer, (ii) it is a bogus listing such as 'root', or (iii) all
        the code that person wrote is now obsolete and no longer being shipped.
        This list must include everyone who committed any code or other files are
        being distributed in the current release.</div>

    

<table border="1" cellpadding="3" cellspacing="0">
<tr>
        <th colspan="2">Past and
        Present Active</th>
    </tr>
<tr><th>Name</th>
<th>Organization</th>
</tr>
<tr>
    <td>andre Arnold</td>

    <td> </td>
        </tr>
    <tr>
    <td>Nick Boldt</td>
    <td>Red Hat, Inc. </td>
        </tr>
    <tr>
    <td>Cedric  Brun</td>
    <td>OBEO </td>
        </tr>
    <tr>
    <td>Joel Cheuoua</td>
    <td> </td>

        </tr>
    <tr>
    <td>Sven Efftinge</td>
    <td>itemis AG </td>
        </tr>

    <tr>
    <td>Paul Elder</td>
    <td>IBM </td>
        </tr>
    <tr>

    <td>Peter Friese</td>
    <td>itemis AG </td>
        </tr>
    <tr>
    <td>Laurent Goubet</td>

    <td>OBEO </td>
        </tr>
    <tr>
    <td>Arno Haase</td>
    <td> </td>
        </tr>
    <tr>
    <td>Dennis Hübner</td>
    <td>itemis AG </td>
        </tr>
    <tr>
    <td>Jan Koehnlein</td>
    <td>itemis AG </td>

        </tr>
    <tr>
    <td>Bernd Kolb</td>
    <td>SAP AG </td>
        </tr>

    <tr>
    <td>Jonathan Musset</td>
    <td>OBEO </td>
        </tr>
    <tr>

    <td>Patrick Schoenbach</td>
    <td>itemis AG </td>
        </tr>
    <tr>
    <td>Karsten Thoms</td>

    <td>itemis AG </td>
        </tr>
    </table>
<p>
<div>This table lists committers who do not appear to have committed any code or
        files to the project. This is a 'best-guess' table based on the commits explorer
        data. If someone listed here actually has committed code, please correct the
        table by making them active.</div>
    


<table border="1" cellpadding="3" cellspacing="0">
<tr>
        <th colspan="2">Never
        Active</th>
    </tr>
<tr><th>Name</th>
<th>Organization</th>
</tr>
<tr>
        <td>Chris Aniszczyk</td>
        <td>Code 9 </td>
                </tr>
        <tr>
        <td>Wim Bast</td>
        <td> </td>
                </tr>
        <tr>
        <td>Wim Bast</td>
        <td>Compuware </td>
                </tr>
        <tr>
        <td>Heiko Behrens</td>
        <td>itemis AG </td>
                </tr>
        <tr>
        <td>Joel Cayne</td>
        <td>IBM </td>
                </tr>
        <tr>
        <td>Frank Cornelissen</td>
        <td>Compuware </td>
                </tr>
        <tr>
        <td>Markus Voelter</td>
        <td>itemis AG </td>
                </tr>
        <tr>
        <td>arjan kok</td>
        <td> </td>
                </tr>
            </table>
    <p>
    <h2>Contributors and Their Contributions</h2>
<div>
    This table lists, by contributor and then by bug #, all the non-committer contributions.
    This section is probably the weakest of the automated data gathering because there are 
    so many bugs and so many different ways that people have noted contributions over time.<p>
    To note a contribution:
    <ul>

    <li>Include the contribution as a patch on a bug and add the "iplog+" flag to that attachment.
    <li>Include the contribution as a comment on a bug and add the "iplog+" flag to the bug. (Note that this
        will add all the commenters of the bug as contributors and then you'll have to 'exclude' all those
        who did not contribute. Better to use patch attachments if possible.)
    </ul>
    <p>
    Note that this table includes all contributions that are being distributed in the code.
    The reasons to correct/remove entries from this table are:<ul>
    <li>The algorithm incorrectly classified something as a contribution when it really wasn't
            a contribution.
    <li>The contribution isn't/wasn't used at all. Note that if just one line of a file is used,
            then the contribution is considered as having been used. If possible, mark the
            attachment as obsolete in bugzilla; otherwise, use the corrections to make the change.
    </ul>
    Please note that if person X was a contributor and later became a committer, he or she will
    be listed both above in the committer table (for his/her work as a committer) 
    and here in the contributor table (for his/her work prior to becoming a committer).
    </div>
    <table border="1" cellpadding="3" cellspacing="0">

<tr>
<th>Bug</th>
<th>Size</th>
<th>Description</th>
</tr>
<tr><td colspan="3" style="background-color: #DDDDDD">Freddy&nbsp;Allilaire (obeo.fr)</td>

        </tr>
    <tr>
        <td><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=249774">249774</a></td>
        <td>168</td>
        <td>[Contribution] New unit tests for MTL Engine plugin test<br>comment #0</td>

                </tr>
    <tr><td colspan="3" style="background-color: #DDDDDD">André&nbsp;Arnold (gmx.de)</td>
        </tr>
    <tr>
        <td><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=263650">263650</a></td>

        <td>565.3K</td>
        <td>Complete Xtend and Xpand middleend to interprete Xpand/Xtend code using the Xtend backend<br>patchset fixing this issue</td>
                </tr>
    <tr>
        <td><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=274617">274617</a></td>

        <td>809</td>
        <td>Add getter for wildcardParams on Advice<br>patchset fixing this issue</td>
                </tr>
    <tr>
        <td><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=274619">274619</a></td>

        <td>942</td>
        <td>Fix handling of default file encoding<br>patchset fixing this issue</td>
                </tr>
    <tr>
        <td><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=275079">275079</a></td>

        <td>4.5K</td>
        <td>Fix bugs in Xtend / Xpand middleend related to changes in MWE<br>Fixes all compile issues due to MWE changes</td>
                </tr>
    <tr>
        <td><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=275080">275080</a></td>

        <td>4.2K</td>
        <td>Fix version of Xpand and Xtend middleend<br>Corrects plugin versions and EMF dependency</td>
                </tr>
    <tr>
        <td><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=263650">263650</a></td>

        <td>1.0K</td>
        <td>Complete Xtend and Xpand middleend to interprete Xpand/Xtend code using the Xtend backend<br>comment #0</td>
                </tr>
    <tr>
        <td><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=263650">263650</a></td>

        <td>199</td>
        <td>Complete Xtend and Xpand middleend to interprete Xpand/Xtend code using the Xtend backend<br>comment #2</td>
                </tr>
    <tr>
        <td><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=263650">263650</a></td>

        <td>73</td>
        <td>Complete Xtend and Xpand middleend to interprete Xpand/Xtend code using the Xtend backend<br>comment #3</td>
                </tr>
    <tr>
        <td><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=263650">263650</a></td>

        <td>167</td>
        <td>Complete Xtend and Xpand middleend to interprete Xpand/Xtend code using the Xtend backend<br>comment #4</td>
                </tr>
    <tr><td colspan="3" style="background-color: #DDDDDD">Jerome&nbsp;BENOIS (obeo.fr)</td>
        </tr>
    <tr>
        <td><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=260544">260544</a></td>
        <td>157</td>
        <td>Add crossReferences operation in MTLNonStandardLibrary<br>comment #0</td>
                </tr>
    <tr>
        <td><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=260544">260544</a></td>
        <td>57</td>
        <td>Add crossReferences operation in MTLNonStandardLibrary<br>comment #1</td>
                </tr>
    <tr><td colspan="3" style="background-color: #DDDDDD">Heiko&nbsp;Behrens (itemis.de)</td>
        </tr>
    <tr>

        <td><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=264363">264363</a></td>
        <td>1.2K</td>
        <td>[Xtend] No meaningful exception when reexporting an unknown extension<br>Exception that names importer and unknown extension file that should be imported</td>
                </tr>
    <tr>

        <td><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=264564">264564</a></td>
        <td>49.8K</td>
        <td>[Xtend] Expressions cannot represent large ordinal numbers<br>Long->BigInteger, Implicit type conversion for java extensions, minor fixes</td>
                </tr>
    <tr>

        <td><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=274516">274516</a></td>
        <td>9.1K</td>
        <td>Some bugs in EMF typesystem<br>patch</td>
                </tr>
    <tr>

        <td><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=274518">274518</a></td>
        <td>12.9K</td>
        <td>Some bugs in UML typesystem<br>patch</td>
                </tr>
    <tr><td colspan="3" style="background-color: #DDDDDD">Stephane&nbsp;Bouchet (obeo.fr)</td>
        </tr>
    <tr>
        <td><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=250650">250650</a></td>
        <td>497</td>
        <td>[PATCH] new MTL example : Uml 2 java<br>comment #0</td>
                </tr>
    <tr>
        <td><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=250650">250650</a></td>
        <td>54</td>
        <td>[PATCH] new MTL example : Uml 2 java<br>comment #1</td>
                </tr>
    <tr>
        <td><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=250650">250650</a></td>
        <td>325</td>
        <td>[PATCH] new MTL example : Uml 2 java<br>comment #3</td>
                </tr>
    <tr>
        <td><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=250650">250650</a></td>
        <td>52</td>
        <td>[PATCH] new MTL example : Uml 2 java<br>comment #4</td>
                </tr>
    <tr>
        <td><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=250650">250650</a></td>
        <td>64</td>
        <td>[PATCH] new MTL example : Uml 2 java<br>comment #5</td>
                </tr>
    <tr><td colspan="3" style="background-color: #DDDDDD">Edoardo&nbsp;Comar (uk.ibm.com)</td>
        </tr>
    <tr>

        <td><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=262915">262915</a></td>
        <td>1.8K</td>
        <td>Apply Eclipse JDT formatter to jet-generated java sources<br>comment #0</td>
                </tr>
    <tr>

        <td><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=262915">262915</a></td>
        <td>359</td>
        <td>Apply Eclipse JDT formatter to jet-generated java sources<br>comment #2</td>
                </tr>
    <tr>

        <td><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=262915">262915</a></td>
        <td>54</td>
        <td>Apply Eclipse JDT formatter to jet-generated java sources<br>comment #3</td>
                </tr>
    <tr><td colspan="3" style="background-color: #DDDDDD">Moritz&nbsp;Eysholdt (itemis.de)</td>
        </tr>
    <tr>
        <td><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=268577">268577</a></td>
        <td>7.2K</td>
        <td>misc bugfixes for Xpand needed by the XSD Adapter<br>xtend fixes 0.2</td>
                </tr>
    <tr>
        <td><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=273464">273464</a></td>
        <td>858.0K</td>
        <td>[typesystem.xsd] Migrate documentation from oAW<br>xtend.typesystem.xsd Documentation Images 0.1</td>
                </tr>
    <tr>
        <td><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=273464">273464</a></td>
        <td>948.4K</td>
        <td>[typesystem.xsd] Migrate documentation from oAW<br>xtend.typesystem.xsd Documentation 0.1</td>
                </tr>
    <tr>
        <td><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=277819">277819</a></td>
        <td>154.1K</td>
        <td>Needed fixes detected by the IP review for xtend.typesystem.xsd<br>xtend.typesystem.xsd IP Fixes 0.1</td>
                </tr>
    <tr><td colspan="3" style="background-color: #DDDDDD">Goulwen&nbsp;Le&nbsp;Fur (obeo.fr)</td>
        </tr>

    <tr>
        <td><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=260544">260544</a></td>
        <td>92</td>
        <td>Add crossReferences operation in MTLNonStandardLibrary<br>comment #2</td>
                </tr>

    <tr><td colspan="3" style="background-color: #DDDDDD">Richard&nbsp;Gronback (borland.com)</td>
        </tr>
    <tr>
        <td><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=229115">229115</a></td>
        <td>662</td>

        <td>Xpand wizard package should be exposed<br>Simple patch to add wizard package to Export-Package list</td>
                </tr>
    <tr><td colspan="3" style="background-color: #DDDDDD">Bernd&nbsp;Kolb (kolbware.de)</td>

        </tr>
    <tr>
        <td><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=263650">263650</a></td>
        <td>45</td>
        <td>Complete Xtend and Xpand middleend to interprete Xpand/Xtend code using the Xtend backend<br>comment #1</td>

                </tr>
    <tr>
        <td><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=263650">263650</a></td>
        <td>194</td>
        <td>Complete Xtend and Xpand middleend to interprete Xpand/Xtend code using the Xtend backend<br>comment #5</td>

                </tr>
    <tr>
        <td><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=263650">263650</a></td>
        <td>5</td>
        <td>Complete Xtend and Xpand middleend to interprete Xpand/Xtend code using the Xtend backend<br>comment #6</td>

                </tr>
    <tr><td colspan="3" style="background-color: #DDDDDD">Yvan&nbsp;Lussaud (obeo.fr)</td>
        </tr>
    <tr>
        <td><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=262743">262743</a></td>

        <td>624</td>
        <td>Added refrence search in template editor<br>comment #0</td>
                </tr>
    <tr><td colspan="3" style="background-color: #DDDDDD">Dieter&nbsp;Moroff (umlmda.org)</td>
        </tr>
    <tr>
        <td><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=273412">273412</a></td>
        <td>4.3K</td>
        <td>UI dependency in org.eclipse.xtend.typesystem.emf<br>Patch moving EarlyStart to UI plugin, changing the plugin.xmls</td>
                </tr>
    <tr>
        <td><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=274265">274265</a></td>
        <td>3.3K</td>
        <td>Maven pom file<br>Patch for XPand Relang</td>
                </tr>
    <tr>
        <td><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=274265">274265</a></td>
        <td>9.5K</td>
        <td>Maven pom file<br>Patch for XPand Plugins</td>
                </tr>
    <tr>
        <td><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=274879">274879</a></td>
        <td>1.4K</td>
        <td>Minor changes to maven pom files<br>Patch with the changed pom.xml in XPand Releng and Plugins</td>
                </tr>
    <tr><td colspan="3" style="background-color: #DDDDDD">Karsten&nbsp;Thoms (itemis.de)</td>
        </tr>
    <tr>

        <td><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=205522">205522</a></td>
        <td>12.0K</td>
        <td>prExcludes causes IllegalArgumentExeption<br>Patch</td>
                </tr>
    <tr><td colspan="3" style="background-color: #DDDDDD">Sebastian&nbsp;Zarnekow (itemis.de)</td>
        </tr>
    <tr>
        <td><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=218607">218607</a></td>
        <td>7.1K</td>
        <td>Order Preserving Sets<br>Tests and some fixes for intersect, union, without, SetType.newInstance</td>
                </tr>
    <tr>
        <td><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=267699">267699</a></td>
        <td>9.5K</td>
        <td>Xpand Editor is not registered<br>Restore content of plugin xml, some fixes with keybindings</td>
                </tr>
    <tr>
        <td><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=268808">268808</a></td>
        <td>1.5K</td>
        <td>[Activities] Dublicate entries in plugins xml lead to unresolved message<br>Fix</td>
                </tr>
    <tr>
        <td><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=269954">269954</a></td>
        <td>3.9K</td>
        <td>[Type inference] Return type for Collection.flatten could be infered in most cases<br>Collection.flatten</td>
                </tr>
    <tr>
        <td><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=269955">269955</a></td>
        <td>12.3K</td>
        <td>[ContentAssist] Misleading and duplicate suggestions when parameterized types are involved<br>Patch that fixes the problems</td>
                </tr>
    <tr>
        <td><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=273050">273050</a></td>
        <td>2.2K</td>
        <td>[JavaMetamodel] Opened and closed projects are not handled gracefully<br>Fix</td>
                </tr>
    <tr>
        <td><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=273051">273051</a></td>
        <td>2.5K</td>
        <td>[ContentAssist] Missing proposals for extensions<br>Fix</td>
                </tr>
    <tr><td colspan="3" style="background-color: #DDDDDD">Alexander&nbsp;Nyßen (itemis.de)</td>
        </tr>
    <tr>

        <td><a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=264319">264319</a></td>
        <td>2.2K</td>
        <td>setCallBack method should be pulled up from XpandExecutionContextImpl to ExecutionContextImpl<br>Pull-up patch</td>
                </tr>
    </table>

<h2>Repositories</h2>
<p>The information contained in this log was generated by using commit information from the following repositories:</p>
<div style='padding-left: 2em'>/cvsroot/modeling/org.eclipse.m2t</div>

<?php
    $html = ob_get_contents();
    ob_end_clean();

    # Generate the web page
    $App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>

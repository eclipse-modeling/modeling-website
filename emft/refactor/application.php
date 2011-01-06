<?php  																														require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); 	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); 	$App 	= new App();	$Nav	= new Nav();	$Menu 	= new Menu();		include($App->getProjectCommon());    # All on the same line to unclutter the user's desktop'

	$pageTitle 		= "How to apply EMF model refactorings";
	$pageKeywords	= "EMF, Refactor, model refactoring, refactoring";
	$pageAuthor		= "Thorsten Arendt";

	$html = <<<EOHTML

<div id="maincontent">

	<div id="midcolumn">
		<h1>$pageTitle</h1>	
			<p>This manual presents the application of a EMF model refactoring using <b>EMF Refactor</b>. More precisely, we demonstrate the model refactoring <b>Move EAttribute</b> for Ecore models. Please note, that EMF Refactor can be used for refactorings of any models whose meta model is based on EMF Ecore.</p>
			<p>First, please take a look to the following Ecore diagram presenting a first model concerning EMF model refactorings in an early stage of the EMF Refactor development process. A <i>ModelRefactoring</i> has a name and conforms to a <i>MetaModel</i> that is specified by name, namespace prefix, and namespace URI. Furthermore, it has a label that should be shown as an <i>Entry</i> in the <i>ContextMenu</i> of an arbitrary <i>ModelElement</i>. A <i>ModelElement</i> belongs to a <i>Model</i> that is specified by a name and stored in a file with a specific name. Furthermore, a <i>Model</i> conforms to a <i>MetaModel</i> and each <i>ModelElement</i> is typed over a specific <i>MetaModelType</i> belonging to the corresponding <i>MetaModel</i>. Besides the afore mentioned attributes, each <i>ModelRefactoring</i> is related to a <i>MetaModelType</i> representing the type of the contextual element the refactoring can be applied on.</p>
			<img src="fig/appl_01.PNG" width="750" height="464" alt="Fig. 1">	
			<p></p>
			<p>During software design it became questionable whether attribute <i>label</i> of class <i>ModelRefactoring</i> could be better placed in class <i>Entry</i>. So, model refactoring <b>Move EAttribute</b> is the next task to be performed. Since <b>EMF Refactor</b> can be used on arbitrary EMF based models the application of a specific refactoring is mainly triggered from within the EMF instance editor. The next figure shows the example model from above using this tree-based editor.</p>
			<img src="fig/appl_02.PNG" width="407" height="477" alt="Fig. 2">
			<p></p>
			<p>EMF model refactoring <b>Move EAttribute</b> can be specified in the following way: First, it has to be checked whether the contextual <i>EAttribute</i> is not marked as ID of the containing class, and whether this class has at least one referenced class. If these (initial) checks pass the user has to put in the name of the class the attribute has to be moved to. Then, it has to be checked whether the containing class has a referenced class with the specified name, and whether this class does not already owns an attribute with the same name as the contextual attribute. If these (final) checks pass the contextual attribute can finally be moved to the specified class.
			<p>Before applying the refactoring let us first present some erroneous situations. The following figure shows that attribute <i>name</i> of class <i>ModelRefactoring</i> represents the ID of this class. So, the application of refactoring <b>Move EAttribute</b> on attribute <i>name</i> is not possible.</p>
			<img src="fig/appl_03.PNG" width="684" height="474" alt="Fig. 3">
			<p></p>
			<p>Each refactoring can be triggered from within the context menu of a specific contextual model element. The next figure shows the context menu of attribute <i>name</i>.</p>
			<img src="fig/appl_04.PNG" width="495" height="552" alt="Fig. 4">
			<p></p>
			<p>As expected, <b>EMF Refactor</b> does not apply refactoring <b>Move EAttribute</b> because of the violated precondition. The following figure shows the corresponding error message.</p>
			<img src="fig/appl_05.PNG" width="503" height="140" alt="Fig. 5">
			<p></p>
			<p>The second erroneous situation occurs if we try to apply refactoring <b>Move EAttribute</b> on attribute <i>name</i> of class <i>MetaModelElement</i>. As you see in the following figure, this class does not have any (outgoing) references to other classes in our example model.</p>
			<img src="fig/appl_01.PNG" width="750" height="464" alt="Fig. 1">	
			<p></p>
			<p>Again, we trigger refactoring <b>Move EAttribute</b> from within the context menu of attribute <i>name</i> of class <i>MetaModelElement</i> as shown in the following figure.</p>
			<img src="fig/appl_06.PNG" width="491" height="505" alt="Fig. 6">	
			<p></p>
			<p>Again, <b>EMF Refactor</b> does not apply refactoring <b>Move EAttribute</b> because of the violated precondition. The following figure shows the corresponding error message.</p>
			<img src="fig/appl_07.PNG" width="503" height="138" alt="Fig. 7">
			<p></p>
			<p>Now, let's try to apply refactoring <b>Move EAttribute</b> on attribute <i>name</i> of class <i>MetaModel</i>. The initial checks pass, i.e. the attribute is not the ID of its containing class and this class is referenced to class <i>MetaModelType</i> (see following figure).</p>
			<img src="fig/appl_01.PNG" width="750" height="464" alt="Fig. 1">	
			<p></p>
			<p>Again, we trigger refactoring <b>Move EAttribute</b> from within the context menu of attribute <i>name</i> of class <i>MetaModel</i> as shown in the following figure.</p>
			<img src="fig/appl_08.PNG" width="492" height="631" alt="Fig. 8">	
			<p></p>
			<p>The initial precondition checks pass, i.e. <b>EMF Refactor</b> does not display any error messages, and a user input form appears specific to the triggered EMF model refactoring. For refactoring <b>Move EAttribute</b> we now have to input the name of the class the contextual attribute should be moved to. The following figure shows the input dialog. Here, another erroneous situation arises if we type in a name of a class that is not referenced by the containing class of the contextual attribute (or even a complete invalid name), for example <i>ModelElement</i>.</p>
			<img src="fig/appl_09.PNG" width="477" height="159" alt="Fig. 9">	
			<p></p>
			<p>Again, <b>EMF Refactor</b> does not apply refactoring <b>Move EAttribute</b> because of the violated precondition. The following figure shows the corresponding error message.</p>
			<img src="fig/appl_10.PNG" width="449" height="372" alt="Fig. 10">	
			<p></p>
			<p>The last erronoeous situation occurs if we try to move attribute <i>name</i> of class <i>MetaModel</i> to the referenced class <i>MetaModelType</i>. Here, class <i>MetaModelType</i> already owns an attribute <i>name</i> (see following figure).</p>
			<img src="fig/appl_01.PNG" width="750" height="464" alt="Fig. 1">	
			<p></p>
			<p>Again, we trigger refactoring <b>Move EAttribute</b> from within the context menu of attribute <i>name</i> of class <i>MetaModel</i> as shown in the following figure.</p>
			<img src="fig/appl_08.PNG" width="492" height="631" alt="Fig. 8">	
			<p></p>
			<p>In the refactoring parameter dialog we type in name <i>MetaModelType</i> as shown in the following figure.</p>
			<img src="fig/appl_11.PNG" width="477" height="158" alt="Fig. 11">	
			<p></p>
			<p>Again, <b>EMF Refactor</b> does not apply refactoring <b>Move EAttribute</b> because of the violated precondition. The following figure shows the corresponding error message.</p>
			<img src="fig/appl_12.PNG" width="449" height="372" alt="Fig. 10">	
			<p></p>
			<p>Now, all possible erroneous situations of EMf refactoring <b>Move EAttribute</b> are presented and we can continue with a successful refactoring application. As already mentioned above, attribute <i>label</i> of class <i>ModelRefactoring</i> could be better placed in class <i>Entry</i> and should be moved.</p>
			<img src="fig/appl_01.PNG" width="750" height="464" alt="Fig. 1">	
			<p></p>
			<p>Now, we trigger refactoring <b>Move EAttribute</b> from within the context menu of attribute <i>label</i> of class <i>ModelRefactoring</i> as shown in the following figure.</p>
			<img src="fig/appl_13.PNG" width="493" height="599" alt="Fig. 13">	
			<p></p>
			<p>Since the initial precondition checks pass the parameter dialog appears and we type in class name <i>Entry</i> (see following figure).</p>
			<img src="fig/appl_14.PNG" width="477" height="157" alt="Fig. 14">	
			<p></p>
	
			<p>
			<i>To be continued .....</i>
			</p>		
	</div>
	
	<div id="rightcolumn">
		<div class="sideitem">	
		
   		<h6>Incubation</h6>
		<p>This component is currently in its <a href="http://www.eclipse.org/projects/dev_process/validation-phase.php">Validation (Incubation) Phase</a>.</p>

   			<div align="center"><a href="/projects/what-is-incubation.php"><img align="center" src="/images/egg-incubation.png"  border="0" alt="Incubation" /></a></div>
 		</div>
		
	</div>
		
</div>


EOHTML;


	# Generate the web page
	$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>

<?php  																														require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); 	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); 	$App 	= new App();	$Nav	= new Nav();	$Menu 	= new Menu();		include($App->getProjectCommon());    # All on the same line to unclutter the user's desktop'

	$pageTitle 		= "How to generate new EMF model refactorings using Java";
	$pageKeywords	= "EMF, Refactor, model refactoring, refactoring";
	$pageAuthor		= "Thorsten Arendt";

	$html = <<<EOHTML

<div id="maincontent">

	<div id="midcolumn">
		<a name=top></a>
		<h1>$pageTitle</h1>		
			<p>This manual presents the specification of an EMF model refactoring in <b>EMF Refactor</b> using Java code. More precisely, we demonstrate the model refactoring <b>Move EAttribute</b> for Ecore models. Please note, that EMF Refactor can be used for refactorings of any models whose meta model is based on EMF Ecore.</p>
			<p>Let's take a look to the following Ecore diagram presenting a first model concerning EMF model refactorings in an early stage of the EMF Refactor development process. A <i>ModelRefactoring</i> has a name and conforms to a <i>MetaModel</i> that is specified by name, namespace prefix, and namespace URI. Furthermore, it has a label that should be shown as an <i>Entry</i> in the <i>ContextMenu</i> of an arbitrary <i>ModelElement</i>. A <i>ModelElement</i> belongs to a <i>Model</i> that is specified by a name and stored in a file with a specific name. Furthermore, a <i>Model</i> conforms to a <i>MetaModel</i> and each <i>ModelElement</i> is typed over a specific <i>MetaModelType</i> belonging to the corresponding <i>MetaModel</i>. Besides the afore mentioned attributes, each <i>ModelRefactoring</i> is related to a <i>MetaModelType</i> representing the type of the contextual element the refactoring can be applied on.</p>
			<img src="fig/appl_01.PNG" alt="Fig. a_1">
			<p></p>
			<p>During software design it became questionable whether attribute <i>label</i> of class <i>ModelRefactoring</i> could be better placed in class <i>Entry</i>. So, model refactoring <b>Move EAttribute</b> is the next task to be performed. Since <b>EMF Refactor</b> can be used on arbitrary EMF based models the application of a specific refactoring is mainly triggered from within the EMF instance editor. The next figure shows the example model from above using this tree-based editor.</p>
			<img src="fig/appl_02.PNG" alt="Fig. a_2">
			<p></p>
			<p>EMF model refactoring <b>Move EAttribute</b> can be specified in the following way: First, it has to be checked whether the contextual <i>EAttribute</i> is not marked as ID of the containing class, and whether this class has at least one referenced class. If these (initial) checks pass the user has to put in the name of the class the attribute has to be moved to. Then, it has to be checked whether the containing class has a referenced class with the specified name, and whether this class does not already owns an attribute with the same name as the contextual attribute. If these (final) checks pass the contextual attribute can finally be moved to the specified class.</p>
			<p>The refactoring specification process can be triggered from within the context menu of a certain model element in the tree-based EMF instance editor. The next figure shows the context menu of an arbitrary <i>EAttribute</i> representing the contextual type of our example EMF model refactoring <b>Move EAttribute</b>. Here, we select entry <i>Specify EMF Model Refactoring</i>.</p>
			<img src="fig/spec_01.PNG" alt="Fig. s_1">
			<p></p>
			<p>In the first page of the upcoming refactoring generation dialog three refactoring specifics have to be given (see following figure). First, you have to type in the name of the new refactoring. This name also serves as id of the new refactoring. Then, the text of the label has to be specified concerning the context menu entry when triggering the refactoring application. Finally, an Eclipse plug-in project has to be selected in which the corresponding refactoring Java code should be generated to. Further specifics concerning the contextual model element type are set automatically.</p>
			<img src="fig/spec_02.PNG" alt="Fig. s_2">
			<p></p>
			<p>The second page of the refactoring generation dialog specifies the parameters of the corresponding model refactoring. In the upper part of this page you can add new parameters respectively remove existing parameters (see following figure).</p>
			<img src="fig/spec_03.PNG" alt="Fig. s_3">
			<p></p>
			<p>Our example refactoring <b>Move EAttribute</b> has one single parameter: the name of the class the attribute has to be moved to. So, we add this parameter as shown in the following figure. Besides the name of the parameter, <i>eClassName</i>, you can put in a parameter description that will be used later on in the specific refactoring parameter input dialog.</p>
			<img src="fig/spec_04.PNG" alt="Fig. s_4">
			<p></p>
			<p>The following figure shows the complete second page of the refactoring generation dialog specifying one single parameter of the example refactoring <b>Move EAttribute</b>.</p>
			<img src="fig/spec_05.PNG" alt="Fig. s_5">
			<p></p>
			<p>After finishing the refactoring generation dialog, <b>EMF Refactor</b> adds some additional information to the selected Eclipse plug-in project. First, <b>EMF Refactor</b> adds additionally required plug-in dependencies like shown in the following figure.</p>
			<img src="fig/spec_06.PNG" alt="Fig. s_6">
			<p></p>
			<p>To register the new EMF model refactoring the selected Eclipse plug-in project has to serve a specific extension point, <i>org.eclipse.emf.refactor.common.Refactoring</i>, defined by <b>EMF Refactor</b>. Besides the given refactoring specifics <i>id</i>, <i>namespaceUri</i> and <i>menulabel</i> additional references to two Java classes are needed. The following figure shows the generated extension point serving for our example refactoring <b>Move EAttribute</b>.</p>
			<img src="fig/spec_07.PNG" alt="Fig. s_7">
			<p></p>
			<p><b>EMF Refactor</b> generates altogether five refactoring specific Java classes as shown in the following figure. These classes are needed by the application module of <b>EMF Refactor</b> to execute the specified refactoring. Furthermore, a specific package is created containing the generated Java classes.</p>
			<img src="fig/spec_08.PNG" alt="Fig. s_8">
			<p></p>
			<p>Since the application module of <b>EMF Refactor</b> uses the Eclipse Language Toolkit (LTK) technology, a refactoring requires up to three parts, either implemented in Java or using model transformation specifications. In this manual we present the implementation using Java code. The parts of a refactoring specification reflect a primary application check for a selected refactoring without input parameters (initial check), a second one with parameters (final check) and the proper refactoring execution. Therefore, the generated code contains three parts indicating those parts of the code that have to be completed (see following figure).</p>
			<img src="fig/spec_09.PNG" alt="Fig. s_9">
			<p></p>
			<p>The following code snippet shows the Java implementation of the initial check of the example refactoring <b>Move EAttribute</b>. In lines 168 to 170 the contextual <i>EAttribute</i> instance is obtained by the refactoring specific data management object. Then, it is checked whether this attribute is marked as ID of the containing class (line 171) and a detailed error description is added (lines 172 to 174) if so. Line 177 checks whether the containing class has no referenced classes followed by an appropriate error description (lines 178 and 179).</p>
			<img src="fig/spec_10.PNG" alt="Fig. s_10">
			<p></p>
			<p>The following code snippet shows the Java implementation of the final check of the example refactoring <b>Move EAttribute</b>. In lines 197 to 201 the contextual <i>EAttribute</i> instance and the entered class name are obtained by the refactoring specific data management object. Then, the corresponding class is obtained (lines 203 to 208). If there is no such class (line 209) a detailed error description is added (lines 210 and 211). If there is such a class it is checked whether this class already owns an attribute with the same name as the contextual attribute followed by an appropriate error description (lines 215 and 223).</p>
			<img src="fig/spec_11.PNG" alt="Fig. s_11">
			<p></p>
			<p>The last figure in this manual shows the implemented model transformation of the example refactoring <b>Move EAttribute</b>. Again, in lines 122 to 128 the contextual <i>EAttribute</i> instance and the entered class name are obtained by the refactoring specific data management object. In line 131 the contextual attribute is removed from its previous containing class and line 132 inserts the contextual attribute in the corresponding referenced class. In summary, the contextual attribute is moved to the specified class.</p>
			<img src="fig/spec_12.PNG" alt="Fig. s_12">
			<p></p>
			<p>Now, the newly specified refactoring <b>Move EAttribute</b> can be applied, either by deploying the Eclipse plug-in project or by starting the Eclipse runtime environment.</p>
			<p><a href=#top>top</a></p>
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

<?php  																														require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); 	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); 	$App 	= new App();	$Nav	= new Nav();	$Menu 	= new Menu();		include($App->getProjectCommon());    # All on the same line to unclutter the user's desktop'

	$pageTitle 		= "How to generate new EMF model refactorings using Henshin transformations";
	$pageKeywords	= "EMF, Refactor, model refactoring, refactoring";
	$pageAuthor		= "Thorsten Arendt";

	$html = <<<EOHTML

<div id="maincontent">

	<div id="midcolumn">
		<a name=top></a>
		<h1>$pageTitle</h1>
			<p>This manual presents the specification of an EMF model refactoring in <b>EMF Refactor</b> using EMF model transformations formulated in henshin. More precisely, we demonstrate the model refactoring <b>Move EAttribute</b> for Ecore models. Please note, that EMF Refactor can be used for refactorings of any models whose meta model is based on EMF Ecore.</p>
			<p>Let's take a look to the following Ecore diagram presenting a first model concerning EMF model refactorings in an early stage of the EMF Refactor development process. A <i>ModelRefactoring</i> has a name and conforms to a <i>MetaModel</i> that is specified by name, namespace prefix, and namespace URI. Furthermore, it has a label that should be shown as an <i>Entry</i> in the <i>ContextMenu</i> of an arbitrary <i>ModelElement</i>. A <i>ModelElement</i> belongs to a <i>Model</i> that is specified by a name and stored in a file with a specific name. Furthermore, a <i>Model</i> conforms to a <i>MetaModel</i> and each <i>ModelElement</i> is typed over a specific <i>MetaModelType</i> belonging to the corresponding <i>MetaModel</i>. Besides the afore mentioned attributes, each <i>ModelRefactoring</i> is related to a <i>MetaModelType</i> representing the type of the contextual element the refactoring can be applied on.</p>
			<img src="fig/appl_01.PNG" alt="Fig. a_1">
			<p></p>
			<p>During software design it became questionable whether attribute <i>label</i> of class <i>ModelRefactoring</i> could be better placed in class <i>Entry</i>. So, model refactoring <b>Move EAttribute</b> is the next task to be performed. Since <b>EMF Refactor</b> can be used on arbitrary EMF based models the generation of a specific refactoring is mainly triggered from within the EMF instance editor. The next figure shows the example model from above using this tree-based editor.</p>
			<img src="fig/appl_02.PNG" alt="Fig. a_2">
			<p></p>
			<p>EMF model refactoring <b>Move EAttribute</b> can be specified in the following way: First, it has to be checked whether the contextual <i>EAttribute</i> is not marked as ID of the containing class, and whether this class has at least one referenced class. If these (initial) checks pass the user has to put in the name of the class the attribute has to be moved to. Then, it has to be checked whether the containing class has a referenced class with the specified name, and whether this class does not already owns an attribute with the same name as the contextual attribute. If these (final) checks pass the contextual attribute can finally be moved to the specified class.</p>
			<p>Before triggering the code generation process in <b>EMF Refactor</b> we specify the corresponding EMF model transformations using henshin. <a href="http://www.eclipse.org/modeling/emft/henshin/" target="_blank">Henshin</a> is a new approach for inplace transformations of EMF models and uses pattern-based rules which can be structured into nested transformation units with well-defined operational semantics.</p>
			<p>Each part of a EMF model refactoring (initial check, final check, and the proper model transformation) has to be specified by a henshin transformation unit named <i>mainUnit</i> to be executed by <b>EMF Refactor</b>. Then, this transformation unit can reference the corresponding henshin rules. Besides refactoring specific parameters, each main unit must have a parameter named <i>selectedEObject</i> representing the contextual model element the refactoring should be applied on.</p>
			<p>The following figure shows the henshin rule <i>move</i> specifying the movement of the contextual <i>EAttribute</i> from its containing <i>EClass</i> to a referenced <i>EClass</i>. This rule is contained in a henshin <i>SequentialUnit</i> named <i>mainUnit</i> to be executed. Refactoring <b>Move EAttribute</b> (i.e. the corresponding main unit) has one parameter, <i>eClassName</i>, representing the name of the class the attribute has to be moved to. The value of this parameter is passed to rule parameter <i>referencedEClass</i> and the value of parameter <i>selectedEObject</i> is passed to rule parameter <i>selectedEAttribute</i>.</p>
			<img src="fig/hens_01.PNG" alt="Fig. h_1">
			<p></p>
			<p>This rule uses the abstract syntax of EMF Ecore. It specifies the selected <i>EAttribute</i> (in the upper left corner) that is contained in an <i>EClass</i> (in the lower left corner). This class also has an <i>EReference</i> to another <i>EClass</i> (in the upper right corner) with the specified name given by parameter <i>referencedEClass</i>. The containment relationship between the containing class and the contextual attribute has to be removed (represented by tags &lt;&lt;<i>delete</i>&gt;&gt;) whereas a new one between the referenced class and the contextual attribute has to be created. All other elements remain unchanged (represented by tags &lt;&lt;<i>preserve</i>&gt;&gt;).</p>
			<p>In <b>EMF Refactor</b>, initial and final precondition checks can also be specified using henshin transformations. Here, each conflicting situation is defined by a rule pattern using the abstract syntax of the underlying modeling language. These rules must be included in a henshin unit following the same conventions as the execution unit (see above). Furthermore, parameters in the main checking unit must be equally named to the corresponding ones in the main execution unit. The following figure shows both henshin rules specifying the initial checks of refactoring <b>Move EAttribute</b>.</p>
			<img src="fig/hens_02.PNG" alt="Fig. h_2">
			<p></p>
			<p>Rule <i>check_id</i> checks whether the selected attribute is marked as ID of the containing class. Rule <i>check_references</i> checks whether the containing class has no referenced classes. The absence of a referenced class is modeled using tags &lt;&lt;<i>forbid</i>&gt;&gt;. These rules are contained in a henshin <i>IndependentUnit</i> to be executed. If rule <i>check_id</i> can be applied, <b>EMF Refactor</b> uses its description value to provide a detailed error message (see following figure).</p>
			<img src="fig/hens_03.PNG" alt="Fig. h_3">
			<p></p>
			<p>The following figure shows the corresponding description (respectively error message) of rule <i>check_references</i>.</p>
			<img src="fig/hens_04.PNG" alt="Fig. h_4">
			<p></p>
			<p>As mentioned above, there are two final conditions that have to be checked. First, there must be a class with the user specified name that is referenced by the containing class of the contextual attribute. The rule pattern for the absence of such a class is shown in the following figure. Again, the value of unit parameter <i>eClassName</i> is passed to rule parameter <i>referencedEClass</i> for this purpose.</p>
			<img src="fig/hens_05.PNG" alt="Fig. h_5">
			<p></p>
			<p>The following figure shows the corresponding description (respectively error message) of rule <i>check_input_eClassName</i>.</p>
			<img src="fig/hens_06.PNG" alt="Fig. h_6">
			<p></p>
			<p>The second (and last) final precondition that has to be checked is specified by rule <i>check_existing_EAttribute</i> as shown in the following figure. Besides the already known parameters <i>selectedEAttribute</i> and <i>referencedEClass</i>, this rule has another parameter, <i>eAttributeName</i>. When selecting the contextual attribute, this parameter is set to the attribute's name. Then, the rule checks whether the referenced class (with the user given name) already owns an attribute respectively reference with the same name as the contextual attribute using parameter <i>eAttributeName</i>.</p>
			<img src="fig/hens_07.PNG" alt="Fig. h_7">
			<p></p>
			<p>The following figure shows the corresponding description (respectively error message) of rule <i>check_existing_EAttribute</i>.</p>
			<img src="fig/hens_08.PNG" alt="Fig. h_8">
			<p></p>
			<p>After constructing the necessary henshin transformations we can start the code generation process of <b>EMF Refactor</b>. This refactoring specification process can be triggered from within the context menu of a certain model element in the tree-based EMF instance editor. The next figure shows the context menu of an arbitrary <i>EAttribute</i> representing the contextual type of our example EMF model refactoring <b>Move EAttribute</b>. Here, we select entry <i>Specify EMF Model Refactoring using Henshin</i>.</p>
			<img src="fig/hens_09.PNG" alt="Fig. h_9">
			<p></p>
			<p>In the first page of the upcoming refactoring generation dialog three refactoring specifics have to be given (see following figure). First, you have to type in the name of the new refactoring. This name also serves as id of the new refactoring. Then, the text of the label has to be specified concerning the context menu entry when triggering the refactoring application. Finally, an Eclipse plug-in project has to be selected in which the corresponding refactoring Java code should be generated to. Further specifics concerning the contextual model element type are set automatically.</p>
			<img src="fig/hens_10.PNG" alt="Fig. h_10">
			<p></p>
			<p>In the second page of the refactoring generation dialog the henshin transformation files that specify the three parts of the refactoring has to be selected. These files must be available in a folder named <i>transformation</i> in the plug-in project that has been selected in the previous dialog page. The following figure shows the selection for our example refactoring <b>Move EAttribute</b>.</p>
			<img src="fig/hens_11.PNG" alt="Fig. h_11">
			<p></p>
			<p>The third page of the refactoring generation dialog specifies the parameters of the corresponding model refactoring. It shows the parameters of the main transformation unit of the corresponding execution henshin file selected in the previous dialog page (except for the contextual parameter <i>selectedEObject</i>). For refactoring <b>Move EAttribute</b> we select parameter <i>eClassName</i> as shown in the following figure.</p>
			<img src="fig/hens_12.PNG" alt="Fig. h_12">
			<p></p>
			<p>After finishing the refactoring generation dialog, <b>EMF Refactor</b> adds some additional information to the selected Eclipse plug-in project. First, <b>EMF Refactor</b> adds additionally required plug-in dependencies like shown in the following figure.</p>
			<img src="fig/hens_13.PNG" alt="Fig. h_13">
			<p></p>
			<p>To register the new EMF model refactoring the selected Eclipse plug-in project has to serve a specific extension point, <i>org.eclipse.emf.refactor.common.Refactoring</i>, defined by <b>EMF Refactor</b>. Besides the given refactoring specifics <i>id</i>, <i>namespaceUri</i> and <i>menulabel</i> additional references to two Java classes are needed. The following figure shows the generated extension point serving for our example refactoring <b>Move EAttribute</b> (using henshin).</p>
			<img src="fig/hens_14.PNG" alt="Fig. h_14">
			<p></p>
			<p><b>EMF Refactor</b> generates altogether six refactoring specific Java classes as shown in the following figure. These classes are needed by the application module of <b>EMF Refactor</b> to execute the specified refactoring. Furthermore, a specific package is created containing the generated Java classes.</p>
			<img src="fig/hens_15.PNG" alt="Fig. h_15">
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

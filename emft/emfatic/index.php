<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Emfatic</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
      }
      p {
      	text-align:justify;	
      }
    </style>
	<link href="css/bootstrap-responsive.css" rel="stylesheet">
	
    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
  </head>

  <body>

    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="brand" href="http://www.eclipse.org/">Eclipse.org</a>
          <ul class="nav">
            <li><a href="http://www.eclipse.org/">Home</a></li>
            <li><a href="http://www.eclipse.org/downloads">Downloads</a></li>
            <li><a href="http://www.eclipse.org/users/">Users</a></li>
            <li><a href="http://www.eclipse.org/membership/">Members</a></li>
            <li><a href="http://www.eclipse.org/committers/">Committers</a></li>
            <li><a href="http://www.eclipse.org/resources/">Resources</a></li>
            <li><a href="http://www.eclipse.org/projects/">Projects</a></li>
            <li><a href="http://www.eclipse.org/org/">About us</a></li>
          </ul>
        </div>
      </div>
    </div>
    
<div
	class="container">
	
	<ul class="breadcrumb">
  <li>
    <a href="http://www.eclipse.org">Eclipse.org</a> <span class="divider">/</span>
  </li>
  <li>
    <a href="http://www.eclipse.org/modeling">Eclipse Modeling Project</a> <span class="divider">/</span>
  </li>
  <li>
    <a href="http://www.eclipse.org/modeling/emft">Eclipse Modeling Framework Technology (EMFT)</a> <span class="divider">/</span>
  </li>
  <li class="active">
    <a href="#">Emfatic</a>
  </li>
</ul>

	<div class="hero-unit">
	<h1>Emfatic</h1>
	<p>A language designed to represent <a href="http://www.eclipse.org/emf">EMF Ecore</a> models in a textual form.</p>
	</div>
	
	<div class="row">
		<div class="span8">

		<h2>Language reference</h2>
This article details the syntax of Emfatic and the
mapping between Emfatic declarations and the corresponding Ecore
constructs.<br><br>

<b>Disclaimer:</b> This document was originally written by Chris Daly (cjdaly@us.ibm.com)
(Copyright IBM Corp. 2004) <a href="#about"> (read more...)</a>
<br><br>

<h3>1. Packages</h3>
In this article, Emfatic programs are shown in boxes
as in the example below:<br>
<br>
<pre>package test;
class Foo { }</pre>
<br>
When compiled, the program above will produce a model with an <code>EPackage</code> named "test" containing a
single <code>EClass</code> named "Foo".<br>
<br>
As is probably clear from the first Emfatic program above, the keyword <span>package</span> introduces an Ecore <code>EPackage</code> and the identifier
following it maps to the <code>name</code>
attribute of the generated <code>EPackage</code>.<br>
<h4>1.1 Main Package</h4>
The only thing required in an Emfatic source file is a package
declaration.&nbsp; This required element is called the main package
declaration and the <code>EPackage</code>
it defines will contain (directly or indirectly) all of the other
elements of the generated Ecore model.&nbsp; Thus the simplest possible
Emfatic program would look something like this:<br>
<br>
<pre>package p;</pre>
Specifying values for the <code>EPackage</code>
attributes <code>nsURI</code> and <code>nsPrefix</code> is done like this:<br>
<br>
<pre>@namespace(uri="http://www.eclipse.org/emf/2002/Ecore", prefix="ecore")
package ecore;</pre>
Note that Emfatic is case-sensitive in most contexts (reflecting the
underlying case-sensitivity of Ecore), however the identifiers <span>namespace</span>, <span>uri</span> and <span>prefix</span> in the text above could
be written in
any case.&nbsp; Also note that the order of declaration for <span>uri</span> and <span>prefix</span> is not important<span></span>.&nbsp; The syntax of the <span>@namespace</span> declaration is
actually a special case of the more general syntax for declaring
EAnnotations, which will be described in full detail in section 5 below.<br>
<br>
<h4>1.2 Sub-Packages</h4>
Ecore allows packages to be nested inside packages.&nbsp; In Emfatic,
the syntax for nested packages differs from that of the main
package.&nbsp; Nested package declarations are followed by a
curly-brace bracketed region which encloses the nested package
contents.&nbsp; The example below demonstrates package nesting.<br/>

<pre>package main;

package sub1 {
}

package sub2 {
  package sub2_1 { }
  package sub2_2 { }
}</pre>
In the Ecore model generated from the above program, the top-level
package named "main" will contain two packages, "sub1" and "sub2", and
package sub2 will contain the packages "sub2_1" and "sub2_2".<br>
<br>
<h4>1.3 Main Package Imports</h4>
Import statements allow for types defined in external Ecore models to
be referenced.&nbsp; All import statements must immediately follow the
main package declaration.&nbsp; The example below demonstrates the
basic syntax of import statements.&nbsp; The double-quoted string
literal following the import keyword must contain the URI of an Ecore
model.<br>
<br>
<pre>package main;
import "platform:/resource/proj1/foo.ecore";
import "http://www.eclipse.org/emf/2002/Ecore";

package sub { }</pre>
Note that Ecore.ecore is automatically imported, so the second import
in the program above is not really necessary.<br>
<br>
<h3>2. Classifiers</h3>
<h4>2.1 Classes</h4>
The Emfatic syntax for class declarations is very similar to Java,
however a few quirks are required to allow for all of the possibilities
of Ecore.&nbsp; The example below containing four simple class
declarations demonstrates the use of the keywords <code>class</code>, <code>interface</code> and <code>abstract</code> and also introduces Emfatic comments (Emfatic allows both styles of Java comments).&nbsp;
The comments detail the mapping from Emfatic to the <code>EClass</code> attributes <code>interface</code> and <code>abstract</code>.<br>
<br>
<pre>package main;
class C1 {
}
// isInterface=false, isAbstract=false<br>
abstract class C2 { } // isInterface=false, isAbstract=true
interface I1 { } // isInterface=true,&nbsp; isAbstract=false
abstract interface I2 { } // isInterface=true,&nbsp; isAbstract=true
</pre>
Inheritance is specified with the keyword <code>extends</code>. Unlike Java,
there is no <code>implements</code>
keyword to distinguish inheritance from interface implementation.&nbsp;
The example below defines an inheritance hierarchy.<br>
<br>
<pre>package main;
class A { }
class B { }
class C extends A, B { }
class D extends C { }
</pre>
If necessary, the value of the <code>EClassifier</code>
attribute <code>instanceClassName</code>
can be specified. The class <code>EStringToStringMapEntry</code>
from Ecore.ecore provides an example of this:<br><br>
<pre>class EStringToStringMapEntry : java.util.Map$Entry {
  // ... contents omitted ...
}</pre>
<br>
Note that if the class both extends other classes and specifies a value
for <span style="font-weight: bold;">instanceClassName</span>, the <span>extends</span> clause must precede the
<span style="font-weight: bold;">instanceClassName</span> clause.<br>
<br>
<h4>2.2 Data Types</h4>
Declaring an <code>EDataType</code> is fairly simple.&nbsp; Here are some familiar
examples from Ecore.ecore:<br>
<br>
<pre>datatype EInt : int;
datatype EIntegerObject : java.lang.Integer;
transient datatype EJavaObject : java.lang.Object;

datatype EFeatureMapEntry : org.eclipse.emf.ecore.util.FeatureMap$Entry;
datatype EByteArray : "byte[]";&nbsp; // Note: [ and ] are not legal
identifier characters and must be in quotes</pre>
<br>
First note that as with classes, the value of the <code>EClassifier</code> attribute <code>instanceClassName</code> follows the colon
after the name of the datatype.&nbsp; However specifying <code>instanceClassName</code> is required for
datatypes (while it is optional for classes).<br>
<br>
The keyword <code>transient</code> in
the third datatype declaration above indicates that the value of the <code>EDataType</code> <code>serializable</code> attribute should be set
to false. This is a good time to point out that the modifier
keywords introduced so far (<code>abstract</code>
and <code>interface</code>) are
applied to reverse the default Ecore attribute values (by default <code>EClass</code> attributes <code>abstract</code> and <code>interface</code> are both false).&nbsp; In
the case of the <code>EDataType</code>
attribute <code>serializable</code>, the
default value is true so Emfatic uses a keyword, <code>transient</code>, that means the
opposite of serializable.<br>
<br>
The last two datatypes illustrate a subtle syntactic point.&nbsp; The
value specified for the <code>instanceClassName</code>
attribute must either be a valid qualified identifier (a dot or
dollar-sign separated list of identifiers such as <code>java.lang.Object</code> in the third
datatype above) or it must be enclosed in double quotes.&nbsp; The
datatype EFeatureMapEntry contains the character '<code>$</code>' which, following Java
syntactic rules, is a legal qualified identifier separator.&nbsp; The
datatype EByteArray contains the characters '<code>[</code>' and '<code>]</code>' which are not legal in a
qualified identifier.<br>
<br>
The overall point to make about qualified identifier versus
double-quoted syntax for <code>instanceClassName</code>
is that the typical datatype declaration can use the former and thus
should be easier to read and edit, while the latter is available when
needed and allows for arbitrary string text to be placed in the
generated Ecore model.&nbsp; There are some other contexts where the
Emfatic programmer has the option to use either a qualified identifier
or double-quoted string (see the section on Annotations below for
another example of this).<br>
<br>
<h4>2.3 Enumerated Types</h4>
The example below demonstrates the Emfatic syntax that maps to <code>EEnum</code> and <code>EEnumLiteral</code>.&nbsp; Note that the
simple assignment expressions specify the <code>value</code> attribute of each generated <code>EEnumLiteral</code>.<br>
<br>
<pre>enum E {
  A=1;
  B=2;
  C=3;
}</pre>

<br>
In fact, specifying enumeration literal values is optional and
Emfatic generates reasonable values when they are left
unspecified.&nbsp; The code and comments below describe the rules for
this.<br>
<br>
<pre>enum E {
  A;  // = 0 (if not specified, first literal has value 0)<br>
  B = 3;
  C; // = 4 (in general, unspecified values are 1 greater than previous value)
  D; // = 5
}</pre>
<br>
<h4>2.4 Map Entries</h4>
MapEntry classes (such as <code>EStringToStringMapEntry</code>
in Ecore.ecore) can be specified in either of two ways.&nbsp; The
"longhand" way is to declare a class with features named <code>key</code> and <code>value</code> and with <code>[instanceClass=java.util.Map$Entry]</code>
as suggested at the end of section 2.1 above. But there is a
convienent shorthand notation which achieves the same result:<br><br>
<pre>mapentry EStringToStringMapEntry : String -> String;</pre>
<br>
The expression following the colon gives the type of the MapEntry <code>key</code> structural feature followed by
the <code>-></code>
operator, followed by the type of the <code>value</code>
structural feature.&nbsp; Type expressions can
be more complex than shown in the example above and are detailed fully
in the next section.<br>
<br>
<h3>3. Type Expressions<br>
</h3>
The most basic Ecore elements that haven't yet been explored in Emfatic
are the structural and behavioral class features represented by the
Ecore classes <code>EAttribute</code>,
<code>EReference</code>, <code>EOperation</code> and <code>EParameter</code>.&nbsp; These four Ecore
classes are all derived from <code>ETypedElement</code>
which means that instances of them have some type (which is an <code>EClassifier</code>) and inherit the other
characteristics of <code>ETypedElement</code>,
like multiplicity.&nbsp; Before we can describe each specific kind of
class feature, we need to show
how types are represented syntactically, because that applies (more or
less) to all of them.<br>
<br>
Type expressions have two parts.&nbsp; First is a simple identifier or
a qualified identifier (a dot-separated list of simple identifiers like
"a.b.c") that identifies some <code>EClassifier</code>.&nbsp;
The <code>EClassifier</code>
identified may be defined in the same Emfatic source file as the type
expression, or it may be in one of the imported Ecore models (specified
in import statements).<br>
<br>
Let's skip ahead a little by looking at some attribute declarations so
that we can talk about their type expressions:<br>
<br>
<pre>package test;

datatype D1 : int;<br>
package P {
  datatype D2 : int;
}

class C {
  attr D1 d1;
  attr P.D2 d2;
  attr ecore.EString s1;
 attr String s2;
}</pre>
<br>
The class named "C" above declares four attributes with the names "d1",
"d2", "s1" and "s2".&nbsp; Note that Emfatic follows Java syntactic
style in placing type expression before the name.&nbsp; However unlike
Java field declarations, Emfatic uses a keyword - <code>attr</code> - to introduce an
attribute. (The keyword <code>attr</code>
and similar keywords to introduce references and operations will
explained in more detail in the following sub-sections).<br>
<br>
The type expression for d1 is "D1" which identifies the datatype
D1.&nbsp; Because C and D1 are in the same package (test), this simple
expression is fine.<br>
<br>
The type expression for d2 is "P.D2".&nbsp; In this case a qualified
identifier expression is necessary to identify datatype D2 inside
package P.<br>
<br>
The type expression for s1 is "ecore.EString".&nbsp; This identifies
the datatype EString in package ecore (recall that model Ecore.ecore is
implicitly imported in all Emfatic programs).<br>
<br>
The type expression for s2 is "String".&nbsp; The identifier String is
actually a special shorthand for ecore.EString, so s1 and s2 have the
same type.<br>
<h4>3.1 Basic Types</h4>
A number of the types defined in Ecore.ecore have shorthand notation in
Emfatic.&nbsp; The table below lists the Emfatic shorthand and the
corresponding Ecore.ecore type name for each of these basic types as
well as the corresponding Java type or class (taken from table 5.1 in
the EMF book).<br>
<br>
<table class="table table-striped table-bordered">
  <caption>Table 3.1 - Basic Type Names<br>
  </caption> 
    <thead>
    <tr>
      <th>Emfatic Keyword
      </th>
      <th>Ecore EClassifier name
      </th>
      <th>Java type name
      </th>
    </tr>
    </thead>
    <tbody>
    <tr>
      <td>boolean<br>
      </td>
      <td>EBoolean<br>
      </td>
      <td>boolean<br>
      </td>
    </tr>
    <tr>
      <td>Boolean<br>
      </td>
      <td>EBooleanObject<br>
      </td>
      <td>java.lang.Boolean<br>
      </td>
    </tr>
    <tr>
      <td>byte<br>
      </td>
      <td>EByte<br>
      </td>
      <td>byte<br>
      </td>
    </tr>
    <tr>
      <td>Byte<br>
      </td>
      <td>EByteObject<br>
      </td>
      <td>java.lang.Byte<br>
      </td>
    </tr>
    <tr>
      <td>char<br>
      </td>
      <td>EChar<br>
      </td>
      <td>char<br>
      </td>
    </tr>
    <tr>
      <td>Character<br>
      </td>
      <td>ECharacterObject<br>
      </td>
      <td>java.lang.Character<br>
      </td>
    </tr>
    <tr>
      <td>double<br>
      </td>
      <td>EDouble<br>
      </td>
      <td>double<br>
      </td>
    </tr>
    <tr>
      <td>Double<br>
      </td>
      <td>EDoubleObject<br>
      </td>
      <td>java.lang.Double<br>
      </td>
    </tr>
    <tr>
      <td>float<br>
      </td>
      <td>EFloat<br>
      </td>
      <td>float<br>
      </td>
    </tr>
    <tr>
      <td>Float<br>
      </td>
      <td>EFloatObject<br>
      </td>
      <td>java.lang.Float<br>
      </td>
    </tr>
    <tr>
      <td>int<br>
      </td>
      <td>EInt<br>
      </td>
      <td>int<br>
      </td>
    </tr>
    <tr>
      <td>Integer<br>
      </td>
      <td>EIntegerObject<br>
      </td>
      <td>java.lang.Integer<br>
      </td>
    </tr>
    <tr>
      <td>long<br>
      </td>
      <td>ELong<br>
      </td>
      <td>long<br>
      </td>
    </tr>
    <tr>
      <td>Long<br>
      </td>
      <td>ELongObject<br>
      </td>
      <td>java.lang.Long<br>
      </td>
    </tr>
    <tr>
      <td>short<br>
      </td>
      <td>EShort<br>
      </td>
      <td>short<br>
      </td>
    </tr>
    <tr>
      <td>Short<br>
      </td>
      <td>EShortObject<br>
      </td>
      <td>java.lang.Short<br>
      </td>
    </tr>
    <tr>
      <td>Date<br>
      </td>
      <td>EDate<br>
      </td>
      <td>java.util.Date<br>
      </td>
    </tr>
    <tr>
      <td>String<br>
      </td>
      <td>EString<br>
      </td>
      <td>java.lang.String<br>
      </td>
    </tr>
    <tr>
      <td>Object<br>
      </td>
      <td>EJavaObject<br>
      </td>
      <td>java.lang.Object<br>
      </td>
    </tr>
    <tr>
      <td>Class<br>
      </td>
      <td>EJavaClass<br>
      </td>
      <td>java.lang.Class<br>
      </td>
    </tr>
    <tr>
      <td>EObject<br>
      </td>
      <td>EObject</td>
      <td>org.eclipse.emf.ecore.EObject</td>
    </tr>
    <tr>
      <td>EClass<br>
      </td>
      <td>EClass<br>
      </td>
      <td>org.eclipse.emf.ecore.EClass</td>
    </tr>
  </tbody>
</table>
<br>
Remember that you can always reference these types, and the rest of the
types in Ecore.ecore, by using their fully qualified name which begins
with the package prefix "ecore".&nbsp; For example <code>ecore.EOperation</code> and <code>ecore.EBigInteger</code> are also
legal references to types in Ecore.ecore.<br>
<br>
<h4>3.2 Multiplicity Expressions </h4>
The second part of a type expression is the multiplicity
expression.&nbsp; This maps to the <code>lowerBound</code>
and <code>upperBound</code> attributes of <code>ETypedElement</code>.&nbsp; Multiplicity
expressions are optional, but when omitted the generated <code>ETypedElement</code> gets the defaults (<code>lowerBound</code> = 0 and <code>upperBound</code> = 1).&nbsp; The example
below shows some attribute declarations with multiplicity expressions:<br>
<br>
<pre>class C {
  attr String[1] s1;
  attr String[0..3] s2;
  attr String[*] s3;
  attr String[+] s4;
}</pre>
<br>
The mapping between various multiplicity expressions and the <code>lowerBound</code> and <code>upperBound</code> attributes of the
generated <code>ETypedElement</code> is
detailed more fully in the following table.<br>
<br>
<table class="table table-striped table-bordered">
  <caption>Table 3.2 - Multiplicity Expressions<br>
  </caption> 
  <thead>
<tr>
      <th>Emfatic multiplicity expression
      </th>
      <th>ETypedElement lowerBound<br>
      </th>
      <th>ETypedElement upperBound<br>
      </th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><span
>none</span><br>
      </td>
      <td>0<br>
      </td>
      <td>1<br>
      </td>
    </tr>
    <tr>
      <td><span>[?]</span><br>
      </td>
      <td>0<br>
      </td>
      <td>1<br>
      </td>
    </tr>
    <tr>
      <td>[]<br>
      </td>
      <td>0<br>
      </td>
      <td>unbounded (-1)</td>
    </tr>
    <tr>
      <td><span>[*]</span><br>
      </td>
      <td>0<br>
      </td>
      <td>unbounded (-1)<br>
      </td>
    </tr>
    <tr>
      <td><span>[+]</span><br>
      </td>
      <td>1<br>
      </td>
      <td>unbounded (-1)<br>
      </td>
    </tr>
    <tr>
      <td><span>[1]</span><br>
      </td>
      <td>1<br>
      </td>
      <td>1<br>
      </td>
    </tr>
    <tr>
      <td><span>[<span>n</span>]</span><br>
      </td>
      <td><span>n</span><br>
      </td>
      <td><span>n</span><br>
      </td>
    </tr>
    <tr>
      <td><span>[0..4]</span><br>
      </td>
      <td>0<br>
      </td>
      <td>4<br>
      </td>
    </tr>
    <tr>
      <td><span>[<span>m</span>..<span
>n</span>]</span><br>
      </td>
      <td><span>m</span><br>
      </td>
      <td><span>n</span><br>
      </td>
    </tr>
    <tr>
      <td><span>[5..*]</span><br>
      </td>
      <td>5<br>
      </td>
      <td>unbounded (-1)</td>
    </tr>
    <tr>
      <td><span>[1..?]</span><br>
      </td>
      <td>1<br>
      </td>
      <td>unspecified (-2)<br>
      </td>
    </tr>
  </tbody>
</table>
<br>
<br>
<h4>3.3 Escaping Keywords</h4>
<span>Note: this doesn't really fit here,
but I can't find a better place for it...</span><br>
<br>
Sometimes it's necessary or desirable to use a keyword as the name for
some model element.&nbsp; This can be acheived by prefixing the name
identifier with the '<code>~</code>'
symbol.&nbsp; This ability was added primarily to make it possible to
represent Ecore.ecore in Emfatic, so we'll show another example from
Ecore.ecore here to illustrate:<br>
<br>
<pre>class EClass extends EClassifier
{
  // ...
  ~abstract : EBoolean;
  ~interface : EBoolean;
  // ...
}</pre>
<br>
Recall that the <code>abstract</code>
and <code>interface</code> keywords
are used in class declarations.&nbsp; The code above shows how they can
be used as attribute names.&nbsp; Emfatic removes the '<code>~</code>' symbol so names in the
generated Ecore model do not contain it.<br>
<br>
<h3>4. Structural and Behavioral Features</h3>
Now we are ready to show how the Ecore class features <code>EAttribute</code>,
<code>EReference</code>, <code>EOperation</code> and <code>EParameter</code> are represented in
Emfatic.&nbsp; The example below is the class <code>EPackage</code>
from Ecore.ecore and it was
chosen to give a feel for the feature syntax because it contains a
sample of each kind of class feature.&nbsp; <br>
<br>
<pre>class EPackage extends ENamedElement {
  op EClassifier getEClassifier(EString name);
  attr EString nsURI;
  attr EString nsPrefix;
  transient !resolve ref EFactory[1]#ePackage eFactoryInstance;
  val EClassifier[*]#ePackage eClassifiers;
  val EPackage[*]#eSuperPackage eSubpackages;
  readonly transient ref EPackage#eSubpackages eSuperPackage;
}</pre>
<br>
For now we just want to point out that the syntax for class features is
based on the syntax of Java with one key difference.&nbsp; In Java some
elements are introduced with special keywords like <code>class</code> and <code>interface</code>, but type members
like fields and methods have no such keywords to introduce them.&nbsp;
This works for Java because fields and methods can be distinguished by
looking at other syntactic featues (methods have parenthesis and fields
do not).&nbsp; However the distinction between what EMF calls
attributes and references doesn't really exist in Java, so there is no
distinguishing syntax.&nbsp; Because of this and because class features
are such an essential element of EMF, a decision was made to use
keywords to introduce and differentiate attributes, references and
operations.&nbsp; Thus in Emfatic the basic syntax for a class feature
looks like this:<br>
<br>
<div style="margin-left: 40px;"><code>modifiers
&nbsp; featureKind &nbsp; typeExpression &nbsp; name &nbsp; ';'</code><br>
</div>
<br>
Where <code>featureKind</code> is one of
the four keywords in the following table.<br>
<br>
<table class="table table-striped table-bordered">
  <caption>Table 4.1 - Class Feature Kind Keywords<br>
  </caption>
    <thead>
    <tr>
      <th>Emfatic
keyword<br>
      </th>
      <th>introduces<br>
      </th>
    </tr>
    </thead>
    <tbody>
    <tr>
      <td>attr<br>
      </td>
      <td>EAttribute<br>
      </td>
    </tr>
    <tr>
      <td>op<br>
      </td>
      <td>EOperation</td>
    </tr>
    <tr>
      <td>ref<br>
      </td>
      <td>normal EReference
(EReference.containment = false)<br>
      </td>
    </tr>
    <tr>
      <td>val<br>
      </td>
      <td>"by value" EReference
(EReference.containment = true)<br>
      </td>
    </tr>
  </tbody>
</table>
<br>
<h4>4.1 Modifiers</h4>
Look again at the Emfatic code above for <code>EPackage</code> and note in the last class
feature declaration the keyword <code>ref</code>
is preceded by the words <code>readonly</code>
and <code>transient</code>.&nbsp;
These are modifiers similar in spirit to Java's modifiers such as
<code>public</code>, <code>private</code> and <code>abstract</code>.&nbsp; However these
modifiers map to
boolean attributes on the Ecore classes involved in defining structural
and behavioral features.&nbsp; These modifiers must appear directly
before the feature's type expression.&nbsp; The table below describes
each
modifier.<br>
<br>
<table class="table table-striped table-bordered">
  <caption>Table 4.2 - Class Feature Modifiers<br>
  </caption><thead>
    <tr>
      <th>modifier<br>
      </th>
      <th>means<br>
      </th>
      <th>applies
to<br>
      </th>
    </tr>
    </thead>
    <tbody>
    <tr>
      <td
 class="firstcolumn">readonly<br>
      </td>
      <td>EStructuralFeature.changeable =
false<br>
      </td>
      <td>attribute, reference<br>
      </td>
    </tr>
    <tr>
      <td
 class="firstcolumn">volatile<br>
      </td>
      <td>EStructuralFeature.volatile =
true<br>
      </td>
      <td>attribute, reference</td>
    </tr>
    <tr>
      <td
 class="firstcolumn">transient<br>
      </td>
      <td>EStructuralFeature.transient =
true<br>
      </td>
      <td>attribute, reference</td>
    </tr>
    <tr>
      <td
 class="firstcolumn">unsettable<br>
      </td>
      <td>EStructuralFeature.unsettable =
true<br>
      </td>
      <td>attribute, reference</td>
    </tr>
    <tr>
      <td>derived<br>
      </td>
      <td>EStructuralFeature.derived = true<br>
      </td>
      <td>attribute, reference</td>
    </tr>
    <tr>
      <td>unique<br>
      </td>
      <td>ETypedElement.unique = true<br>
      </td>
      <td>attribute, reference, operation,
parameter<br>
      </td>
    </tr>
    <tr>
      <td>ordered<br>
      </td>
      <td>ETypedElement.ordered = true<br>
      </td>
      <td>attribute, reference, operation,
parameter</td>
    </tr>
    <tr>
      <td>resolve<br>
      </td>
      <td>EReference.resolveProxies = true<br>
      </td>
      <td>reference<br>
      </td>
    </tr>
    <tr>
      <td>id<br>
      </td>
      <td>EAttribute.iD = true<br>
      </td>
      <td>attribute<br>
      </td>
    </tr>
  </tbody>
</table>
<br>
Note that the meaning of a modifier may be negated by prefixing the <code>!</code> operator.&nbsp; The example
below demonstrates this with an non-ordered attribute:<br>
<br>
<pre>class X {
  !ordered attr String[*] s;
}</pre>
<br>
Normally the only modifiers that you should see negated with <code>!</code> are <code>unique</code>, <code>ordered</code> and <code>resolve</code>.&nbsp; This is because
these three are true by default, so reversing the Ecore default means
using the <code>!</code>
operator.&nbsp; Note also that <code>EStructuralFeature.changeable</code>
is true by default, but the modifier keyword <code>readonly</code> means the opposite (<code>EStructuralFeature.changeable</code> =
false).<br>
<br>
<h4>4.2 Attributes</h4>
We've now seen attribute naming and type expressions.&nbsp; Attributes
may also be assigned default value expressions.&nbsp; Below is an
example showing the various forms of
attribute syntax.<br>
<br>
<pre>class C {
  attr String s;
  attr int i = 1;
  attr ecore.EBoolean b = true;
}</pre>
<br>
Again note that the declaration of attributes is basically identical to
declaring fields in Java except for the presence of the <code>attr</code> keyword.<br>
<br>
<h4>4.3 References</h4>
The type expression syntax for references is slightly complicated by
the fact that we need some way to identify the opposite of a
reference.&nbsp; Let's return again to the code for <code>EPackage</code>, but we'll just look at the
last two feature declarations:<br>
<br>
<pre>class EPackage extends ENamedElement {
  // ...
  val EPackage[*]#eSuperPackage eSubpackages;
  readonly transient ref EPackage#eSubpackages eSuperPackage;
}</pre>
<br>
Notice that the type expressions are followed by a <code>#</code> symbol and an
identifier.&nbsp; This identifier names the <code>EReference</code> which is the <code>opposite</code> of the reference being
declared.&nbsp; If a reference doesn't need to specify its opposite
then that part (including the <code>#</code> symbol) is omitted.<br>
<br>
<h4>4.4 Operations</h4>
The declaration syntax for operations is Java-like as described above,
including use of the keyword <code>void</code>
to identify operations which don't return a value.&nbsp; Also a
Java-like <code>throws</code> clause
allows for the declaration of exception types:<br>
<br>
<pre>class X {
  op String getFullName();
  op void returnsNothing();
  op int add(int a, int b);
  op EObject doSomething(int a, ecore.EBoolean b) throws ExceptionA, ExceptionB;
}</pre>
<br>
<h3>5. Annotations</h3>
Annotations can be attached to every kind of EMF element, however only
the <code>source</code> and <code>details</code> features of the resulting <code>EAnnotation</code> can be
specified in Emfatic.&nbsp; The Emfatic syntax for representing EMF
annotations was inspired by the
syntax being introduced for Java annotations in Java 1.5
("Tiger").&nbsp; The <code>@</code>
symbol is followed by the value of the <code>EAnnotation</code>
<code>source</code>
attribute.&nbsp; Key/value pairs for the annotation <code>details</code> may appear in parenthesis
following the <code>source</code>
value.&nbsp; Multiple
annotations can be attached to each element.&nbsp; Usually the
annotation appears just before its containing element (parameter and
enum literal annotations may appear just after the declaration).&nbsp;
The example below gives some examples of annotations.<br>
<br>
<pre>@"http://source/uri"("key1"="value1", "key2"="value2")
@sourceLabel(key.a="value1", key.b="value2")
@simpleAttr
package test;

@"http://class/annotation"(k="v")
class C {
  @"http://attribute/annotation"(k="v")
  attr int a;

  op int Op(<br>
    @before(k=v) int a,
    int b @after(k=v)
   );
}

enum E { 
  @"http://before"(k=v) 
  A=1; 
 B=2 @"http://after"(k=v); 
}</pre>
<br>
One subtle point to note is that double quotes are only required around the string value
if it is not a valid simple or qualified identifier.&nbsp; So an
identifier
like <code>key</code> or <code>key.a.b.c</code> need not be quoted,
but most complex strings (such as urls) will need to be.<br>
<br>
<h4>5.1 Annotation Labels<br>
</h4>
Emfatic allows for short labels to be defined that map to longer URI
values for the <code>source</code>
attribute of an <code>EAnnotation</code>.&nbsp;
The purpose of this feature is to simplify the Emfatic code, making it
easier to read and edit.&nbsp; Several annotation labels are available
by default, as shown in the following table:<br>
<br>
<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th>Emfatic annotation label<br>
      </th>
      <th>maps to EAnnotation.source value<br>
      </th>
    </tr>
    </thead>
    <tbody>
    <tr>
      <td><span>Ecore</span><br>
      </td>
      <td><span>http://www.eclipse.org/emf/2002/Ecore</span><br>
      </td>
    </tr>
    <tr>
      <td><span>GenModel</span><br>
      </td>
      <td><span>http://www.eclipse.org/emf/2002/GenModel</span><br>
      </td>
    </tr>
    <tr>
      <td>ExtendedMetaData<br>
      </td>
      <td><span>http:///org/eclipse/emf/ecore/util/ExtendedMetaData</span><br>
      </td>
    </tr>
    <tr>
      <td><span>EmfaticAnnotationMap</span><br>
      </td>
      <td><span>http://www.eclipse.org/emf/2004/EmfaticAnnotationMap</span><br>
      </td>
    </tr>
  </tbody>
</table>
<br>
The code below shows some examples:<br>
<br>
<pre>@EmfaticAnnotationMap(myLabel="http://foo/bar")
@genmodel(documentation="model documentation")
package test;

@ecore(constraints="constraintA constraintB")
@myLabel(key="value")
class C {
}</pre>
<br>
There are several details to elaborate on in the example above.&nbsp;
First note that labels are not case sensitive (so <code>Ecore</code> and <code>ecore</code> and <code>ECORE</code> all work the same way).<br>
<br>
Second, note that declaring an annotation using the label <code>EmfaticAnnotationMap</code> has the
side effect of creating a new label which can be used later in the
program.&nbsp; So the second annotation on class "C" will get the <code>source</code> value of <code>"http://foo/bar"</code>.<br>
<br>
Finally, note that the code above shows how to introduce model
documentation and constraints in a way that will later flow into
generated Java code when working with an EMF genmodel.<br>
<br>
<h3 id="about">6. About this article</h3>
This article was originally written by Chris Daly (cjdaly@us.ibm.com)
(Copyright IBM Corp. 2004) and was hosted under IBM alphaWorks.		
</div>
		<div class="span4">
			<h3>Update site</h3>
			<div class="alert alert-info">http://download.eclipse.org/emfatic/update</div>
			<div class="alert alert-warning"><b>Warning:</b> If you've installed the version of Emfatic available from sharf.gr you'll need to uninstall it before installing this one.</div>
			
		</div>
		
		<div class="span4">
			<h3>Links</h3>
			<ul class="nav nav-pills nav-stacked">
			  <li class="active"><a href="#">Home</a>
			  <li><a href="http://www.eclipse.org/forums/index.php/f/19/">Forum</a>
			</ul>
		</div>
	</div>
      <footer>
        <ul class="nav nav-pills">
        <li><a href="#">Home</a>
        <li><a href="http://www.eclipse.org/legal/privacy.php">Privacy Policy</a>
        <li><a href="http://www.eclipse.org/legal/termsofuse.php">Terms of Use</a>
        <li><a href="http://www.eclipse.org/legal/copyright.php">Copyright Agent</a>
        <li><a href="http://www.eclipse.org/legal/">Legal</a>
        <li><a href="http://www.eclipse.org/org/foundation/contact.php">Contact us</a>
        </ul>
        Copyright © 2012 The Eclipse Foundation. All Rights Reserved.
      </footer>

    </div> <!-- /container -->

  </body>
</html>
/**
 * <copyright>
 * </copyright>
 *
 * $Id: State.java,v 1.1 2011/03/15 07:51:54 ewillink Exp $
 */
package org.eclipse.ocl.tutorial.eclipsecon2011.oclstates;

import org.eclipse.emf.common.util.EList;

import org.eclipse.emf.ecore.EObject;

/**
 * <!-- begin-user-doc -->
 * A representation of the model object '<em><b>State</b></em>'.
 * <!-- end-user-doc -->
 *
 * <p>
 * The following features are supported:
 * <ul>
 *   <li>{@link org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.State#isInitial <em>Initial</em>}</li>
 *   <li>{@link org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.State#getName <em>Name</em>}</li>
 *   <li>{@link org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.State#getTransitions <em>Transitions</em>}</li>
 *   <li>{@link org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.State#getStatemachine <em>Statemachine</em>}</li>
 * </ul>
 * </p>
 *
 * @see org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.OCLStatesPackage#getState()
 * @model annotation="http://www.eclipse.org/emf/2002/Ecore constraints='UniqueInitialState NameIsLeadingUpperCase NameLength EveryEventIsHandled'"
 *        annotation="http://www.eclipse.org/emf/2002/Ecore/OCL/Pivot UniqueInitialState='initial implies (((statemachine).states)->select(initial))->size() = 1' UniqueInitialState$message='\'There is more than one initial state\'' NameIsLeadingUpperCase='let firstLetter : String = (name).substring(1, 1) in firstLetter.toUpperCase() = firstLetter' NameIsLeadingUpperCase$message='\'\\\'\' + name + \'\\\' must be Leading Uppercase\'' NameLength='(name).size() >= 4' NameLength$message='\'\\\'\' + name + \'\\\' has \' + ((name).size()).toString() + \' characters when at least 4 wanted\'' EveryEventIsHandled='let allEvents : Set(Event) = ((statemachine).events)->asSet() in let myEvents : Set(Event) = ((self.transitions)->collect(event))->asSet() in (allEvents - myEvents)->isEmpty()' EveryEventIsHandled$message='let allEvents : Set(Event) = ((statemachine).events)->asSet() in let myEvents : Set(Event) = ((self.transitions)->collect(event))->asSet() in (allEvents - myEvents)->iterate(e : Event ; s : String = \'The following events are not handled:\' | s + \' \' + e.name)'"
 * @generated
 */
public interface State extends EObject {
	/**
	 * Returns the value of the '<em><b>Initial</b></em>' attribute.
	 * <!-- begin-user-doc -->
	 * <p>
	 * If the meaning of the '<em>Initial</em>' attribute isn't clear,
	 * there really should be more of a description here...
	 * </p>
	 * <!-- end-user-doc -->
	 * @return the value of the '<em>Initial</em>' attribute.
	 * @see #setInitial(boolean)
	 * @see org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.OCLStatesPackage#getState_Initial()
	 * @model
	 * @generated
	 */
	boolean isInitial();

	/**
	 * Sets the value of the '{@link org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.State#isInitial <em>Initial</em>}' attribute.
	 * <!-- begin-user-doc -->
	 * <!-- end-user-doc -->
	 * @param value the new value of the '<em>Initial</em>' attribute.
	 * @see #isInitial()
	 * @generated
	 */
	void setInitial(boolean value);

	/**
	 * Returns the value of the '<em><b>Name</b></em>' attribute.
	 * <!-- begin-user-doc -->
	 * <p>
	 * If the meaning of the '<em>Name</em>' attribute isn't clear,
	 * there really should be more of a description here...
	 * </p>
	 * <!-- end-user-doc -->
	 * @return the value of the '<em>Name</em>' attribute.
	 * @see #setName(String)
	 * @see org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.OCLStatesPackage#getState_Name()
	 * @model
	 * @generated
	 */
	String getName();

	/**
	 * Sets the value of the '{@link org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.State#getName <em>Name</em>}' attribute.
	 * <!-- begin-user-doc -->
	 * <!-- end-user-doc -->
	 * @param value the new value of the '<em>Name</em>' attribute.
	 * @see #getName()
	 * @generated
	 */
	void setName(String value);

	/**
	 * Returns the value of the '<em><b>Transitions</b></em>' containment reference list.
	 * The list contents are of type {@link org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.Transition}.
	 * <!-- begin-user-doc -->
	 * <p>
	 * If the meaning of the '<em>Transitions</em>' containment reference list isn't clear,
	 * there really should be more of a description here...
	 * </p>
	 * <!-- end-user-doc -->
	 * @return the value of the '<em>Transitions</em>' containment reference list.
	 * @see org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.OCLStatesPackage#getState_Transitions()
	 * @model containment="true"
	 * @generated
	 */
	EList<Transition> getTransitions();

	/**
	 * Returns the value of the '<em><b>Statemachine</b></em>' reference.
	 * <!-- begin-user-doc -->
	 * <p>
	 * If the meaning of the '<em>Statemachine</em>' reference isn't clear,
	 * there really should be more of a description here...
	 * </p>
	 * <!-- end-user-doc -->
	 * @return the value of the '<em>Statemachine</em>' reference.
	 * @see #setStatemachine(Statemachine)
	 * @see org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.OCLStatesPackage#getState_Statemachine()
	 * @model derived="true" ordered="false"
	 *        annotation="http://www.eclipse.org/emf/2002/Ecore/OCL/Pivot derivation='(oclContainer()).oclAsType(Statemachine)'"
	 * @generated
	 */
	Statemachine getStatemachine();

	/**
	 * Sets the value of the '{@link org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.State#getStatemachine <em>Statemachine</em>}' reference.
	 * <!-- begin-user-doc -->
	 * <!-- end-user-doc -->
	 * @param value the new value of the '<em>Statemachine</em>' reference.
	 * @see #getStatemachine()
	 * @generated
	 */
	void setStatemachine(Statemachine value);

} // State

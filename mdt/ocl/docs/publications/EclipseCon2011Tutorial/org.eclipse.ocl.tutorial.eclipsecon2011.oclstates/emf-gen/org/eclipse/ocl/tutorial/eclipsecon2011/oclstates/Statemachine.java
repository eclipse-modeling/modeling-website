/**
 * <copyright>
 * </copyright>
 *
 * $Id: Statemachine.java,v 1.1 2011/03/15 07:51:54 ewillink Exp $
 */
package org.eclipse.ocl.tutorial.eclipsecon2011.oclstates;

import org.eclipse.emf.common.util.EList;

import org.eclipse.emf.ecore.EObject;

/**
 * <!-- begin-user-doc -->
 * A representation of the model object '<em><b>Statemachine</b></em>'.
 * <!-- end-user-doc -->
 *
 * <p>
 * The following features are supported:
 * <ul>
 *   <li>{@link org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.Statemachine#isInitial <em>Initial</em>}</li>
 *   <li>{@link org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.Statemachine#getName <em>Name</em>}</li>
 *   <li>{@link org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.Statemachine#getValue <em>Value</em>}</li>
 *   <li>{@link org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.Statemachine#getEvents <em>Events</em>}</li>
 *   <li>{@link org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.Statemachine#getStates <em>States</em>}</li>
 * </ul>
 * </p>
 *
 * @see org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.OCLStatesPackage#getStatemachine()
 * @model annotation="http://www.eclipse.org/emf/2002/Ecore constraints='HasInitialState'"
 *        annotation="http://www.eclipse.org/emf/2002/Ecore/OCL/Pivot HasInitialState='(states)->exists(s : State | s.initial)' HasInitialState$message='\'No initial state\''"
 * @generated
 */
public interface Statemachine extends EObject {
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
	 * @see org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.OCLStatesPackage#getStatemachine_Initial()
	 * @model
	 * @generated
	 */
	boolean isInitial();

	/**
	 * Sets the value of the '{@link org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.Statemachine#isInitial <em>Initial</em>}' attribute.
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
	 * @see org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.OCLStatesPackage#getStatemachine_Name()
	 * @model
	 * @generated
	 */
	String getName();

	/**
	 * Sets the value of the '{@link org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.Statemachine#getName <em>Name</em>}' attribute.
	 * <!-- begin-user-doc -->
	 * <!-- end-user-doc -->
	 * @param value the new value of the '<em>Name</em>' attribute.
	 * @see #getName()
	 * @generated
	 */
	void setName(String value);

	/**
	 * Returns the value of the '<em><b>Value</b></em>' attribute.
	 * <!-- begin-user-doc -->
	 * <p>
	 * If the meaning of the '<em>Value</em>' attribute isn't clear,
	 * there really should be more of a description here...
	 * </p>
	 * <!-- end-user-doc -->
	 * @return the value of the '<em>Value</em>' attribute.
	 * @see #setValue(int)
	 * @see org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.OCLStatesPackage#getStatemachine_Value()
	 * @model
	 * @generated
	 */
	int getValue();

	/**
	 * Sets the value of the '{@link org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.Statemachine#getValue <em>Value</em>}' attribute.
	 * <!-- begin-user-doc -->
	 * <!-- end-user-doc -->
	 * @param value the new value of the '<em>Value</em>' attribute.
	 * @see #getValue()
	 * @generated
	 */
	void setValue(int value);

	/**
	 * Returns the value of the '<em><b>Events</b></em>' containment reference list.
	 * The list contents are of type {@link org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.Event}.
	 * <!-- begin-user-doc -->
	 * <p>
	 * If the meaning of the '<em>Events</em>' containment reference list isn't clear,
	 * there really should be more of a description here...
	 * </p>
	 * <!-- end-user-doc -->
	 * @return the value of the '<em>Events</em>' containment reference list.
	 * @see org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.OCLStatesPackage#getStatemachine_Events()
	 * @model containment="true"
	 * @generated
	 */
	EList<Event> getEvents();

	/**
	 * Returns the value of the '<em><b>States</b></em>' containment reference list.
	 * The list contents are of type {@link org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.State}.
	 * <!-- begin-user-doc -->
	 * <p>
	 * If the meaning of the '<em>States</em>' containment reference list isn't clear,
	 * there really should be more of a description here...
	 * </p>
	 * <!-- end-user-doc -->
	 * @return the value of the '<em>States</em>' containment reference list.
	 * @see org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.OCLStatesPackage#getStatemachine_States()
	 * @model containment="true"
	 * @generated
	 */
	EList<State> getStates();

} // Statemachine

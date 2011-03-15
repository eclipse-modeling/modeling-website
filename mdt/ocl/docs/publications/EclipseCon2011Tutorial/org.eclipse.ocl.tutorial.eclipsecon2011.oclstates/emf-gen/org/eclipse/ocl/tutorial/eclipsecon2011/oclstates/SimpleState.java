/**
 * <copyright>
 * </copyright>
 *
 * $Id: SimpleState.java,v 1.1 2011/03/15 07:51:54 ewillink Exp $
 */
package org.eclipse.ocl.tutorial.eclipsecon2011.oclstates;


/**
 * <!-- begin-user-doc -->
 * A representation of the model object '<em><b>Simple State</b></em>'.
 * <!-- end-user-doc -->
 *
 * <p>
 * The following features are supported:
 * <ul>
 *   <li>{@link org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.SimpleState#getValue <em>Value</em>}</li>
 * </ul>
 * </p>
 *
 * @see org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.OCLStatesPackage#getSimpleState()
 * @model
 * @generated
 */
public interface SimpleState extends State {
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
	 * @see org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.OCLStatesPackage#getSimpleState_Value()
	 * @model
	 * @generated
	 */
	int getValue();

	/**
	 * Sets the value of the '{@link org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.SimpleState#getValue <em>Value</em>}' attribute.
	 * <!-- begin-user-doc -->
	 * <!-- end-user-doc -->
	 * @param value the new value of the '<em>Value</em>' attribute.
	 * @see #getValue()
	 * @generated
	 */
	void setValue(int value);

} // SimpleState

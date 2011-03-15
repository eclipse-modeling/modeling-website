/**
 * <copyright>
 * </copyright>
 *
 * $Id: StateImpl.java,v 1.1 2011/03/15 07:51:54 ewillink Exp $
 */
package org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.impl;

import java.util.Collection;

import org.eclipse.emf.common.notify.Notification;
import org.eclipse.emf.common.notify.NotificationChain;

import org.eclipse.emf.common.util.EList;

import org.eclipse.emf.ecore.EClass;
import org.eclipse.emf.ecore.EStructuralFeature;
import org.eclipse.emf.ecore.InternalEObject;

import org.eclipse.emf.ecore.impl.ENotificationImpl;
import org.eclipse.emf.ecore.impl.MinimalEObjectImpl;

import org.eclipse.emf.ecore.util.EObjectContainmentEList;
import org.eclipse.emf.ecore.util.InternalEList;

import org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.OCLStatesPackage;
import org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.State;
import org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.Statemachine;
import org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.Transition;

/**
 * <!-- begin-user-doc -->
 * An implementation of the model object '<em><b>State</b></em>'.
 * <!-- end-user-doc -->
 * <p>
 * The following features are implemented:
 * <ul>
 *   <li>{@link org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.impl.StateImpl#isInitial <em>Initial</em>}</li>
 *   <li>{@link org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.impl.StateImpl#getName <em>Name</em>}</li>
 *   <li>{@link org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.impl.StateImpl#getTransitions <em>Transitions</em>}</li>
 *   <li>{@link org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.impl.StateImpl#getStatemachine <em>Statemachine</em>}</li>
 * </ul>
 * </p>
 *
 * @generated
 */
public class StateImpl extends MinimalEObjectImpl.Container implements State {
	/**
	 * The default value of the '{@link #isInitial() <em>Initial</em>}' attribute.
	 * <!-- begin-user-doc -->
	 * <!-- end-user-doc -->
	 * @see #isInitial()
	 * @generated
	 * @ordered
	 */
	protected static final boolean INITIAL_EDEFAULT = false;

	/**
	 * The cached value of the '{@link #isInitial() <em>Initial</em>}' attribute.
	 * <!-- begin-user-doc -->
	 * <!-- end-user-doc -->
	 * @see #isInitial()
	 * @generated
	 * @ordered
	 */
	protected boolean initial = INITIAL_EDEFAULT;

	/**
	 * The default value of the '{@link #getName() <em>Name</em>}' attribute.
	 * <!-- begin-user-doc -->
	 * <!-- end-user-doc -->
	 * @see #getName()
	 * @generated
	 * @ordered
	 */
	protected static final String NAME_EDEFAULT = null;

	/**
	 * The cached value of the '{@link #getName() <em>Name</em>}' attribute.
	 * <!-- begin-user-doc -->
	 * <!-- end-user-doc -->
	 * @see #getName()
	 * @generated
	 * @ordered
	 */
	protected String name = NAME_EDEFAULT;

	/**
	 * The cached value of the '{@link #getTransitions() <em>Transitions</em>}' containment reference list.
	 * <!-- begin-user-doc -->
	 * <!-- end-user-doc -->
	 * @see #getTransitions()
	 * @generated
	 * @ordered
	 */
	protected EList<Transition> transitions;

	/**
	 * The cached setting delegate for the '{@link #getStatemachine() <em>Statemachine</em>}' reference.
	 * <!-- begin-user-doc -->
	 * <!-- end-user-doc -->
	 * @see #getStatemachine()
	 * @generated
	 * @ordered
	 */
	protected EStructuralFeature.Internal.SettingDelegate STATEMACHINE__ESETTING_DELEGATE = ((EStructuralFeature.Internal)OCLStatesPackage.Literals.STATE__STATEMACHINE).getSettingDelegate();

	/**
	 * <!-- begin-user-doc -->
	 * <!-- end-user-doc -->
	 * @generated
	 */
	protected StateImpl() {
		super();
	}

	/**
	 * <!-- begin-user-doc -->
	 * <!-- end-user-doc -->
	 * @generated
	 */
	@Override
	protected EClass eStaticClass() {
		return OCLStatesPackage.Literals.STATE;
	}

	/**
	 * <!-- begin-user-doc -->
	 * <!-- end-user-doc -->
	 * @generated
	 */
	public boolean isInitial() {
		return initial;
	}

	/**
	 * <!-- begin-user-doc -->
	 * <!-- end-user-doc -->
	 * @generated
	 */
	public void setInitial(boolean newInitial) {
		boolean oldInitial = initial;
		initial = newInitial;
		if (eNotificationRequired())
			eNotify(new ENotificationImpl(this, Notification.SET, OCLStatesPackage.STATE__INITIAL, oldInitial, initial));
	}

	/**
	 * <!-- begin-user-doc -->
	 * <!-- end-user-doc -->
	 * @generated
	 */
	public String getName() {
		return name;
	}

	/**
	 * <!-- begin-user-doc -->
	 * <!-- end-user-doc -->
	 * @generated
	 */
	public void setName(String newName) {
		String oldName = name;
		name = newName;
		if (eNotificationRequired())
			eNotify(new ENotificationImpl(this, Notification.SET, OCLStatesPackage.STATE__NAME, oldName, name));
	}

	/**
	 * <!-- begin-user-doc -->
	 * <!-- end-user-doc -->
	 * @generated
	 */
	public EList<Transition> getTransitions() {
		if (transitions == null) {
			transitions = new EObjectContainmentEList<Transition>(Transition.class, this, OCLStatesPackage.STATE__TRANSITIONS);
		}
		return transitions;
	}

	/**
	 * <!-- begin-user-doc -->
	 * <!-- end-user-doc -->
	 * @generated
	 */
	public Statemachine getStatemachine() {
		return (Statemachine)STATEMACHINE__ESETTING_DELEGATE.dynamicGet(this, null, 0, true, false);
	}

	/**
	 * <!-- begin-user-doc -->
	 * <!-- end-user-doc -->
	 * @generated
	 */
	public Statemachine basicGetStatemachine() {
		return (Statemachine)STATEMACHINE__ESETTING_DELEGATE.dynamicGet(this, null, 0, false, false);
	}

	/**
	 * <!-- begin-user-doc -->
	 * <!-- end-user-doc -->
	 * @generated
	 */
	public void setStatemachine(Statemachine newStatemachine) {
		STATEMACHINE__ESETTING_DELEGATE.dynamicSet(this, null, 0, newStatemachine);
	}

	/**
	 * <!-- begin-user-doc -->
	 * <!-- end-user-doc -->
	 * @generated
	 */
	@Override
	public NotificationChain eInverseRemove(InternalEObject otherEnd, int featureID, NotificationChain msgs) {
		switch (featureID) {
			case OCLStatesPackage.STATE__TRANSITIONS:
				return ((InternalEList<?>)getTransitions()).basicRemove(otherEnd, msgs);
		}
		return super.eInverseRemove(otherEnd, featureID, msgs);
	}

	/**
	 * <!-- begin-user-doc -->
	 * <!-- end-user-doc -->
	 * @generated
	 */
	@Override
	public Object eGet(int featureID, boolean resolve, boolean coreType) {
		switch (featureID) {
			case OCLStatesPackage.STATE__INITIAL:
				return isInitial();
			case OCLStatesPackage.STATE__NAME:
				return getName();
			case OCLStatesPackage.STATE__TRANSITIONS:
				return getTransitions();
			case OCLStatesPackage.STATE__STATEMACHINE:
				if (resolve) return getStatemachine();
				return basicGetStatemachine();
		}
		return super.eGet(featureID, resolve, coreType);
	}

	/**
	 * <!-- begin-user-doc -->
	 * <!-- end-user-doc -->
	 * @generated
	 */
	@SuppressWarnings("unchecked")
	@Override
	public void eSet(int featureID, Object newValue) {
		switch (featureID) {
			case OCLStatesPackage.STATE__INITIAL:
				setInitial((Boolean)newValue);
				return;
			case OCLStatesPackage.STATE__NAME:
				setName((String)newValue);
				return;
			case OCLStatesPackage.STATE__TRANSITIONS:
				getTransitions().clear();
				getTransitions().addAll((Collection<? extends Transition>)newValue);
				return;
			case OCLStatesPackage.STATE__STATEMACHINE:
				setStatemachine((Statemachine)newValue);
				return;
		}
		super.eSet(featureID, newValue);
	}

	/**
	 * <!-- begin-user-doc -->
	 * <!-- end-user-doc -->
	 * @generated
	 */
	@Override
	public void eUnset(int featureID) {
		switch (featureID) {
			case OCLStatesPackage.STATE__INITIAL:
				setInitial(INITIAL_EDEFAULT);
				return;
			case OCLStatesPackage.STATE__NAME:
				setName(NAME_EDEFAULT);
				return;
			case OCLStatesPackage.STATE__TRANSITIONS:
				getTransitions().clear();
				return;
			case OCLStatesPackage.STATE__STATEMACHINE:
				setStatemachine((Statemachine)null);
				return;
		}
		super.eUnset(featureID);
	}

	/**
	 * <!-- begin-user-doc -->
	 * <!-- end-user-doc -->
	 * @generated
	 */
	@Override
	public boolean eIsSet(int featureID) {
		switch (featureID) {
			case OCLStatesPackage.STATE__INITIAL:
				return initial != INITIAL_EDEFAULT;
			case OCLStatesPackage.STATE__NAME:
				return NAME_EDEFAULT == null ? name != null : !NAME_EDEFAULT.equals(name);
			case OCLStatesPackage.STATE__TRANSITIONS:
				return transitions != null && !transitions.isEmpty();
			case OCLStatesPackage.STATE__STATEMACHINE:
				return STATEMACHINE__ESETTING_DELEGATE.dynamicIsSet(this, null, 0);
		}
		return super.eIsSet(featureID);
	}

	/**
	 * <!-- begin-user-doc -->
	 * <!-- end-user-doc -->
	 * @generated
	 */
	@Override
	public String toString() {
		if (eIsProxy()) return super.toString();

		StringBuffer result = new StringBuffer(super.toString());
		result.append(" (initial: ");
		result.append(initial);
		result.append(", name: ");
		result.append(name);
		result.append(')');
		return result.toString();
	}

} //StateImpl

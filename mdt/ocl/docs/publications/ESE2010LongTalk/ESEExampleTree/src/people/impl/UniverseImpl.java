/**
 * <copyright>
 * </copyright>
 *
 * $Id: UniverseImpl.java,v 1.1 2010/10/16 12:13:06 ewillink Exp $
 */
package people.impl;

import java.util.Collection;

import org.eclipse.emf.common.notify.NotificationChain;

import org.eclipse.emf.common.util.EList;

import org.eclipse.emf.ecore.EClass;
import org.eclipse.emf.ecore.InternalEObject;

import org.eclipse.emf.ecore.impl.EObjectImpl;

import org.eclipse.emf.ecore.util.EObjectContainmentEList;
import org.eclipse.emf.ecore.util.InternalEList;

import people.PeoplePackage;
import people.Person;
import people.Universe;

/**
 * <!-- begin-user-doc -->
 * An implementation of the model object '<em><b>Universe</b></em>'.
 * <!-- end-user-doc -->
 * <p>
 * The following features are implemented:
 * <ul>
 *   <li>{@link people.impl.UniverseImpl#getPeople <em>People</em>}</li>
 * </ul>
 * </p>
 *
 * @generated
 */
public class UniverseImpl extends EObjectImpl implements Universe {
	/**
	 * The cached value of the '{@link #getPeople() <em>People</em>}' containment reference list.
	 * <!-- begin-user-doc -->
	 * <!-- end-user-doc -->
	 * @see #getPeople()
	 * @generated
	 * @ordered
	 */
	protected EList<Person> people;

	/**
	 * <!-- begin-user-doc -->
	 * <!-- end-user-doc -->
	 * @generated
	 */
	protected UniverseImpl() {
		super();
	}

	/**
	 * <!-- begin-user-doc -->
	 * <!-- end-user-doc -->
	 * @generated
	 */
	@Override
	protected EClass eStaticClass() {
		return PeoplePackage.Literals.UNIVERSE;
	}

	/**
	 * <!-- begin-user-doc -->
	 * <!-- end-user-doc -->
	 * @generated
	 */
	public EList<Person> getPeople() {
		if (people == null) {
			people = new EObjectContainmentEList<Person>(Person.class, this, PeoplePackage.UNIVERSE__PEOPLE);
		}
		return people;
	}

	/**
	 * <!-- begin-user-doc -->
	 * <!-- end-user-doc -->
	 * @generated
	 */
	@Override
	public NotificationChain eInverseRemove(InternalEObject otherEnd, int featureID, NotificationChain msgs) {
		switch (featureID) {
			case PeoplePackage.UNIVERSE__PEOPLE:
				return ((InternalEList<?>)getPeople()).basicRemove(otherEnd, msgs);
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
			case PeoplePackage.UNIVERSE__PEOPLE:
				return getPeople();
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
			case PeoplePackage.UNIVERSE__PEOPLE:
				getPeople().clear();
				getPeople().addAll((Collection<? extends Person>)newValue);
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
			case PeoplePackage.UNIVERSE__PEOPLE:
				getPeople().clear();
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
			case PeoplePackage.UNIVERSE__PEOPLE:
				return people != null && !people.isEmpty();
		}
		return super.eIsSet(featureID);
	}

} //UniverseImpl

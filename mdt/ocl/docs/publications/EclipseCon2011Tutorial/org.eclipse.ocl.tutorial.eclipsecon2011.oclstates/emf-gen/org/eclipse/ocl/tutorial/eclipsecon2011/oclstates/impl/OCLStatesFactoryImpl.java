/**
 * <copyright>
 * </copyright>
 *
 * $Id: OCLStatesFactoryImpl.java,v 1.1 2011/03/15 07:51:54 ewillink Exp $
 */
package org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.impl;

import org.eclipse.emf.ecore.EClass;
import org.eclipse.emf.ecore.EObject;
import org.eclipse.emf.ecore.EPackage;

import org.eclipse.emf.ecore.impl.EFactoryImpl;

import org.eclipse.emf.ecore.plugin.EcorePlugin;

import org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.*;

/**
 * <!-- begin-user-doc -->
 * An implementation of the model <b>Factory</b>.
 * <!-- end-user-doc -->
 * @generated
 */
public class OCLStatesFactoryImpl extends EFactoryImpl implements OCLStatesFactory {
	/**
	 * Creates the default factory implementation.
	 * <!-- begin-user-doc -->
	 * <!-- end-user-doc -->
	 * @generated
	 */
	public static OCLStatesFactory init() {
		try {
			OCLStatesFactory theOCLStatesFactory = (OCLStatesFactory)EPackage.Registry.INSTANCE.getEFactory("http://ocl.eclipse.org/tutorial/eclipsecon2011/OCLStates"); 
			if (theOCLStatesFactory != null) {
				return theOCLStatesFactory;
			}
		}
		catch (Exception exception) {
			EcorePlugin.INSTANCE.log(exception);
		}
		return new OCLStatesFactoryImpl();
	}

	/**
	 * Creates an instance of the factory.
	 * <!-- begin-user-doc -->
	 * <!-- end-user-doc -->
	 * @generated
	 */
	public OCLStatesFactoryImpl() {
		super();
	}

	/**
	 * <!-- begin-user-doc -->
	 * <!-- end-user-doc -->
	 * @generated
	 */
	@Override
	public EObject create(EClass eClass) {
		switch (eClass.getClassifierID()) {
			case OCLStatesPackage.MODULE: return createModule();
			case OCLStatesPackage.STATEMACHINE: return createStatemachine();
			case OCLStatesPackage.EVENT: return createEvent();
			case OCLStatesPackage.STATE: return createState();
			case OCLStatesPackage.SIMPLE_STATE: return createSimpleState();
			case OCLStatesPackage.COMPOUND_STATE: return createCompoundState();
			case OCLStatesPackage.TRANSITION: return createTransition();
			default:
				throw new IllegalArgumentException("The class '" + eClass.getName() + "' is not a valid classifier");
		}
	}

	/**
	 * <!-- begin-user-doc -->
	 * <!-- end-user-doc -->
	 * @generated
	 */
	public Module createModule() {
		ModuleImpl module = new ModuleImpl();
		return module;
	}

	/**
	 * <!-- begin-user-doc -->
	 * <!-- end-user-doc -->
	 * @generated
	 */
	public Statemachine createStatemachine() {
		StatemachineImpl statemachine = new StatemachineImpl();
		return statemachine;
	}

	/**
	 * <!-- begin-user-doc -->
	 * <!-- end-user-doc -->
	 * @generated
	 */
	public Event createEvent() {
		EventImpl event = new EventImpl();
		return event;
	}

	/**
	 * <!-- begin-user-doc -->
	 * <!-- end-user-doc -->
	 * @generated
	 */
	public State createState() {
		StateImpl state = new StateImpl();
		return state;
	}

	/**
	 * <!-- begin-user-doc -->
	 * <!-- end-user-doc -->
	 * @generated
	 */
	public SimpleState createSimpleState() {
		SimpleStateImpl simpleState = new SimpleStateImpl();
		return simpleState;
	}

	/**
	 * <!-- begin-user-doc -->
	 * <!-- end-user-doc -->
	 * @generated
	 */
	public CompoundState createCompoundState() {
		CompoundStateImpl compoundState = new CompoundStateImpl();
		return compoundState;
	}

	/**
	 * <!-- begin-user-doc -->
	 * <!-- end-user-doc -->
	 * @generated
	 */
	public Transition createTransition() {
		TransitionImpl transition = new TransitionImpl();
		return transition;
	}

	/**
	 * <!-- begin-user-doc -->
	 * <!-- end-user-doc -->
	 * @generated
	 */
	public OCLStatesPackage getOCLStatesPackage() {
		return (OCLStatesPackage)getEPackage();
	}

	/**
	 * <!-- begin-user-doc -->
	 * <!-- end-user-doc -->
	 * @deprecated
	 * @generated
	 */
	@Deprecated
	public static OCLStatesPackage getPackage() {
		return OCLStatesPackage.eINSTANCE;
	}

} //OCLStatesFactoryImpl

/**
 * <copyright>
 * </copyright>
 *
 * $Id: OCLStatesValidator.java,v 1.1 2011/03/15 07:51:54 ewillink Exp $
 */
package org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.util;

import java.util.Map;

import org.eclipse.emf.common.util.Diagnostic;
import org.eclipse.emf.common.util.DiagnosticChain;
import org.eclipse.emf.common.util.ResourceLocator;
import org.eclipse.emf.ecore.EPackage;
import org.eclipse.ocl.examples.xtext.oclinecore.validation.OCLinEcoreEObjectValidator;
import org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.CompoundState;
import org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.Event;
import org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.Module;
import org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.OCLStatesPackage;
import org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.SimpleState;
import org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.State;
import org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.Statemachine;
import org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.Transition;

/**
 * <!-- begin-user-doc -->
 * The <b>Validator</b> for the model.
 * <!-- end-user-doc -->
 * @see org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.OCLStatesPackage
 * @generated not
 */
public class OCLStatesValidator extends OCLinEcoreEObjectValidator {
	/**
	 * The cached model package
	 * <!-- begin-user-doc -->
	 * <!-- end-user-doc -->
	 * @generated
	 */
	public static final OCLStatesValidator INSTANCE = new OCLStatesValidator();

	/**
	 * A constant for the {@link org.eclipse.emf.common.util.Diagnostic#getSource() source} of diagnostic {@link org.eclipse.emf.common.util.Diagnostic#getCode() codes} from this package.
	 * <!-- begin-user-doc -->
	 * <!-- end-user-doc -->
	 * @see org.eclipse.emf.common.util.Diagnostic#getSource()
	 * @see org.eclipse.emf.common.util.Diagnostic#getCode()
	 * @generated
	 */
	public static final String DIAGNOSTIC_SOURCE = "org.eclipse.ocl.tutorial.eclipsecon2011.oclstates";

	/**
	 * A constant with a fixed name that can be used as the base value for additional hand written constants.
	 * <!-- begin-user-doc -->
	 * <!-- end-user-doc -->
	 * @generated
	 */
	private static final int GENERATED_DIAGNOSTIC_CODE_COUNT = 0;

	/**
	 * A constant with a fixed name that can be used as the base value for additional hand written constants in a derived class.
	 * <!-- begin-user-doc -->
	 * <!-- end-user-doc -->
	 * @generated
	 */
	protected static final int DIAGNOSTIC_CODE_COUNT = GENERATED_DIAGNOSTIC_CODE_COUNT;

	/**
	 * Creates an instance of the switch.
	 * <!-- begin-user-doc -->
	 * <!-- end-user-doc -->
	 * @generated
	 */
	public OCLStatesValidator() {
		super();
	}

	/**
	 * Returns the package of this validator switch.
	 * <!-- begin-user-doc -->
	 * <!-- end-user-doc -->
	 * @generated
	 */
	@Override
	protected EPackage getEPackage() {
	  return OCLStatesPackage.eINSTANCE;
	}

	/**
	 * Calls <code>validateXXX</code> for the corresponding classifier of the model.
	 * <!-- begin-user-doc -->
	 * <!-- end-user-doc -->
	 * @generated
	 */
	@Override
	protected boolean validate(int classifierID, Object value, DiagnosticChain diagnostics, Map<Object, Object> context) {
		switch (classifierID) {
			case OCLStatesPackage.MODULE:
				return validateModule((Module)value, diagnostics, context);
			case OCLStatesPackage.STATEMACHINE:
				return validateStatemachine((Statemachine)value, diagnostics, context);
			case OCLStatesPackage.EVENT:
				return validateEvent((Event)value, diagnostics, context);
			case OCLStatesPackage.STATE:
				return validateState((State)value, diagnostics, context);
			case OCLStatesPackage.SIMPLE_STATE:
				return validateSimpleState((SimpleState)value, diagnostics, context);
			case OCLStatesPackage.COMPOUND_STATE:
				return validateCompoundState((CompoundState)value, diagnostics, context);
			case OCLStatesPackage.TRANSITION:
				return validateTransition((Transition)value, diagnostics, context);
			default:
				return true;
		}
	}

	/**
	 * <!-- begin-user-doc -->
	 * <!-- end-user-doc -->
	 * @generated
	 */
	public boolean validateModule(Module module, DiagnosticChain diagnostics, Map<Object, Object> context) {
		return validate_EveryDefaultConstraint(module, diagnostics, context);
	}

	/**
	 * <!-- begin-user-doc -->
	 * <!-- end-user-doc -->
	 * @generated
	 */
	public boolean validateStatemachine(Statemachine statemachine, DiagnosticChain diagnostics, Map<Object, Object> context) {
		if (!validate_NoCircularContainment(statemachine, diagnostics, context)) return false;
		boolean result = validate_EveryMultiplicityConforms(statemachine, diagnostics, context);
		if (result || diagnostics != null) result &= validate_EveryDataValueConforms(statemachine, diagnostics, context);
		if (result || diagnostics != null) result &= validate_EveryReferenceIsContained(statemachine, diagnostics, context);
		if (result || diagnostics != null) result &= validate_EveryBidirectionalReferenceIsPaired(statemachine, diagnostics, context);
		if (result || diagnostics != null) result &= validate_EveryProxyResolves(statemachine, diagnostics, context);
		if (result || diagnostics != null) result &= validate_UniqueID(statemachine, diagnostics, context);
		if (result || diagnostics != null) result &= validate_EveryKeyUnique(statemachine, diagnostics, context);
		if (result || diagnostics != null) result &= validate_EveryMapEntryUnique(statemachine, diagnostics, context);
		if (result || diagnostics != null) result &= validateStatemachine_HasInitialState(statemachine, diagnostics, context);
		return result;
	}

	/**
	 * The cached validation expression for the HasInitialState constraint of '<em>Statemachine</em>'.
	 * <!-- begin-user-doc -->
	 * <!-- end-user-doc -->
	 * @generated
	 */
	protected static final String STATEMACHINE__HAS_INITIAL_STATE__EEXPRESSION = "(states)->exists(s : State | s.initial)";

	/**
	 * Validates the HasInitialState constraint of '<em>Statemachine</em>'.
	 * <!-- begin-user-doc -->
	 * <!-- end-user-doc -->
	 * @generated
	 */
	public boolean validateStatemachine_HasInitialState(Statemachine statemachine, DiagnosticChain diagnostics, Map<Object, Object> context) {
		return
			validate
				(OCLStatesPackage.Literals.STATEMACHINE,
				 statemachine,
				 diagnostics,
				 context,
				 "http://www.eclipse.org/emf/2002/Ecore/OCL/Pivot",
				 "HasInitialState",
				 STATEMACHINE__HAS_INITIAL_STATE__EEXPRESSION,
				 Diagnostic.ERROR,
				 DIAGNOSTIC_SOURCE,
				 0);
	}

	/**
	 * <!-- begin-user-doc -->
	 * <!-- end-user-doc -->
	 * @generated
	 */
	public boolean validateEvent(Event event, DiagnosticChain diagnostics, Map<Object, Object> context) {
		return validate_EveryDefaultConstraint(event, diagnostics, context);
	}

	/**
	 * <!-- begin-user-doc -->
	 * <!-- end-user-doc -->
	 * @generated
	 */
	public boolean validateState(State state, DiagnosticChain diagnostics, Map<Object, Object> context) {
		if (!validate_NoCircularContainment(state, diagnostics, context)) return false;
		boolean result = validate_EveryMultiplicityConforms(state, diagnostics, context);
		if (result || diagnostics != null) result &= validate_EveryDataValueConforms(state, diagnostics, context);
		if (result || diagnostics != null) result &= validate_EveryReferenceIsContained(state, diagnostics, context);
		if (result || diagnostics != null) result &= validate_EveryBidirectionalReferenceIsPaired(state, diagnostics, context);
		if (result || diagnostics != null) result &= validate_EveryProxyResolves(state, diagnostics, context);
		if (result || diagnostics != null) result &= validate_UniqueID(state, diagnostics, context);
		if (result || diagnostics != null) result &= validate_EveryKeyUnique(state, diagnostics, context);
		if (result || diagnostics != null) result &= validate_EveryMapEntryUnique(state, diagnostics, context);
		if (result || diagnostics != null) result &= validateState_UniqueInitialState(state, diagnostics, context);
		if (result || diagnostics != null) result &= validateState_NameIsLeadingUpperCase(state, diagnostics, context);
		if (result || diagnostics != null) result &= validateState_NameLength(state, diagnostics, context);
		if (result || diagnostics != null) result &= validateState_EveryEventIsHandled(state, diagnostics, context);
		return result;
	}

	/**
	 * The cached validation expression for the NameIsLeadingUpperCase constraint of '<em>State</em>'.
	 * <!-- begin-user-doc -->
	 * <!-- end-user-doc -->
	 * @generated
	 */
	protected static final String STATE__NAME_IS_LEADING_UPPER_CASE__EEXPRESSION = "let firstLetter : String = (name).substring(1, 1) in firstLetter.toUpperCase() = firstLetter";

	/**
	 * Validates the NameIsLeadingUpperCase constraint of '<em>State</em>'.
	 * <!-- begin-user-doc -->
	 * <!-- end-user-doc -->
	 * @generated
	 */
	public boolean validateState_NameIsLeadingUpperCase(State state, DiagnosticChain diagnostics, Map<Object, Object> context) {
		return
			validate
				(OCLStatesPackage.Literals.STATE,
				 state,
				 diagnostics,
				 context,
				 "http://www.eclipse.org/emf/2002/Ecore/OCL/Pivot",
				 "NameIsLeadingUpperCase",
				 STATE__NAME_IS_LEADING_UPPER_CASE__EEXPRESSION,
				 Diagnostic.ERROR,
				 DIAGNOSTIC_SOURCE,
				 0);
	}

	/**
	 * The cached validation expression for the NameLength constraint of '<em>State</em>'.
	 * <!-- begin-user-doc -->
	 * <!-- end-user-doc -->
	 * @generated
	 */
	protected static final String STATE__NAME_LENGTH__EEXPRESSION = "(name).size() >= 4";

	/**
	 * Validates the NameLength constraint of '<em>State</em>'.
	 * <!-- begin-user-doc -->
	 * <!-- end-user-doc -->
	 * @generated
	 */
	public boolean validateState_NameLength(State state, DiagnosticChain diagnostics, Map<Object, Object> context) {
		return
			validate
				(OCLStatesPackage.Literals.STATE,
				 state,
				 diagnostics,
				 context,
				 "http://www.eclipse.org/emf/2002/Ecore/OCL/Pivot",
				 "NameLength",
				 STATE__NAME_LENGTH__EEXPRESSION,
				 Diagnostic.ERROR,
				 DIAGNOSTIC_SOURCE,
				 0);
	}

	/**
	 * The cached validation expression for the UniqueInitialState constraint of '<em>State</em>'.
	 * <!-- begin-user-doc -->
	 * <!-- end-user-doc -->
	 * @generated
	 */
	protected static final String STATE__UNIQUE_INITIAL_STATE__EEXPRESSION = "initial implies (((statemachine).states)->select(initial))->size() = 1";

	/**
	 * Validates the UniqueInitialState constraint of '<em>State</em>'.
	 * <!-- begin-user-doc -->
	 * <!-- end-user-doc -->
	 * @generated
	 */
	public boolean validateState_UniqueInitialState(State state, DiagnosticChain diagnostics, Map<Object, Object> context) {
		return
			validate
				(OCLStatesPackage.Literals.STATE,
				 state,
				 diagnostics,
				 context,
				 "http://www.eclipse.org/emf/2002/Ecore/OCL/Pivot",
				 "UniqueInitialState",
				 STATE__UNIQUE_INITIAL_STATE__EEXPRESSION,
				 Diagnostic.ERROR,
				 DIAGNOSTIC_SOURCE,
				 0);
	}

	/**
	 * The cached validation expression for the EveryEventIsHandled constraint of '<em>State</em>'.
	 * <!-- begin-user-doc -->
	 * <!-- end-user-doc -->
	 * @generated
	 */
	protected static final String STATE__EVERY_EVENT_IS_HANDLED__EEXPRESSION = "let allEvents : Set(Event) = ((statemachine).events)->asSet() in let myEvents : Set(Event) = ((self.transitions)->collect(event))->asSet() in (allEvents - myEvents)->isEmpty()";

	/**
	 * Validates the EveryEventIsHandled constraint of '<em>State</em>'.
	 * <!-- begin-user-doc -->
	 * <!-- end-user-doc -->
	 * @generated
	 */
	public boolean validateState_EveryEventIsHandled(State state, DiagnosticChain diagnostics, Map<Object, Object> context) {
		return
			validate
				(OCLStatesPackage.Literals.STATE,
				 state,
				 diagnostics,
				 context,
				 "http://www.eclipse.org/emf/2002/Ecore/OCL/Pivot",
				 "EveryEventIsHandled",
				 STATE__EVERY_EVENT_IS_HANDLED__EEXPRESSION,
				 Diagnostic.ERROR,
				 DIAGNOSTIC_SOURCE,
				 0);
	}

	/**
	 * <!-- begin-user-doc -->
	 * <!-- end-user-doc -->
	 * @generated
	 */
	public boolean validateSimpleState(SimpleState simpleState, DiagnosticChain diagnostics, Map<Object, Object> context) {
		if (!validate_NoCircularContainment(simpleState, diagnostics, context)) return false;
		boolean result = validate_EveryMultiplicityConforms(simpleState, diagnostics, context);
		if (result || diagnostics != null) result &= validate_EveryDataValueConforms(simpleState, diagnostics, context);
		if (result || diagnostics != null) result &= validate_EveryReferenceIsContained(simpleState, diagnostics, context);
		if (result || diagnostics != null) result &= validate_EveryBidirectionalReferenceIsPaired(simpleState, diagnostics, context);
		if (result || diagnostics != null) result &= validate_EveryProxyResolves(simpleState, diagnostics, context);
		if (result || diagnostics != null) result &= validate_UniqueID(simpleState, diagnostics, context);
		if (result || diagnostics != null) result &= validate_EveryKeyUnique(simpleState, diagnostics, context);
		if (result || diagnostics != null) result &= validate_EveryMapEntryUnique(simpleState, diagnostics, context);
		if (result || diagnostics != null) result &= validateState_UniqueInitialState(simpleState, diagnostics, context);
		if (result || diagnostics != null) result &= validateState_NameIsLeadingUpperCase(simpleState, diagnostics, context);
		if (result || diagnostics != null) result &= validateState_NameLength(simpleState, diagnostics, context);
		if (result || diagnostics != null) result &= validateState_EveryEventIsHandled(simpleState, diagnostics, context);
		return result;
	}

	/**
	 * <!-- begin-user-doc -->
	 * <!-- end-user-doc -->
	 * @generated
	 */
	public boolean validateCompoundState(CompoundState compoundState, DiagnosticChain diagnostics, Map<Object, Object> context) {
		if (!validate_NoCircularContainment(compoundState, diagnostics, context)) return false;
		boolean result = validate_EveryMultiplicityConforms(compoundState, diagnostics, context);
		if (result || diagnostics != null) result &= validate_EveryDataValueConforms(compoundState, diagnostics, context);
		if (result || diagnostics != null) result &= validate_EveryReferenceIsContained(compoundState, diagnostics, context);
		if (result || diagnostics != null) result &= validate_EveryBidirectionalReferenceIsPaired(compoundState, diagnostics, context);
		if (result || diagnostics != null) result &= validate_EveryProxyResolves(compoundState, diagnostics, context);
		if (result || diagnostics != null) result &= validate_UniqueID(compoundState, diagnostics, context);
		if (result || diagnostics != null) result &= validate_EveryKeyUnique(compoundState, diagnostics, context);
		if (result || diagnostics != null) result &= validate_EveryMapEntryUnique(compoundState, diagnostics, context);
		if (result || diagnostics != null) result &= validateState_UniqueInitialState(compoundState, diagnostics, context);
		if (result || diagnostics != null) result &= validateState_NameIsLeadingUpperCase(compoundState, diagnostics, context);
		if (result || diagnostics != null) result &= validateState_NameLength(compoundState, diagnostics, context);
		if (result || diagnostics != null) result &= validateState_EveryEventIsHandled(compoundState, diagnostics, context);
		return result;
	}

	/**
	 * <!-- begin-user-doc -->
	 * <!-- end-user-doc -->
	 * @generated
	 */
	public boolean validateTransition(Transition transition, DiagnosticChain diagnostics, Map<Object, Object> context) {
		return validate_EveryDefaultConstraint(transition, diagnostics, context);
	}

	/**
	 * Returns the resource locator that will be used to fetch messages for this validator's diagnostics.
	 * <!-- begin-user-doc -->
	 * <!-- end-user-doc -->
	 * @generated
	 */
	@Override
	public ResourceLocator getResourceLocator() {
		// TODO
		// Specialize this to return a resource locator for messages specific to this validator.
		// Ensure that you remove @generated or mark it @generated NOT
		return super.getResourceLocator();
	}

} //OCLStatesValidator

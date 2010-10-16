package people.diagram.part;

import org.eclipse.core.runtime.Platform;
import org.eclipse.emf.ecore.EAnnotation;
import org.eclipse.emf.ecore.EObject;
import org.eclipse.gmf.runtime.notation.Diagram;
import org.eclipse.gmf.runtime.notation.View;

import people.PeoplePackage;
import people.Universe;
import people.diagram.edit.parts.PersonEditPart;
import people.diagram.edit.parts.PersonNameEditPart;
import people.diagram.edit.parts.UniverseEditPart;

/**
 * This registry is used to determine which type of visual object should be
 * created for the corresponding Diagram, Node, ChildNode or Link represented
 * by a domain model object.
 * 
 * @generated
 */
public class PeopleVisualIDRegistry {

	/**
	 * @generated
	 */
	private static final String DEBUG_KEY = "ESEExampleTree.diagram/debug/visualID"; //$NON-NLS-1$

	/**
	 * @generated
	 */
	public static int getVisualID(View view) {
		if (view instanceof Diagram) {
			if (UniverseEditPart.MODEL_ID.equals(view.getType())) {
				return UniverseEditPart.VISUAL_ID;
			} else {
				return -1;
			}
		}
		return people.diagram.part.PeopleVisualIDRegistry.getVisualID(view
				.getType());
	}

	/**
	 * @generated
	 */
	public static String getModelID(View view) {
		View diagram = view.getDiagram();
		while (view != diagram) {
			EAnnotation annotation = view.getEAnnotation("Shortcut"); //$NON-NLS-1$
			if (annotation != null) {
				return (String) annotation.getDetails().get("modelID"); //$NON-NLS-1$
			}
			view = (View) view.eContainer();
		}
		return diagram != null ? diagram.getType() : null;
	}

	/**
	 * @generated
	 */
	public static int getVisualID(String type) {
		try {
			return Integer.parseInt(type);
		} catch (NumberFormatException e) {
			if (Boolean.TRUE.toString().equalsIgnoreCase(
					Platform.getDebugOption(DEBUG_KEY))) {
				PeopleDiagramEditorPlugin.getInstance().logError(
						"Unable to parse view type as a visualID number: "
								+ type);
			}
		}
		return -1;
	}

	/**
	 * @generated
	 */
	public static String getType(int visualID) {
		return Integer.toString(visualID);
	}

	/**
	 * @generated
	 */
	public static int getDiagramVisualID(EObject domainElement) {
		if (domainElement == null) {
			return -1;
		}
		if (PeoplePackage.eINSTANCE.getUniverse().isSuperTypeOf(
				domainElement.eClass())
				&& isDiagram((Universe) domainElement)) {
			return UniverseEditPart.VISUAL_ID;
		}
		return -1;
	}

	/**
	 * @generated
	 */
	public static int getNodeVisualID(View containerView, EObject domainElement) {
		if (domainElement == null) {
			return -1;
		}
		String containerModelID = people.diagram.part.PeopleVisualIDRegistry
				.getModelID(containerView);
		if (!UniverseEditPart.MODEL_ID.equals(containerModelID)) {
			return -1;
		}
		int containerVisualID;
		if (UniverseEditPart.MODEL_ID.equals(containerModelID)) {
			containerVisualID = people.diagram.part.PeopleVisualIDRegistry
					.getVisualID(containerView);
		} else {
			if (containerView instanceof Diagram) {
				containerVisualID = UniverseEditPart.VISUAL_ID;
			} else {
				return -1;
			}
		}
		switch (containerVisualID) {
		case UniverseEditPart.VISUAL_ID:
			if (PeoplePackage.eINSTANCE.getPerson().isSuperTypeOf(
					domainElement.eClass())) {
				return PersonEditPart.VISUAL_ID;
			}
			break;
		}
		return -1;
	}

	/**
	 * @generated
	 */
	public static boolean canCreateNode(View containerView, int nodeVisualID) {
		String containerModelID = people.diagram.part.PeopleVisualIDRegistry
				.getModelID(containerView);
		if (!UniverseEditPart.MODEL_ID.equals(containerModelID)) {
			return false;
		}
		int containerVisualID;
		if (UniverseEditPart.MODEL_ID.equals(containerModelID)) {
			containerVisualID = people.diagram.part.PeopleVisualIDRegistry
					.getVisualID(containerView);
		} else {
			if (containerView instanceof Diagram) {
				containerVisualID = UniverseEditPart.VISUAL_ID;
			} else {
				return false;
			}
		}
		switch (containerVisualID) {
		case UniverseEditPart.VISUAL_ID:
			if (PersonEditPart.VISUAL_ID == nodeVisualID) {
				return true;
			}
			break;
		case PersonEditPart.VISUAL_ID:
			if (PersonNameEditPart.VISUAL_ID == nodeVisualID) {
				return true;
			}
			break;
		}
		return false;
	}

	/**
	 * @generated
	 */
	public static int getLinkWithClassVisualID(EObject domainElement) {
		if (domainElement == null) {
			return -1;
		}
		return -1;
	}

	/**
	 * User can change implementation of this method to handle some specific
	 * situations not covered by default logic.
	 * 
	 * @generated
	 */
	private static boolean isDiagram(Universe element) {
		return true;
	}

}

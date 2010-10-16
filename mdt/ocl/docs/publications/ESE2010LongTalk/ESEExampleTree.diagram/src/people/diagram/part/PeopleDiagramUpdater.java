package people.diagram.part;

import java.util.Collection;
import java.util.Collections;
import java.util.Iterator;
import java.util.LinkedList;
import java.util.List;
import java.util.Map;

import org.eclipse.emf.ecore.EObject;
import org.eclipse.emf.ecore.EStructuralFeature;
import org.eclipse.emf.ecore.util.EcoreUtil;
import org.eclipse.gmf.runtime.notation.View;

import people.PeoplePackage;
import people.Person;
import people.Universe;
import people.diagram.edit.parts.PersonChildrenEditPart;
import people.diagram.edit.parts.PersonEditPart;
import people.diagram.edit.parts.UniverseEditPart;
import people.diagram.providers.PeopleElementTypes;

/**
 * @generated
 */
public class PeopleDiagramUpdater {

	/**
	 * @generated
	 */
	public static List<PeopleNodeDescriptor> getSemanticChildren(View view) {
		switch (PeopleVisualIDRegistry.getVisualID(view)) {
		case UniverseEditPart.VISUAL_ID:
			return getUniverse_1000SemanticChildren(view);
		}
		return Collections.emptyList();
	}

	/**
	 * @generated
	 */
	public static List<PeopleNodeDescriptor> getUniverse_1000SemanticChildren(
			View view) {
		if (!view.isSetElement()) {
			return Collections.emptyList();
		}
		Universe modelElement = (Universe) view.getElement();
		LinkedList<PeopleNodeDescriptor> result = new LinkedList<PeopleNodeDescriptor>();
		for (Iterator<?> it = modelElement.getPeople().iterator(); it.hasNext();) {
			Person childElement = (Person) it.next();
			int visualID = PeopleVisualIDRegistry.getNodeVisualID(view,
					childElement);
			if (visualID == PersonEditPart.VISUAL_ID) {
				result.add(new PeopleNodeDescriptor(childElement, visualID));
				continue;
			}
		}
		return result;
	}

	/**
	 * @generated
	 */
	public static List<PeopleLinkDescriptor> getContainedLinks(View view) {
		switch (PeopleVisualIDRegistry.getVisualID(view)) {
		case UniverseEditPart.VISUAL_ID:
			return getUniverse_1000ContainedLinks(view);
		case PersonEditPart.VISUAL_ID:
			return getPerson_2001ContainedLinks(view);
		}
		return Collections.emptyList();
	}

	/**
	 * @generated
	 */
	public static List<PeopleLinkDescriptor> getIncomingLinks(View view) {
		switch (PeopleVisualIDRegistry.getVisualID(view)) {
		case PersonEditPart.VISUAL_ID:
			return getPerson_2001IncomingLinks(view);
		}
		return Collections.emptyList();
	}

	/**
	 * @generated
	 */
	public static List<PeopleLinkDescriptor> getOutgoingLinks(View view) {
		switch (PeopleVisualIDRegistry.getVisualID(view)) {
		case PersonEditPart.VISUAL_ID:
			return getPerson_2001OutgoingLinks(view);
		}
		return Collections.emptyList();
	}

	/**
	 * @generated
	 */
	public static List<PeopleLinkDescriptor> getUniverse_1000ContainedLinks(
			View view) {
		return Collections.emptyList();
	}

	/**
	 * @generated
	 */
	public static List<PeopleLinkDescriptor> getPerson_2001ContainedLinks(
			View view) {
		Person modelElement = (Person) view.getElement();
		LinkedList<PeopleLinkDescriptor> result = new LinkedList<PeopleLinkDescriptor>();
		result.addAll(getOutgoingFeatureModelFacetLinks_Person_Children_4002(modelElement));
		return result;
	}

	/**
	 * @generated
	 */
	public static List<PeopleLinkDescriptor> getPerson_2001IncomingLinks(
			View view) {
		Person modelElement = (Person) view.getElement();
		Map<EObject, Collection<EStructuralFeature.Setting>> crossReferences = EcoreUtil.CrossReferencer
				.find(view.eResource().getResourceSet().getResources());
		LinkedList<PeopleLinkDescriptor> result = new LinkedList<PeopleLinkDescriptor>();
		result.addAll(getIncomingFeatureModelFacetLinks_Person_Children_4002(
				modelElement, crossReferences));
		return result;
	}

	/**
	 * @generated
	 */
	public static List<PeopleLinkDescriptor> getPerson_2001OutgoingLinks(
			View view) {
		Person modelElement = (Person) view.getElement();
		LinkedList<PeopleLinkDescriptor> result = new LinkedList<PeopleLinkDescriptor>();
		result.addAll(getOutgoingFeatureModelFacetLinks_Person_Children_4002(modelElement));
		return result;
	}

	/**
	 * @generated
	 */
	private static Collection<PeopleLinkDescriptor> getIncomingFeatureModelFacetLinks_Person_Children_4002(
			Person target,
			Map<EObject, Collection<EStructuralFeature.Setting>> crossReferences) {
		LinkedList<PeopleLinkDescriptor> result = new LinkedList<PeopleLinkDescriptor>();
		Collection<EStructuralFeature.Setting> settings = crossReferences
				.get(target);
		for (EStructuralFeature.Setting setting : settings) {
			if (setting.getEStructuralFeature() == PeoplePackage.eINSTANCE
					.getPerson_Children()) {
				result.add(new PeopleLinkDescriptor(setting.getEObject(),
						target, PeopleElementTypes.PersonChildren_4002,
						PersonChildrenEditPart.VISUAL_ID));
			}
		}
		return result;
	}

	/**
	 * @generated
	 */
	private static Collection<PeopleLinkDescriptor> getOutgoingFeatureModelFacetLinks_Person_Children_4002(
			Person source) {
		LinkedList<PeopleLinkDescriptor> result = new LinkedList<PeopleLinkDescriptor>();
		for (Iterator<?> destinations = source.getChildren().iterator(); destinations
				.hasNext();) {
			Person destination = (Person) destinations.next();
			result.add(new PeopleLinkDescriptor(source, destination,
					PeopleElementTypes.PersonChildren_4002,
					PersonChildrenEditPart.VISUAL_ID));
		}
		return result;
	}

}

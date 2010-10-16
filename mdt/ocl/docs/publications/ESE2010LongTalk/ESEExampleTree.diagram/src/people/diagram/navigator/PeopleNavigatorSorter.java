package people.diagram.navigator;

import org.eclipse.jface.viewers.ViewerSorter;

import people.diagram.part.PeopleVisualIDRegistry;

/**
 * @generated
 */
public class PeopleNavigatorSorter extends ViewerSorter {

	/**
	 * @generated
	 */
	private static final int GROUP_CATEGORY = 4004;

	/**
	 * @generated
	 */
	public int category(Object element) {
		if (element instanceof PeopleNavigatorItem) {
			PeopleNavigatorItem item = (PeopleNavigatorItem) element;
			return PeopleVisualIDRegistry.getVisualID(item.getView());
		}
		return GROUP_CATEGORY;
	}

}

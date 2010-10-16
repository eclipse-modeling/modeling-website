package people.diagram.part;

import java.util.Collections;
import java.util.List;

import org.eclipse.gef.Tool;
import org.eclipse.gef.palette.PaletteContainer;
import org.eclipse.gef.palette.PaletteGroup;
import org.eclipse.gef.palette.PaletteRoot;
import org.eclipse.gef.palette.ToolEntry;
import org.eclipse.gmf.runtime.diagram.ui.tools.UnspecifiedTypeConnectionTool;
import org.eclipse.gmf.runtime.diagram.ui.tools.UnspecifiedTypeCreationTool;
import org.eclipse.gmf.runtime.emf.type.core.IElementType;

import people.diagram.providers.PeopleElementTypes;

/**
 * @generated
 */
public class PeoplePaletteFactory {

	/**
	 * @generated
	 */
	public void fillPalette(PaletteRoot paletteRoot) {
		paletteRoot.add(createPeople1Group());
	}

	/**
	 * Creates "people" palette tool group
	 * @generated
	 */
	private PaletteContainer createPeople1Group() {
		PaletteGroup paletteContainer = new PaletteGroup(
				Messages.People1Group_title);
		paletteContainer.setId("createPeople1Group"); //$NON-NLS-1$
		paletteContainer.add(createPerson1CreationTool());
		paletteContainer.add(createPersonChildren2CreationTool());
		paletteContainer.add(createPersonParents3CreationTool());
		return paletteContainer;
	}

	/**
	 * @generated
	 */
	private ToolEntry createPerson1CreationTool() {
		NodeToolEntry entry = new NodeToolEntry(
				Messages.Person1CreationTool_title,
				Messages.Person1CreationTool_desc,
				Collections.singletonList(PeopleElementTypes.Person_2001));
		entry.setId("createPerson1CreationTool"); //$NON-NLS-1$
		entry.setSmallIcon(PeopleElementTypes
				.getImageDescriptor(PeopleElementTypes.Person_2001));
		entry.setLargeIcon(entry.getSmallIcon());
		return entry;
	}

	/**
	 * @generated
	 */
	private ToolEntry createPersonChildren2CreationTool() {
		ToolEntry entry = new ToolEntry(
				Messages.PersonChildren2CreationTool_title,
				Messages.PersonChildren2CreationTool_desc, null, null) {
		};
		entry.setId("createPersonChildren2CreationTool"); //$NON-NLS-1$
		return entry;
	}

	/**
	 * @generated
	 */
	private ToolEntry createPersonParents3CreationTool() {
		LinkToolEntry entry = new LinkToolEntry(
				Messages.PersonParents3CreationTool_title,
				Messages.PersonParents3CreationTool_desc,
				Collections
						.singletonList(PeopleElementTypes.PersonChildren_4002));
		entry.setId("createPersonParents3CreationTool"); //$NON-NLS-1$
		entry.setSmallIcon(PeopleElementTypes
				.getImageDescriptor(PeopleElementTypes.PersonChildren_4002));
		entry.setLargeIcon(entry.getSmallIcon());
		return entry;
	}

	/**
	 * @generated
	 */
	private static class NodeToolEntry extends ToolEntry {

		/**
		 * @generated
		 */
		private final List<IElementType> elementTypes;

		/**
		 * @generated
		 */
		private NodeToolEntry(String title, String description,
				List<IElementType> elementTypes) {
			super(title, description, null, null);
			this.elementTypes = elementTypes;
		}

		/**
		 * @generated
		 */
		public Tool createTool() {
			Tool tool = new UnspecifiedTypeCreationTool(elementTypes);
			tool.setProperties(getToolProperties());
			return tool;
		}
	}

	/**
	 * @generated
	 */
	private static class LinkToolEntry extends ToolEntry {

		/**
		 * @generated
		 */
		private final List<IElementType> relationshipTypes;

		/**
		 * @generated
		 */
		private LinkToolEntry(String title, String description,
				List<IElementType> relationshipTypes) {
			super(title, description, null, null);
			this.relationshipTypes = relationshipTypes;
		}

		/**
		 * @generated
		 */
		public Tool createTool() {
			Tool tool = new UnspecifiedTypeConnectionTool(relationshipTypes);
			tool.setProperties(getToolProperties());
			return tool;
		}
	}
}

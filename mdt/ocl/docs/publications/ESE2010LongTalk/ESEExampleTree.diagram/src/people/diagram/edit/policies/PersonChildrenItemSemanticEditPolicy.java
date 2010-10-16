package people.diagram.edit.policies;

import org.eclipse.gef.commands.Command;
import org.eclipse.gmf.runtime.emf.type.core.commands.DestroyReferenceCommand;
import org.eclipse.gmf.runtime.emf.type.core.requests.DestroyReferenceRequest;

import people.diagram.providers.PeopleElementTypes;

/**
 * @generated
 */
public class PersonChildrenItemSemanticEditPolicy extends
		PeopleBaseItemSemanticEditPolicy {

	/**
	 * @generated
	 */
	public PersonChildrenItemSemanticEditPolicy() {
		super(PeopleElementTypes.PersonChildren_4002);
	}

	/**
	 * @generated
	 */
	protected Command getDestroyReferenceCommand(DestroyReferenceRequest req) {
		return getGEFWrapper(new DestroyReferenceCommand(req));
	}

}

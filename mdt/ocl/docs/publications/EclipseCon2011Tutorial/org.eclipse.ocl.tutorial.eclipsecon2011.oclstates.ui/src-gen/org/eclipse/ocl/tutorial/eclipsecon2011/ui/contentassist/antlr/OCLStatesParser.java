/*
* generated by Xtext
*/
package org.eclipse.ocl.tutorial.eclipsecon2011.ui.contentassist.antlr;

import java.util.Collection;
import java.util.Map;
import java.util.HashMap;

import org.antlr.runtime.RecognitionException;
import org.eclipse.xtext.AbstractElement;
import org.eclipse.xtext.ui.editor.contentassist.antlr.AbstractContentAssistParser;
import org.eclipse.xtext.ui.editor.contentassist.antlr.FollowElement;
import org.eclipse.xtext.ui.editor.contentassist.antlr.internal.AbstractInternalContentAssistParser;

import com.google.inject.Inject;

import org.eclipse.ocl.tutorial.eclipsecon2011.services.OCLStatesGrammarAccess;

public class OCLStatesParser extends AbstractContentAssistParser {
	
	@Inject
	private OCLStatesGrammarAccess grammarAccess;
	
	private Map<AbstractElement, String> nameMappings;
	
	@Override
	protected org.eclipse.ocl.tutorial.eclipsecon2011.ui.contentassist.antlr.internal.InternalOCLStatesParser createParser() {
		org.eclipse.ocl.tutorial.eclipsecon2011.ui.contentassist.antlr.internal.InternalOCLStatesParser result = new org.eclipse.ocl.tutorial.eclipsecon2011.ui.contentassist.antlr.internal.InternalOCLStatesParser(null);
		result.setGrammarAccess(grammarAccess);
		return result;
	}
	
	@Override
	protected String getRuleName(AbstractElement element) {
		if (nameMappings == null) {
			nameMappings = new HashMap<AbstractElement, String>() {
				private static final long serialVersionUID = 1L;
				{
					put(grammarAccess.getStateAccess().getAlternatives(), "rule__State__Alternatives");
					put(grammarAccess.getModuleAccess().getGroup(), "rule__Module__Group__0");
					put(grammarAccess.getStatemachineAccess().getGroup(), "rule__Statemachine__Group__0");
					put(grammarAccess.getStatemachineAccess().getGroup_3(), "rule__Statemachine__Group_3__0");
					put(grammarAccess.getSimpleStateAccess().getGroup(), "rule__SimpleState__Group__0");
					put(grammarAccess.getSimpleStateAccess().getGroup_3(), "rule__SimpleState__Group_3__0");
					put(grammarAccess.getCompoundStateAccess().getGroup(), "rule__CompoundState__Group__0");
					put(grammarAccess.getTransitionAccess().getGroup(), "rule__Transition__Group__0");
					put(grammarAccess.getModuleAccess().getNameAssignment_1(), "rule__Module__NameAssignment_1");
					put(grammarAccess.getModuleAccess().getMachinesAssignment_2(), "rule__Module__MachinesAssignment_2");
					put(grammarAccess.getStatemachineAccess().getInitialAssignment_0(), "rule__Statemachine__InitialAssignment_0");
					put(grammarAccess.getStatemachineAccess().getNameAssignment_2(), "rule__Statemachine__NameAssignment_2");
					put(grammarAccess.getStatemachineAccess().getValueAssignment_3_1(), "rule__Statemachine__ValueAssignment_3_1");
					put(grammarAccess.getStatemachineAccess().getEventsAssignment_6(), "rule__Statemachine__EventsAssignment_6");
					put(grammarAccess.getStatemachineAccess().getStatesAssignment_8(), "rule__Statemachine__StatesAssignment_8");
					put(grammarAccess.getEventAccess().getNameAssignment(), "rule__Event__NameAssignment");
					put(grammarAccess.getSimpleStateAccess().getInitialAssignment_0(), "rule__SimpleState__InitialAssignment_0");
					put(grammarAccess.getSimpleStateAccess().getNameAssignment_2(), "rule__SimpleState__NameAssignment_2");
					put(grammarAccess.getSimpleStateAccess().getValueAssignment_3_1(), "rule__SimpleState__ValueAssignment_3_1");
					put(grammarAccess.getSimpleStateAccess().getTransitionsAssignment_5(), "rule__SimpleState__TransitionsAssignment_5");
					put(grammarAccess.getCompoundStateAccess().getInitialAssignment_1(), "rule__CompoundState__InitialAssignment_1");
					put(grammarAccess.getCompoundStateAccess().getNameAssignment_3(), "rule__CompoundState__NameAssignment_3");
					put(grammarAccess.getCompoundStateAccess().getMachineAssignment_5(), "rule__CompoundState__MachineAssignment_5");
					put(grammarAccess.getCompoundStateAccess().getTransitionsAssignment_7(), "rule__CompoundState__TransitionsAssignment_7");
					put(grammarAccess.getTransitionAccess().getEventAssignment_0(), "rule__Transition__EventAssignment_0");
					put(grammarAccess.getTransitionAccess().getStateAssignment_2(), "rule__Transition__StateAssignment_2");
				}
			};
		}
		return nameMappings.get(element);
	}
	
	@Override
	protected Collection<FollowElement> getFollowElements(AbstractInternalContentAssistParser parser) {
		try {
			org.eclipse.ocl.tutorial.eclipsecon2011.ui.contentassist.antlr.internal.InternalOCLStatesParser typedParser = (org.eclipse.ocl.tutorial.eclipsecon2011.ui.contentassist.antlr.internal.InternalOCLStatesParser) parser;
			typedParser.entryRuleModule();
			return typedParser.getFollowElements();
		} catch(RecognitionException ex) {
			throw new RuntimeException(ex);
		}		
	}
	
	@Override
	protected String[] getInitialHiddenTokens() {
		return new String[] { "RULE_WS", "RULE_ML_COMMENT", "RULE_SL_COMMENT" };
	}
	
	public OCLStatesGrammarAccess getGrammarAccess() {
		return this.grammarAccess;
	}
	
	public void setGrammarAccess(OCLStatesGrammarAccess grammarAccess) {
		this.grammarAccess = grammarAccess;
	}
}

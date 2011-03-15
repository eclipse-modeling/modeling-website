package org.eclipse.ocl.tutorial.eclipsecon2011.ui.contentassist.antlr.internal; 

import java.io.InputStream;
import org.eclipse.xtext.*;
import org.eclipse.xtext.parser.*;
import org.eclipse.xtext.parser.impl.*;
import org.eclipse.xtext.parsetree.*;
import org.eclipse.emf.ecore.util.EcoreUtil;
import org.eclipse.emf.ecore.EObject;
import org.eclipse.xtext.parser.antlr.XtextTokenStream;
import org.eclipse.xtext.parser.antlr.XtextTokenStream.HiddenTokens;
import org.eclipse.xtext.ui.editor.contentassist.antlr.internal.AbstractInternalContentAssistParser;
import org.eclipse.xtext.ui.editor.contentassist.antlr.internal.DFA;
import org.eclipse.ocl.tutorial.eclipsecon2011.services.OCLStatesGrammarAccess;



import org.antlr.runtime.*;
import java.util.Stack;
import java.util.List;
import java.util.ArrayList;

@SuppressWarnings("all")
public class InternalOCLStatesParser extends AbstractInternalContentAssistParser {
    public static final String[] tokenNames = new String[] {
        "<invalid>", "<EOR>", "<DOWN>", "<UP>", "RULE_STRING", "RULE_ID", "RULE_INT", "RULE_ML_COMMENT", "RULE_SL_COMMENT", "RULE_WS", "RULE_ANY_OTHER", "'module'", "'statemachine'", "'{'", "'events'", "';'", "'}'", "'value'", "'state'", "'compound'", "'machine'", "'=>'", "'initial'"
    };
    public static final int RULE_ML_COMMENT=7;
    public static final int T__12=12;
    public static final int RULE_ID=5;
    public static final int T__20=20;
    public static final int T__13=13;
    public static final int RULE_STRING=4;
    public static final int T__21=21;
    public static final int T__19=19;
    public static final int T__14=14;
    public static final int T__11=11;
    public static final int T__22=22;
    public static final int RULE_WS=9;
    public static final int T__17=17;
    public static final int EOF=-1;
    public static final int RULE_INT=6;
    public static final int T__16=16;
    public static final int RULE_ANY_OTHER=10;
    public static final int RULE_SL_COMMENT=8;
    public static final int T__18=18;
    public static final int T__15=15;

    // delegates
    // delegators


        public InternalOCLStatesParser(TokenStream input) {
            this(input, new RecognizerSharedState());
        }
        public InternalOCLStatesParser(TokenStream input, RecognizerSharedState state) {
            super(input, state);
             
        }
        

    public String[] getTokenNames() { return InternalOCLStatesParser.tokenNames; }
    public String getGrammarFileName() { return "../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g"; }


     
     	private OCLStatesGrammarAccess grammarAccess;
     	
        public void setGrammarAccess(OCLStatesGrammarAccess grammarAccess) {
        	this.grammarAccess = grammarAccess;
        }
        
        @Override
        protected Grammar getGrammar() {
        	return grammarAccess.getGrammar();
        }
        
        @Override
        protected String getValueForTokenName(String tokenName) {
        	return tokenName;
        }




    // $ANTLR start "entryRuleModule"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:61:1: entryRuleModule : ruleModule EOF ;
    public final void entryRuleModule() throws RecognitionException {
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:62:1: ( ruleModule EOF )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:63:1: ruleModule EOF
            {
             before(grammarAccess.getModuleRule()); 
            pushFollow(FOLLOW_ruleModule_in_entryRuleModule61);
            ruleModule();

            state._fsp--;

             after(grammarAccess.getModuleRule()); 
            match(input,EOF,FOLLOW_EOF_in_entryRuleModule68); 

            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {
        }
        return ;
    }
    // $ANTLR end "entryRuleModule"


    // $ANTLR start "ruleModule"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:70:1: ruleModule : ( ( rule__Module__Group__0 ) ) ;
    public final void ruleModule() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:74:2: ( ( ( rule__Module__Group__0 ) ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:75:1: ( ( rule__Module__Group__0 ) )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:75:1: ( ( rule__Module__Group__0 ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:76:1: ( rule__Module__Group__0 )
            {
             before(grammarAccess.getModuleAccess().getGroup()); 
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:77:1: ( rule__Module__Group__0 )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:77:2: rule__Module__Group__0
            {
            pushFollow(FOLLOW_rule__Module__Group__0_in_ruleModule94);
            rule__Module__Group__0();

            state._fsp--;


            }

             after(grammarAccess.getModuleAccess().getGroup()); 

            }


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "ruleModule"


    // $ANTLR start "entryRuleStatemachine"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:89:1: entryRuleStatemachine : ruleStatemachine EOF ;
    public final void entryRuleStatemachine() throws RecognitionException {
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:90:1: ( ruleStatemachine EOF )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:91:1: ruleStatemachine EOF
            {
             before(grammarAccess.getStatemachineRule()); 
            pushFollow(FOLLOW_ruleStatemachine_in_entryRuleStatemachine121);
            ruleStatemachine();

            state._fsp--;

             after(grammarAccess.getStatemachineRule()); 
            match(input,EOF,FOLLOW_EOF_in_entryRuleStatemachine128); 

            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {
        }
        return ;
    }
    // $ANTLR end "entryRuleStatemachine"


    // $ANTLR start "ruleStatemachine"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:98:1: ruleStatemachine : ( ( rule__Statemachine__Group__0 ) ) ;
    public final void ruleStatemachine() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:102:2: ( ( ( rule__Statemachine__Group__0 ) ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:103:1: ( ( rule__Statemachine__Group__0 ) )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:103:1: ( ( rule__Statemachine__Group__0 ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:104:1: ( rule__Statemachine__Group__0 )
            {
             before(grammarAccess.getStatemachineAccess().getGroup()); 
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:105:1: ( rule__Statemachine__Group__0 )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:105:2: rule__Statemachine__Group__0
            {
            pushFollow(FOLLOW_rule__Statemachine__Group__0_in_ruleStatemachine154);
            rule__Statemachine__Group__0();

            state._fsp--;


            }

             after(grammarAccess.getStatemachineAccess().getGroup()); 

            }


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "ruleStatemachine"


    // $ANTLR start "entryRuleEvent"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:117:1: entryRuleEvent : ruleEvent EOF ;
    public final void entryRuleEvent() throws RecognitionException {
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:118:1: ( ruleEvent EOF )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:119:1: ruleEvent EOF
            {
             before(grammarAccess.getEventRule()); 
            pushFollow(FOLLOW_ruleEvent_in_entryRuleEvent181);
            ruleEvent();

            state._fsp--;

             after(grammarAccess.getEventRule()); 
            match(input,EOF,FOLLOW_EOF_in_entryRuleEvent188); 

            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {
        }
        return ;
    }
    // $ANTLR end "entryRuleEvent"


    // $ANTLR start "ruleEvent"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:126:1: ruleEvent : ( ( rule__Event__NameAssignment ) ) ;
    public final void ruleEvent() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:130:2: ( ( ( rule__Event__NameAssignment ) ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:131:1: ( ( rule__Event__NameAssignment ) )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:131:1: ( ( rule__Event__NameAssignment ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:132:1: ( rule__Event__NameAssignment )
            {
             before(grammarAccess.getEventAccess().getNameAssignment()); 
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:133:1: ( rule__Event__NameAssignment )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:133:2: rule__Event__NameAssignment
            {
            pushFollow(FOLLOW_rule__Event__NameAssignment_in_ruleEvent214);
            rule__Event__NameAssignment();

            state._fsp--;


            }

             after(grammarAccess.getEventAccess().getNameAssignment()); 

            }


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "ruleEvent"


    // $ANTLR start "entryRuleState"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:145:1: entryRuleState : ruleState EOF ;
    public final void entryRuleState() throws RecognitionException {
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:146:1: ( ruleState EOF )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:147:1: ruleState EOF
            {
             before(grammarAccess.getStateRule()); 
            pushFollow(FOLLOW_ruleState_in_entryRuleState241);
            ruleState();

            state._fsp--;

             after(grammarAccess.getStateRule()); 
            match(input,EOF,FOLLOW_EOF_in_entryRuleState248); 

            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {
        }
        return ;
    }
    // $ANTLR end "entryRuleState"


    // $ANTLR start "ruleState"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:154:1: ruleState : ( ( rule__State__Alternatives ) ) ;
    public final void ruleState() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:158:2: ( ( ( rule__State__Alternatives ) ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:159:1: ( ( rule__State__Alternatives ) )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:159:1: ( ( rule__State__Alternatives ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:160:1: ( rule__State__Alternatives )
            {
             before(grammarAccess.getStateAccess().getAlternatives()); 
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:161:1: ( rule__State__Alternatives )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:161:2: rule__State__Alternatives
            {
            pushFollow(FOLLOW_rule__State__Alternatives_in_ruleState274);
            rule__State__Alternatives();

            state._fsp--;


            }

             after(grammarAccess.getStateAccess().getAlternatives()); 

            }


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "ruleState"


    // $ANTLR start "entryRuleSimpleState"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:173:1: entryRuleSimpleState : ruleSimpleState EOF ;
    public final void entryRuleSimpleState() throws RecognitionException {
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:174:1: ( ruleSimpleState EOF )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:175:1: ruleSimpleState EOF
            {
             before(grammarAccess.getSimpleStateRule()); 
            pushFollow(FOLLOW_ruleSimpleState_in_entryRuleSimpleState301);
            ruleSimpleState();

            state._fsp--;

             after(grammarAccess.getSimpleStateRule()); 
            match(input,EOF,FOLLOW_EOF_in_entryRuleSimpleState308); 

            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {
        }
        return ;
    }
    // $ANTLR end "entryRuleSimpleState"


    // $ANTLR start "ruleSimpleState"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:182:1: ruleSimpleState : ( ( rule__SimpleState__Group__0 ) ) ;
    public final void ruleSimpleState() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:186:2: ( ( ( rule__SimpleState__Group__0 ) ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:187:1: ( ( rule__SimpleState__Group__0 ) )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:187:1: ( ( rule__SimpleState__Group__0 ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:188:1: ( rule__SimpleState__Group__0 )
            {
             before(grammarAccess.getSimpleStateAccess().getGroup()); 
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:189:1: ( rule__SimpleState__Group__0 )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:189:2: rule__SimpleState__Group__0
            {
            pushFollow(FOLLOW_rule__SimpleState__Group__0_in_ruleSimpleState334);
            rule__SimpleState__Group__0();

            state._fsp--;


            }

             after(grammarAccess.getSimpleStateAccess().getGroup()); 

            }


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "ruleSimpleState"


    // $ANTLR start "entryRuleCompoundState"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:201:1: entryRuleCompoundState : ruleCompoundState EOF ;
    public final void entryRuleCompoundState() throws RecognitionException {
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:202:1: ( ruleCompoundState EOF )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:203:1: ruleCompoundState EOF
            {
             before(grammarAccess.getCompoundStateRule()); 
            pushFollow(FOLLOW_ruleCompoundState_in_entryRuleCompoundState361);
            ruleCompoundState();

            state._fsp--;

             after(grammarAccess.getCompoundStateRule()); 
            match(input,EOF,FOLLOW_EOF_in_entryRuleCompoundState368); 

            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {
        }
        return ;
    }
    // $ANTLR end "entryRuleCompoundState"


    // $ANTLR start "ruleCompoundState"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:210:1: ruleCompoundState : ( ( rule__CompoundState__Group__0 ) ) ;
    public final void ruleCompoundState() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:214:2: ( ( ( rule__CompoundState__Group__0 ) ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:215:1: ( ( rule__CompoundState__Group__0 ) )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:215:1: ( ( rule__CompoundState__Group__0 ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:216:1: ( rule__CompoundState__Group__0 )
            {
             before(grammarAccess.getCompoundStateAccess().getGroup()); 
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:217:1: ( rule__CompoundState__Group__0 )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:217:2: rule__CompoundState__Group__0
            {
            pushFollow(FOLLOW_rule__CompoundState__Group__0_in_ruleCompoundState394);
            rule__CompoundState__Group__0();

            state._fsp--;


            }

             after(grammarAccess.getCompoundStateAccess().getGroup()); 

            }


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "ruleCompoundState"


    // $ANTLR start "entryRuleTransition"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:229:1: entryRuleTransition : ruleTransition EOF ;
    public final void entryRuleTransition() throws RecognitionException {
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:230:1: ( ruleTransition EOF )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:231:1: ruleTransition EOF
            {
             before(grammarAccess.getTransitionRule()); 
            pushFollow(FOLLOW_ruleTransition_in_entryRuleTransition421);
            ruleTransition();

            state._fsp--;

             after(grammarAccess.getTransitionRule()); 
            match(input,EOF,FOLLOW_EOF_in_entryRuleTransition428); 

            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {
        }
        return ;
    }
    // $ANTLR end "entryRuleTransition"


    // $ANTLR start "ruleTransition"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:238:1: ruleTransition : ( ( rule__Transition__Group__0 ) ) ;
    public final void ruleTransition() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:242:2: ( ( ( rule__Transition__Group__0 ) ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:243:1: ( ( rule__Transition__Group__0 ) )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:243:1: ( ( rule__Transition__Group__0 ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:244:1: ( rule__Transition__Group__0 )
            {
             before(grammarAccess.getTransitionAccess().getGroup()); 
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:245:1: ( rule__Transition__Group__0 )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:245:2: rule__Transition__Group__0
            {
            pushFollow(FOLLOW_rule__Transition__Group__0_in_ruleTransition454);
            rule__Transition__Group__0();

            state._fsp--;


            }

             after(grammarAccess.getTransitionAccess().getGroup()); 

            }


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "ruleTransition"


    // $ANTLR start "rule__State__Alternatives"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:257:1: rule__State__Alternatives : ( ( ruleSimpleState ) | ( ruleCompoundState ) );
    public final void rule__State__Alternatives() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:261:1: ( ( ruleSimpleState ) | ( ruleCompoundState ) )
            int alt1=2;
            int LA1_0 = input.LA(1);

            if ( (LA1_0==18||LA1_0==22) ) {
                alt1=1;
            }
            else if ( (LA1_0==19) ) {
                alt1=2;
            }
            else {
                NoViableAltException nvae =
                    new NoViableAltException("", 1, 0, input);

                throw nvae;
            }
            switch (alt1) {
                case 1 :
                    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:262:1: ( ruleSimpleState )
                    {
                    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:262:1: ( ruleSimpleState )
                    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:263:1: ruleSimpleState
                    {
                     before(grammarAccess.getStateAccess().getSimpleStateParserRuleCall_0()); 
                    pushFollow(FOLLOW_ruleSimpleState_in_rule__State__Alternatives490);
                    ruleSimpleState();

                    state._fsp--;

                     after(grammarAccess.getStateAccess().getSimpleStateParserRuleCall_0()); 

                    }


                    }
                    break;
                case 2 :
                    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:268:6: ( ruleCompoundState )
                    {
                    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:268:6: ( ruleCompoundState )
                    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:269:1: ruleCompoundState
                    {
                     before(grammarAccess.getStateAccess().getCompoundStateParserRuleCall_1()); 
                    pushFollow(FOLLOW_ruleCompoundState_in_rule__State__Alternatives507);
                    ruleCompoundState();

                    state._fsp--;

                     after(grammarAccess.getStateAccess().getCompoundStateParserRuleCall_1()); 

                    }


                    }
                    break;

            }
        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__State__Alternatives"


    // $ANTLR start "rule__Module__Group__0"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:281:1: rule__Module__Group__0 : rule__Module__Group__0__Impl rule__Module__Group__1 ;
    public final void rule__Module__Group__0() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:285:1: ( rule__Module__Group__0__Impl rule__Module__Group__1 )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:286:2: rule__Module__Group__0__Impl rule__Module__Group__1
            {
            pushFollow(FOLLOW_rule__Module__Group__0__Impl_in_rule__Module__Group__0537);
            rule__Module__Group__0__Impl();

            state._fsp--;

            pushFollow(FOLLOW_rule__Module__Group__1_in_rule__Module__Group__0540);
            rule__Module__Group__1();

            state._fsp--;


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__Module__Group__0"


    // $ANTLR start "rule__Module__Group__0__Impl"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:293:1: rule__Module__Group__0__Impl : ( 'module' ) ;
    public final void rule__Module__Group__0__Impl() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:297:1: ( ( 'module' ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:298:1: ( 'module' )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:298:1: ( 'module' )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:299:1: 'module'
            {
             before(grammarAccess.getModuleAccess().getModuleKeyword_0()); 
            match(input,11,FOLLOW_11_in_rule__Module__Group__0__Impl568); 
             after(grammarAccess.getModuleAccess().getModuleKeyword_0()); 

            }


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__Module__Group__0__Impl"


    // $ANTLR start "rule__Module__Group__1"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:312:1: rule__Module__Group__1 : rule__Module__Group__1__Impl rule__Module__Group__2 ;
    public final void rule__Module__Group__1() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:316:1: ( rule__Module__Group__1__Impl rule__Module__Group__2 )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:317:2: rule__Module__Group__1__Impl rule__Module__Group__2
            {
            pushFollow(FOLLOW_rule__Module__Group__1__Impl_in_rule__Module__Group__1599);
            rule__Module__Group__1__Impl();

            state._fsp--;

            pushFollow(FOLLOW_rule__Module__Group__2_in_rule__Module__Group__1602);
            rule__Module__Group__2();

            state._fsp--;


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__Module__Group__1"


    // $ANTLR start "rule__Module__Group__1__Impl"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:324:1: rule__Module__Group__1__Impl : ( ( rule__Module__NameAssignment_1 ) ) ;
    public final void rule__Module__Group__1__Impl() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:328:1: ( ( ( rule__Module__NameAssignment_1 ) ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:329:1: ( ( rule__Module__NameAssignment_1 ) )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:329:1: ( ( rule__Module__NameAssignment_1 ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:330:1: ( rule__Module__NameAssignment_1 )
            {
             before(grammarAccess.getModuleAccess().getNameAssignment_1()); 
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:331:1: ( rule__Module__NameAssignment_1 )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:331:2: rule__Module__NameAssignment_1
            {
            pushFollow(FOLLOW_rule__Module__NameAssignment_1_in_rule__Module__Group__1__Impl629);
            rule__Module__NameAssignment_1();

            state._fsp--;


            }

             after(grammarAccess.getModuleAccess().getNameAssignment_1()); 

            }


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__Module__Group__1__Impl"


    // $ANTLR start "rule__Module__Group__2"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:341:1: rule__Module__Group__2 : rule__Module__Group__2__Impl ;
    public final void rule__Module__Group__2() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:345:1: ( rule__Module__Group__2__Impl )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:346:2: rule__Module__Group__2__Impl
            {
            pushFollow(FOLLOW_rule__Module__Group__2__Impl_in_rule__Module__Group__2659);
            rule__Module__Group__2__Impl();

            state._fsp--;


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__Module__Group__2"


    // $ANTLR start "rule__Module__Group__2__Impl"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:352:1: rule__Module__Group__2__Impl : ( ( rule__Module__MachinesAssignment_2 )* ) ;
    public final void rule__Module__Group__2__Impl() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:356:1: ( ( ( rule__Module__MachinesAssignment_2 )* ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:357:1: ( ( rule__Module__MachinesAssignment_2 )* )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:357:1: ( ( rule__Module__MachinesAssignment_2 )* )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:358:1: ( rule__Module__MachinesAssignment_2 )*
            {
             before(grammarAccess.getModuleAccess().getMachinesAssignment_2()); 
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:359:1: ( rule__Module__MachinesAssignment_2 )*
            loop2:
            do {
                int alt2=2;
                int LA2_0 = input.LA(1);

                if ( (LA2_0==12||LA2_0==22) ) {
                    alt2=1;
                }


                switch (alt2) {
            	case 1 :
            	    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:359:2: rule__Module__MachinesAssignment_2
            	    {
            	    pushFollow(FOLLOW_rule__Module__MachinesAssignment_2_in_rule__Module__Group__2__Impl686);
            	    rule__Module__MachinesAssignment_2();

            	    state._fsp--;


            	    }
            	    break;

            	default :
            	    break loop2;
                }
            } while (true);

             after(grammarAccess.getModuleAccess().getMachinesAssignment_2()); 

            }


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__Module__Group__2__Impl"


    // $ANTLR start "rule__Statemachine__Group__0"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:375:1: rule__Statemachine__Group__0 : rule__Statemachine__Group__0__Impl rule__Statemachine__Group__1 ;
    public final void rule__Statemachine__Group__0() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:379:1: ( rule__Statemachine__Group__0__Impl rule__Statemachine__Group__1 )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:380:2: rule__Statemachine__Group__0__Impl rule__Statemachine__Group__1
            {
            pushFollow(FOLLOW_rule__Statemachine__Group__0__Impl_in_rule__Statemachine__Group__0723);
            rule__Statemachine__Group__0__Impl();

            state._fsp--;

            pushFollow(FOLLOW_rule__Statemachine__Group__1_in_rule__Statemachine__Group__0726);
            rule__Statemachine__Group__1();

            state._fsp--;


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__Statemachine__Group__0"


    // $ANTLR start "rule__Statemachine__Group__0__Impl"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:387:1: rule__Statemachine__Group__0__Impl : ( ( rule__Statemachine__InitialAssignment_0 )? ) ;
    public final void rule__Statemachine__Group__0__Impl() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:391:1: ( ( ( rule__Statemachine__InitialAssignment_0 )? ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:392:1: ( ( rule__Statemachine__InitialAssignment_0 )? )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:392:1: ( ( rule__Statemachine__InitialAssignment_0 )? )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:393:1: ( rule__Statemachine__InitialAssignment_0 )?
            {
             before(grammarAccess.getStatemachineAccess().getInitialAssignment_0()); 
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:394:1: ( rule__Statemachine__InitialAssignment_0 )?
            int alt3=2;
            int LA3_0 = input.LA(1);

            if ( (LA3_0==22) ) {
                alt3=1;
            }
            switch (alt3) {
                case 1 :
                    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:394:2: rule__Statemachine__InitialAssignment_0
                    {
                    pushFollow(FOLLOW_rule__Statemachine__InitialAssignment_0_in_rule__Statemachine__Group__0__Impl753);
                    rule__Statemachine__InitialAssignment_0();

                    state._fsp--;


                    }
                    break;

            }

             after(grammarAccess.getStatemachineAccess().getInitialAssignment_0()); 

            }


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__Statemachine__Group__0__Impl"


    // $ANTLR start "rule__Statemachine__Group__1"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:404:1: rule__Statemachine__Group__1 : rule__Statemachine__Group__1__Impl rule__Statemachine__Group__2 ;
    public final void rule__Statemachine__Group__1() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:408:1: ( rule__Statemachine__Group__1__Impl rule__Statemachine__Group__2 )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:409:2: rule__Statemachine__Group__1__Impl rule__Statemachine__Group__2
            {
            pushFollow(FOLLOW_rule__Statemachine__Group__1__Impl_in_rule__Statemachine__Group__1784);
            rule__Statemachine__Group__1__Impl();

            state._fsp--;

            pushFollow(FOLLOW_rule__Statemachine__Group__2_in_rule__Statemachine__Group__1787);
            rule__Statemachine__Group__2();

            state._fsp--;


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__Statemachine__Group__1"


    // $ANTLR start "rule__Statemachine__Group__1__Impl"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:416:1: rule__Statemachine__Group__1__Impl : ( 'statemachine' ) ;
    public final void rule__Statemachine__Group__1__Impl() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:420:1: ( ( 'statemachine' ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:421:1: ( 'statemachine' )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:421:1: ( 'statemachine' )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:422:1: 'statemachine'
            {
             before(grammarAccess.getStatemachineAccess().getStatemachineKeyword_1()); 
            match(input,12,FOLLOW_12_in_rule__Statemachine__Group__1__Impl815); 
             after(grammarAccess.getStatemachineAccess().getStatemachineKeyword_1()); 

            }


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__Statemachine__Group__1__Impl"


    // $ANTLR start "rule__Statemachine__Group__2"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:435:1: rule__Statemachine__Group__2 : rule__Statemachine__Group__2__Impl rule__Statemachine__Group__3 ;
    public final void rule__Statemachine__Group__2() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:439:1: ( rule__Statemachine__Group__2__Impl rule__Statemachine__Group__3 )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:440:2: rule__Statemachine__Group__2__Impl rule__Statemachine__Group__3
            {
            pushFollow(FOLLOW_rule__Statemachine__Group__2__Impl_in_rule__Statemachine__Group__2846);
            rule__Statemachine__Group__2__Impl();

            state._fsp--;

            pushFollow(FOLLOW_rule__Statemachine__Group__3_in_rule__Statemachine__Group__2849);
            rule__Statemachine__Group__3();

            state._fsp--;


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__Statemachine__Group__2"


    // $ANTLR start "rule__Statemachine__Group__2__Impl"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:447:1: rule__Statemachine__Group__2__Impl : ( ( rule__Statemachine__NameAssignment_2 ) ) ;
    public final void rule__Statemachine__Group__2__Impl() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:451:1: ( ( ( rule__Statemachine__NameAssignment_2 ) ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:452:1: ( ( rule__Statemachine__NameAssignment_2 ) )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:452:1: ( ( rule__Statemachine__NameAssignment_2 ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:453:1: ( rule__Statemachine__NameAssignment_2 )
            {
             before(grammarAccess.getStatemachineAccess().getNameAssignment_2()); 
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:454:1: ( rule__Statemachine__NameAssignment_2 )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:454:2: rule__Statemachine__NameAssignment_2
            {
            pushFollow(FOLLOW_rule__Statemachine__NameAssignment_2_in_rule__Statemachine__Group__2__Impl876);
            rule__Statemachine__NameAssignment_2();

            state._fsp--;


            }

             after(grammarAccess.getStatemachineAccess().getNameAssignment_2()); 

            }


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__Statemachine__Group__2__Impl"


    // $ANTLR start "rule__Statemachine__Group__3"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:464:1: rule__Statemachine__Group__3 : rule__Statemachine__Group__3__Impl rule__Statemachine__Group__4 ;
    public final void rule__Statemachine__Group__3() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:468:1: ( rule__Statemachine__Group__3__Impl rule__Statemachine__Group__4 )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:469:2: rule__Statemachine__Group__3__Impl rule__Statemachine__Group__4
            {
            pushFollow(FOLLOW_rule__Statemachine__Group__3__Impl_in_rule__Statemachine__Group__3906);
            rule__Statemachine__Group__3__Impl();

            state._fsp--;

            pushFollow(FOLLOW_rule__Statemachine__Group__4_in_rule__Statemachine__Group__3909);
            rule__Statemachine__Group__4();

            state._fsp--;


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__Statemachine__Group__3"


    // $ANTLR start "rule__Statemachine__Group__3__Impl"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:476:1: rule__Statemachine__Group__3__Impl : ( ( rule__Statemachine__Group_3__0 )? ) ;
    public final void rule__Statemachine__Group__3__Impl() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:480:1: ( ( ( rule__Statemachine__Group_3__0 )? ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:481:1: ( ( rule__Statemachine__Group_3__0 )? )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:481:1: ( ( rule__Statemachine__Group_3__0 )? )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:482:1: ( rule__Statemachine__Group_3__0 )?
            {
             before(grammarAccess.getStatemachineAccess().getGroup_3()); 
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:483:1: ( rule__Statemachine__Group_3__0 )?
            int alt4=2;
            int LA4_0 = input.LA(1);

            if ( (LA4_0==17) ) {
                alt4=1;
            }
            switch (alt4) {
                case 1 :
                    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:483:2: rule__Statemachine__Group_3__0
                    {
                    pushFollow(FOLLOW_rule__Statemachine__Group_3__0_in_rule__Statemachine__Group__3__Impl936);
                    rule__Statemachine__Group_3__0();

                    state._fsp--;


                    }
                    break;

            }

             after(grammarAccess.getStatemachineAccess().getGroup_3()); 

            }


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__Statemachine__Group__3__Impl"


    // $ANTLR start "rule__Statemachine__Group__4"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:493:1: rule__Statemachine__Group__4 : rule__Statemachine__Group__4__Impl rule__Statemachine__Group__5 ;
    public final void rule__Statemachine__Group__4() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:497:1: ( rule__Statemachine__Group__4__Impl rule__Statemachine__Group__5 )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:498:2: rule__Statemachine__Group__4__Impl rule__Statemachine__Group__5
            {
            pushFollow(FOLLOW_rule__Statemachine__Group__4__Impl_in_rule__Statemachine__Group__4967);
            rule__Statemachine__Group__4__Impl();

            state._fsp--;

            pushFollow(FOLLOW_rule__Statemachine__Group__5_in_rule__Statemachine__Group__4970);
            rule__Statemachine__Group__5();

            state._fsp--;


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__Statemachine__Group__4"


    // $ANTLR start "rule__Statemachine__Group__4__Impl"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:505:1: rule__Statemachine__Group__4__Impl : ( '{' ) ;
    public final void rule__Statemachine__Group__4__Impl() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:509:1: ( ( '{' ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:510:1: ( '{' )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:510:1: ( '{' )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:511:1: '{'
            {
             before(grammarAccess.getStatemachineAccess().getLeftCurlyBracketKeyword_4()); 
            match(input,13,FOLLOW_13_in_rule__Statemachine__Group__4__Impl998); 
             after(grammarAccess.getStatemachineAccess().getLeftCurlyBracketKeyword_4()); 

            }


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__Statemachine__Group__4__Impl"


    // $ANTLR start "rule__Statemachine__Group__5"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:524:1: rule__Statemachine__Group__5 : rule__Statemachine__Group__5__Impl rule__Statemachine__Group__6 ;
    public final void rule__Statemachine__Group__5() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:528:1: ( rule__Statemachine__Group__5__Impl rule__Statemachine__Group__6 )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:529:2: rule__Statemachine__Group__5__Impl rule__Statemachine__Group__6
            {
            pushFollow(FOLLOW_rule__Statemachine__Group__5__Impl_in_rule__Statemachine__Group__51029);
            rule__Statemachine__Group__5__Impl();

            state._fsp--;

            pushFollow(FOLLOW_rule__Statemachine__Group__6_in_rule__Statemachine__Group__51032);
            rule__Statemachine__Group__6();

            state._fsp--;


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__Statemachine__Group__5"


    // $ANTLR start "rule__Statemachine__Group__5__Impl"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:536:1: rule__Statemachine__Group__5__Impl : ( 'events' ) ;
    public final void rule__Statemachine__Group__5__Impl() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:540:1: ( ( 'events' ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:541:1: ( 'events' )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:541:1: ( 'events' )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:542:1: 'events'
            {
             before(grammarAccess.getStatemachineAccess().getEventsKeyword_5()); 
            match(input,14,FOLLOW_14_in_rule__Statemachine__Group__5__Impl1060); 
             after(grammarAccess.getStatemachineAccess().getEventsKeyword_5()); 

            }


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__Statemachine__Group__5__Impl"


    // $ANTLR start "rule__Statemachine__Group__6"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:555:1: rule__Statemachine__Group__6 : rule__Statemachine__Group__6__Impl rule__Statemachine__Group__7 ;
    public final void rule__Statemachine__Group__6() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:559:1: ( rule__Statemachine__Group__6__Impl rule__Statemachine__Group__7 )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:560:2: rule__Statemachine__Group__6__Impl rule__Statemachine__Group__7
            {
            pushFollow(FOLLOW_rule__Statemachine__Group__6__Impl_in_rule__Statemachine__Group__61091);
            rule__Statemachine__Group__6__Impl();

            state._fsp--;

            pushFollow(FOLLOW_rule__Statemachine__Group__7_in_rule__Statemachine__Group__61094);
            rule__Statemachine__Group__7();

            state._fsp--;


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__Statemachine__Group__6"


    // $ANTLR start "rule__Statemachine__Group__6__Impl"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:567:1: rule__Statemachine__Group__6__Impl : ( ( rule__Statemachine__EventsAssignment_6 )* ) ;
    public final void rule__Statemachine__Group__6__Impl() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:571:1: ( ( ( rule__Statemachine__EventsAssignment_6 )* ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:572:1: ( ( rule__Statemachine__EventsAssignment_6 )* )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:572:1: ( ( rule__Statemachine__EventsAssignment_6 )* )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:573:1: ( rule__Statemachine__EventsAssignment_6 )*
            {
             before(grammarAccess.getStatemachineAccess().getEventsAssignment_6()); 
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:574:1: ( rule__Statemachine__EventsAssignment_6 )*
            loop5:
            do {
                int alt5=2;
                int LA5_0 = input.LA(1);

                if ( (LA5_0==RULE_ID) ) {
                    alt5=1;
                }


                switch (alt5) {
            	case 1 :
            	    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:574:2: rule__Statemachine__EventsAssignment_6
            	    {
            	    pushFollow(FOLLOW_rule__Statemachine__EventsAssignment_6_in_rule__Statemachine__Group__6__Impl1121);
            	    rule__Statemachine__EventsAssignment_6();

            	    state._fsp--;


            	    }
            	    break;

            	default :
            	    break loop5;
                }
            } while (true);

             after(grammarAccess.getStatemachineAccess().getEventsAssignment_6()); 

            }


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__Statemachine__Group__6__Impl"


    // $ANTLR start "rule__Statemachine__Group__7"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:584:1: rule__Statemachine__Group__7 : rule__Statemachine__Group__7__Impl rule__Statemachine__Group__8 ;
    public final void rule__Statemachine__Group__7() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:588:1: ( rule__Statemachine__Group__7__Impl rule__Statemachine__Group__8 )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:589:2: rule__Statemachine__Group__7__Impl rule__Statemachine__Group__8
            {
            pushFollow(FOLLOW_rule__Statemachine__Group__7__Impl_in_rule__Statemachine__Group__71152);
            rule__Statemachine__Group__7__Impl();

            state._fsp--;

            pushFollow(FOLLOW_rule__Statemachine__Group__8_in_rule__Statemachine__Group__71155);
            rule__Statemachine__Group__8();

            state._fsp--;


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__Statemachine__Group__7"


    // $ANTLR start "rule__Statemachine__Group__7__Impl"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:596:1: rule__Statemachine__Group__7__Impl : ( ';' ) ;
    public final void rule__Statemachine__Group__7__Impl() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:600:1: ( ( ';' ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:601:1: ( ';' )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:601:1: ( ';' )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:602:1: ';'
            {
             before(grammarAccess.getStatemachineAccess().getSemicolonKeyword_7()); 
            match(input,15,FOLLOW_15_in_rule__Statemachine__Group__7__Impl1183); 
             after(grammarAccess.getStatemachineAccess().getSemicolonKeyword_7()); 

            }


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__Statemachine__Group__7__Impl"


    // $ANTLR start "rule__Statemachine__Group__8"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:615:1: rule__Statemachine__Group__8 : rule__Statemachine__Group__8__Impl rule__Statemachine__Group__9 ;
    public final void rule__Statemachine__Group__8() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:619:1: ( rule__Statemachine__Group__8__Impl rule__Statemachine__Group__9 )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:620:2: rule__Statemachine__Group__8__Impl rule__Statemachine__Group__9
            {
            pushFollow(FOLLOW_rule__Statemachine__Group__8__Impl_in_rule__Statemachine__Group__81214);
            rule__Statemachine__Group__8__Impl();

            state._fsp--;

            pushFollow(FOLLOW_rule__Statemachine__Group__9_in_rule__Statemachine__Group__81217);
            rule__Statemachine__Group__9();

            state._fsp--;


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__Statemachine__Group__8"


    // $ANTLR start "rule__Statemachine__Group__8__Impl"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:627:1: rule__Statemachine__Group__8__Impl : ( ( rule__Statemachine__StatesAssignment_8 )* ) ;
    public final void rule__Statemachine__Group__8__Impl() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:631:1: ( ( ( rule__Statemachine__StatesAssignment_8 )* ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:632:1: ( ( rule__Statemachine__StatesAssignment_8 )* )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:632:1: ( ( rule__Statemachine__StatesAssignment_8 )* )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:633:1: ( rule__Statemachine__StatesAssignment_8 )*
            {
             before(grammarAccess.getStatemachineAccess().getStatesAssignment_8()); 
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:634:1: ( rule__Statemachine__StatesAssignment_8 )*
            loop6:
            do {
                int alt6=2;
                int LA6_0 = input.LA(1);

                if ( ((LA6_0>=18 && LA6_0<=19)||LA6_0==22) ) {
                    alt6=1;
                }


                switch (alt6) {
            	case 1 :
            	    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:634:2: rule__Statemachine__StatesAssignment_8
            	    {
            	    pushFollow(FOLLOW_rule__Statemachine__StatesAssignment_8_in_rule__Statemachine__Group__8__Impl1244);
            	    rule__Statemachine__StatesAssignment_8();

            	    state._fsp--;


            	    }
            	    break;

            	default :
            	    break loop6;
                }
            } while (true);

             after(grammarAccess.getStatemachineAccess().getStatesAssignment_8()); 

            }


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__Statemachine__Group__8__Impl"


    // $ANTLR start "rule__Statemachine__Group__9"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:644:1: rule__Statemachine__Group__9 : rule__Statemachine__Group__9__Impl ;
    public final void rule__Statemachine__Group__9() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:648:1: ( rule__Statemachine__Group__9__Impl )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:649:2: rule__Statemachine__Group__9__Impl
            {
            pushFollow(FOLLOW_rule__Statemachine__Group__9__Impl_in_rule__Statemachine__Group__91275);
            rule__Statemachine__Group__9__Impl();

            state._fsp--;


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__Statemachine__Group__9"


    // $ANTLR start "rule__Statemachine__Group__9__Impl"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:655:1: rule__Statemachine__Group__9__Impl : ( '}' ) ;
    public final void rule__Statemachine__Group__9__Impl() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:659:1: ( ( '}' ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:660:1: ( '}' )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:660:1: ( '}' )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:661:1: '}'
            {
             before(grammarAccess.getStatemachineAccess().getRightCurlyBracketKeyword_9()); 
            match(input,16,FOLLOW_16_in_rule__Statemachine__Group__9__Impl1303); 
             after(grammarAccess.getStatemachineAccess().getRightCurlyBracketKeyword_9()); 

            }


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__Statemachine__Group__9__Impl"


    // $ANTLR start "rule__Statemachine__Group_3__0"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:694:1: rule__Statemachine__Group_3__0 : rule__Statemachine__Group_3__0__Impl rule__Statemachine__Group_3__1 ;
    public final void rule__Statemachine__Group_3__0() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:698:1: ( rule__Statemachine__Group_3__0__Impl rule__Statemachine__Group_3__1 )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:699:2: rule__Statemachine__Group_3__0__Impl rule__Statemachine__Group_3__1
            {
            pushFollow(FOLLOW_rule__Statemachine__Group_3__0__Impl_in_rule__Statemachine__Group_3__01354);
            rule__Statemachine__Group_3__0__Impl();

            state._fsp--;

            pushFollow(FOLLOW_rule__Statemachine__Group_3__1_in_rule__Statemachine__Group_3__01357);
            rule__Statemachine__Group_3__1();

            state._fsp--;


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__Statemachine__Group_3__0"


    // $ANTLR start "rule__Statemachine__Group_3__0__Impl"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:706:1: rule__Statemachine__Group_3__0__Impl : ( 'value' ) ;
    public final void rule__Statemachine__Group_3__0__Impl() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:710:1: ( ( 'value' ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:711:1: ( 'value' )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:711:1: ( 'value' )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:712:1: 'value'
            {
             before(grammarAccess.getStatemachineAccess().getValueKeyword_3_0()); 
            match(input,17,FOLLOW_17_in_rule__Statemachine__Group_3__0__Impl1385); 
             after(grammarAccess.getStatemachineAccess().getValueKeyword_3_0()); 

            }


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__Statemachine__Group_3__0__Impl"


    // $ANTLR start "rule__Statemachine__Group_3__1"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:725:1: rule__Statemachine__Group_3__1 : rule__Statemachine__Group_3__1__Impl ;
    public final void rule__Statemachine__Group_3__1() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:729:1: ( rule__Statemachine__Group_3__1__Impl )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:730:2: rule__Statemachine__Group_3__1__Impl
            {
            pushFollow(FOLLOW_rule__Statemachine__Group_3__1__Impl_in_rule__Statemachine__Group_3__11416);
            rule__Statemachine__Group_3__1__Impl();

            state._fsp--;


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__Statemachine__Group_3__1"


    // $ANTLR start "rule__Statemachine__Group_3__1__Impl"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:736:1: rule__Statemachine__Group_3__1__Impl : ( ( rule__Statemachine__ValueAssignment_3_1 ) ) ;
    public final void rule__Statemachine__Group_3__1__Impl() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:740:1: ( ( ( rule__Statemachine__ValueAssignment_3_1 ) ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:741:1: ( ( rule__Statemachine__ValueAssignment_3_1 ) )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:741:1: ( ( rule__Statemachine__ValueAssignment_3_1 ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:742:1: ( rule__Statemachine__ValueAssignment_3_1 )
            {
             before(grammarAccess.getStatemachineAccess().getValueAssignment_3_1()); 
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:743:1: ( rule__Statemachine__ValueAssignment_3_1 )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:743:2: rule__Statemachine__ValueAssignment_3_1
            {
            pushFollow(FOLLOW_rule__Statemachine__ValueAssignment_3_1_in_rule__Statemachine__Group_3__1__Impl1443);
            rule__Statemachine__ValueAssignment_3_1();

            state._fsp--;


            }

             after(grammarAccess.getStatemachineAccess().getValueAssignment_3_1()); 

            }


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__Statemachine__Group_3__1__Impl"


    // $ANTLR start "rule__SimpleState__Group__0"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:757:1: rule__SimpleState__Group__0 : rule__SimpleState__Group__0__Impl rule__SimpleState__Group__1 ;
    public final void rule__SimpleState__Group__0() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:761:1: ( rule__SimpleState__Group__0__Impl rule__SimpleState__Group__1 )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:762:2: rule__SimpleState__Group__0__Impl rule__SimpleState__Group__1
            {
            pushFollow(FOLLOW_rule__SimpleState__Group__0__Impl_in_rule__SimpleState__Group__01477);
            rule__SimpleState__Group__0__Impl();

            state._fsp--;

            pushFollow(FOLLOW_rule__SimpleState__Group__1_in_rule__SimpleState__Group__01480);
            rule__SimpleState__Group__1();

            state._fsp--;


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__SimpleState__Group__0"


    // $ANTLR start "rule__SimpleState__Group__0__Impl"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:769:1: rule__SimpleState__Group__0__Impl : ( ( rule__SimpleState__InitialAssignment_0 )? ) ;
    public final void rule__SimpleState__Group__0__Impl() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:773:1: ( ( ( rule__SimpleState__InitialAssignment_0 )? ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:774:1: ( ( rule__SimpleState__InitialAssignment_0 )? )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:774:1: ( ( rule__SimpleState__InitialAssignment_0 )? )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:775:1: ( rule__SimpleState__InitialAssignment_0 )?
            {
             before(grammarAccess.getSimpleStateAccess().getInitialAssignment_0()); 
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:776:1: ( rule__SimpleState__InitialAssignment_0 )?
            int alt7=2;
            int LA7_0 = input.LA(1);

            if ( (LA7_0==22) ) {
                alt7=1;
            }
            switch (alt7) {
                case 1 :
                    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:776:2: rule__SimpleState__InitialAssignment_0
                    {
                    pushFollow(FOLLOW_rule__SimpleState__InitialAssignment_0_in_rule__SimpleState__Group__0__Impl1507);
                    rule__SimpleState__InitialAssignment_0();

                    state._fsp--;


                    }
                    break;

            }

             after(grammarAccess.getSimpleStateAccess().getInitialAssignment_0()); 

            }


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__SimpleState__Group__0__Impl"


    // $ANTLR start "rule__SimpleState__Group__1"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:786:1: rule__SimpleState__Group__1 : rule__SimpleState__Group__1__Impl rule__SimpleState__Group__2 ;
    public final void rule__SimpleState__Group__1() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:790:1: ( rule__SimpleState__Group__1__Impl rule__SimpleState__Group__2 )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:791:2: rule__SimpleState__Group__1__Impl rule__SimpleState__Group__2
            {
            pushFollow(FOLLOW_rule__SimpleState__Group__1__Impl_in_rule__SimpleState__Group__11538);
            rule__SimpleState__Group__1__Impl();

            state._fsp--;

            pushFollow(FOLLOW_rule__SimpleState__Group__2_in_rule__SimpleState__Group__11541);
            rule__SimpleState__Group__2();

            state._fsp--;


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__SimpleState__Group__1"


    // $ANTLR start "rule__SimpleState__Group__1__Impl"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:798:1: rule__SimpleState__Group__1__Impl : ( 'state' ) ;
    public final void rule__SimpleState__Group__1__Impl() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:802:1: ( ( 'state' ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:803:1: ( 'state' )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:803:1: ( 'state' )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:804:1: 'state'
            {
             before(grammarAccess.getSimpleStateAccess().getStateKeyword_1()); 
            match(input,18,FOLLOW_18_in_rule__SimpleState__Group__1__Impl1569); 
             after(grammarAccess.getSimpleStateAccess().getStateKeyword_1()); 

            }


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__SimpleState__Group__1__Impl"


    // $ANTLR start "rule__SimpleState__Group__2"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:817:1: rule__SimpleState__Group__2 : rule__SimpleState__Group__2__Impl rule__SimpleState__Group__3 ;
    public final void rule__SimpleState__Group__2() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:821:1: ( rule__SimpleState__Group__2__Impl rule__SimpleState__Group__3 )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:822:2: rule__SimpleState__Group__2__Impl rule__SimpleState__Group__3
            {
            pushFollow(FOLLOW_rule__SimpleState__Group__2__Impl_in_rule__SimpleState__Group__21600);
            rule__SimpleState__Group__2__Impl();

            state._fsp--;

            pushFollow(FOLLOW_rule__SimpleState__Group__3_in_rule__SimpleState__Group__21603);
            rule__SimpleState__Group__3();

            state._fsp--;


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__SimpleState__Group__2"


    // $ANTLR start "rule__SimpleState__Group__2__Impl"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:829:1: rule__SimpleState__Group__2__Impl : ( ( rule__SimpleState__NameAssignment_2 ) ) ;
    public final void rule__SimpleState__Group__2__Impl() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:833:1: ( ( ( rule__SimpleState__NameAssignment_2 ) ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:834:1: ( ( rule__SimpleState__NameAssignment_2 ) )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:834:1: ( ( rule__SimpleState__NameAssignment_2 ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:835:1: ( rule__SimpleState__NameAssignment_2 )
            {
             before(grammarAccess.getSimpleStateAccess().getNameAssignment_2()); 
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:836:1: ( rule__SimpleState__NameAssignment_2 )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:836:2: rule__SimpleState__NameAssignment_2
            {
            pushFollow(FOLLOW_rule__SimpleState__NameAssignment_2_in_rule__SimpleState__Group__2__Impl1630);
            rule__SimpleState__NameAssignment_2();

            state._fsp--;


            }

             after(grammarAccess.getSimpleStateAccess().getNameAssignment_2()); 

            }


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__SimpleState__Group__2__Impl"


    // $ANTLR start "rule__SimpleState__Group__3"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:846:1: rule__SimpleState__Group__3 : rule__SimpleState__Group__3__Impl rule__SimpleState__Group__4 ;
    public final void rule__SimpleState__Group__3() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:850:1: ( rule__SimpleState__Group__3__Impl rule__SimpleState__Group__4 )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:851:2: rule__SimpleState__Group__3__Impl rule__SimpleState__Group__4
            {
            pushFollow(FOLLOW_rule__SimpleState__Group__3__Impl_in_rule__SimpleState__Group__31660);
            rule__SimpleState__Group__3__Impl();

            state._fsp--;

            pushFollow(FOLLOW_rule__SimpleState__Group__4_in_rule__SimpleState__Group__31663);
            rule__SimpleState__Group__4();

            state._fsp--;


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__SimpleState__Group__3"


    // $ANTLR start "rule__SimpleState__Group__3__Impl"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:858:1: rule__SimpleState__Group__3__Impl : ( ( rule__SimpleState__Group_3__0 )? ) ;
    public final void rule__SimpleState__Group__3__Impl() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:862:1: ( ( ( rule__SimpleState__Group_3__0 )? ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:863:1: ( ( rule__SimpleState__Group_3__0 )? )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:863:1: ( ( rule__SimpleState__Group_3__0 )? )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:864:1: ( rule__SimpleState__Group_3__0 )?
            {
             before(grammarAccess.getSimpleStateAccess().getGroup_3()); 
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:865:1: ( rule__SimpleState__Group_3__0 )?
            int alt8=2;
            int LA8_0 = input.LA(1);

            if ( (LA8_0==17) ) {
                alt8=1;
            }
            switch (alt8) {
                case 1 :
                    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:865:2: rule__SimpleState__Group_3__0
                    {
                    pushFollow(FOLLOW_rule__SimpleState__Group_3__0_in_rule__SimpleState__Group__3__Impl1690);
                    rule__SimpleState__Group_3__0();

                    state._fsp--;


                    }
                    break;

            }

             after(grammarAccess.getSimpleStateAccess().getGroup_3()); 

            }


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__SimpleState__Group__3__Impl"


    // $ANTLR start "rule__SimpleState__Group__4"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:875:1: rule__SimpleState__Group__4 : rule__SimpleState__Group__4__Impl rule__SimpleState__Group__5 ;
    public final void rule__SimpleState__Group__4() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:879:1: ( rule__SimpleState__Group__4__Impl rule__SimpleState__Group__5 )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:880:2: rule__SimpleState__Group__4__Impl rule__SimpleState__Group__5
            {
            pushFollow(FOLLOW_rule__SimpleState__Group__4__Impl_in_rule__SimpleState__Group__41721);
            rule__SimpleState__Group__4__Impl();

            state._fsp--;

            pushFollow(FOLLOW_rule__SimpleState__Group__5_in_rule__SimpleState__Group__41724);
            rule__SimpleState__Group__5();

            state._fsp--;


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__SimpleState__Group__4"


    // $ANTLR start "rule__SimpleState__Group__4__Impl"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:887:1: rule__SimpleState__Group__4__Impl : ( '{' ) ;
    public final void rule__SimpleState__Group__4__Impl() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:891:1: ( ( '{' ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:892:1: ( '{' )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:892:1: ( '{' )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:893:1: '{'
            {
             before(grammarAccess.getSimpleStateAccess().getLeftCurlyBracketKeyword_4()); 
            match(input,13,FOLLOW_13_in_rule__SimpleState__Group__4__Impl1752); 
             after(grammarAccess.getSimpleStateAccess().getLeftCurlyBracketKeyword_4()); 

            }


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__SimpleState__Group__4__Impl"


    // $ANTLR start "rule__SimpleState__Group__5"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:906:1: rule__SimpleState__Group__5 : rule__SimpleState__Group__5__Impl rule__SimpleState__Group__6 ;
    public final void rule__SimpleState__Group__5() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:910:1: ( rule__SimpleState__Group__5__Impl rule__SimpleState__Group__6 )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:911:2: rule__SimpleState__Group__5__Impl rule__SimpleState__Group__6
            {
            pushFollow(FOLLOW_rule__SimpleState__Group__5__Impl_in_rule__SimpleState__Group__51783);
            rule__SimpleState__Group__5__Impl();

            state._fsp--;

            pushFollow(FOLLOW_rule__SimpleState__Group__6_in_rule__SimpleState__Group__51786);
            rule__SimpleState__Group__6();

            state._fsp--;


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__SimpleState__Group__5"


    // $ANTLR start "rule__SimpleState__Group__5__Impl"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:918:1: rule__SimpleState__Group__5__Impl : ( ( rule__SimpleState__TransitionsAssignment_5 )* ) ;
    public final void rule__SimpleState__Group__5__Impl() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:922:1: ( ( ( rule__SimpleState__TransitionsAssignment_5 )* ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:923:1: ( ( rule__SimpleState__TransitionsAssignment_5 )* )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:923:1: ( ( rule__SimpleState__TransitionsAssignment_5 )* )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:924:1: ( rule__SimpleState__TransitionsAssignment_5 )*
            {
             before(grammarAccess.getSimpleStateAccess().getTransitionsAssignment_5()); 
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:925:1: ( rule__SimpleState__TransitionsAssignment_5 )*
            loop9:
            do {
                int alt9=2;
                int LA9_0 = input.LA(1);

                if ( (LA9_0==RULE_ID) ) {
                    alt9=1;
                }


                switch (alt9) {
            	case 1 :
            	    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:925:2: rule__SimpleState__TransitionsAssignment_5
            	    {
            	    pushFollow(FOLLOW_rule__SimpleState__TransitionsAssignment_5_in_rule__SimpleState__Group__5__Impl1813);
            	    rule__SimpleState__TransitionsAssignment_5();

            	    state._fsp--;


            	    }
            	    break;

            	default :
            	    break loop9;
                }
            } while (true);

             after(grammarAccess.getSimpleStateAccess().getTransitionsAssignment_5()); 

            }


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__SimpleState__Group__5__Impl"


    // $ANTLR start "rule__SimpleState__Group__6"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:935:1: rule__SimpleState__Group__6 : rule__SimpleState__Group__6__Impl ;
    public final void rule__SimpleState__Group__6() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:939:1: ( rule__SimpleState__Group__6__Impl )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:940:2: rule__SimpleState__Group__6__Impl
            {
            pushFollow(FOLLOW_rule__SimpleState__Group__6__Impl_in_rule__SimpleState__Group__61844);
            rule__SimpleState__Group__6__Impl();

            state._fsp--;


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__SimpleState__Group__6"


    // $ANTLR start "rule__SimpleState__Group__6__Impl"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:946:1: rule__SimpleState__Group__6__Impl : ( '}' ) ;
    public final void rule__SimpleState__Group__6__Impl() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:950:1: ( ( '}' ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:951:1: ( '}' )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:951:1: ( '}' )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:952:1: '}'
            {
             before(grammarAccess.getSimpleStateAccess().getRightCurlyBracketKeyword_6()); 
            match(input,16,FOLLOW_16_in_rule__SimpleState__Group__6__Impl1872); 
             after(grammarAccess.getSimpleStateAccess().getRightCurlyBracketKeyword_6()); 

            }


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__SimpleState__Group__6__Impl"


    // $ANTLR start "rule__SimpleState__Group_3__0"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:979:1: rule__SimpleState__Group_3__0 : rule__SimpleState__Group_3__0__Impl rule__SimpleState__Group_3__1 ;
    public final void rule__SimpleState__Group_3__0() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:983:1: ( rule__SimpleState__Group_3__0__Impl rule__SimpleState__Group_3__1 )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:984:2: rule__SimpleState__Group_3__0__Impl rule__SimpleState__Group_3__1
            {
            pushFollow(FOLLOW_rule__SimpleState__Group_3__0__Impl_in_rule__SimpleState__Group_3__01917);
            rule__SimpleState__Group_3__0__Impl();

            state._fsp--;

            pushFollow(FOLLOW_rule__SimpleState__Group_3__1_in_rule__SimpleState__Group_3__01920);
            rule__SimpleState__Group_3__1();

            state._fsp--;


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__SimpleState__Group_3__0"


    // $ANTLR start "rule__SimpleState__Group_3__0__Impl"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:991:1: rule__SimpleState__Group_3__0__Impl : ( 'value' ) ;
    public final void rule__SimpleState__Group_3__0__Impl() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:995:1: ( ( 'value' ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:996:1: ( 'value' )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:996:1: ( 'value' )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:997:1: 'value'
            {
             before(grammarAccess.getSimpleStateAccess().getValueKeyword_3_0()); 
            match(input,17,FOLLOW_17_in_rule__SimpleState__Group_3__0__Impl1948); 
             after(grammarAccess.getSimpleStateAccess().getValueKeyword_3_0()); 

            }


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__SimpleState__Group_3__0__Impl"


    // $ANTLR start "rule__SimpleState__Group_3__1"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1010:1: rule__SimpleState__Group_3__1 : rule__SimpleState__Group_3__1__Impl ;
    public final void rule__SimpleState__Group_3__1() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1014:1: ( rule__SimpleState__Group_3__1__Impl )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1015:2: rule__SimpleState__Group_3__1__Impl
            {
            pushFollow(FOLLOW_rule__SimpleState__Group_3__1__Impl_in_rule__SimpleState__Group_3__11979);
            rule__SimpleState__Group_3__1__Impl();

            state._fsp--;


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__SimpleState__Group_3__1"


    // $ANTLR start "rule__SimpleState__Group_3__1__Impl"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1021:1: rule__SimpleState__Group_3__1__Impl : ( ( rule__SimpleState__ValueAssignment_3_1 ) ) ;
    public final void rule__SimpleState__Group_3__1__Impl() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1025:1: ( ( ( rule__SimpleState__ValueAssignment_3_1 ) ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1026:1: ( ( rule__SimpleState__ValueAssignment_3_1 ) )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1026:1: ( ( rule__SimpleState__ValueAssignment_3_1 ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1027:1: ( rule__SimpleState__ValueAssignment_3_1 )
            {
             before(grammarAccess.getSimpleStateAccess().getValueAssignment_3_1()); 
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1028:1: ( rule__SimpleState__ValueAssignment_3_1 )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1028:2: rule__SimpleState__ValueAssignment_3_1
            {
            pushFollow(FOLLOW_rule__SimpleState__ValueAssignment_3_1_in_rule__SimpleState__Group_3__1__Impl2006);
            rule__SimpleState__ValueAssignment_3_1();

            state._fsp--;


            }

             after(grammarAccess.getSimpleStateAccess().getValueAssignment_3_1()); 

            }


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__SimpleState__Group_3__1__Impl"


    // $ANTLR start "rule__CompoundState__Group__0"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1042:1: rule__CompoundState__Group__0 : rule__CompoundState__Group__0__Impl rule__CompoundState__Group__1 ;
    public final void rule__CompoundState__Group__0() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1046:1: ( rule__CompoundState__Group__0__Impl rule__CompoundState__Group__1 )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1047:2: rule__CompoundState__Group__0__Impl rule__CompoundState__Group__1
            {
            pushFollow(FOLLOW_rule__CompoundState__Group__0__Impl_in_rule__CompoundState__Group__02040);
            rule__CompoundState__Group__0__Impl();

            state._fsp--;

            pushFollow(FOLLOW_rule__CompoundState__Group__1_in_rule__CompoundState__Group__02043);
            rule__CompoundState__Group__1();

            state._fsp--;


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__CompoundState__Group__0"


    // $ANTLR start "rule__CompoundState__Group__0__Impl"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1054:1: rule__CompoundState__Group__0__Impl : ( 'compound' ) ;
    public final void rule__CompoundState__Group__0__Impl() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1058:1: ( ( 'compound' ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1059:1: ( 'compound' )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1059:1: ( 'compound' )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1060:1: 'compound'
            {
             before(grammarAccess.getCompoundStateAccess().getCompoundKeyword_0()); 
            match(input,19,FOLLOW_19_in_rule__CompoundState__Group__0__Impl2071); 
             after(grammarAccess.getCompoundStateAccess().getCompoundKeyword_0()); 

            }


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__CompoundState__Group__0__Impl"


    // $ANTLR start "rule__CompoundState__Group__1"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1073:1: rule__CompoundState__Group__1 : rule__CompoundState__Group__1__Impl rule__CompoundState__Group__2 ;
    public final void rule__CompoundState__Group__1() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1077:1: ( rule__CompoundState__Group__1__Impl rule__CompoundState__Group__2 )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1078:2: rule__CompoundState__Group__1__Impl rule__CompoundState__Group__2
            {
            pushFollow(FOLLOW_rule__CompoundState__Group__1__Impl_in_rule__CompoundState__Group__12102);
            rule__CompoundState__Group__1__Impl();

            state._fsp--;

            pushFollow(FOLLOW_rule__CompoundState__Group__2_in_rule__CompoundState__Group__12105);
            rule__CompoundState__Group__2();

            state._fsp--;


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__CompoundState__Group__1"


    // $ANTLR start "rule__CompoundState__Group__1__Impl"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1085:1: rule__CompoundState__Group__1__Impl : ( ( rule__CompoundState__InitialAssignment_1 )? ) ;
    public final void rule__CompoundState__Group__1__Impl() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1089:1: ( ( ( rule__CompoundState__InitialAssignment_1 )? ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1090:1: ( ( rule__CompoundState__InitialAssignment_1 )? )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1090:1: ( ( rule__CompoundState__InitialAssignment_1 )? )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1091:1: ( rule__CompoundState__InitialAssignment_1 )?
            {
             before(grammarAccess.getCompoundStateAccess().getInitialAssignment_1()); 
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1092:1: ( rule__CompoundState__InitialAssignment_1 )?
            int alt10=2;
            int LA10_0 = input.LA(1);

            if ( (LA10_0==22) ) {
                alt10=1;
            }
            switch (alt10) {
                case 1 :
                    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1092:2: rule__CompoundState__InitialAssignment_1
                    {
                    pushFollow(FOLLOW_rule__CompoundState__InitialAssignment_1_in_rule__CompoundState__Group__1__Impl2132);
                    rule__CompoundState__InitialAssignment_1();

                    state._fsp--;


                    }
                    break;

            }

             after(grammarAccess.getCompoundStateAccess().getInitialAssignment_1()); 

            }


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__CompoundState__Group__1__Impl"


    // $ANTLR start "rule__CompoundState__Group__2"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1102:1: rule__CompoundState__Group__2 : rule__CompoundState__Group__2__Impl rule__CompoundState__Group__3 ;
    public final void rule__CompoundState__Group__2() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1106:1: ( rule__CompoundState__Group__2__Impl rule__CompoundState__Group__3 )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1107:2: rule__CompoundState__Group__2__Impl rule__CompoundState__Group__3
            {
            pushFollow(FOLLOW_rule__CompoundState__Group__2__Impl_in_rule__CompoundState__Group__22163);
            rule__CompoundState__Group__2__Impl();

            state._fsp--;

            pushFollow(FOLLOW_rule__CompoundState__Group__3_in_rule__CompoundState__Group__22166);
            rule__CompoundState__Group__3();

            state._fsp--;


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__CompoundState__Group__2"


    // $ANTLR start "rule__CompoundState__Group__2__Impl"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1114:1: rule__CompoundState__Group__2__Impl : ( 'state' ) ;
    public final void rule__CompoundState__Group__2__Impl() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1118:1: ( ( 'state' ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1119:1: ( 'state' )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1119:1: ( 'state' )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1120:1: 'state'
            {
             before(grammarAccess.getCompoundStateAccess().getStateKeyword_2()); 
            match(input,18,FOLLOW_18_in_rule__CompoundState__Group__2__Impl2194); 
             after(grammarAccess.getCompoundStateAccess().getStateKeyword_2()); 

            }


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__CompoundState__Group__2__Impl"


    // $ANTLR start "rule__CompoundState__Group__3"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1133:1: rule__CompoundState__Group__3 : rule__CompoundState__Group__3__Impl rule__CompoundState__Group__4 ;
    public final void rule__CompoundState__Group__3() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1137:1: ( rule__CompoundState__Group__3__Impl rule__CompoundState__Group__4 )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1138:2: rule__CompoundState__Group__3__Impl rule__CompoundState__Group__4
            {
            pushFollow(FOLLOW_rule__CompoundState__Group__3__Impl_in_rule__CompoundState__Group__32225);
            rule__CompoundState__Group__3__Impl();

            state._fsp--;

            pushFollow(FOLLOW_rule__CompoundState__Group__4_in_rule__CompoundState__Group__32228);
            rule__CompoundState__Group__4();

            state._fsp--;


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__CompoundState__Group__3"


    // $ANTLR start "rule__CompoundState__Group__3__Impl"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1145:1: rule__CompoundState__Group__3__Impl : ( ( rule__CompoundState__NameAssignment_3 ) ) ;
    public final void rule__CompoundState__Group__3__Impl() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1149:1: ( ( ( rule__CompoundState__NameAssignment_3 ) ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1150:1: ( ( rule__CompoundState__NameAssignment_3 ) )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1150:1: ( ( rule__CompoundState__NameAssignment_3 ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1151:1: ( rule__CompoundState__NameAssignment_3 )
            {
             before(grammarAccess.getCompoundStateAccess().getNameAssignment_3()); 
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1152:1: ( rule__CompoundState__NameAssignment_3 )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1152:2: rule__CompoundState__NameAssignment_3
            {
            pushFollow(FOLLOW_rule__CompoundState__NameAssignment_3_in_rule__CompoundState__Group__3__Impl2255);
            rule__CompoundState__NameAssignment_3();

            state._fsp--;


            }

             after(grammarAccess.getCompoundStateAccess().getNameAssignment_3()); 

            }


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__CompoundState__Group__3__Impl"


    // $ANTLR start "rule__CompoundState__Group__4"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1162:1: rule__CompoundState__Group__4 : rule__CompoundState__Group__4__Impl rule__CompoundState__Group__5 ;
    public final void rule__CompoundState__Group__4() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1166:1: ( rule__CompoundState__Group__4__Impl rule__CompoundState__Group__5 )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1167:2: rule__CompoundState__Group__4__Impl rule__CompoundState__Group__5
            {
            pushFollow(FOLLOW_rule__CompoundState__Group__4__Impl_in_rule__CompoundState__Group__42285);
            rule__CompoundState__Group__4__Impl();

            state._fsp--;

            pushFollow(FOLLOW_rule__CompoundState__Group__5_in_rule__CompoundState__Group__42288);
            rule__CompoundState__Group__5();

            state._fsp--;


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__CompoundState__Group__4"


    // $ANTLR start "rule__CompoundState__Group__4__Impl"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1174:1: rule__CompoundState__Group__4__Impl : ( 'machine' ) ;
    public final void rule__CompoundState__Group__4__Impl() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1178:1: ( ( 'machine' ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1179:1: ( 'machine' )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1179:1: ( 'machine' )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1180:1: 'machine'
            {
             before(grammarAccess.getCompoundStateAccess().getMachineKeyword_4()); 
            match(input,20,FOLLOW_20_in_rule__CompoundState__Group__4__Impl2316); 
             after(grammarAccess.getCompoundStateAccess().getMachineKeyword_4()); 

            }


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__CompoundState__Group__4__Impl"


    // $ANTLR start "rule__CompoundState__Group__5"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1193:1: rule__CompoundState__Group__5 : rule__CompoundState__Group__5__Impl rule__CompoundState__Group__6 ;
    public final void rule__CompoundState__Group__5() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1197:1: ( rule__CompoundState__Group__5__Impl rule__CompoundState__Group__6 )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1198:2: rule__CompoundState__Group__5__Impl rule__CompoundState__Group__6
            {
            pushFollow(FOLLOW_rule__CompoundState__Group__5__Impl_in_rule__CompoundState__Group__52347);
            rule__CompoundState__Group__5__Impl();

            state._fsp--;

            pushFollow(FOLLOW_rule__CompoundState__Group__6_in_rule__CompoundState__Group__52350);
            rule__CompoundState__Group__6();

            state._fsp--;


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__CompoundState__Group__5"


    // $ANTLR start "rule__CompoundState__Group__5__Impl"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1205:1: rule__CompoundState__Group__5__Impl : ( ( rule__CompoundState__MachineAssignment_5 ) ) ;
    public final void rule__CompoundState__Group__5__Impl() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1209:1: ( ( ( rule__CompoundState__MachineAssignment_5 ) ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1210:1: ( ( rule__CompoundState__MachineAssignment_5 ) )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1210:1: ( ( rule__CompoundState__MachineAssignment_5 ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1211:1: ( rule__CompoundState__MachineAssignment_5 )
            {
             before(grammarAccess.getCompoundStateAccess().getMachineAssignment_5()); 
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1212:1: ( rule__CompoundState__MachineAssignment_5 )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1212:2: rule__CompoundState__MachineAssignment_5
            {
            pushFollow(FOLLOW_rule__CompoundState__MachineAssignment_5_in_rule__CompoundState__Group__5__Impl2377);
            rule__CompoundState__MachineAssignment_5();

            state._fsp--;


            }

             after(grammarAccess.getCompoundStateAccess().getMachineAssignment_5()); 

            }


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__CompoundState__Group__5__Impl"


    // $ANTLR start "rule__CompoundState__Group__6"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1222:1: rule__CompoundState__Group__6 : rule__CompoundState__Group__6__Impl rule__CompoundState__Group__7 ;
    public final void rule__CompoundState__Group__6() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1226:1: ( rule__CompoundState__Group__6__Impl rule__CompoundState__Group__7 )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1227:2: rule__CompoundState__Group__6__Impl rule__CompoundState__Group__7
            {
            pushFollow(FOLLOW_rule__CompoundState__Group__6__Impl_in_rule__CompoundState__Group__62407);
            rule__CompoundState__Group__6__Impl();

            state._fsp--;

            pushFollow(FOLLOW_rule__CompoundState__Group__7_in_rule__CompoundState__Group__62410);
            rule__CompoundState__Group__7();

            state._fsp--;


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__CompoundState__Group__6"


    // $ANTLR start "rule__CompoundState__Group__6__Impl"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1234:1: rule__CompoundState__Group__6__Impl : ( '{' ) ;
    public final void rule__CompoundState__Group__6__Impl() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1238:1: ( ( '{' ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1239:1: ( '{' )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1239:1: ( '{' )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1240:1: '{'
            {
             before(grammarAccess.getCompoundStateAccess().getLeftCurlyBracketKeyword_6()); 
            match(input,13,FOLLOW_13_in_rule__CompoundState__Group__6__Impl2438); 
             after(grammarAccess.getCompoundStateAccess().getLeftCurlyBracketKeyword_6()); 

            }


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__CompoundState__Group__6__Impl"


    // $ANTLR start "rule__CompoundState__Group__7"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1253:1: rule__CompoundState__Group__7 : rule__CompoundState__Group__7__Impl rule__CompoundState__Group__8 ;
    public final void rule__CompoundState__Group__7() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1257:1: ( rule__CompoundState__Group__7__Impl rule__CompoundState__Group__8 )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1258:2: rule__CompoundState__Group__7__Impl rule__CompoundState__Group__8
            {
            pushFollow(FOLLOW_rule__CompoundState__Group__7__Impl_in_rule__CompoundState__Group__72469);
            rule__CompoundState__Group__7__Impl();

            state._fsp--;

            pushFollow(FOLLOW_rule__CompoundState__Group__8_in_rule__CompoundState__Group__72472);
            rule__CompoundState__Group__8();

            state._fsp--;


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__CompoundState__Group__7"


    // $ANTLR start "rule__CompoundState__Group__7__Impl"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1265:1: rule__CompoundState__Group__7__Impl : ( ( rule__CompoundState__TransitionsAssignment_7 )* ) ;
    public final void rule__CompoundState__Group__7__Impl() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1269:1: ( ( ( rule__CompoundState__TransitionsAssignment_7 )* ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1270:1: ( ( rule__CompoundState__TransitionsAssignment_7 )* )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1270:1: ( ( rule__CompoundState__TransitionsAssignment_7 )* )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1271:1: ( rule__CompoundState__TransitionsAssignment_7 )*
            {
             before(grammarAccess.getCompoundStateAccess().getTransitionsAssignment_7()); 
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1272:1: ( rule__CompoundState__TransitionsAssignment_7 )*
            loop11:
            do {
                int alt11=2;
                int LA11_0 = input.LA(1);

                if ( (LA11_0==RULE_ID) ) {
                    alt11=1;
                }


                switch (alt11) {
            	case 1 :
            	    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1272:2: rule__CompoundState__TransitionsAssignment_7
            	    {
            	    pushFollow(FOLLOW_rule__CompoundState__TransitionsAssignment_7_in_rule__CompoundState__Group__7__Impl2499);
            	    rule__CompoundState__TransitionsAssignment_7();

            	    state._fsp--;


            	    }
            	    break;

            	default :
            	    break loop11;
                }
            } while (true);

             after(grammarAccess.getCompoundStateAccess().getTransitionsAssignment_7()); 

            }


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__CompoundState__Group__7__Impl"


    // $ANTLR start "rule__CompoundState__Group__8"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1282:1: rule__CompoundState__Group__8 : rule__CompoundState__Group__8__Impl ;
    public final void rule__CompoundState__Group__8() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1286:1: ( rule__CompoundState__Group__8__Impl )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1287:2: rule__CompoundState__Group__8__Impl
            {
            pushFollow(FOLLOW_rule__CompoundState__Group__8__Impl_in_rule__CompoundState__Group__82530);
            rule__CompoundState__Group__8__Impl();

            state._fsp--;


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__CompoundState__Group__8"


    // $ANTLR start "rule__CompoundState__Group__8__Impl"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1293:1: rule__CompoundState__Group__8__Impl : ( '}' ) ;
    public final void rule__CompoundState__Group__8__Impl() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1297:1: ( ( '}' ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1298:1: ( '}' )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1298:1: ( '}' )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1299:1: '}'
            {
             before(grammarAccess.getCompoundStateAccess().getRightCurlyBracketKeyword_8()); 
            match(input,16,FOLLOW_16_in_rule__CompoundState__Group__8__Impl2558); 
             after(grammarAccess.getCompoundStateAccess().getRightCurlyBracketKeyword_8()); 

            }


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__CompoundState__Group__8__Impl"


    // $ANTLR start "rule__Transition__Group__0"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1330:1: rule__Transition__Group__0 : rule__Transition__Group__0__Impl rule__Transition__Group__1 ;
    public final void rule__Transition__Group__0() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1334:1: ( rule__Transition__Group__0__Impl rule__Transition__Group__1 )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1335:2: rule__Transition__Group__0__Impl rule__Transition__Group__1
            {
            pushFollow(FOLLOW_rule__Transition__Group__0__Impl_in_rule__Transition__Group__02607);
            rule__Transition__Group__0__Impl();

            state._fsp--;

            pushFollow(FOLLOW_rule__Transition__Group__1_in_rule__Transition__Group__02610);
            rule__Transition__Group__1();

            state._fsp--;


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__Transition__Group__0"


    // $ANTLR start "rule__Transition__Group__0__Impl"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1342:1: rule__Transition__Group__0__Impl : ( ( rule__Transition__EventAssignment_0 ) ) ;
    public final void rule__Transition__Group__0__Impl() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1346:1: ( ( ( rule__Transition__EventAssignment_0 ) ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1347:1: ( ( rule__Transition__EventAssignment_0 ) )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1347:1: ( ( rule__Transition__EventAssignment_0 ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1348:1: ( rule__Transition__EventAssignment_0 )
            {
             before(grammarAccess.getTransitionAccess().getEventAssignment_0()); 
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1349:1: ( rule__Transition__EventAssignment_0 )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1349:2: rule__Transition__EventAssignment_0
            {
            pushFollow(FOLLOW_rule__Transition__EventAssignment_0_in_rule__Transition__Group__0__Impl2637);
            rule__Transition__EventAssignment_0();

            state._fsp--;


            }

             after(grammarAccess.getTransitionAccess().getEventAssignment_0()); 

            }


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__Transition__Group__0__Impl"


    // $ANTLR start "rule__Transition__Group__1"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1359:1: rule__Transition__Group__1 : rule__Transition__Group__1__Impl rule__Transition__Group__2 ;
    public final void rule__Transition__Group__1() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1363:1: ( rule__Transition__Group__1__Impl rule__Transition__Group__2 )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1364:2: rule__Transition__Group__1__Impl rule__Transition__Group__2
            {
            pushFollow(FOLLOW_rule__Transition__Group__1__Impl_in_rule__Transition__Group__12667);
            rule__Transition__Group__1__Impl();

            state._fsp--;

            pushFollow(FOLLOW_rule__Transition__Group__2_in_rule__Transition__Group__12670);
            rule__Transition__Group__2();

            state._fsp--;


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__Transition__Group__1"


    // $ANTLR start "rule__Transition__Group__1__Impl"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1371:1: rule__Transition__Group__1__Impl : ( '=>' ) ;
    public final void rule__Transition__Group__1__Impl() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1375:1: ( ( '=>' ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1376:1: ( '=>' )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1376:1: ( '=>' )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1377:1: '=>'
            {
             before(grammarAccess.getTransitionAccess().getEqualsSignGreaterThanSignKeyword_1()); 
            match(input,21,FOLLOW_21_in_rule__Transition__Group__1__Impl2698); 
             after(grammarAccess.getTransitionAccess().getEqualsSignGreaterThanSignKeyword_1()); 

            }


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__Transition__Group__1__Impl"


    // $ANTLR start "rule__Transition__Group__2"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1390:1: rule__Transition__Group__2 : rule__Transition__Group__2__Impl ;
    public final void rule__Transition__Group__2() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1394:1: ( rule__Transition__Group__2__Impl )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1395:2: rule__Transition__Group__2__Impl
            {
            pushFollow(FOLLOW_rule__Transition__Group__2__Impl_in_rule__Transition__Group__22729);
            rule__Transition__Group__2__Impl();

            state._fsp--;


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__Transition__Group__2"


    // $ANTLR start "rule__Transition__Group__2__Impl"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1401:1: rule__Transition__Group__2__Impl : ( ( rule__Transition__StateAssignment_2 ) ) ;
    public final void rule__Transition__Group__2__Impl() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1405:1: ( ( ( rule__Transition__StateAssignment_2 ) ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1406:1: ( ( rule__Transition__StateAssignment_2 ) )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1406:1: ( ( rule__Transition__StateAssignment_2 ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1407:1: ( rule__Transition__StateAssignment_2 )
            {
             before(grammarAccess.getTransitionAccess().getStateAssignment_2()); 
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1408:1: ( rule__Transition__StateAssignment_2 )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1408:2: rule__Transition__StateAssignment_2
            {
            pushFollow(FOLLOW_rule__Transition__StateAssignment_2_in_rule__Transition__Group__2__Impl2756);
            rule__Transition__StateAssignment_2();

            state._fsp--;


            }

             after(grammarAccess.getTransitionAccess().getStateAssignment_2()); 

            }


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__Transition__Group__2__Impl"


    // $ANTLR start "rule__Module__NameAssignment_1"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1425:1: rule__Module__NameAssignment_1 : ( RULE_STRING ) ;
    public final void rule__Module__NameAssignment_1() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1429:1: ( ( RULE_STRING ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1430:1: ( RULE_STRING )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1430:1: ( RULE_STRING )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1431:1: RULE_STRING
            {
             before(grammarAccess.getModuleAccess().getNameSTRINGTerminalRuleCall_1_0()); 
            match(input,RULE_STRING,FOLLOW_RULE_STRING_in_rule__Module__NameAssignment_12797); 
             after(grammarAccess.getModuleAccess().getNameSTRINGTerminalRuleCall_1_0()); 

            }


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__Module__NameAssignment_1"


    // $ANTLR start "rule__Module__MachinesAssignment_2"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1440:1: rule__Module__MachinesAssignment_2 : ( ruleStatemachine ) ;
    public final void rule__Module__MachinesAssignment_2() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1444:1: ( ( ruleStatemachine ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1445:1: ( ruleStatemachine )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1445:1: ( ruleStatemachine )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1446:1: ruleStatemachine
            {
             before(grammarAccess.getModuleAccess().getMachinesStatemachineParserRuleCall_2_0()); 
            pushFollow(FOLLOW_ruleStatemachine_in_rule__Module__MachinesAssignment_22828);
            ruleStatemachine();

            state._fsp--;

             after(grammarAccess.getModuleAccess().getMachinesStatemachineParserRuleCall_2_0()); 

            }


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__Module__MachinesAssignment_2"


    // $ANTLR start "rule__Statemachine__InitialAssignment_0"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1455:1: rule__Statemachine__InitialAssignment_0 : ( ( 'initial' ) ) ;
    public final void rule__Statemachine__InitialAssignment_0() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1459:1: ( ( ( 'initial' ) ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1460:1: ( ( 'initial' ) )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1460:1: ( ( 'initial' ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1461:1: ( 'initial' )
            {
             before(grammarAccess.getStatemachineAccess().getInitialInitialKeyword_0_0()); 
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1462:1: ( 'initial' )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1463:1: 'initial'
            {
             before(grammarAccess.getStatemachineAccess().getInitialInitialKeyword_0_0()); 
            match(input,22,FOLLOW_22_in_rule__Statemachine__InitialAssignment_02864); 
             after(grammarAccess.getStatemachineAccess().getInitialInitialKeyword_0_0()); 

            }

             after(grammarAccess.getStatemachineAccess().getInitialInitialKeyword_0_0()); 

            }


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__Statemachine__InitialAssignment_0"


    // $ANTLR start "rule__Statemachine__NameAssignment_2"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1478:1: rule__Statemachine__NameAssignment_2 : ( RULE_ID ) ;
    public final void rule__Statemachine__NameAssignment_2() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1482:1: ( ( RULE_ID ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1483:1: ( RULE_ID )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1483:1: ( RULE_ID )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1484:1: RULE_ID
            {
             before(grammarAccess.getStatemachineAccess().getNameIDTerminalRuleCall_2_0()); 
            match(input,RULE_ID,FOLLOW_RULE_ID_in_rule__Statemachine__NameAssignment_22903); 
             after(grammarAccess.getStatemachineAccess().getNameIDTerminalRuleCall_2_0()); 

            }


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__Statemachine__NameAssignment_2"


    // $ANTLR start "rule__Statemachine__ValueAssignment_3_1"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1493:1: rule__Statemachine__ValueAssignment_3_1 : ( RULE_INT ) ;
    public final void rule__Statemachine__ValueAssignment_3_1() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1497:1: ( ( RULE_INT ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1498:1: ( RULE_INT )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1498:1: ( RULE_INT )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1499:1: RULE_INT
            {
             before(grammarAccess.getStatemachineAccess().getValueINTTerminalRuleCall_3_1_0()); 
            match(input,RULE_INT,FOLLOW_RULE_INT_in_rule__Statemachine__ValueAssignment_3_12934); 
             after(grammarAccess.getStatemachineAccess().getValueINTTerminalRuleCall_3_1_0()); 

            }


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__Statemachine__ValueAssignment_3_1"


    // $ANTLR start "rule__Statemachine__EventsAssignment_6"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1508:1: rule__Statemachine__EventsAssignment_6 : ( ruleEvent ) ;
    public final void rule__Statemachine__EventsAssignment_6() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1512:1: ( ( ruleEvent ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1513:1: ( ruleEvent )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1513:1: ( ruleEvent )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1514:1: ruleEvent
            {
             before(grammarAccess.getStatemachineAccess().getEventsEventParserRuleCall_6_0()); 
            pushFollow(FOLLOW_ruleEvent_in_rule__Statemachine__EventsAssignment_62965);
            ruleEvent();

            state._fsp--;

             after(grammarAccess.getStatemachineAccess().getEventsEventParserRuleCall_6_0()); 

            }


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__Statemachine__EventsAssignment_6"


    // $ANTLR start "rule__Statemachine__StatesAssignment_8"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1523:1: rule__Statemachine__StatesAssignment_8 : ( ruleState ) ;
    public final void rule__Statemachine__StatesAssignment_8() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1527:1: ( ( ruleState ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1528:1: ( ruleState )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1528:1: ( ruleState )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1529:1: ruleState
            {
             before(grammarAccess.getStatemachineAccess().getStatesStateParserRuleCall_8_0()); 
            pushFollow(FOLLOW_ruleState_in_rule__Statemachine__StatesAssignment_82996);
            ruleState();

            state._fsp--;

             after(grammarAccess.getStatemachineAccess().getStatesStateParserRuleCall_8_0()); 

            }


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__Statemachine__StatesAssignment_8"


    // $ANTLR start "rule__Event__NameAssignment"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1538:1: rule__Event__NameAssignment : ( RULE_ID ) ;
    public final void rule__Event__NameAssignment() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1542:1: ( ( RULE_ID ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1543:1: ( RULE_ID )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1543:1: ( RULE_ID )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1544:1: RULE_ID
            {
             before(grammarAccess.getEventAccess().getNameIDTerminalRuleCall_0()); 
            match(input,RULE_ID,FOLLOW_RULE_ID_in_rule__Event__NameAssignment3027); 
             after(grammarAccess.getEventAccess().getNameIDTerminalRuleCall_0()); 

            }


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__Event__NameAssignment"


    // $ANTLR start "rule__SimpleState__InitialAssignment_0"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1553:1: rule__SimpleState__InitialAssignment_0 : ( ( 'initial' ) ) ;
    public final void rule__SimpleState__InitialAssignment_0() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1557:1: ( ( ( 'initial' ) ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1558:1: ( ( 'initial' ) )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1558:1: ( ( 'initial' ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1559:1: ( 'initial' )
            {
             before(grammarAccess.getSimpleStateAccess().getInitialInitialKeyword_0_0()); 
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1560:1: ( 'initial' )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1561:1: 'initial'
            {
             before(grammarAccess.getSimpleStateAccess().getInitialInitialKeyword_0_0()); 
            match(input,22,FOLLOW_22_in_rule__SimpleState__InitialAssignment_03063); 
             after(grammarAccess.getSimpleStateAccess().getInitialInitialKeyword_0_0()); 

            }

             after(grammarAccess.getSimpleStateAccess().getInitialInitialKeyword_0_0()); 

            }


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__SimpleState__InitialAssignment_0"


    // $ANTLR start "rule__SimpleState__NameAssignment_2"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1576:1: rule__SimpleState__NameAssignment_2 : ( RULE_ID ) ;
    public final void rule__SimpleState__NameAssignment_2() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1580:1: ( ( RULE_ID ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1581:1: ( RULE_ID )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1581:1: ( RULE_ID )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1582:1: RULE_ID
            {
             before(grammarAccess.getSimpleStateAccess().getNameIDTerminalRuleCall_2_0()); 
            match(input,RULE_ID,FOLLOW_RULE_ID_in_rule__SimpleState__NameAssignment_23102); 
             after(grammarAccess.getSimpleStateAccess().getNameIDTerminalRuleCall_2_0()); 

            }


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__SimpleState__NameAssignment_2"


    // $ANTLR start "rule__SimpleState__ValueAssignment_3_1"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1591:1: rule__SimpleState__ValueAssignment_3_1 : ( RULE_INT ) ;
    public final void rule__SimpleState__ValueAssignment_3_1() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1595:1: ( ( RULE_INT ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1596:1: ( RULE_INT )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1596:1: ( RULE_INT )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1597:1: RULE_INT
            {
             before(grammarAccess.getSimpleStateAccess().getValueINTTerminalRuleCall_3_1_0()); 
            match(input,RULE_INT,FOLLOW_RULE_INT_in_rule__SimpleState__ValueAssignment_3_13133); 
             after(grammarAccess.getSimpleStateAccess().getValueINTTerminalRuleCall_3_1_0()); 

            }


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__SimpleState__ValueAssignment_3_1"


    // $ANTLR start "rule__SimpleState__TransitionsAssignment_5"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1606:1: rule__SimpleState__TransitionsAssignment_5 : ( ruleTransition ) ;
    public final void rule__SimpleState__TransitionsAssignment_5() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1610:1: ( ( ruleTransition ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1611:1: ( ruleTransition )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1611:1: ( ruleTransition )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1612:1: ruleTransition
            {
             before(grammarAccess.getSimpleStateAccess().getTransitionsTransitionParserRuleCall_5_0()); 
            pushFollow(FOLLOW_ruleTransition_in_rule__SimpleState__TransitionsAssignment_53164);
            ruleTransition();

            state._fsp--;

             after(grammarAccess.getSimpleStateAccess().getTransitionsTransitionParserRuleCall_5_0()); 

            }


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__SimpleState__TransitionsAssignment_5"


    // $ANTLR start "rule__CompoundState__InitialAssignment_1"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1621:1: rule__CompoundState__InitialAssignment_1 : ( ( 'initial' ) ) ;
    public final void rule__CompoundState__InitialAssignment_1() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1625:1: ( ( ( 'initial' ) ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1626:1: ( ( 'initial' ) )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1626:1: ( ( 'initial' ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1627:1: ( 'initial' )
            {
             before(grammarAccess.getCompoundStateAccess().getInitialInitialKeyword_1_0()); 
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1628:1: ( 'initial' )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1629:1: 'initial'
            {
             before(grammarAccess.getCompoundStateAccess().getInitialInitialKeyword_1_0()); 
            match(input,22,FOLLOW_22_in_rule__CompoundState__InitialAssignment_13200); 
             after(grammarAccess.getCompoundStateAccess().getInitialInitialKeyword_1_0()); 

            }

             after(grammarAccess.getCompoundStateAccess().getInitialInitialKeyword_1_0()); 

            }


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__CompoundState__InitialAssignment_1"


    // $ANTLR start "rule__CompoundState__NameAssignment_3"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1644:1: rule__CompoundState__NameAssignment_3 : ( RULE_ID ) ;
    public final void rule__CompoundState__NameAssignment_3() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1648:1: ( ( RULE_ID ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1649:1: ( RULE_ID )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1649:1: ( RULE_ID )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1650:1: RULE_ID
            {
             before(grammarAccess.getCompoundStateAccess().getNameIDTerminalRuleCall_3_0()); 
            match(input,RULE_ID,FOLLOW_RULE_ID_in_rule__CompoundState__NameAssignment_33239); 
             after(grammarAccess.getCompoundStateAccess().getNameIDTerminalRuleCall_3_0()); 

            }


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__CompoundState__NameAssignment_3"


    // $ANTLR start "rule__CompoundState__MachineAssignment_5"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1659:1: rule__CompoundState__MachineAssignment_5 : ( ( RULE_ID ) ) ;
    public final void rule__CompoundState__MachineAssignment_5() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1663:1: ( ( ( RULE_ID ) ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1664:1: ( ( RULE_ID ) )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1664:1: ( ( RULE_ID ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1665:1: ( RULE_ID )
            {
             before(grammarAccess.getCompoundStateAccess().getMachineStatemachineCrossReference_5_0()); 
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1666:1: ( RULE_ID )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1667:1: RULE_ID
            {
             before(grammarAccess.getCompoundStateAccess().getMachineStatemachineIDTerminalRuleCall_5_0_1()); 
            match(input,RULE_ID,FOLLOW_RULE_ID_in_rule__CompoundState__MachineAssignment_53274); 
             after(grammarAccess.getCompoundStateAccess().getMachineStatemachineIDTerminalRuleCall_5_0_1()); 

            }

             after(grammarAccess.getCompoundStateAccess().getMachineStatemachineCrossReference_5_0()); 

            }


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__CompoundState__MachineAssignment_5"


    // $ANTLR start "rule__CompoundState__TransitionsAssignment_7"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1678:1: rule__CompoundState__TransitionsAssignment_7 : ( ruleTransition ) ;
    public final void rule__CompoundState__TransitionsAssignment_7() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1682:1: ( ( ruleTransition ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1683:1: ( ruleTransition )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1683:1: ( ruleTransition )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1684:1: ruleTransition
            {
             before(grammarAccess.getCompoundStateAccess().getTransitionsTransitionParserRuleCall_7_0()); 
            pushFollow(FOLLOW_ruleTransition_in_rule__CompoundState__TransitionsAssignment_73309);
            ruleTransition();

            state._fsp--;

             after(grammarAccess.getCompoundStateAccess().getTransitionsTransitionParserRuleCall_7_0()); 

            }


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__CompoundState__TransitionsAssignment_7"


    // $ANTLR start "rule__Transition__EventAssignment_0"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1693:1: rule__Transition__EventAssignment_0 : ( ( RULE_ID ) ) ;
    public final void rule__Transition__EventAssignment_0() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1697:1: ( ( ( RULE_ID ) ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1698:1: ( ( RULE_ID ) )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1698:1: ( ( RULE_ID ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1699:1: ( RULE_ID )
            {
             before(grammarAccess.getTransitionAccess().getEventEventCrossReference_0_0()); 
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1700:1: ( RULE_ID )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1701:1: RULE_ID
            {
             before(grammarAccess.getTransitionAccess().getEventEventIDTerminalRuleCall_0_0_1()); 
            match(input,RULE_ID,FOLLOW_RULE_ID_in_rule__Transition__EventAssignment_03344); 
             after(grammarAccess.getTransitionAccess().getEventEventIDTerminalRuleCall_0_0_1()); 

            }

             after(grammarAccess.getTransitionAccess().getEventEventCrossReference_0_0()); 

            }


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__Transition__EventAssignment_0"


    // $ANTLR start "rule__Transition__StateAssignment_2"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1712:1: rule__Transition__StateAssignment_2 : ( ( RULE_ID ) ) ;
    public final void rule__Transition__StateAssignment_2() throws RecognitionException {

        		int stackSize = keepStackSize();
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1716:1: ( ( ( RULE_ID ) ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1717:1: ( ( RULE_ID ) )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1717:1: ( ( RULE_ID ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1718:1: ( RULE_ID )
            {
             before(grammarAccess.getTransitionAccess().getStateStateCrossReference_2_0()); 
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1719:1: ( RULE_ID )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates.ui/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/ui/contentassist/antlr/internal/InternalOCLStates.g:1720:1: RULE_ID
            {
             before(grammarAccess.getTransitionAccess().getStateStateIDTerminalRuleCall_2_0_1()); 
            match(input,RULE_ID,FOLLOW_RULE_ID_in_rule__Transition__StateAssignment_23383); 
             after(grammarAccess.getTransitionAccess().getStateStateIDTerminalRuleCall_2_0_1()); 

            }

             after(grammarAccess.getTransitionAccess().getStateStateCrossReference_2_0()); 

            }


            }

        }
        catch (RecognitionException re) {
            reportError(re);
            recover(input,re);
        }
        finally {

            	restoreStackSize(stackSize);

        }
        return ;
    }
    // $ANTLR end "rule__Transition__StateAssignment_2"

    // Delegated rules


 

    public static final BitSet FOLLOW_ruleModule_in_entryRuleModule61 = new BitSet(new long[]{0x0000000000000000L});
    public static final BitSet FOLLOW_EOF_in_entryRuleModule68 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_rule__Module__Group__0_in_ruleModule94 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_ruleStatemachine_in_entryRuleStatemachine121 = new BitSet(new long[]{0x0000000000000000L});
    public static final BitSet FOLLOW_EOF_in_entryRuleStatemachine128 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_rule__Statemachine__Group__0_in_ruleStatemachine154 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_ruleEvent_in_entryRuleEvent181 = new BitSet(new long[]{0x0000000000000000L});
    public static final BitSet FOLLOW_EOF_in_entryRuleEvent188 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_rule__Event__NameAssignment_in_ruleEvent214 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_ruleState_in_entryRuleState241 = new BitSet(new long[]{0x0000000000000000L});
    public static final BitSet FOLLOW_EOF_in_entryRuleState248 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_rule__State__Alternatives_in_ruleState274 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_ruleSimpleState_in_entryRuleSimpleState301 = new BitSet(new long[]{0x0000000000000000L});
    public static final BitSet FOLLOW_EOF_in_entryRuleSimpleState308 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_rule__SimpleState__Group__0_in_ruleSimpleState334 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_ruleCompoundState_in_entryRuleCompoundState361 = new BitSet(new long[]{0x0000000000000000L});
    public static final BitSet FOLLOW_EOF_in_entryRuleCompoundState368 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_rule__CompoundState__Group__0_in_ruleCompoundState394 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_ruleTransition_in_entryRuleTransition421 = new BitSet(new long[]{0x0000000000000000L});
    public static final BitSet FOLLOW_EOF_in_entryRuleTransition428 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_rule__Transition__Group__0_in_ruleTransition454 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_ruleSimpleState_in_rule__State__Alternatives490 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_ruleCompoundState_in_rule__State__Alternatives507 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_rule__Module__Group__0__Impl_in_rule__Module__Group__0537 = new BitSet(new long[]{0x0000000000000010L});
    public static final BitSet FOLLOW_rule__Module__Group__1_in_rule__Module__Group__0540 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_11_in_rule__Module__Group__0__Impl568 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_rule__Module__Group__1__Impl_in_rule__Module__Group__1599 = new BitSet(new long[]{0x0000000000401000L});
    public static final BitSet FOLLOW_rule__Module__Group__2_in_rule__Module__Group__1602 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_rule__Module__NameAssignment_1_in_rule__Module__Group__1__Impl629 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_rule__Module__Group__2__Impl_in_rule__Module__Group__2659 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_rule__Module__MachinesAssignment_2_in_rule__Module__Group__2__Impl686 = new BitSet(new long[]{0x0000000000401002L});
    public static final BitSet FOLLOW_rule__Statemachine__Group__0__Impl_in_rule__Statemachine__Group__0723 = new BitSet(new long[]{0x0000000000401000L});
    public static final BitSet FOLLOW_rule__Statemachine__Group__1_in_rule__Statemachine__Group__0726 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_rule__Statemachine__InitialAssignment_0_in_rule__Statemachine__Group__0__Impl753 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_rule__Statemachine__Group__1__Impl_in_rule__Statemachine__Group__1784 = new BitSet(new long[]{0x0000000000000020L});
    public static final BitSet FOLLOW_rule__Statemachine__Group__2_in_rule__Statemachine__Group__1787 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_12_in_rule__Statemachine__Group__1__Impl815 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_rule__Statemachine__Group__2__Impl_in_rule__Statemachine__Group__2846 = new BitSet(new long[]{0x0000000000022000L});
    public static final BitSet FOLLOW_rule__Statemachine__Group__3_in_rule__Statemachine__Group__2849 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_rule__Statemachine__NameAssignment_2_in_rule__Statemachine__Group__2__Impl876 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_rule__Statemachine__Group__3__Impl_in_rule__Statemachine__Group__3906 = new BitSet(new long[]{0x0000000000022000L});
    public static final BitSet FOLLOW_rule__Statemachine__Group__4_in_rule__Statemachine__Group__3909 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_rule__Statemachine__Group_3__0_in_rule__Statemachine__Group__3__Impl936 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_rule__Statemachine__Group__4__Impl_in_rule__Statemachine__Group__4967 = new BitSet(new long[]{0x0000000000004000L});
    public static final BitSet FOLLOW_rule__Statemachine__Group__5_in_rule__Statemachine__Group__4970 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_13_in_rule__Statemachine__Group__4__Impl998 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_rule__Statemachine__Group__5__Impl_in_rule__Statemachine__Group__51029 = new BitSet(new long[]{0x0000000000008020L});
    public static final BitSet FOLLOW_rule__Statemachine__Group__6_in_rule__Statemachine__Group__51032 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_14_in_rule__Statemachine__Group__5__Impl1060 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_rule__Statemachine__Group__6__Impl_in_rule__Statemachine__Group__61091 = new BitSet(new long[]{0x0000000000008020L});
    public static final BitSet FOLLOW_rule__Statemachine__Group__7_in_rule__Statemachine__Group__61094 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_rule__Statemachine__EventsAssignment_6_in_rule__Statemachine__Group__6__Impl1121 = new BitSet(new long[]{0x0000000000000022L});
    public static final BitSet FOLLOW_rule__Statemachine__Group__7__Impl_in_rule__Statemachine__Group__71152 = new BitSet(new long[]{0x00000000004D0000L});
    public static final BitSet FOLLOW_rule__Statemachine__Group__8_in_rule__Statemachine__Group__71155 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_15_in_rule__Statemachine__Group__7__Impl1183 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_rule__Statemachine__Group__8__Impl_in_rule__Statemachine__Group__81214 = new BitSet(new long[]{0x00000000004D0000L});
    public static final BitSet FOLLOW_rule__Statemachine__Group__9_in_rule__Statemachine__Group__81217 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_rule__Statemachine__StatesAssignment_8_in_rule__Statemachine__Group__8__Impl1244 = new BitSet(new long[]{0x00000000004C0002L});
    public static final BitSet FOLLOW_rule__Statemachine__Group__9__Impl_in_rule__Statemachine__Group__91275 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_16_in_rule__Statemachine__Group__9__Impl1303 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_rule__Statemachine__Group_3__0__Impl_in_rule__Statemachine__Group_3__01354 = new BitSet(new long[]{0x0000000000000040L});
    public static final BitSet FOLLOW_rule__Statemachine__Group_3__1_in_rule__Statemachine__Group_3__01357 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_17_in_rule__Statemachine__Group_3__0__Impl1385 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_rule__Statemachine__Group_3__1__Impl_in_rule__Statemachine__Group_3__11416 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_rule__Statemachine__ValueAssignment_3_1_in_rule__Statemachine__Group_3__1__Impl1443 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_rule__SimpleState__Group__0__Impl_in_rule__SimpleState__Group__01477 = new BitSet(new long[]{0x0000000000440000L});
    public static final BitSet FOLLOW_rule__SimpleState__Group__1_in_rule__SimpleState__Group__01480 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_rule__SimpleState__InitialAssignment_0_in_rule__SimpleState__Group__0__Impl1507 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_rule__SimpleState__Group__1__Impl_in_rule__SimpleState__Group__11538 = new BitSet(new long[]{0x0000000000000020L});
    public static final BitSet FOLLOW_rule__SimpleState__Group__2_in_rule__SimpleState__Group__11541 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_18_in_rule__SimpleState__Group__1__Impl1569 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_rule__SimpleState__Group__2__Impl_in_rule__SimpleState__Group__21600 = new BitSet(new long[]{0x0000000000022000L});
    public static final BitSet FOLLOW_rule__SimpleState__Group__3_in_rule__SimpleState__Group__21603 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_rule__SimpleState__NameAssignment_2_in_rule__SimpleState__Group__2__Impl1630 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_rule__SimpleState__Group__3__Impl_in_rule__SimpleState__Group__31660 = new BitSet(new long[]{0x0000000000022000L});
    public static final BitSet FOLLOW_rule__SimpleState__Group__4_in_rule__SimpleState__Group__31663 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_rule__SimpleState__Group_3__0_in_rule__SimpleState__Group__3__Impl1690 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_rule__SimpleState__Group__4__Impl_in_rule__SimpleState__Group__41721 = new BitSet(new long[]{0x0000000000010020L});
    public static final BitSet FOLLOW_rule__SimpleState__Group__5_in_rule__SimpleState__Group__41724 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_13_in_rule__SimpleState__Group__4__Impl1752 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_rule__SimpleState__Group__5__Impl_in_rule__SimpleState__Group__51783 = new BitSet(new long[]{0x0000000000010020L});
    public static final BitSet FOLLOW_rule__SimpleState__Group__6_in_rule__SimpleState__Group__51786 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_rule__SimpleState__TransitionsAssignment_5_in_rule__SimpleState__Group__5__Impl1813 = new BitSet(new long[]{0x0000000000000022L});
    public static final BitSet FOLLOW_rule__SimpleState__Group__6__Impl_in_rule__SimpleState__Group__61844 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_16_in_rule__SimpleState__Group__6__Impl1872 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_rule__SimpleState__Group_3__0__Impl_in_rule__SimpleState__Group_3__01917 = new BitSet(new long[]{0x0000000000000040L});
    public static final BitSet FOLLOW_rule__SimpleState__Group_3__1_in_rule__SimpleState__Group_3__01920 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_17_in_rule__SimpleState__Group_3__0__Impl1948 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_rule__SimpleState__Group_3__1__Impl_in_rule__SimpleState__Group_3__11979 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_rule__SimpleState__ValueAssignment_3_1_in_rule__SimpleState__Group_3__1__Impl2006 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_rule__CompoundState__Group__0__Impl_in_rule__CompoundState__Group__02040 = new BitSet(new long[]{0x0000000000440000L});
    public static final BitSet FOLLOW_rule__CompoundState__Group__1_in_rule__CompoundState__Group__02043 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_19_in_rule__CompoundState__Group__0__Impl2071 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_rule__CompoundState__Group__1__Impl_in_rule__CompoundState__Group__12102 = new BitSet(new long[]{0x0000000000440000L});
    public static final BitSet FOLLOW_rule__CompoundState__Group__2_in_rule__CompoundState__Group__12105 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_rule__CompoundState__InitialAssignment_1_in_rule__CompoundState__Group__1__Impl2132 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_rule__CompoundState__Group__2__Impl_in_rule__CompoundState__Group__22163 = new BitSet(new long[]{0x0000000000000020L});
    public static final BitSet FOLLOW_rule__CompoundState__Group__3_in_rule__CompoundState__Group__22166 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_18_in_rule__CompoundState__Group__2__Impl2194 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_rule__CompoundState__Group__3__Impl_in_rule__CompoundState__Group__32225 = new BitSet(new long[]{0x0000000000100000L});
    public static final BitSet FOLLOW_rule__CompoundState__Group__4_in_rule__CompoundState__Group__32228 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_rule__CompoundState__NameAssignment_3_in_rule__CompoundState__Group__3__Impl2255 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_rule__CompoundState__Group__4__Impl_in_rule__CompoundState__Group__42285 = new BitSet(new long[]{0x0000000000000020L});
    public static final BitSet FOLLOW_rule__CompoundState__Group__5_in_rule__CompoundState__Group__42288 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_20_in_rule__CompoundState__Group__4__Impl2316 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_rule__CompoundState__Group__5__Impl_in_rule__CompoundState__Group__52347 = new BitSet(new long[]{0x0000000000002000L});
    public static final BitSet FOLLOW_rule__CompoundState__Group__6_in_rule__CompoundState__Group__52350 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_rule__CompoundState__MachineAssignment_5_in_rule__CompoundState__Group__5__Impl2377 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_rule__CompoundState__Group__6__Impl_in_rule__CompoundState__Group__62407 = new BitSet(new long[]{0x0000000000010020L});
    public static final BitSet FOLLOW_rule__CompoundState__Group__7_in_rule__CompoundState__Group__62410 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_13_in_rule__CompoundState__Group__6__Impl2438 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_rule__CompoundState__Group__7__Impl_in_rule__CompoundState__Group__72469 = new BitSet(new long[]{0x0000000000010020L});
    public static final BitSet FOLLOW_rule__CompoundState__Group__8_in_rule__CompoundState__Group__72472 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_rule__CompoundState__TransitionsAssignment_7_in_rule__CompoundState__Group__7__Impl2499 = new BitSet(new long[]{0x0000000000000022L});
    public static final BitSet FOLLOW_rule__CompoundState__Group__8__Impl_in_rule__CompoundState__Group__82530 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_16_in_rule__CompoundState__Group__8__Impl2558 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_rule__Transition__Group__0__Impl_in_rule__Transition__Group__02607 = new BitSet(new long[]{0x0000000000200000L});
    public static final BitSet FOLLOW_rule__Transition__Group__1_in_rule__Transition__Group__02610 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_rule__Transition__EventAssignment_0_in_rule__Transition__Group__0__Impl2637 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_rule__Transition__Group__1__Impl_in_rule__Transition__Group__12667 = new BitSet(new long[]{0x0000000000000020L});
    public static final BitSet FOLLOW_rule__Transition__Group__2_in_rule__Transition__Group__12670 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_21_in_rule__Transition__Group__1__Impl2698 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_rule__Transition__Group__2__Impl_in_rule__Transition__Group__22729 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_rule__Transition__StateAssignment_2_in_rule__Transition__Group__2__Impl2756 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_RULE_STRING_in_rule__Module__NameAssignment_12797 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_ruleStatemachine_in_rule__Module__MachinesAssignment_22828 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_22_in_rule__Statemachine__InitialAssignment_02864 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_RULE_ID_in_rule__Statemachine__NameAssignment_22903 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_RULE_INT_in_rule__Statemachine__ValueAssignment_3_12934 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_ruleEvent_in_rule__Statemachine__EventsAssignment_62965 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_ruleState_in_rule__Statemachine__StatesAssignment_82996 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_RULE_ID_in_rule__Event__NameAssignment3027 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_22_in_rule__SimpleState__InitialAssignment_03063 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_RULE_ID_in_rule__SimpleState__NameAssignment_23102 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_RULE_INT_in_rule__SimpleState__ValueAssignment_3_13133 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_ruleTransition_in_rule__SimpleState__TransitionsAssignment_53164 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_22_in_rule__CompoundState__InitialAssignment_13200 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_RULE_ID_in_rule__CompoundState__NameAssignment_33239 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_RULE_ID_in_rule__CompoundState__MachineAssignment_53274 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_ruleTransition_in_rule__CompoundState__TransitionsAssignment_73309 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_RULE_ID_in_rule__Transition__EventAssignment_03344 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_RULE_ID_in_rule__Transition__StateAssignment_23383 = new BitSet(new long[]{0x0000000000000002L});

}
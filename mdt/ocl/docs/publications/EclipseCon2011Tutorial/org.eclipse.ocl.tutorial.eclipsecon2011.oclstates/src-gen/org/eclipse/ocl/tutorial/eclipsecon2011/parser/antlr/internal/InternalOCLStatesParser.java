package org.eclipse.ocl.tutorial.eclipsecon2011.parser.antlr.internal; 

import org.eclipse.xtext.*;
import org.eclipse.xtext.parser.*;
import org.eclipse.xtext.parser.impl.*;
import org.eclipse.emf.ecore.util.EcoreUtil;
import org.eclipse.emf.ecore.EObject;
import org.eclipse.xtext.parser.antlr.AbstractInternalAntlrParser;
import org.eclipse.xtext.parser.antlr.XtextTokenStream;
import org.eclipse.xtext.parser.antlr.XtextTokenStream.HiddenTokens;
import org.eclipse.xtext.parser.antlr.AntlrDatatypeRuleToken;
import org.eclipse.ocl.tutorial.eclipsecon2011.services.OCLStatesGrammarAccess;



import org.antlr.runtime.*;
import java.util.Stack;
import java.util.List;
import java.util.ArrayList;

@SuppressWarnings("all")
public class InternalOCLStatesParser extends AbstractInternalAntlrParser {
    public static final String[] tokenNames = new String[] {
        "<invalid>", "<EOR>", "<DOWN>", "<UP>", "RULE_STRING", "RULE_ID", "RULE_INT", "RULE_ML_COMMENT", "RULE_SL_COMMENT", "RULE_WS", "RULE_ANY_OTHER", "'module'", "'initial'", "'statemachine'", "'value'", "'{'", "'events'", "';'", "'}'", "'state'", "'compound'", "'machine'", "'=>'"
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
    public String getGrammarFileName() { return "../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g"; }



     	private OCLStatesGrammarAccess grammarAccess;
     	
        public InternalOCLStatesParser(TokenStream input, OCLStatesGrammarAccess grammarAccess) {
            this(input);
            this.grammarAccess = grammarAccess;
            registerRules(grammarAccess.getGrammar());
        }
        
        @Override
        protected String getFirstRuleName() {
        	return "Module";	
       	}
       	
       	@Override
       	protected OCLStatesGrammarAccess getGrammarAccess() {
       		return grammarAccess;
       	}



    // $ANTLR start "entryRuleModule"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:67:1: entryRuleModule returns [EObject current=null] : iv_ruleModule= ruleModule EOF ;
    public final EObject entryRuleModule() throws RecognitionException {
        EObject current = null;

        EObject iv_ruleModule = null;


        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:68:2: (iv_ruleModule= ruleModule EOF )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:69:2: iv_ruleModule= ruleModule EOF
            {
             newCompositeNode(grammarAccess.getModuleRule()); 
            pushFollow(FOLLOW_ruleModule_in_entryRuleModule75);
            iv_ruleModule=ruleModule();

            state._fsp--;

             current =iv_ruleModule; 
            match(input,EOF,FOLLOW_EOF_in_entryRuleModule85); 

            }

        }
         
            catch (RecognitionException re) { 
                recover(input,re); 
                appendSkippedTokens();
            } 
        finally {
        }
        return current;
    }
    // $ANTLR end "entryRuleModule"


    // $ANTLR start "ruleModule"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:76:1: ruleModule returns [EObject current=null] : (otherlv_0= 'module' ( (lv_name_1_0= RULE_STRING ) ) ( (lv_machines_2_0= ruleStatemachine ) )* ) ;
    public final EObject ruleModule() throws RecognitionException {
        EObject current = null;

        Token otherlv_0=null;
        Token lv_name_1_0=null;
        EObject lv_machines_2_0 = null;


         enterRule(); 
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:79:28: ( (otherlv_0= 'module' ( (lv_name_1_0= RULE_STRING ) ) ( (lv_machines_2_0= ruleStatemachine ) )* ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:80:1: (otherlv_0= 'module' ( (lv_name_1_0= RULE_STRING ) ) ( (lv_machines_2_0= ruleStatemachine ) )* )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:80:1: (otherlv_0= 'module' ( (lv_name_1_0= RULE_STRING ) ) ( (lv_machines_2_0= ruleStatemachine ) )* )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:80:3: otherlv_0= 'module' ( (lv_name_1_0= RULE_STRING ) ) ( (lv_machines_2_0= ruleStatemachine ) )*
            {
            otherlv_0=(Token)match(input,11,FOLLOW_11_in_ruleModule122); 

                	newLeafNode(otherlv_0, grammarAccess.getModuleAccess().getModuleKeyword_0());
                
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:84:1: ( (lv_name_1_0= RULE_STRING ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:85:1: (lv_name_1_0= RULE_STRING )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:85:1: (lv_name_1_0= RULE_STRING )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:86:3: lv_name_1_0= RULE_STRING
            {
            lv_name_1_0=(Token)match(input,RULE_STRING,FOLLOW_RULE_STRING_in_ruleModule139); 

            			newLeafNode(lv_name_1_0, grammarAccess.getModuleAccess().getNameSTRINGTerminalRuleCall_1_0()); 
            		

            	        if (current==null) {
            	            current = createModelElement(grammarAccess.getModuleRule());
            	        }
                   		setWithLastConsumed(
                   			current, 
                   			"name",
                    		lv_name_1_0, 
                    		"STRING");
            	    

            }


            }

            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:102:2: ( (lv_machines_2_0= ruleStatemachine ) )*
            loop1:
            do {
                int alt1=2;
                int LA1_0 = input.LA(1);

                if ( ((LA1_0>=12 && LA1_0<=13)) ) {
                    alt1=1;
                }


                switch (alt1) {
            	case 1 :
            	    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:103:1: (lv_machines_2_0= ruleStatemachine )
            	    {
            	    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:103:1: (lv_machines_2_0= ruleStatemachine )
            	    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:104:3: lv_machines_2_0= ruleStatemachine
            	    {
            	     
            	    	        newCompositeNode(grammarAccess.getModuleAccess().getMachinesStatemachineParserRuleCall_2_0()); 
            	    	    
            	    pushFollow(FOLLOW_ruleStatemachine_in_ruleModule165);
            	    lv_machines_2_0=ruleStatemachine();

            	    state._fsp--;


            	    	        if (current==null) {
            	    	            current = createModelElementForParent(grammarAccess.getModuleRule());
            	    	        }
            	           		add(
            	           			current, 
            	           			"machines",
            	            		lv_machines_2_0, 
            	            		"Statemachine");
            	    	        afterParserOrEnumRuleCall();
            	    	    

            	    }


            	    }
            	    break;

            	default :
            	    break loop1;
                }
            } while (true);


            }


            }

             leaveRule(); 
        }
         
            catch (RecognitionException re) { 
                recover(input,re); 
                appendSkippedTokens();
            } 
        finally {
        }
        return current;
    }
    // $ANTLR end "ruleModule"


    // $ANTLR start "entryRuleStatemachine"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:128:1: entryRuleStatemachine returns [EObject current=null] : iv_ruleStatemachine= ruleStatemachine EOF ;
    public final EObject entryRuleStatemachine() throws RecognitionException {
        EObject current = null;

        EObject iv_ruleStatemachine = null;


        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:129:2: (iv_ruleStatemachine= ruleStatemachine EOF )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:130:2: iv_ruleStatemachine= ruleStatemachine EOF
            {
             newCompositeNode(grammarAccess.getStatemachineRule()); 
            pushFollow(FOLLOW_ruleStatemachine_in_entryRuleStatemachine202);
            iv_ruleStatemachine=ruleStatemachine();

            state._fsp--;

             current =iv_ruleStatemachine; 
            match(input,EOF,FOLLOW_EOF_in_entryRuleStatemachine212); 

            }

        }
         
            catch (RecognitionException re) { 
                recover(input,re); 
                appendSkippedTokens();
            } 
        finally {
        }
        return current;
    }
    // $ANTLR end "entryRuleStatemachine"


    // $ANTLR start "ruleStatemachine"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:137:1: ruleStatemachine returns [EObject current=null] : ( ( (lv_initial_0_0= 'initial' ) )? otherlv_1= 'statemachine' ( (lv_name_2_0= RULE_ID ) ) (otherlv_3= 'value' ( (lv_value_4_0= RULE_INT ) ) )? otherlv_5= '{' otherlv_6= 'events' ( (lv_events_7_0= ruleEvent ) )* otherlv_8= ';' ( (lv_states_9_0= ruleState ) )* otherlv_10= '}' ) ;
    public final EObject ruleStatemachine() throws RecognitionException {
        EObject current = null;

        Token lv_initial_0_0=null;
        Token otherlv_1=null;
        Token lv_name_2_0=null;
        Token otherlv_3=null;
        Token lv_value_4_0=null;
        Token otherlv_5=null;
        Token otherlv_6=null;
        Token otherlv_8=null;
        Token otherlv_10=null;
        EObject lv_events_7_0 = null;

        EObject lv_states_9_0 = null;


         enterRule(); 
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:140:28: ( ( ( (lv_initial_0_0= 'initial' ) )? otherlv_1= 'statemachine' ( (lv_name_2_0= RULE_ID ) ) (otherlv_3= 'value' ( (lv_value_4_0= RULE_INT ) ) )? otherlv_5= '{' otherlv_6= 'events' ( (lv_events_7_0= ruleEvent ) )* otherlv_8= ';' ( (lv_states_9_0= ruleState ) )* otherlv_10= '}' ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:141:1: ( ( (lv_initial_0_0= 'initial' ) )? otherlv_1= 'statemachine' ( (lv_name_2_0= RULE_ID ) ) (otherlv_3= 'value' ( (lv_value_4_0= RULE_INT ) ) )? otherlv_5= '{' otherlv_6= 'events' ( (lv_events_7_0= ruleEvent ) )* otherlv_8= ';' ( (lv_states_9_0= ruleState ) )* otherlv_10= '}' )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:141:1: ( ( (lv_initial_0_0= 'initial' ) )? otherlv_1= 'statemachine' ( (lv_name_2_0= RULE_ID ) ) (otherlv_3= 'value' ( (lv_value_4_0= RULE_INT ) ) )? otherlv_5= '{' otherlv_6= 'events' ( (lv_events_7_0= ruleEvent ) )* otherlv_8= ';' ( (lv_states_9_0= ruleState ) )* otherlv_10= '}' )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:141:2: ( (lv_initial_0_0= 'initial' ) )? otherlv_1= 'statemachine' ( (lv_name_2_0= RULE_ID ) ) (otherlv_3= 'value' ( (lv_value_4_0= RULE_INT ) ) )? otherlv_5= '{' otherlv_6= 'events' ( (lv_events_7_0= ruleEvent ) )* otherlv_8= ';' ( (lv_states_9_0= ruleState ) )* otherlv_10= '}'
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:141:2: ( (lv_initial_0_0= 'initial' ) )?
            int alt2=2;
            int LA2_0 = input.LA(1);

            if ( (LA2_0==12) ) {
                alt2=1;
            }
            switch (alt2) {
                case 1 :
                    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:142:1: (lv_initial_0_0= 'initial' )
                    {
                    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:142:1: (lv_initial_0_0= 'initial' )
                    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:143:3: lv_initial_0_0= 'initial'
                    {
                    lv_initial_0_0=(Token)match(input,12,FOLLOW_12_in_ruleStatemachine255); 

                            newLeafNode(lv_initial_0_0, grammarAccess.getStatemachineAccess().getInitialInitialKeyword_0_0());
                        

                    	        if (current==null) {
                    	            current = createModelElement(grammarAccess.getStatemachineRule());
                    	        }
                           		setWithLastConsumed(current, "initial", true, "initial");
                    	    

                    }


                    }
                    break;

            }

            otherlv_1=(Token)match(input,13,FOLLOW_13_in_ruleStatemachine281); 

                	newLeafNode(otherlv_1, grammarAccess.getStatemachineAccess().getStatemachineKeyword_1());
                
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:160:1: ( (lv_name_2_0= RULE_ID ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:161:1: (lv_name_2_0= RULE_ID )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:161:1: (lv_name_2_0= RULE_ID )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:162:3: lv_name_2_0= RULE_ID
            {
            lv_name_2_0=(Token)match(input,RULE_ID,FOLLOW_RULE_ID_in_ruleStatemachine298); 

            			newLeafNode(lv_name_2_0, grammarAccess.getStatemachineAccess().getNameIDTerminalRuleCall_2_0()); 
            		

            	        if (current==null) {
            	            current = createModelElement(grammarAccess.getStatemachineRule());
            	        }
                   		setWithLastConsumed(
                   			current, 
                   			"name",
                    		lv_name_2_0, 
                    		"ID");
            	    

            }


            }

            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:178:2: (otherlv_3= 'value' ( (lv_value_4_0= RULE_INT ) ) )?
            int alt3=2;
            int LA3_0 = input.LA(1);

            if ( (LA3_0==14) ) {
                alt3=1;
            }
            switch (alt3) {
                case 1 :
                    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:178:4: otherlv_3= 'value' ( (lv_value_4_0= RULE_INT ) )
                    {
                    otherlv_3=(Token)match(input,14,FOLLOW_14_in_ruleStatemachine316); 

                        	newLeafNode(otherlv_3, grammarAccess.getStatemachineAccess().getValueKeyword_3_0());
                        
                    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:182:1: ( (lv_value_4_0= RULE_INT ) )
                    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:183:1: (lv_value_4_0= RULE_INT )
                    {
                    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:183:1: (lv_value_4_0= RULE_INT )
                    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:184:3: lv_value_4_0= RULE_INT
                    {
                    lv_value_4_0=(Token)match(input,RULE_INT,FOLLOW_RULE_INT_in_ruleStatemachine333); 

                    			newLeafNode(lv_value_4_0, grammarAccess.getStatemachineAccess().getValueINTTerminalRuleCall_3_1_0()); 
                    		

                    	        if (current==null) {
                    	            current = createModelElement(grammarAccess.getStatemachineRule());
                    	        }
                           		setWithLastConsumed(
                           			current, 
                           			"value",
                            		lv_value_4_0, 
                            		"INT");
                    	    

                    }


                    }


                    }
                    break;

            }

            otherlv_5=(Token)match(input,15,FOLLOW_15_in_ruleStatemachine352); 

                	newLeafNode(otherlv_5, grammarAccess.getStatemachineAccess().getLeftCurlyBracketKeyword_4());
                
            otherlv_6=(Token)match(input,16,FOLLOW_16_in_ruleStatemachine364); 

                	newLeafNode(otherlv_6, grammarAccess.getStatemachineAccess().getEventsKeyword_5());
                
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:208:1: ( (lv_events_7_0= ruleEvent ) )*
            loop4:
            do {
                int alt4=2;
                int LA4_0 = input.LA(1);

                if ( (LA4_0==RULE_ID) ) {
                    alt4=1;
                }


                switch (alt4) {
            	case 1 :
            	    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:209:1: (lv_events_7_0= ruleEvent )
            	    {
            	    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:209:1: (lv_events_7_0= ruleEvent )
            	    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:210:3: lv_events_7_0= ruleEvent
            	    {
            	     
            	    	        newCompositeNode(grammarAccess.getStatemachineAccess().getEventsEventParserRuleCall_6_0()); 
            	    	    
            	    pushFollow(FOLLOW_ruleEvent_in_ruleStatemachine385);
            	    lv_events_7_0=ruleEvent();

            	    state._fsp--;


            	    	        if (current==null) {
            	    	            current = createModelElementForParent(grammarAccess.getStatemachineRule());
            	    	        }
            	           		add(
            	           			current, 
            	           			"events",
            	            		lv_events_7_0, 
            	            		"Event");
            	    	        afterParserOrEnumRuleCall();
            	    	    

            	    }


            	    }
            	    break;

            	default :
            	    break loop4;
                }
            } while (true);

            otherlv_8=(Token)match(input,17,FOLLOW_17_in_ruleStatemachine398); 

                	newLeafNode(otherlv_8, grammarAccess.getStatemachineAccess().getSemicolonKeyword_7());
                
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:230:1: ( (lv_states_9_0= ruleState ) )*
            loop5:
            do {
                int alt5=2;
                int LA5_0 = input.LA(1);

                if ( (LA5_0==12||(LA5_0>=19 && LA5_0<=20)) ) {
                    alt5=1;
                }


                switch (alt5) {
            	case 1 :
            	    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:231:1: (lv_states_9_0= ruleState )
            	    {
            	    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:231:1: (lv_states_9_0= ruleState )
            	    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:232:3: lv_states_9_0= ruleState
            	    {
            	     
            	    	        newCompositeNode(grammarAccess.getStatemachineAccess().getStatesStateParserRuleCall_8_0()); 
            	    	    
            	    pushFollow(FOLLOW_ruleState_in_ruleStatemachine419);
            	    lv_states_9_0=ruleState();

            	    state._fsp--;


            	    	        if (current==null) {
            	    	            current = createModelElementForParent(grammarAccess.getStatemachineRule());
            	    	        }
            	           		add(
            	           			current, 
            	           			"states",
            	            		lv_states_9_0, 
            	            		"State");
            	    	        afterParserOrEnumRuleCall();
            	    	    

            	    }


            	    }
            	    break;

            	default :
            	    break loop5;
                }
            } while (true);

            otherlv_10=(Token)match(input,18,FOLLOW_18_in_ruleStatemachine432); 

                	newLeafNode(otherlv_10, grammarAccess.getStatemachineAccess().getRightCurlyBracketKeyword_9());
                

            }


            }

             leaveRule(); 
        }
         
            catch (RecognitionException re) { 
                recover(input,re); 
                appendSkippedTokens();
            } 
        finally {
        }
        return current;
    }
    // $ANTLR end "ruleStatemachine"


    // $ANTLR start "entryRuleEvent"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:260:1: entryRuleEvent returns [EObject current=null] : iv_ruleEvent= ruleEvent EOF ;
    public final EObject entryRuleEvent() throws RecognitionException {
        EObject current = null;

        EObject iv_ruleEvent = null;


        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:261:2: (iv_ruleEvent= ruleEvent EOF )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:262:2: iv_ruleEvent= ruleEvent EOF
            {
             newCompositeNode(grammarAccess.getEventRule()); 
            pushFollow(FOLLOW_ruleEvent_in_entryRuleEvent468);
            iv_ruleEvent=ruleEvent();

            state._fsp--;

             current =iv_ruleEvent; 
            match(input,EOF,FOLLOW_EOF_in_entryRuleEvent478); 

            }

        }
         
            catch (RecognitionException re) { 
                recover(input,re); 
                appendSkippedTokens();
            } 
        finally {
        }
        return current;
    }
    // $ANTLR end "entryRuleEvent"


    // $ANTLR start "ruleEvent"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:269:1: ruleEvent returns [EObject current=null] : ( (lv_name_0_0= RULE_ID ) ) ;
    public final EObject ruleEvent() throws RecognitionException {
        EObject current = null;

        Token lv_name_0_0=null;

         enterRule(); 
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:272:28: ( ( (lv_name_0_0= RULE_ID ) ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:273:1: ( (lv_name_0_0= RULE_ID ) )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:273:1: ( (lv_name_0_0= RULE_ID ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:274:1: (lv_name_0_0= RULE_ID )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:274:1: (lv_name_0_0= RULE_ID )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:275:3: lv_name_0_0= RULE_ID
            {
            lv_name_0_0=(Token)match(input,RULE_ID,FOLLOW_RULE_ID_in_ruleEvent519); 

            			newLeafNode(lv_name_0_0, grammarAccess.getEventAccess().getNameIDTerminalRuleCall_0()); 
            		

            	        if (current==null) {
            	            current = createModelElement(grammarAccess.getEventRule());
            	        }
                   		setWithLastConsumed(
                   			current, 
                   			"name",
                    		lv_name_0_0, 
                    		"ID");
            	    

            }


            }


            }

             leaveRule(); 
        }
         
            catch (RecognitionException re) { 
                recover(input,re); 
                appendSkippedTokens();
            } 
        finally {
        }
        return current;
    }
    // $ANTLR end "ruleEvent"


    // $ANTLR start "entryRuleState"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:299:1: entryRuleState returns [EObject current=null] : iv_ruleState= ruleState EOF ;
    public final EObject entryRuleState() throws RecognitionException {
        EObject current = null;

        EObject iv_ruleState = null;


        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:300:2: (iv_ruleState= ruleState EOF )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:301:2: iv_ruleState= ruleState EOF
            {
             newCompositeNode(grammarAccess.getStateRule()); 
            pushFollow(FOLLOW_ruleState_in_entryRuleState559);
            iv_ruleState=ruleState();

            state._fsp--;

             current =iv_ruleState; 
            match(input,EOF,FOLLOW_EOF_in_entryRuleState569); 

            }

        }
         
            catch (RecognitionException re) { 
                recover(input,re); 
                appendSkippedTokens();
            } 
        finally {
        }
        return current;
    }
    // $ANTLR end "entryRuleState"


    // $ANTLR start "ruleState"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:308:1: ruleState returns [EObject current=null] : (this_SimpleState_0= ruleSimpleState | this_CompoundState_1= ruleCompoundState ) ;
    public final EObject ruleState() throws RecognitionException {
        EObject current = null;

        EObject this_SimpleState_0 = null;

        EObject this_CompoundState_1 = null;


         enterRule(); 
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:311:28: ( (this_SimpleState_0= ruleSimpleState | this_CompoundState_1= ruleCompoundState ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:312:1: (this_SimpleState_0= ruleSimpleState | this_CompoundState_1= ruleCompoundState )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:312:1: (this_SimpleState_0= ruleSimpleState | this_CompoundState_1= ruleCompoundState )
            int alt6=2;
            int LA6_0 = input.LA(1);

            if ( (LA6_0==12||LA6_0==19) ) {
                alt6=1;
            }
            else if ( (LA6_0==20) ) {
                alt6=2;
            }
            else {
                NoViableAltException nvae =
                    new NoViableAltException("", 6, 0, input);

                throw nvae;
            }
            switch (alt6) {
                case 1 :
                    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:313:5: this_SimpleState_0= ruleSimpleState
                    {
                     
                            newCompositeNode(grammarAccess.getStateAccess().getSimpleStateParserRuleCall_0()); 
                        
                    pushFollow(FOLLOW_ruleSimpleState_in_ruleState616);
                    this_SimpleState_0=ruleSimpleState();

                    state._fsp--;

                     
                            current = this_SimpleState_0; 
                            afterParserOrEnumRuleCall();
                        

                    }
                    break;
                case 2 :
                    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:323:5: this_CompoundState_1= ruleCompoundState
                    {
                     
                            newCompositeNode(grammarAccess.getStateAccess().getCompoundStateParserRuleCall_1()); 
                        
                    pushFollow(FOLLOW_ruleCompoundState_in_ruleState643);
                    this_CompoundState_1=ruleCompoundState();

                    state._fsp--;

                     
                            current = this_CompoundState_1; 
                            afterParserOrEnumRuleCall();
                        

                    }
                    break;

            }


            }

             leaveRule(); 
        }
         
            catch (RecognitionException re) { 
                recover(input,re); 
                appendSkippedTokens();
            } 
        finally {
        }
        return current;
    }
    // $ANTLR end "ruleState"


    // $ANTLR start "entryRuleSimpleState"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:339:1: entryRuleSimpleState returns [EObject current=null] : iv_ruleSimpleState= ruleSimpleState EOF ;
    public final EObject entryRuleSimpleState() throws RecognitionException {
        EObject current = null;

        EObject iv_ruleSimpleState = null;


        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:340:2: (iv_ruleSimpleState= ruleSimpleState EOF )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:341:2: iv_ruleSimpleState= ruleSimpleState EOF
            {
             newCompositeNode(grammarAccess.getSimpleStateRule()); 
            pushFollow(FOLLOW_ruleSimpleState_in_entryRuleSimpleState678);
            iv_ruleSimpleState=ruleSimpleState();

            state._fsp--;

             current =iv_ruleSimpleState; 
            match(input,EOF,FOLLOW_EOF_in_entryRuleSimpleState688); 

            }

        }
         
            catch (RecognitionException re) { 
                recover(input,re); 
                appendSkippedTokens();
            } 
        finally {
        }
        return current;
    }
    // $ANTLR end "entryRuleSimpleState"


    // $ANTLR start "ruleSimpleState"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:348:1: ruleSimpleState returns [EObject current=null] : ( ( (lv_initial_0_0= 'initial' ) )? otherlv_1= 'state' ( (lv_name_2_0= RULE_ID ) ) (otherlv_3= 'value' ( (lv_value_4_0= RULE_INT ) ) )? otherlv_5= '{' ( (lv_transitions_6_0= ruleTransition ) )* otherlv_7= '}' ) ;
    public final EObject ruleSimpleState() throws RecognitionException {
        EObject current = null;

        Token lv_initial_0_0=null;
        Token otherlv_1=null;
        Token lv_name_2_0=null;
        Token otherlv_3=null;
        Token lv_value_4_0=null;
        Token otherlv_5=null;
        Token otherlv_7=null;
        EObject lv_transitions_6_0 = null;


         enterRule(); 
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:351:28: ( ( ( (lv_initial_0_0= 'initial' ) )? otherlv_1= 'state' ( (lv_name_2_0= RULE_ID ) ) (otherlv_3= 'value' ( (lv_value_4_0= RULE_INT ) ) )? otherlv_5= '{' ( (lv_transitions_6_0= ruleTransition ) )* otherlv_7= '}' ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:352:1: ( ( (lv_initial_0_0= 'initial' ) )? otherlv_1= 'state' ( (lv_name_2_0= RULE_ID ) ) (otherlv_3= 'value' ( (lv_value_4_0= RULE_INT ) ) )? otherlv_5= '{' ( (lv_transitions_6_0= ruleTransition ) )* otherlv_7= '}' )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:352:1: ( ( (lv_initial_0_0= 'initial' ) )? otherlv_1= 'state' ( (lv_name_2_0= RULE_ID ) ) (otherlv_3= 'value' ( (lv_value_4_0= RULE_INT ) ) )? otherlv_5= '{' ( (lv_transitions_6_0= ruleTransition ) )* otherlv_7= '}' )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:352:2: ( (lv_initial_0_0= 'initial' ) )? otherlv_1= 'state' ( (lv_name_2_0= RULE_ID ) ) (otherlv_3= 'value' ( (lv_value_4_0= RULE_INT ) ) )? otherlv_5= '{' ( (lv_transitions_6_0= ruleTransition ) )* otherlv_7= '}'
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:352:2: ( (lv_initial_0_0= 'initial' ) )?
            int alt7=2;
            int LA7_0 = input.LA(1);

            if ( (LA7_0==12) ) {
                alt7=1;
            }
            switch (alt7) {
                case 1 :
                    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:353:1: (lv_initial_0_0= 'initial' )
                    {
                    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:353:1: (lv_initial_0_0= 'initial' )
                    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:354:3: lv_initial_0_0= 'initial'
                    {
                    lv_initial_0_0=(Token)match(input,12,FOLLOW_12_in_ruleSimpleState731); 

                            newLeafNode(lv_initial_0_0, grammarAccess.getSimpleStateAccess().getInitialInitialKeyword_0_0());
                        

                    	        if (current==null) {
                    	            current = createModelElement(grammarAccess.getSimpleStateRule());
                    	        }
                           		setWithLastConsumed(current, "initial", true, "initial");
                    	    

                    }


                    }
                    break;

            }

            otherlv_1=(Token)match(input,19,FOLLOW_19_in_ruleSimpleState757); 

                	newLeafNode(otherlv_1, grammarAccess.getSimpleStateAccess().getStateKeyword_1());
                
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:371:1: ( (lv_name_2_0= RULE_ID ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:372:1: (lv_name_2_0= RULE_ID )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:372:1: (lv_name_2_0= RULE_ID )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:373:3: lv_name_2_0= RULE_ID
            {
            lv_name_2_0=(Token)match(input,RULE_ID,FOLLOW_RULE_ID_in_ruleSimpleState774); 

            			newLeafNode(lv_name_2_0, grammarAccess.getSimpleStateAccess().getNameIDTerminalRuleCall_2_0()); 
            		

            	        if (current==null) {
            	            current = createModelElement(grammarAccess.getSimpleStateRule());
            	        }
                   		setWithLastConsumed(
                   			current, 
                   			"name",
                    		lv_name_2_0, 
                    		"ID");
            	    

            }


            }

            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:389:2: (otherlv_3= 'value' ( (lv_value_4_0= RULE_INT ) ) )?
            int alt8=2;
            int LA8_0 = input.LA(1);

            if ( (LA8_0==14) ) {
                alt8=1;
            }
            switch (alt8) {
                case 1 :
                    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:389:4: otherlv_3= 'value' ( (lv_value_4_0= RULE_INT ) )
                    {
                    otherlv_3=(Token)match(input,14,FOLLOW_14_in_ruleSimpleState792); 

                        	newLeafNode(otherlv_3, grammarAccess.getSimpleStateAccess().getValueKeyword_3_0());
                        
                    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:393:1: ( (lv_value_4_0= RULE_INT ) )
                    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:394:1: (lv_value_4_0= RULE_INT )
                    {
                    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:394:1: (lv_value_4_0= RULE_INT )
                    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:395:3: lv_value_4_0= RULE_INT
                    {
                    lv_value_4_0=(Token)match(input,RULE_INT,FOLLOW_RULE_INT_in_ruleSimpleState809); 

                    			newLeafNode(lv_value_4_0, grammarAccess.getSimpleStateAccess().getValueINTTerminalRuleCall_3_1_0()); 
                    		

                    	        if (current==null) {
                    	            current = createModelElement(grammarAccess.getSimpleStateRule());
                    	        }
                           		setWithLastConsumed(
                           			current, 
                           			"value",
                            		lv_value_4_0, 
                            		"INT");
                    	    

                    }


                    }


                    }
                    break;

            }

            otherlv_5=(Token)match(input,15,FOLLOW_15_in_ruleSimpleState828); 

                	newLeafNode(otherlv_5, grammarAccess.getSimpleStateAccess().getLeftCurlyBracketKeyword_4());
                
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:415:1: ( (lv_transitions_6_0= ruleTransition ) )*
            loop9:
            do {
                int alt9=2;
                int LA9_0 = input.LA(1);

                if ( (LA9_0==RULE_ID) ) {
                    alt9=1;
                }


                switch (alt9) {
            	case 1 :
            	    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:416:1: (lv_transitions_6_0= ruleTransition )
            	    {
            	    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:416:1: (lv_transitions_6_0= ruleTransition )
            	    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:417:3: lv_transitions_6_0= ruleTransition
            	    {
            	     
            	    	        newCompositeNode(grammarAccess.getSimpleStateAccess().getTransitionsTransitionParserRuleCall_5_0()); 
            	    	    
            	    pushFollow(FOLLOW_ruleTransition_in_ruleSimpleState849);
            	    lv_transitions_6_0=ruleTransition();

            	    state._fsp--;


            	    	        if (current==null) {
            	    	            current = createModelElementForParent(grammarAccess.getSimpleStateRule());
            	    	        }
            	           		add(
            	           			current, 
            	           			"transitions",
            	            		lv_transitions_6_0, 
            	            		"Transition");
            	    	        afterParserOrEnumRuleCall();
            	    	    

            	    }


            	    }
            	    break;

            	default :
            	    break loop9;
                }
            } while (true);

            otherlv_7=(Token)match(input,18,FOLLOW_18_in_ruleSimpleState862); 

                	newLeafNode(otherlv_7, grammarAccess.getSimpleStateAccess().getRightCurlyBracketKeyword_6());
                

            }


            }

             leaveRule(); 
        }
         
            catch (RecognitionException re) { 
                recover(input,re); 
                appendSkippedTokens();
            } 
        finally {
        }
        return current;
    }
    // $ANTLR end "ruleSimpleState"


    // $ANTLR start "entryRuleCompoundState"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:445:1: entryRuleCompoundState returns [EObject current=null] : iv_ruleCompoundState= ruleCompoundState EOF ;
    public final EObject entryRuleCompoundState() throws RecognitionException {
        EObject current = null;

        EObject iv_ruleCompoundState = null;


        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:446:2: (iv_ruleCompoundState= ruleCompoundState EOF )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:447:2: iv_ruleCompoundState= ruleCompoundState EOF
            {
             newCompositeNode(grammarAccess.getCompoundStateRule()); 
            pushFollow(FOLLOW_ruleCompoundState_in_entryRuleCompoundState898);
            iv_ruleCompoundState=ruleCompoundState();

            state._fsp--;

             current =iv_ruleCompoundState; 
            match(input,EOF,FOLLOW_EOF_in_entryRuleCompoundState908); 

            }

        }
         
            catch (RecognitionException re) { 
                recover(input,re); 
                appendSkippedTokens();
            } 
        finally {
        }
        return current;
    }
    // $ANTLR end "entryRuleCompoundState"


    // $ANTLR start "ruleCompoundState"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:454:1: ruleCompoundState returns [EObject current=null] : (otherlv_0= 'compound' ( (lv_initial_1_0= 'initial' ) )? otherlv_2= 'state' ( (lv_name_3_0= RULE_ID ) ) otherlv_4= 'machine' ( (otherlv_5= RULE_ID ) ) otherlv_6= '{' ( (lv_transitions_7_0= ruleTransition ) )* otherlv_8= '}' ) ;
    public final EObject ruleCompoundState() throws RecognitionException {
        EObject current = null;

        Token otherlv_0=null;
        Token lv_initial_1_0=null;
        Token otherlv_2=null;
        Token lv_name_3_0=null;
        Token otherlv_4=null;
        Token otherlv_5=null;
        Token otherlv_6=null;
        Token otherlv_8=null;
        EObject lv_transitions_7_0 = null;


         enterRule(); 
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:457:28: ( (otherlv_0= 'compound' ( (lv_initial_1_0= 'initial' ) )? otherlv_2= 'state' ( (lv_name_3_0= RULE_ID ) ) otherlv_4= 'machine' ( (otherlv_5= RULE_ID ) ) otherlv_6= '{' ( (lv_transitions_7_0= ruleTransition ) )* otherlv_8= '}' ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:458:1: (otherlv_0= 'compound' ( (lv_initial_1_0= 'initial' ) )? otherlv_2= 'state' ( (lv_name_3_0= RULE_ID ) ) otherlv_4= 'machine' ( (otherlv_5= RULE_ID ) ) otherlv_6= '{' ( (lv_transitions_7_0= ruleTransition ) )* otherlv_8= '}' )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:458:1: (otherlv_0= 'compound' ( (lv_initial_1_0= 'initial' ) )? otherlv_2= 'state' ( (lv_name_3_0= RULE_ID ) ) otherlv_4= 'machine' ( (otherlv_5= RULE_ID ) ) otherlv_6= '{' ( (lv_transitions_7_0= ruleTransition ) )* otherlv_8= '}' )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:458:3: otherlv_0= 'compound' ( (lv_initial_1_0= 'initial' ) )? otherlv_2= 'state' ( (lv_name_3_0= RULE_ID ) ) otherlv_4= 'machine' ( (otherlv_5= RULE_ID ) ) otherlv_6= '{' ( (lv_transitions_7_0= ruleTransition ) )* otherlv_8= '}'
            {
            otherlv_0=(Token)match(input,20,FOLLOW_20_in_ruleCompoundState945); 

                	newLeafNode(otherlv_0, grammarAccess.getCompoundStateAccess().getCompoundKeyword_0());
                
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:462:1: ( (lv_initial_1_0= 'initial' ) )?
            int alt10=2;
            int LA10_0 = input.LA(1);

            if ( (LA10_0==12) ) {
                alt10=1;
            }
            switch (alt10) {
                case 1 :
                    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:463:1: (lv_initial_1_0= 'initial' )
                    {
                    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:463:1: (lv_initial_1_0= 'initial' )
                    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:464:3: lv_initial_1_0= 'initial'
                    {
                    lv_initial_1_0=(Token)match(input,12,FOLLOW_12_in_ruleCompoundState963); 

                            newLeafNode(lv_initial_1_0, grammarAccess.getCompoundStateAccess().getInitialInitialKeyword_1_0());
                        

                    	        if (current==null) {
                    	            current = createModelElement(grammarAccess.getCompoundStateRule());
                    	        }
                           		setWithLastConsumed(current, "initial", true, "initial");
                    	    

                    }


                    }
                    break;

            }

            otherlv_2=(Token)match(input,19,FOLLOW_19_in_ruleCompoundState989); 

                	newLeafNode(otherlv_2, grammarAccess.getCompoundStateAccess().getStateKeyword_2());
                
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:481:1: ( (lv_name_3_0= RULE_ID ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:482:1: (lv_name_3_0= RULE_ID )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:482:1: (lv_name_3_0= RULE_ID )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:483:3: lv_name_3_0= RULE_ID
            {
            lv_name_3_0=(Token)match(input,RULE_ID,FOLLOW_RULE_ID_in_ruleCompoundState1006); 

            			newLeafNode(lv_name_3_0, grammarAccess.getCompoundStateAccess().getNameIDTerminalRuleCall_3_0()); 
            		

            	        if (current==null) {
            	            current = createModelElement(grammarAccess.getCompoundStateRule());
            	        }
                   		setWithLastConsumed(
                   			current, 
                   			"name",
                    		lv_name_3_0, 
                    		"ID");
            	    

            }


            }

            otherlv_4=(Token)match(input,21,FOLLOW_21_in_ruleCompoundState1023); 

                	newLeafNode(otherlv_4, grammarAccess.getCompoundStateAccess().getMachineKeyword_4());
                
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:503:1: ( (otherlv_5= RULE_ID ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:504:1: (otherlv_5= RULE_ID )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:504:1: (otherlv_5= RULE_ID )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:505:3: otherlv_5= RULE_ID
            {

            			if (current==null) {
            	            current = createModelElement(grammarAccess.getCompoundStateRule());
            	        }
                    
            otherlv_5=(Token)match(input,RULE_ID,FOLLOW_RULE_ID_in_ruleCompoundState1043); 

            		newLeafNode(otherlv_5, grammarAccess.getCompoundStateAccess().getMachineStatemachineCrossReference_5_0()); 
            	

            }


            }

            otherlv_6=(Token)match(input,15,FOLLOW_15_in_ruleCompoundState1055); 

                	newLeafNode(otherlv_6, grammarAccess.getCompoundStateAccess().getLeftCurlyBracketKeyword_6());
                
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:520:1: ( (lv_transitions_7_0= ruleTransition ) )*
            loop11:
            do {
                int alt11=2;
                int LA11_0 = input.LA(1);

                if ( (LA11_0==RULE_ID) ) {
                    alt11=1;
                }


                switch (alt11) {
            	case 1 :
            	    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:521:1: (lv_transitions_7_0= ruleTransition )
            	    {
            	    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:521:1: (lv_transitions_7_0= ruleTransition )
            	    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:522:3: lv_transitions_7_0= ruleTransition
            	    {
            	     
            	    	        newCompositeNode(grammarAccess.getCompoundStateAccess().getTransitionsTransitionParserRuleCall_7_0()); 
            	    	    
            	    pushFollow(FOLLOW_ruleTransition_in_ruleCompoundState1076);
            	    lv_transitions_7_0=ruleTransition();

            	    state._fsp--;


            	    	        if (current==null) {
            	    	            current = createModelElementForParent(grammarAccess.getCompoundStateRule());
            	    	        }
            	           		add(
            	           			current, 
            	           			"transitions",
            	            		lv_transitions_7_0, 
            	            		"Transition");
            	    	        afterParserOrEnumRuleCall();
            	    	    

            	    }


            	    }
            	    break;

            	default :
            	    break loop11;
                }
            } while (true);

            otherlv_8=(Token)match(input,18,FOLLOW_18_in_ruleCompoundState1089); 

                	newLeafNode(otherlv_8, grammarAccess.getCompoundStateAccess().getRightCurlyBracketKeyword_8());
                

            }


            }

             leaveRule(); 
        }
         
            catch (RecognitionException re) { 
                recover(input,re); 
                appendSkippedTokens();
            } 
        finally {
        }
        return current;
    }
    // $ANTLR end "ruleCompoundState"


    // $ANTLR start "entryRuleTransition"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:550:1: entryRuleTransition returns [EObject current=null] : iv_ruleTransition= ruleTransition EOF ;
    public final EObject entryRuleTransition() throws RecognitionException {
        EObject current = null;

        EObject iv_ruleTransition = null;


        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:551:2: (iv_ruleTransition= ruleTransition EOF )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:552:2: iv_ruleTransition= ruleTransition EOF
            {
             newCompositeNode(grammarAccess.getTransitionRule()); 
            pushFollow(FOLLOW_ruleTransition_in_entryRuleTransition1125);
            iv_ruleTransition=ruleTransition();

            state._fsp--;

             current =iv_ruleTransition; 
            match(input,EOF,FOLLOW_EOF_in_entryRuleTransition1135); 

            }

        }
         
            catch (RecognitionException re) { 
                recover(input,re); 
                appendSkippedTokens();
            } 
        finally {
        }
        return current;
    }
    // $ANTLR end "entryRuleTransition"


    // $ANTLR start "ruleTransition"
    // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:559:1: ruleTransition returns [EObject current=null] : ( ( (otherlv_0= RULE_ID ) ) otherlv_1= '=>' ( (otherlv_2= RULE_ID ) ) ) ;
    public final EObject ruleTransition() throws RecognitionException {
        EObject current = null;

        Token otherlv_0=null;
        Token otherlv_1=null;
        Token otherlv_2=null;

         enterRule(); 
            
        try {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:562:28: ( ( ( (otherlv_0= RULE_ID ) ) otherlv_1= '=>' ( (otherlv_2= RULE_ID ) ) ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:563:1: ( ( (otherlv_0= RULE_ID ) ) otherlv_1= '=>' ( (otherlv_2= RULE_ID ) ) )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:563:1: ( ( (otherlv_0= RULE_ID ) ) otherlv_1= '=>' ( (otherlv_2= RULE_ID ) ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:563:2: ( (otherlv_0= RULE_ID ) ) otherlv_1= '=>' ( (otherlv_2= RULE_ID ) )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:563:2: ( (otherlv_0= RULE_ID ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:564:1: (otherlv_0= RULE_ID )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:564:1: (otherlv_0= RULE_ID )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:565:3: otherlv_0= RULE_ID
            {

            			if (current==null) {
            	            current = createModelElement(grammarAccess.getTransitionRule());
            	        }
                    
            otherlv_0=(Token)match(input,RULE_ID,FOLLOW_RULE_ID_in_ruleTransition1180); 

            		newLeafNode(otherlv_0, grammarAccess.getTransitionAccess().getEventEventCrossReference_0_0()); 
            	

            }


            }

            otherlv_1=(Token)match(input,22,FOLLOW_22_in_ruleTransition1192); 

                	newLeafNode(otherlv_1, grammarAccess.getTransitionAccess().getEqualsSignGreaterThanSignKeyword_1());
                
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:580:1: ( (otherlv_2= RULE_ID ) )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:581:1: (otherlv_2= RULE_ID )
            {
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:581:1: (otherlv_2= RULE_ID )
            // ../org.eclipse.ocl.tutorial.eclipsecon2011.oclstates/src-gen/org/eclipse/ocl/tutorial/eclipsecon2011/parser/antlr/internal/InternalOCLStates.g:582:3: otherlv_2= RULE_ID
            {

            			if (current==null) {
            	            current = createModelElement(grammarAccess.getTransitionRule());
            	        }
                    
            otherlv_2=(Token)match(input,RULE_ID,FOLLOW_RULE_ID_in_ruleTransition1212); 

            		newLeafNode(otherlv_2, grammarAccess.getTransitionAccess().getStateStateCrossReference_2_0()); 
            	

            }


            }


            }


            }

             leaveRule(); 
        }
         
            catch (RecognitionException re) { 
                recover(input,re); 
                appendSkippedTokens();
            } 
        finally {
        }
        return current;
    }
    // $ANTLR end "ruleTransition"

    // Delegated rules


 

    public static final BitSet FOLLOW_ruleModule_in_entryRuleModule75 = new BitSet(new long[]{0x0000000000000000L});
    public static final BitSet FOLLOW_EOF_in_entryRuleModule85 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_11_in_ruleModule122 = new BitSet(new long[]{0x0000000000000010L});
    public static final BitSet FOLLOW_RULE_STRING_in_ruleModule139 = new BitSet(new long[]{0x0000000000003002L});
    public static final BitSet FOLLOW_ruleStatemachine_in_ruleModule165 = new BitSet(new long[]{0x0000000000003002L});
    public static final BitSet FOLLOW_ruleStatemachine_in_entryRuleStatemachine202 = new BitSet(new long[]{0x0000000000000000L});
    public static final BitSet FOLLOW_EOF_in_entryRuleStatemachine212 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_12_in_ruleStatemachine255 = new BitSet(new long[]{0x0000000000002000L});
    public static final BitSet FOLLOW_13_in_ruleStatemachine281 = new BitSet(new long[]{0x0000000000000020L});
    public static final BitSet FOLLOW_RULE_ID_in_ruleStatemachine298 = new BitSet(new long[]{0x000000000000C000L});
    public static final BitSet FOLLOW_14_in_ruleStatemachine316 = new BitSet(new long[]{0x0000000000000040L});
    public static final BitSet FOLLOW_RULE_INT_in_ruleStatemachine333 = new BitSet(new long[]{0x0000000000008000L});
    public static final BitSet FOLLOW_15_in_ruleStatemachine352 = new BitSet(new long[]{0x0000000000010000L});
    public static final BitSet FOLLOW_16_in_ruleStatemachine364 = new BitSet(new long[]{0x0000000000020020L});
    public static final BitSet FOLLOW_ruleEvent_in_ruleStatemachine385 = new BitSet(new long[]{0x0000000000020020L});
    public static final BitSet FOLLOW_17_in_ruleStatemachine398 = new BitSet(new long[]{0x00000000001C1000L});
    public static final BitSet FOLLOW_ruleState_in_ruleStatemachine419 = new BitSet(new long[]{0x00000000001C1000L});
    public static final BitSet FOLLOW_18_in_ruleStatemachine432 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_ruleEvent_in_entryRuleEvent468 = new BitSet(new long[]{0x0000000000000000L});
    public static final BitSet FOLLOW_EOF_in_entryRuleEvent478 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_RULE_ID_in_ruleEvent519 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_ruleState_in_entryRuleState559 = new BitSet(new long[]{0x0000000000000000L});
    public static final BitSet FOLLOW_EOF_in_entryRuleState569 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_ruleSimpleState_in_ruleState616 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_ruleCompoundState_in_ruleState643 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_ruleSimpleState_in_entryRuleSimpleState678 = new BitSet(new long[]{0x0000000000000000L});
    public static final BitSet FOLLOW_EOF_in_entryRuleSimpleState688 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_12_in_ruleSimpleState731 = new BitSet(new long[]{0x0000000000080000L});
    public static final BitSet FOLLOW_19_in_ruleSimpleState757 = new BitSet(new long[]{0x0000000000000020L});
    public static final BitSet FOLLOW_RULE_ID_in_ruleSimpleState774 = new BitSet(new long[]{0x000000000000C000L});
    public static final BitSet FOLLOW_14_in_ruleSimpleState792 = new BitSet(new long[]{0x0000000000000040L});
    public static final BitSet FOLLOW_RULE_INT_in_ruleSimpleState809 = new BitSet(new long[]{0x0000000000008000L});
    public static final BitSet FOLLOW_15_in_ruleSimpleState828 = new BitSet(new long[]{0x0000000000040020L});
    public static final BitSet FOLLOW_ruleTransition_in_ruleSimpleState849 = new BitSet(new long[]{0x0000000000040020L});
    public static final BitSet FOLLOW_18_in_ruleSimpleState862 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_ruleCompoundState_in_entryRuleCompoundState898 = new BitSet(new long[]{0x0000000000000000L});
    public static final BitSet FOLLOW_EOF_in_entryRuleCompoundState908 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_20_in_ruleCompoundState945 = new BitSet(new long[]{0x0000000000081000L});
    public static final BitSet FOLLOW_12_in_ruleCompoundState963 = new BitSet(new long[]{0x0000000000080000L});
    public static final BitSet FOLLOW_19_in_ruleCompoundState989 = new BitSet(new long[]{0x0000000000000020L});
    public static final BitSet FOLLOW_RULE_ID_in_ruleCompoundState1006 = new BitSet(new long[]{0x0000000000200000L});
    public static final BitSet FOLLOW_21_in_ruleCompoundState1023 = new BitSet(new long[]{0x0000000000000020L});
    public static final BitSet FOLLOW_RULE_ID_in_ruleCompoundState1043 = new BitSet(new long[]{0x0000000000008000L});
    public static final BitSet FOLLOW_15_in_ruleCompoundState1055 = new BitSet(new long[]{0x0000000000040020L});
    public static final BitSet FOLLOW_ruleTransition_in_ruleCompoundState1076 = new BitSet(new long[]{0x0000000000040020L});
    public static final BitSet FOLLOW_18_in_ruleCompoundState1089 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_ruleTransition_in_entryRuleTransition1125 = new BitSet(new long[]{0x0000000000000000L});
    public static final BitSet FOLLOW_EOF_in_entryRuleTransition1135 = new BitSet(new long[]{0x0000000000000002L});
    public static final BitSet FOLLOW_RULE_ID_in_ruleTransition1180 = new BitSet(new long[]{0x0000000000400000L});
    public static final BitSet FOLLOW_22_in_ruleTransition1192 = new BitSet(new long[]{0x0000000000000020L});
    public static final BitSet FOLLOW_RULE_ID_in_ruleTransition1212 = new BitSet(new long[]{0x0000000000000002L});

}
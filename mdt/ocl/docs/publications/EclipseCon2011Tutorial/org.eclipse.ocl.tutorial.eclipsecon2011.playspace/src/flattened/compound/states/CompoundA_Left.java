package flattened.compound.states;

public class CompoundA_Left implements Outer.State {
    private final Outer sm;
    public CompoundA_Left(Outer sm) {
        this.sm = sm;
    }
    public void doLEFT()
        { sm.setState(STATES.STATE_CompoundA_Right); }
    public void doRIGHT()
        { sm.setState(STATES.STATE_CompoundA_Left); }
    public void doSTART()
        { sm.setState(STATES.STATE_Stop); }
    public void doSTOP()
        { sm.setState(STATES.STATE_Stop); }
}    

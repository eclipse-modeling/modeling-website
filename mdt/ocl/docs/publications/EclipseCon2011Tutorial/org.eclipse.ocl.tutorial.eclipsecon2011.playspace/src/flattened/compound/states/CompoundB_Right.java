package flattened.compound.states;

public class CompoundB_Right implements Outer.State {
    private final Outer sm;
    public CompoundB_Right(Outer sm) {
        this.sm = sm;
    }
    public void doLEFT()
        { sm.setState(STATES.STATE_CompoundB_Right); }
    public void doRIGHT()
        { sm.setState(STATES.STATE_CompoundB_Left); }
    public void doSTOP()
        { sm.setState(STATES.STATE_Stop); }
    public void doSTART()
        { sm.setState(STATES.STATE_Stop); }
}    

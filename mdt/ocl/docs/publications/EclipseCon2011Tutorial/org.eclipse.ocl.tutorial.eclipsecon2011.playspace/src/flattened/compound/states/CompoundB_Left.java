package flattened.compound.states;

public class CompoundB_Left implements Outer.State {
    private final Outer sm;
    public CompoundB_Left(Outer sm) {
        this.sm = sm;
    }
    public void doLEFT()
        { sm.setState(STATES.STATE_CompoundB_Right); }
    public void doSTOP()
        { sm.setState(STATES.STATE_Stop); }
}    

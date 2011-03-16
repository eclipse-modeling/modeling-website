package flattened.compound.states;

public class Stop implements Outer.State {
    private final Outer sm;
    public Stop(Outer sm) {
        this.sm = sm;
    }
    public void doSTOP()
        { sm.setState(STATES.STATE_CompoundB_Left); }
}    

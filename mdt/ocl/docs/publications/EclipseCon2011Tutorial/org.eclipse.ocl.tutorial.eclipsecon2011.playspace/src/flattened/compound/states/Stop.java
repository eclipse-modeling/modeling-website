package flattened.compound.states;

public class Stop implements Outer.State {
    private final Outer sm;
    public Stop(Outer sm) {
        this.sm = sm;
    }
    public void doSTART()
        { sm.setState(STATES.STATE_Start); }
    public void doSTOP()
        { sm.setState(STATES.STATE_CompoundB_Left); }
    public void doLEFT()
        { sm.setState(STATES.STATE_Stop); }
    public void doRIGHT()
        { sm.setState(STATES.STATE_Stop); }
}    

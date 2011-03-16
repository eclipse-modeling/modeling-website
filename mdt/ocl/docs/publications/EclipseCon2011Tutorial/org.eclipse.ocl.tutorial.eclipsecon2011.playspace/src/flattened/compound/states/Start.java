package flattened.compound.states;

public class Start implements Outer.State {
    private final Outer sm;
    public Start(Outer sm) {
        this.sm = sm;
    }
    public void doSTART()
        { sm.setState(STATES.STATE_CompoundA_Left); }
    public void doLEFT()
        { sm.setState(STATES.STATE_Start); }
    public void doRIGHT()
        { sm.setState(STATES.STATE_Start); }
    public void doSTOP()
        { sm.setState(STATES.STATE_Stop); }
}    

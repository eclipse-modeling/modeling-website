package flattened.compound.states;

public class Start implements Outer.State {
    private final Outer sm;
    public Start(Outer sm) {
        this.sm = sm;
    }
    public void doSTART()
        { sm.setState(STATES.STATE_CompoundA_Left); }
}    

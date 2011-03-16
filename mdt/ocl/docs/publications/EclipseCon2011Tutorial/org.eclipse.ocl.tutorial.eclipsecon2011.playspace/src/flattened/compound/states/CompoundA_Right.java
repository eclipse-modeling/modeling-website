package flattened.compound.states;

public class CompoundA_Right implements Outer.State {
    private final Outer sm;
    public CompoundA_Right(Outer sm) {
        this.sm = sm;
    }
    public void doRIGHT()
        { sm.setState(STATES.STATE_CompoundA_Left); }
    public void doSTART()
        { sm.setState(STATES.STATE_Stop); }
}    

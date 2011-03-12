package simple.states;

public class Start implements Machine.State {
    private final Machine sm;
    public Start(Machine sm) {
        this.sm = sm;
    }
    public void doSTART()
        { sm.setState(STATES.STATE_Start); }
}    

package simple.states;

public class Stop implements Machine.State {
    private final Machine sm;
    public Stop(Machine sm) {
        this.sm = sm;
    }
    public void doSTART()
        { sm.setState(STATES.STATE_Start); }
    public void doSTOP()
        { sm.setState(STATES.STATE_Stop); }
}    

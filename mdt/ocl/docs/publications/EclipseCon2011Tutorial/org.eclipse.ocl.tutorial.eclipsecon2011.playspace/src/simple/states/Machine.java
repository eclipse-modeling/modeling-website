package simple.states;

public class Machine
{
    public interface State
    {
        public void doSTART();
        public void doSTOP();

        enum STATES
        {
            STATE_Start,
            STATE_Stop
        }
    }

    private final State[] states = new State[] {
        new Start(this),
        new Stop(this)
    };

    private State state;

    public Machine() {
        setState(State.STATES.STATE_Stop);
    }

    public void setState(State.STATES state) {
        this.state = states[state.ordinal()];
    }

    public void doSTART() { state.doSTART(); }
    public void doSTOP() { state.doSTOP(); }
}    

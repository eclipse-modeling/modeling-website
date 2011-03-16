package flattened.compound.states;

public class Outer
{
    public interface State
    {
        public void doLEFT();
        public void doSTOP();
        public void doRIGHT();
        public void doSTART();

        enum STATES
        {
            STATE_Start,
            STATE_Stop,
            STATE_CompoundA_Right,
            STATE_CompoundA_Left,
            STATE_CompoundB_Left,
            STATE_CompoundB_Right
        }
    }

    private final State[] states = new State[] {
        new Start(this),
        new Stop(this),
        new CompoundA_Right(this),
        new CompoundA_Left(this),
        new CompoundB_Left(this),
        new CompoundB_Right(this)
    };

    private State state;

    public Outer() {
        setState(State.STATES.STATE_Start);
    }

    public void setState(State.STATES state) {
        this.state = states[state.ordinal()];
    }

    public void doLEFT() { state.doLEFT(); }
    public void doSTOP() { state.doSTOP(); }
    public void doRIGHT() { state.doRIGHT(); }
    public void doSTART() { state.doSTART(); }
}    

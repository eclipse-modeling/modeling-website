package flattened.compound.states;

public class Outer
{
    public interface State
    {
        public void doRIGHT();
        public void doLEFT();
        public void doSTART();
        public void doSTOP();

        enum STATES
        {
            STATE_Start,
            STATE_Stop,
            STATE_CompoundA_Left,
            STATE_CompoundA_Right,
            STATE_CompoundB_Right,
            STATE_CompoundB_Left
        }
    }

    private final State[] states = new State[] {
        new Start(this),
        new Stop(this),
        new CompoundA_Left(this),
        new CompoundA_Right(this),
        new CompoundB_Right(this),
        new CompoundB_Left(this)
    };

    private State state;

    public Outer() {
        setState(State.STATES.STATE_Start);
    }

    public void setState(State.STATES state) {
        this.state = states[state.ordinal()];
    }

    public void doRIGHT() { state.doRIGHT(); }
    public void doLEFT() { state.doLEFT(); }
    public void doSTART() { state.doSTART(); }
    public void doSTOP() { state.doSTOP(); }
}    

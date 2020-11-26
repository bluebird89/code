import React from "react";
import useCounter from "./counter-hook";

function CounterFunHook() {
    const [count, Increment, Decrement] = useCounter(0, 2);

    return (
        <div className="App">
            <h1>{count}</h1>
            <button onClick={Increment}>Increment by 2</button>
            <button onClick={Decrement}>Decrement by 2</button>
        </div>
    );
}

export default CounterFunHook;

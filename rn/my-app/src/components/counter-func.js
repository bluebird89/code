import React, { useState } from "react";

function CounterFun() {
    const [count, setCount] = useState(0);

    function Increment() {
        setCount(count + 1);
    }
    function Decrement() {
        setCount(count - 1);
    }

    return (
        <div className="App">
            <h1>{count}</h1>
            <button onClick={Increment}>Increment</button>
            <button onClick={Decrement}>Decrement</button>
        </div>
    );
}

export default CounterFun

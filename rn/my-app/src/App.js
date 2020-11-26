import { useState } from "react";
import './App.css';
import logo from './logo.svg';

function App(props) {
    // state = {
    //     isActive: false
    // }
    const [status, setStatus] = useState(false);

    function handleClick() {
        setStatus(!status)
    }

    return (

        <div className="App">
            <button onClick={handleClick}>
                {status ? "Hide" : "Show"}
            </button>
            <header className="App-header">
                <img src={logo} className="App-logo" alt="logo" />
                <p>
                    Edit <code>src/App.js</code> and save to reload.
                </p>
                <a
                    className="App-link"
                    href="https://reactjs.org"
                    target="_blank"
                    rel="noopener noreferrer"
                >
                    Learn React
                </a>
            </header>
        </div >
    );
}

export default App;

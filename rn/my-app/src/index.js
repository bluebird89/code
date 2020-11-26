import React from 'react';
import ReactDOM from 'react-dom';
import { createStore } from 'redux';
import App from './App.js';
import Car4 from './components/Car4.js';
import CounterFunHook from './components/counter-fun-hook.js';
import CounterFun from './components/counter-func.js';
import Counter from './components/Counter.js';
import CounterRedux from './components/CounterRedux';
import LikeButton from './components/LikeButton.js';
import List from "./components/List.js";
import MyComponent from './components/MyComponent.js';
import WebSite from './components/WebSite.js';
import './index.css';
import counter from './reducers';
import reportWebVitals from './reportWebVitals';

const myHeader = <h1>I Love JSX!</h1>;
const myHeaderWithExpress = <h1>React is {5 + 5} times better with JSX</h1>;

const myTable = (
    <table>
        <tr>
            <th>Name</th>
        </tr>
        <tr>
            <td>John</td>
        </tr>
        <tr>
            <td>Elsa</td>
        </tr>
    </table>
);
const myElement = React.createElement('h1', {}, 'I do not use JSX!');
const myArr = [
    <h1>W3Cschool教程</h1>,
    <h2>从W3Cschool开始！</h2>,
];
const myDiv = (
    <div>
        <h1>I am a Header.</h1>
        <h1>I am a Header too.</h1>
    </div>
);
const myUl = (
    <ul>
        <li>Apples</li>
        <li>Bananas</li>
        <li>Cherries</li>
    </ul>
);

var myStyle = {
    fontSize: 100,
    color: "#FF0000"
};
let i = 4;
ReactDOM.render(
    <div>
        <h1 style={myStyle}>原生标签</h1>
        <h2>欢迎学习 React</h2>
        <p data-myattribute="somevalue">这是一个很不错的 JavaScript 库!</p>
        <h1>{i = 1 ? 'True!' : 'False'}</h1>
        {myTable}
        {myArr}
        {myDiv}
        {myElement}
        {myHeader}
        {myUl}
        {myHeaderWithExpress}
    </div>,
    // {/*注释...*/ }
    document.getElementById('orginatlTag')
);

class Car extends React.Component {
    constructor() {
        super();
        this.state = { color: "red" };
    }
    render() {
        return <h2>I am a {this.props.color} Car!</h2>;
    }
}
class Garage extends React.Component {
    render() {
        return (
            <div>
                <h1>Who lives in my Garage?</h1>
                <Car brand="Ford" />
            </div>
        );
    }
}

function Car1() {
    return <h2>Hi, I am also a Car!</h2>;
}

class HelloMessage extends React.Component {
    render() {
        return <div>Hello {this.props.name}</div>;
    }
}

ReactDOM.render(
    <React.StrictMode>
        <App show='true' >
            <Garage />
            <Car4 />
            <Car1 /><Car color="Green" />
            <HelloMessage name="henry" />
        </App>
    </React.StrictMode>,
    document.getElementById('root')
);

// ReactDOM.render(<Header />, document.getElementById('root'));
// ReactDOM.render(
//     <MyForm />,
//     document.getElementById('root')
// );

ReactDOM.render(
    <WebSite name="Custom name" site="https://www.CustomUrl.com" />,
    document.getElementById('example')
);
ReactDOM.render(
    <LikeButton />,
    document.getElementById('like')
);
ReactDOM.render(
    <Counter />,
    document.getElementById('counter')
);
ReactDOM.render(
    <CounterFun />,
    document.getElementById('counter1')
);
ReactDOM.render(
    <CounterFunHook />,
    document.getElementById('counter2')
);

ReactDOM.render(
    <List />,
    document.getElementById('list')
);

// ref 属性
ReactDOM.render(
    <MyComponent />,
    document.getElementById('reff')
);
reportWebVitals();


const store = createStore(counter)
const rootEl = document.getElementById('redux')

const render = () => ReactDOM.render(
    <CounterRedux
        value={store.getState()}
        onIncrement={() => store.dispatch({ type: 'INCREMENT' })}
        onDecrement={() => store.dispatch({ type: 'DECREMENT' })}
    />,
    rootEl
)

render()
store.subscribe(render)

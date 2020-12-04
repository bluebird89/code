import { ApolloProvider } from '@apollo/client';
import React from 'react';
import ReactDOM from 'react-dom';
import { createStore } from 'redux';
import App from './App.js';
import AppJ from './App.jsx';
import client from './client';
import Calculator from './components/Calculator';
import Car4 from './components/Car4.js';
import Clock from './components/Clock.js';
import CounterFunHook from './components/counter-fun-hook.js';
import CounterFun from './components/counter-func.js';
import Counter from './components/Counter.js';
import CounterRedux from './components/CounterRedux';
import FilterableProductTable from './components/FilterProduct/FilterableProductTable.js';
import Header from './components/Header';
import LikeButton from './components/LikeButton.js';
import List from "./components/List.js";
import MyComponent from './components/MyComponent.js';
import MyForm from './components/MyForm.js';
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
const numbers = [1, 2, 3, 4, 5];
const listItems = numbers.map((number) =>
    <li>{number}</li>
);

var myStyle = {
    fontSize: 100,
    color: "#FF0000"
};
let i = 4;

function NumberList(props) {
    const numbers = props.numbers;
    const listItems = numbers.map((number) =>
        <li key={number.toString()}>{number}</li>
    );
    return (
        <ul>{listItems}</ul>
    );
}

const todos = ['PHP', 'Python', 'Go'];
const todoItems = todos.map((todo) =>
    <li key={todo.id}>
        {todo.text}
    </li>
);

function OrginalTag() {
    return (
        <div>
            <h1 style={myStyle}>原生标签</h1>
            <h2>欢迎学习 React</h2>
            <p data-myattribute="somevalue">这是一个很不错的 JavaScript 库!</p>
            <h1>{i === 1 ? 'True!' : 'False'}</h1>
            {myTable}
            {myArr}
            {myDiv}
            {myElement}
            {myHeader}
            {listItems}
            {myUl}
            {todoItems}
            {myHeaderWithExpress}
            <NumberList numbers={numbers} />,
        </div>
    )
}

ReactDOM.render(
    <OrginalTag />,
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

function Jsx() {
    return (
        <div>
            <App show='true' />
            <Garage />
            <Car4 />
            <Car1 /><Car color="Green" />
            <HelloMessage name="henry" />
            <Header />
            <MyForm />
        </div>
    )
}

ReactDOM.render(
    <React.StrictMode>
        <Jsx />
    </React.StrictMode>,
    document.getElementById('root')
);

ReactDOM.render(
    <div>
        <Clock />
        <Clock />
        <Clock />
    </div>,
    document.getElementById('tick')
)


ReactDOM.render(
    <ApolloProvider client={client}>
        <AppJ />
    </ApolloProvider>,
    document.getElementById('apollo')
);

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
ReactDOM.render(<Calculator />, document.getElementById('temperature'));
reportWebVitals();

ReactDOM.render(<FilterableProductTable />,
    document.getElementById('product'));

var names = ['Alice', 'Emily', 'Kate'];
// JSX 的基本语法规则：遇到 HTML 标签（以 < 开头），就用 HTML 规则解析；遇到代码块（以 { 开头），就用 JavaScript 规则解析
ReactDOM.render(
    <div>
        {
            names.map(function (name) {
                return <div>Hello, {name}!</div>
            })
        }
    </div>,
    document.getElementById('example')
);

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

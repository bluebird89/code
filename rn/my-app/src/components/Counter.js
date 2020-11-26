
import PropTypes from 'prop-types';
import React from 'react';
import Button from './Button.js';

function Content(props) {
    return <p>Content组件的props.value: {props.value}</p>;
}

Content.ProTypes = {
    clickCount: PropTypes.number.isRequired
};

class Counter extends React.Component {
    constructor() {
        super();
        this.state = {
            count: 0
        }
    }
    handleClick = () => {
        this.setState((state) => {
            return { count: state.count + 1 };
        });
    }

    incrementCount = () => {
        this.setState({
            count: this.state.count + 1
        })
    }

    decrementCount = () => {
        this.setState({
            count: this.state.count - 1
        })
    }

    handleClickByIncrement = () => {
        this.setState((prevState, props) => {
            return {
                counter: prevState.count + this.props.increment
            };
        });
    }

    render() {
        let { count } = this.state
        return (
            <div>
                <h2>Count: {count} </h2>
                <Button
                    title={"+"}
                    task={() => this.incrementCount()}
                />
                <Button
                    title={"-"}
                    task={() => this.decrementCount()}
                />

                <button onClick={(e) => { this.setState({ count: this.state.count + 1 }) }}>
                    INCREMENT
                </button>

                {/* <button onClick={this.handleClickByIncrement} increment="2">
                    Another INCREMENT
                </button> */}
                Counter组件的内部状态：
                {JSON.stringify(this.state.count, null, 2)}
                <Content value={this.state.count} />
            </div >
        );
    }
}

export default Counter

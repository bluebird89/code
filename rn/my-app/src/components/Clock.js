import React from 'react';

class Clock extends React.Component {
    constructor(props) {
        super(props);
        this.state = { date: new Date() };
    }
    // 方法会在组件已经被渲染到 DOM 中后运行
    componentDidMount() {
        this.timerID = setInterval(
            () => this.tick(),
            1000
        );
    }

    componentWillUnmount() {
        clearInterval(this.timerID);
    }

    tick() {
        this.setState({
            date: new Date()
        });
    }

    render() {
        return (
            <div>
                <h1>I'm Class Clock!!</h1>
                <h2>Now is {this.state.date.toLocaleTimeString()}</h2>
            </div>
        )
    }
}

export default Clock

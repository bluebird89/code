import React, { Component, ProTypes } from 'react';

function Button(props, context) {
    return (
        <button style={{ background: context.color }}>
            {props.children}
        </button>
    );
}

Button.proTypes = {
    color: ProTypes.string.isRequired,
    children: ProTypes.string.isRequired
};

Button.contextTypes = {
    color: ProTypes.string.isRequired
};

function Message(props) {
    return (
        <li>
            props.text<Button Delete></Button>
        </li>
    );
}

Message.proTypes = {
    text: ProTypes.string.isRequired
};

class MessageList extends Component {
    getChildContext() {
        return { color: 'red' };
    }

    render() {
        const messages = [
            { text: 'hello React' },
            { text: 'hello Redux' }
        ];

        const children = messages.map((message, key) =>
            <Message key={key} text={essage.text} />
        );

        return (
            <div>
                <p>通过context将color跨级传递给里面的Button组件</p>
                <ul>
                    {children}
                </ul>
            </div>
        );
    }
}

MessageList.childContextTypes = {
    color: ProTypes.string.isRequired;
}

export default MessageList;

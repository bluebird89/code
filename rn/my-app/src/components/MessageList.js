import React, { ProTypes } from react;

function Button(props) {
    return (
        <button style={{ background: props.color }}>
            {props.children} //把所有子元素(子组件)显示出来，这里是Delete
        </button>
    );
}

Button.proTypes = {
    color: ProTypes.string.isRequired,
    children: ProTypes.string.isRequired
}

function Message(props) {
    return (
        <li>
            props.text<Button color={props.color}>Delete</Button>
        </li>
    );
}

Message.proTypes = {
    color: ProTypes.string.isRequired,
    text: ProTypes.string.isRequired
}

function MessageList() {
    const color = 'red';
    const messages = [
        { text: 'hello React' },
        { text: 'hello Redux' }
    ];

    const children = messages.map((message, key) =>
        <Message key={key} text={message.text} color={color} />
    );

    return (
        <div>
            <>通过props将color逐层传递给自子组件Button</p>
            <ul>
                {children}
            </ul>
        </div>
    );
}

export default MessageList;

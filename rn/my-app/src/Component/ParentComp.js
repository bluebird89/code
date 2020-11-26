import React from 'react';

class ParentComp extends React.Component {
    constructor(props) {
        super(props);
        // 创建ref 指向 ChildrenComp 组件实例
        this.textInput = React.createRef();
    }

    componentDidMount() {
        // 调用子组件 focusTextInput方法 触发子组件内部 文本框获取焦点事件
        this.textInput.current.focusTextInput();
    }

    render() {
        return (
            <ChildrenComp ref={this.textInput} />
        );
    }
}


class ChildrenComp extends React.Component {
    constructor(props) {
        super(props);
        this.inputRef = React.createRef();
    }
    focusTextInput() {
        this.inputRef.current.focus();
    }
    render() {
        return (
            <div>
                <input type='text' value='父组件通过focusTextInput()方法控制获取焦点事件' ref={this.inputRef} />
            </div>
        )
    }
}



export default ParentComp

import React from "react";

class ListUI extends React.Component {
    render() {
        let data = this.props.data;
        return (
            <ul>
                {data.map(item => <li key={item.id} >{item.text}</li>)}
            </ul>
        )
    }
}

class List extends React.Component {
    constructor() {
        super();
        this.getData = this.getData.bind(this);
    }
    render() {
        let data = this.getData();
        return <ListUI data={data} />
    }
    getData() {
        return [{ id: 1, text: 'hello' }, { id: 2, text: 'world' }];
    }
}

export default List

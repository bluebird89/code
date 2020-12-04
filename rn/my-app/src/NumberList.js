function ListItem(props) {
    // 正确！这里不需要指定 key：
    return <li>{props.value}</li>;
}

function NumberList(props) {
    const numbers = props.numbers;
    const listItems = numbers.map((number) =>
        // 正确！key 应该在数组的上下文中被指定
        <ListItem key={number.toString()} value={number} />
    );
    return (
        <ul>
            {listItems}
        </ul>
    );
    // return (
    //     <ul>
    //       {numbers.map((number) =>
    //         <ListItem key={number.toString()}
    //                   value={number} />
    //       )}
    //     </ul>
    //   );
}

const numbers = [1, 2, 3, 4, 5];
ReactDOM.render(
    <NumberList numbers={numbers} />,
    document.getElementById('root')
);

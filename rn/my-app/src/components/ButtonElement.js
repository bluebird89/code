const e = React.createElement;

// 显示一个 "Like" <button>
return e(
    'button',
    { onClick: () => this.setState({ liked: true }) },
    'Like'
);

// return (
//     <button onClick={() => this.setState({ liked: true })}>
//         Like
//     </button>
// );

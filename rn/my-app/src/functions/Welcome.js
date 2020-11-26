import axios from 'axios';
import { React, useEffect, useState } from 'react';

// function Welcome(props) {
//     useEffect(() => {
//         document.title = '加载完成';
//     }, [props.name]);
//     return <h1>Hello, {props.name}</h1>;
// }


function GetRes() {
    const [data, setData] = useState({ hits: [] });

    useEffect(() => {
        const fetchData = async () => {
            const result = await axios(
                'https://hn.algolia.com/api/v1/search?query=redux',
            );

            setData(result.data);
        };

        fetchData();
    }, []);
    const [varA, setVarA] = useState(0);
    const [varB, setVarB] = useState(0);

    useEffect(() => {
        const timeout = setTimeout(() => setVarA(varA + 1), 1000);
        return () => clearTimeout(timeout);
    }, [varA]);

    useEffect(() => {
        const timeout = setTimeout(() => setVarB(varB + 2), 2000);

        return () => clearTimeout(timeout);
    }, [varB]);
    // 返回一个清理函数，在组件卸载时取消订阅
    // useEffect(() => {
    //     const subscription = props.source.subscribe();
    //     return () => {
    //       subscription.unsubscribe();
    //     };
    //   }, [props.source]);

    return (
        <ul>
            {data.hits.map(item => (
                <li key={item.objectID}>
                    <a href={item.url}>{item.title}</a>
                </li>
            ))}
            <span>{varA}, {varB}</span>
        </ul>
    );
}

export default GetRes;

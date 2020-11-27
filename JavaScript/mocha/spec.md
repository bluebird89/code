# TOC
   - [加法函数的测试](#)
   - [异步请求测试](#)
   - [hooks例子](#hooks)
   - [测试超时的测试](#)
<a name=""></a>
 
<a name=""></a>
# 加法函数的测试
1 加 1 应该等于 2.

```js
expect(add(1, 1)).to.be.equal(2);
```

<a name=""></a>
# 加法函数的测试
1 加 1 应该等于 2.

```js
expect((0, _add2.default)(1, 1)).to.be.equal(2);
```

<a name=""></a>
# 异步请求测试
返回promise.

```js
return (0, _nodeFetch2.default)('https://api.github.com').then(function (res) {
    return res.json();
}).then(function (json) {
    expect(json).to.be.an('object');
});
```

<a name="hooks"></a>
# hooks例子
修改全局变量成功.

```js
(0, _chai.expect)(foo).to.be.equal(true);
```

<a name=""></a>
# 测试超时的测试

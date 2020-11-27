var a = [];
for (let i = 0, j = ""; i < 10; i++) {
    a[i] = function() {
        console.log(i);
    };
    let j = "c";
    // j 不在同一个作用域，有各自单独的作用域
    console.log(j);
}
a[6]();
console.log(a);

// var命令会发生“变量提升”现象，即变量可以在声明之前使用，值为undefined
console.log(foo); // 输出undefined
var foo = 2;
// let 所声明的变量一定要在声明后使用，否则报错
// console.log(bar); // 报错ReferenceError
// let bar = 2;

// 暂时性死区和let、const语句不出现变量提升，主要是为了减少运行时错误，防止在变量声明前就使用这个变量，从而导致意料之外的行为
var tmp = 123;
if (true) {
    // 暂时性死区(temporal dead zone，简称 TDZ）:如果区块中存在let和const命令，这个区块对这些命令声明的变量，从一开始就形成了封闭作用域。凡是在声明之前就使用这些变量，就会报错
    // 在let声明变量前,都属于变量tmp的“死区”，对tmp赋值会报错,typeof不再是一个百分之百安全的操作
    // tmp = 'abc'; // ReferenceError
    // tmp 绑定这个块级作用域
    let tmp;
    tmp = "abc";
    console.log(tmp);
}
console.log(tmp);

// 一个变量根本没有被声明，使用typeof反而不会报错
// typeof x; // ReferenceError
let x;
typeof undeclared_variable; // "undefined"
// 参数x默认值等于另一个参数y，而此时y还没有声明，属于“死区”
// function bar(x = y, y = 2) {
//     return [x, y];
// }
// bar();

// let不允许在相同作用域内，重复声明同一个变量
// 不能在函数内部重新声明参数

// 块级作用域:ES5 只有全局作用域和函数作用域，没有块级作用域,let实际上新增了块级作用域
// 块级作用域的出现，实际上使得获得广泛应用的匿名立即执行函数表达式（匿名 IIFE）不再必要
// var 内层变量因为变量提升，可能会覆盖外层变量
var tmp = new Date();
function f() {
    console.log(tmp);
    if (false) {
        var tmp = "hello world";
    }
}
f(); // undefined

// 用来计数的循环变量泄露为全局变量
var s = "hello";
for (var i = 0; i < s.length; i++) {
    console.log(s[i]);
}
console.log(i);

function f1() {
    let n = 5;
    if (true) {
        let n = 10;
    }
    console.log(n); // 5
}
f1();

// ES5 规定，函数只能在顶层作用域和函数作用域之中声明，不能在块级作用域声明
// ES6 引入了块级作用域，明确允许在块级作用域之中声明函数,ES6 规定，块级作用域之中，函数声明语句的行为类似于let，在块级作用域之外不可引用
// 为什么报错,为了减轻因此产生的不兼容问题，ES6 在附录 B里面规定，ES6 的浏览器实现可以不遵守上面的规定，有自己的行为方式
// 允许在块级作用域内声明函数
// 函数声明类似于var，即会提升到全局作用域或函数作用域的头部
// 同时，函数声明还会提升到所在的块级作用域的头部
// 浏览器的 ES6 环境中，块级作用域内声明的函数，行为类似于var声明的变量
// 考虑到环境导致的行为差异太大，应该避免在块级作用域内声明函数。如果确实需要，也应该写成函数表达式，而不是函数声明语句
function f() {
    console.log("I am outside!");
}
(function() {
    if (false) {
        function f() {
            console.log("I am inside!");
        }
    }

    // f();
})();

// 块级作用域内部，优先使用函数表达式,而不是函数声明语句
{
    let a = "secret";
    let f = function() {
        return a;
    };

    console.log(f());
}
// ES6 的块级作用域必须有大括号，如果没有大括号，JavaScript 引擎就认为不存在块级作用域
// 没有大括号,不存在块级作用域
if (true) {
    let x = 1;
}

// 获取顶层对象
// 方法一
typeof window !== "undefined"
    ? window
    : typeof process === "object" &&
      typeof require === "function" &&
      typeof global === "object"
    ? global
    : this;

// 方法二
var getGlobal = function() {
    if (typeof self !== "undefined") {
        return self;
    }
    if (typeof window !== "undefined") {
        return window;
    }
    if (typeof global !== "undefined") {
        return global;
    }
    throw new Error("unable to locate global object");
};

// 解构赋值
let [foo, [[bar], baz]] = [1, [[2], 3]];
let [, , third] = ["foo", "bar", "baz"];
let [head, ...tail] = [1, 2, 3, 4];
let [x, y, ...z] = ["a"];
let { foo, bar } = { foo: "aaa", bar: "bbb" };

// 不完全解构
let [a, [b], d] = [1, [2, 3], 4];
// 指定默认值:内部使用严格相等运算符（===），判断一个位置是否有值
let [x, y = "b"] = ["a", undefined]; // x='a', y='b'

let { log, sin, cos } = Math;
const { log } = console;
// 变量名与属性名不一致
let { foo: baz } = { foo: "aaa", bar: "bbb" };
let obj = {
    p: ["Hello", { y: "World" }]
};
let {
    p: [x, { y }]
} = obj;
let arr = [1, 2, 3];
let { 0: first, [arr.length - 1]: last } = arr;

let x;
({ x } = { x: 1 });

const [a, b, c, d, e] = "hello";
let { toString: s } = 123;

[
    [1, 2],
    [3, 4]
].map(([a, b]) => a + b);

function move({ x = 0, y = 0 } = {}) {
    return [x, y];
}
move({ x: 3, y: 8 }); // [3, 8]
move({ x: 3 }); // [3, 0]
move({}); // [0, 0]
move(); // [0, 0]

function move({ x, y } = { x: 0, y: 0 }) {
    return [x, y];
}
move({ x: 3, y: 8 }); // [3, 8]
move({ x: 3 }); // [3, undefined]
move({}); // [undefined, undefined]
move(); // [0, 0]

let jsonData = {
    id: 42,
    status: "OK",
    data: [867, 5309]
};
let { id, status, data: number } = jsonData;

// 指定参数的默认值，就避免了在函数体内部再写var foo = config.foo || 'default foo';
jQuery.ajax = function(
    url,
    {
        async = true,
        beforeSend = function() {},
        cache = true,
        complete = function() {},
        crossDomain = false,
        global = true
        // ... more config
    } = {}
) {
    // ... do stuff
};

const map = new Map();
map.set("first", "hello");
map.set("second", "world");

for (let [key, value] of map) {
    console.log(key + " is " + value);
}
for (let [key] of map) {
    // ...
}

for (let [, value] of map) {
    // ...
}

const { SourceMapConsumer, SourceNode } = require("source-map");

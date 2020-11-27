// 为函数的参数指定默认值
function Point(x = 0, y = 0) {
    this.x = x;
    this.y = y;
}

// 重新计算默认值表达式的值
let x = 99;
function foo(p = x + 1) {
    console.log(p);
}
foo(); // 100
x = 100;
foo(); // 101

function foo({ x, y = 5 }) {
    console.log(x, y);
}
foo({}); // undefined 5
foo({ x: 1 }); // 1 5

function fetch(url, { body = "", method = "GET", headers = {} }) {
    console.log(method);
}
fetch("http://example.com", {}); // GET
fetch("http://example.com"); // 报错

// 函数参数的默认值是空对象，但是设置了对象解构赋值的默认值
function m1({ x = 0, y = 0 } = {}) {
    return [x, y];
}
// 参数的默认值是一个有具体属性的对象，但是没有设置对象解构赋值的默认值
function m2({ x, y } = { x: 0, y: 0 }) {
    return [x, y];
}
m1({}); // [0, 0];
m2({}); // [undefined, undefined]

// 如果非尾部参数设置默认值，实际上这个参数没法省略
// 函数length属性，将返回没有指定默认值的参数个数

// 参数的默认值，函数进行声明初始化时，参数会形成一个单独的作用域（context）
let x = 1;
function f(y = x) {
    let x = 2;
    console.log(y);
}
f(); // 1

let foo = "outer";
function bar(func = () => foo) {
    let foo = "inner";
    console.log(func());
}
bar(); // outer

function throwIfMissing() {
    throw new Error("Missing parameter");
}

function foo(mustBeProvided = throwIfMissing()) {
    return mustBeProvided;
}
foo();

//  rest 参数（形式为...变量名），用于获取函数的多余参数
//　rest 参数之后不能再有其他参数（即只能是最后一个参数）
function add(...values) {
    let sum = 0;
    for (var val of values) {
        sum += val;
    }
    return sum;
}
add(2, 5, 3);

function sortNumbers() {
    return Array.prototype.slice.call(arguments).sort();
}
const sortNumbers = (...numbers) => numbers.sort();

// 函数内部可以设定为严格模式,只要函数参数使用了默认值、解构赋值、或者扩展运算符，那么函数内部就不能显式设定为严格模式，否则会报错

// name 属性
const bar = function baz() {};
bar.name(
    // "baz"
    new Function()
).name; // "anonymous"

var sum = (num1, num2) => num1 + num2;
// 等同于
var sum = function (num1, num2) {
    return num1 + num2;
};
let getTempItem = (id) => ({ id: id, name: "Temp" });

const full = ({ first, last }) => first + " " + last;

function foo() {
    setTimeout(() => {
        console.log("id:", this.id);
    }, 100);
}
var id = 21;
foo.call({ id: 42 }); // id: 42

function Timer() {
    this.s1 = 0;
    this.s2 = 0;
    // 箭头函数 作用域 timer
    setInterval(() => this.s1++, 1000);
    // 普通函数  this指向运行时所在的作用域（即全局对象）
    setInterval(function () {
        this.s2++;
    }, 1000);
}
var timer = new Timer();
setTimeout(() => console.log("s1: ", timer.s1), 3100); // 3
setTimeout(() => console.log("s2: ", timer.s2), 3100); // 0

// this指向固定化
var handler = {
    id: "123456",

    init: function () {
        document.addEventListener(
            "click",
            (event) => this.doSomething(event.type),
            false
        );
    },

    doSomething: function (type) {
        console.log("Handling " + type + " for " + this.id);
    },
};

let insert = (value) => ({
    into: (array) => ({
        after: (afterValue) => {
            array.splice(array.indexOf(afterValue) + 1, 0, value);
            return array;
        },
    }),
});

insert(2).into([1, 3]).after(1); //[1, 2, 3]

const pipeline = (...funcs) => (val) => funcs.reduce((a, b) => b(a), val);

const plus1 = (a) => a + 1;
const mult2 = (a) => a * 2;
const addThenMult = pipeline(plus1, mult2);
addThenMult(5); // 12

// 尾递归
function factorial(n, total) {
    if (n === 1) return total;
    return factorial(n - 1, n * total);
}
factorial(5, 1); // 120

function tailFactorial(n, total) {
    if (n === 1) return total;
    return tailFactorial(n - 1, n * total);
}
function factorial(n) {
    return tailFactorial(n, 1);
}
factorial(5);

// 柯里化（currying）
function currying(fn, n) {
    return function (m) {
        return fn.call(this, m, n);
    };
}
function tailFactorial(n, total) {
    if (n === 1) return total;
    return tailFactorial(n - 1, n * total);
}
const factorial = currying(tailFactorial, 1);
factorial(5);

function Fibonacci(n) {
    if (n <= 1) {
        return 1;
    }

    return Fibonacci(n - 1) + Fibonacci(n - 2);
}
Fibonacci(100); // 超时

function Fibonacci2(n, ac1 = 1, ac2 = 1) {
    if (n <= 1) {
        return ac2;
    }

    return Fibonacci2(n - 1, ac2, ac1 + ac2);
}
Fibonacci2(1000);

// 蹦床函数（trampoline）
function trampoline(f) {
    while (f && f instanceof Function) {
        f = f();
    }
    return f;
}
function sum(x, y) {
    if (y > 0) {
        return sum.bind(null, x + 1, y - 1);
    } else {
        return x;
    }
}
trampoline(sum(1, 100000));

function tco(f) {
    var value;
    var active = false;
    var accumulated = [];

    return function accumulator() {
        accumulated.push(arguments);
        if (!active) {
            active = true;
            while (accumulated.length) {
                value = f.apply(this, accumulated.shift());
            }
            active = false;
            return value;
        }
    };
}
var sum = tco(function (x, y) {
    if (y > 0) {
        return sum(x + 1, y - 1);
    } else {
        return x;
    }
});
sum(1, 100000); // 100001


x => x * x

function (x) {
    return x * x;
}

(x, y, ...rest) => {
    var i, sum = x + y;
    for (i=0; i<rest.length; i++) {
        sum += rest[i];
    }
    return sum;
}

x => ({ foo: x }):// 要返回一个对象

var obj = {
    birth: 1990,
    getAge: function () {
        var b = this.birth; // 1990
        var fn = function () {
            return new Date().getFullYear() - this.birth; // this指向window或undefined
        };
        return fn();
    }
};

var obj = {
    birth: 1990,
    getAge: function () {
        var b = this.birth; // 1990
        var fn = () => new Date().getFullYear() - this.birth; // this指向obj对象
        return fn();
    }
};
obj.getAge(); // 25

var obj = {
    birth: 1990,
    getAge: function (year) {
        var b = this.birth; // 1990
        var fn = (y) => y - this.birth; // this.birth仍是1990
        return fn.call({birth:2000}, year);
    }
};
obj.getAge(2015); // 25
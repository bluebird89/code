const cars = { BMW: 3, Tesla: 2, Toyota: 1 };
const vals = Object.keys(cars).map((key) => cars[key]); // [3,2,1]
const values = Object.values(cars); // [3,2,1]

Object.keys(cars).forEach(function (key) {
    console.log("key:" + key + " value: " + cars[key]);
});

// for (let [key, value] of Object.enteries(cars)) {
//     console.log("key: ${key} value: ${value}");
// }

const map1 = new Map();
Object.keys(cars).forEach((key) => {
    map1.set(key, cars[key]);
}); // {'BMW' => 3,'Tesla' => 2,'Toyota' => 1}
// const map = new Map(Object.enteries(cars));

// 'someString'.padStart(numberOfCharcters [,stringForPadding]);
"5".padStart(10, "=*");
"5".padEnd(10, "=*");
// 补前置0
// const formatted = [0, 1, 12, 123, 1234, 12345].map((num) => {
//     num.toSting().padStart(10, "0");
// });
// 不同长度字符串对齐
// Object.enteries(cars).map(([name, count]) => {
//     console.log(`${name.padEnd(20, " -")} Count: ${count.padStart(3, "0")}`);
// });

"heart".padStart(10, "❤️"); // prints.. '❤️❤️❤heart' // ❤️占用 2 个码位（’\u2764\uFE0F’）！heart 本身是 5 个字符，所以我们只剩下 5 个字符来填充

Math.pow(7, 2);

function f(x, y) {
    return { x, y };
}
f(1, 2); // Object {x: 1, y: 2}

let birth = "2000/01/01";
let propKey = "foo";
const Person = {
    name: "张三",
    //等同于birth: birth
    birth,
    // 等同于hello: function ()...
    hello() {
        console.log("我的名字是", this.name);
    },
    [propKey]: true,
    ["a" + "bc"]: 123,
    "first word": "hello",
    ["h" + "ello1"]() {
        return "hi";
    },
};
console.log(Person);

const obj = {
    get foo() {},
    set foo(x) {},
};
const descriptor = Object.getOwnPropertyDescriptor(obj, "foo");
descriptor.get.name; // "get foo"
descriptor.set.name; // "set foo"

new Function().name; // "anonymous"

var doSomething = function () {
    // ...
};
doSomething.bind().name; // "bound doSomething"

let obj1 = { foo: 123 };
Object.getOwnPropertyDescriptor(obj, "foo");

// SUPER
const proto = {
    foo: "hello",
};

const obj2 = {
    foo: "world",
    find() {
        return super.foo;
    },
};

Object.setPrototypeOf(obj2, proto);
obj2.find(); // "hello"

let { x, y, ...z } = { x: 1, y: 2, a: 3, b: 4 };
x; // 1
y; // 2
z; // { a: 3, b: 4 }

const firstName =
    (message &&
        message.body &&
        message.body.user &&
        message.body.user.firstName) ||
    "default";

Object.is(+0, -0); // false
Object.is(NaN, NaN); // true

const target = { a: 1 };
const source1 = { b: 2 };
const source2 = { c: 3 };

Object.assign(target, source1, source2);
source1.b = 4;
target; // {a:1, b:2, c:3}
source1.b = 4;
target.b;
Object.assign([1, 2, 3], [4, 5]); // [4, 5, 3]

const obj = {
    foo: 123,
    get bar() {
        return "abc";
    },
};
Object.getOwnPropertyDescriptors(obj);

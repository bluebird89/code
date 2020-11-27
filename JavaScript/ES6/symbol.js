let s = Symbol();
typeof s;

let s1 = Symbol("foo");
let s2 = Symbol("foo");
s1 === s2; // false;

const sym = Symbol("foo");

String(sym); // "Symbol(foo)"
sym.toString(); // "Symbol(foo)"

sym.description; // foo

let mySymbol = Symbol();
// 第一种写法
let a = {};
a[mySymbol] = "Hello!";

// 第二种写法
let a = {
    [mySymbol]: "Hello!",
};

// 第三种写法
let a = {};
Object.defineProperty(a, mySymbol, { value: "Hello!" });

// 以上写法都得到同样结果
a[mySymbol]; // "Hello!"

let s3 = Symbol.for("foo");
let s4 = Symbol.for("foo");

s3 === s4; // true

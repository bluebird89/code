// 扩展运算符
console.log(1, ...[2, 3, 4], 5);

function push(array, ...items) {
    array.push(...items);
}
function add(x, y) {
    return x + y;
}
const numbers = [4, 38];
add(...numbers);

// 取代apply
Math.max.apply(null, [14, 3, 77]);
Math.max(...[14, 3, 77]);

let arr1 = [0, 1, 2];
let arr2 = [3, 4, 5];
arr1.push(...arr2);
new Date(...[2015, 1, 1]);

// 复制数组
const a1 = [1, 2];
a2 = [...a1];
[...a2] = a1;

// 是浅拷贝
arr1 = ["a", "b"];
arr2 = ["c"];
const arr3 = ["d", "e"];
[...arr1, ...arr2, ...arr3];

// const [a, ...rest] = list;

[..."hello"]; // [ "h", "e", "l", "l", "o" ]
[..."x\uD83D\uDE80y"].length; // 3

Number.prototype[Symbol.iterator] = function* () {
    let i = 0;
    let num = this.valueOf();
    while (i < num) {
        yield i++;
    }
};
console.log([...5]); // [0, 1, 2, 3, 4]

let map = new Map([
    [1, "one"],
    [2, "two"],
    [3, "three"],
]);
let arr4 = [...map.keys()]; // [1, 2, 3]

const go = function* () {
    yield 1;
    yield 2;
    yield 3;
};
[...go()]; // [1, 2, 3]

let arrayLike = {
    "0": "a",
    "1": "b",
    "2": "c",
    length: 3,
};
let arr5 = Array.from(arrayLike); // ['a', 'b', 'c']
Array.from("hello");
Array.from([1, 2, 3], (x) => x * x);

Array.of(3, 11, 8); // [3,11,8]

[1, 2, 3, 4, 5].copyWithin(0, 3); // [4, 5, 3, 4, 5]
// 将3号位复制到0号位
[1, 2, 3, 4, 5].copyWithin(0, 3, 4); // [4, 2, 3, 4, 5]
// -2相当于3号位，-1相当于4号位
[1, 2, 3, 4, 5].copyWithin(0, -2, -1); // [4, 2, 3, 4, 5]

[1, 5, 10, 15].find(function (value, index, arr) {
    return value > 9;
}); // 10

function f(v) {
    return v > this.age;
}
let person = { name: "John", age: 20 };
[10, 12, 26, 15].find(f, person); // 26

[1, 5, 10, 15].findIndex(function (value, index, arr) {
    return value > 9;
}); // 2
[NaN].findIndex((y) => Object.is(NaN, y)); // 0

["a", "b", "c"].fill(7);
[("a", "b", "c")].fill(7, 1, 2);

for (let index of ["a", "b"].keys()) {
    console.log(index);
}
for (let elem of ["a", "b"].values()) {
    console.log(elem);
}
for (let [index, elem] of ["a", "b"].entries()) {
    console.log(index, elem);
}

let letter = ["a", "b", "c"];
let entries = letter.entries();
console.log(entries.next().value); // [0, 'a']
console.log(entries.next().value); // [1, 'b']
console.log(entries.next().value); // [2, 'c']

const arr = [1, 2, 3, 4, NaN];
if (arr.includes(3)) {
    console.log(true);
}
arr.includes(NaN); // true
[1, 2, 3].includes(3, 3); // false

[1, 2, [3, [4, 5]]].flat(); // [1, 2, 3, [4, 5]]
[1, 2, [3, [4, 5]]].flat(2); // [1, 2, 3, 4, 5]
[1, [2, [3]]].flat(Infinity);
[2, 3, 4].flatMap((x) => [x, x * 2]); // [2, 4, 3, 6, 4, 8]

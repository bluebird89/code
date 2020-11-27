const s = new Set();
[2, 3, 5, 4, 5, 2, 2].forEach((x) => s.add(x));
for (let i of s) {
    console.log(i);
}

const set = new Set([1, 2, 3, 4, 4]);
[...set]; // [1, 2, 3, 4]

// 例二
const items = new Set([1, 2, 3, 4, 5, 5, 5, 5]);
items.size; // 5

// 例三
const set = new Set(document.querySelectorAll("div"));
set.size; // 56

[...new Set("ababbc")].join(""); // "abc"
s.add(1).add(2).add(2);
s.size;
s.has(3);
s.delete(2);

let set = new Set(["red", "green", "blue"]);

for (let item of set.keys()) {
    console.log(item);
}

for (let item of set.values()) {
    console.log(item);
}

for (let item of set.entries()) {
    console.log(item);
}

let set = new Set([1, 2, 3]);
set = new Set([...set].map((x) => x * 2));
// 返回Set结构：{2, 4, 6}

let set = new Set([1, 2, 3, 4, 5]);
set = new Set([...set].filter((x) => x % 2 == 0));

let a = new Set([1, 2, 3]);
let b = new Set([4, 3, 2]);

// 并集
let union = new Set([...a, ...b]);
// Set {1, 2, 3, 4}

// 交集
let intersect = new Set([...a].filter((x) => b.has(x)));
// set {2, 3}

// （a 相对于 b 的）差集
let difference = new Set([...a].filter((x) => !b.has(x)));

const ws = new WeakSet();
const a = [
    [1, 2],
    [3, 4],
];
const ws = new WeakSet(a); // WeakSet {[1, 2], [3, 4]}

var s = new Set(["A", "B", "C"]);
s.forEach(function (element, sameElement, set) {
    alert(element);
});

var m = new Map([
    ["Michael", 95],
    ["Bob", 75],
    ["Tracy", 85],
]);

[...myMap];

var m = new Map(); // 空Map
const o = { p: "Hello World" };

m.set(o, "content");
m.set("Adam", 67); // 添加新的key-value
m.has("Adam"); // 是否存在key 'Adam': true
m.get("Adam"); // 67
m.delete("Adam"); // 删除key 'Adam'
m.get("Adam"); // undefined

m.forEach(function (value, key, map) {
    alert(value);
});

const set = new Set([
    ["foo", 1],
    ["bar", 2],
]);
const m1 = new Map(set);
m1.get("foo"); // 1

const m2 = new Map([["baz", 3]]);
const m3 = new Map(m2);

// 同一个键，但实际上这是两个不同的数组实例
map.set(["a"], 555);
map.get(["a"]); // undefined

const reporter = {
    report: function (key, value) {
        console.log("Key: %s, Value: %s", key, value);
    },
};

map.forEach(function (value, key, map) {
    this.report(key, value);
}, reporter);

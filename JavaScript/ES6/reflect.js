var myObject = {
    foo: 1,
    bar: 2,
    get baz() {
        return this.foo + this.bar;
    },
    set bar(value) {
        return (this.foo = value);
    },
};
var myReceiverObject = {
    foo: 3,
    bar: 3,
    foo: 0,
};

Reflect.get(myObject, "foo"); // 1
Reflect.get(myObject, "baz", myReceiverObject); // 6
Reflect.set(myObject, "bar", 3);
myObject.foo; // 3

Reflect.set(myObject, "bar", 1, myReceiverObject);
myObject.foo; // 4
myReceiverObject.foo; // 1
Reflect.has(myObject, "foo"); // true
Reflect.deleteProperty(myObj, "foo");

function Greeting(name) {
    this.name = name;
}
// new 的写法
const instance = new Greeting("张三");
// Reflect.construct 的写法
const instance = Reflect.construct(Greeting, ["张三"]);

const ages = [11, 33, 12, 54, 18, 96];
const youngest = Reflect.apply(Math.min, Math, ages);
const oldest = Reflect.apply(Math.max, Math, ages);
const type = Reflect.apply(Object.prototype.toString, youngest, []);

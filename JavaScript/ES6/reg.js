// 构造
var regex = new RegExp("xyz", "i");
var regex = new RegExp(/xyz/i);
var regex = /xyz/i;
// 第二个参数指定修饰符。而且，返回的正则表达式会忽略原有的正则表达式的修饰符，只使用新指定的修饰符
new RegExp(/abc/gi, "i").flags;

console.log("xyz".match(regex));
console.log("xyzdsafgfsdgdfas".replace(regex, "123"));
console.log("asdadxyzsdfasfdafsdf".search(regex));
console.log("xyzssadfasdf".split("", 5));

// 添加了u修饰符，含义为“Unicode 模式”，用来正确处理大于\uFFFF的 Unicode 字符。也就是说，会正确处理四个字节的 UTF-16 编码
/^\uD83D/u.test("\uD83D\uDC2A"); // false
var s = "𠮷";
/^.$/.test(s); // false
/^.$/u.test(s); // true

// 大括号表示 Unicode 字符，这种表示法在正则表达式中必须加上u修饰符，才能识别当中的大括号，否则会被解读为量词
/a{2}/u.test("aa"); // true
/𠮷{2}/u.test("𠮷𠮷"); // true

// \S是预定义模式，匹配所有非空白字符。只有加了u修饰符，它才能正确匹配码点大于0xFFFF的 Unicode 字符
/^\S$/u.test("𠮷"); // true

function codePointLength(text) {
    var result = text.match(/[\s\S]/gu);
    return result ? result.length : 0;
}

var s = "𠮷𠮷";
s.length; // 4
codePointLength(s); // 2

// unicode属性，表示是否设置了u修饰符
const r1 = /hello/;
const r2 = /hello/u;
r1.unicode; // false
r2.unicode; // true

// y修饰符，叫做“粘连”（sticky）修饰符 作用与g修饰符类似，也是全局匹配，后一次匹配都从上一次匹配成功的下一个位置开始。不同之处在于，g修饰符只要剩余位置中存在匹配就可，而y修饰符确保匹配必须从剩余的第一个位置开始
var s = "aaa_aa_a";
var r3 = /a+/g;
var r4 = /a+/y;

r3.exec(s); // ["aaa"]
r4.exec(s); // ["aaa"]
r3.exec(s); // ["aa"]
r4.exec(s); // null

// lastIndex属性指定每次搜索的开始位置，g修饰符从这个位置开始向后搜索，直到发现匹配为止
const REGEX = /a/g;
// 指定从2号位置（y）开始匹配
REGEX.lastIndex = 2;
// 匹配成功
const match = REGEX.exec("xaya");
// 在3号位置匹配成功
match.index; // 3
// 下一次匹配从4号位开始
REGEX.lastIndex; // 4
// 4号位开始匹配失败
REGEX.exec("xaya"); // null

// 要求必须在lastIndex指定的位置发现匹配
const REGEX1 = /a/y;
// 指定从2号位置开始匹配
REGEX1.lastIndex = 2;
// 不是粘连，匹配失败
REGEX1.exec("xaya"); // null
// 指定从3号位置开始匹配
REGEX1.lastIndex = 3;
// 3号位置是粘连，匹配成功
const match1 = REGEX1.exec("xaya");
match1.index; // 3
REGEX1.lastIndex; // 4
REGEX1.sticky;

// 点（.）是一个特殊字符，代表任意的单个字符，两个例外
// 一个是四个字节的 UTF-16 字符，这个可以用u修饰符解决
// 行终止符（line terminator character）
// s修饰符，使得.可以匹配任意单个字符 dotAll模式，即点（dot）代表一切字符
/foo.bar/s.test("foo\nbar");

// ES2018 引入后行断言
// “先行断言”，x只有在y前面才匹配，必须写成/x(?=y)/
// “先行否定断言”，x只有不在y前面才匹配，必须写成/x(?!y)/
/\d+(?=%)/.exec("100% of US presidents have been male"); // 只匹配百分号之前的数字，["100"]
/\d+(?!%)/.exec("that’s all 44 of them"); // 只匹配不在百分号之前的数字 ["44"]

// 后行断言” x只有在y后面才匹配，必须写成/(?<=y)x/
// “后行否定断言” x只有不在y后面才匹配，必须写成/(?<!y)x/
/(?<=\$)\d+/.exec("Benjamin Franklin is on the $100 bill"); // 只匹配美元符号之后的数字 ["100"]
/(?<!\$)\d+/.exec("it’s is worth about €90"); //只匹配不在美元符号后面的数字
// “后行断言”的实现，需要先匹配/(?<=y)x/的x，然后再回到左边，匹配y的部分。这种“先右后左”的执行顺序，与所有其他正则操作相反，导致了一些不符合预期的行为。
const RE_DOLLAR_PREFIX = /(?<=\$)foo/g;
"$foo %foo foo".replace(RE_DOLLAR_PREFIX, "bar");

// \p{...}和\P{...}，允许正则表达式匹配符合 Unicode 某种属性的所有字符
// \P{…}是\p{…}的反向匹配，即匹配不满足条件的字符
const regexGreekSymbol = /\p{Script=Greek}/u;
regexGreekSymbol.test("π");

// ES2018 引入了具名组匹配（Named Capture Groups），允许为每一个组匹配指定一个名字，既便于阅读代码，又便于引用
const RE_DATE = /(?<year>\d{4})-(?<month>\d{2})-(?<day>\d{2})/;
const matchObj = RE_DATE.exec("1999-12-31");
const year = matchObj.groups.year; // 1999
const month = matchObj.groups.month; // 12
const day = matchObj.groups.day; // 31

let {
    groups: { one, two }
} = /^(?<one>.*):(?<two>.*)$/u.exec("foo:bar");
one; // foo
two; // bar

// 正则匹配索引
const text = "zabbcdef";
const re = /ab+(cd(ef))/;
const result = re.exec(text);

result.index; // 1
result.indices;

// ES2020 增加了String.prototype.matchAll()方法，可以一次性取出所有匹配。不过，它返回的是一个遍历器（Iterator），而不是数组
const string = "test1test2test3";
const regex = /t(e)(st(\d?))/g;

for (const match of string.matchAll(regex)) {
    console.log(match);
}

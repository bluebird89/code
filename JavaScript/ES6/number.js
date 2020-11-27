// 在严格模式之中，八进制就不再允许使用前缀0表示，ES6 进一步明确，要使用前缀0o表示
0b111110111 === 503; // true
0o767 === 503; // true
Number("0o10"); //转为十进制  8

Number.isFinite(15); // true
Number.isFinite(0.8); // true
Number.isFinite(NaN); // false
Number.isFinite(-Infinity); // false
Number.isFinite("foo"); // false
Number.isFinite("15"); // false
Number.isFinite(true); // false

// 参数类型不是NaN，一律返回false
Number.isNaN(NaN); // true
Number.isNaN(true); // false
Number.isNaN(9 / NaN); // true
Number.isNaN("true" / 0); // true
Number.isNaN("true" / "true"); // true

// 移植到Number对象上面,逐步减少全局性方法，使得语言逐步模块化
Number.parseInt("12.34"); // 12
Number.parseFloat("123.45#"); // 123.45

// 整数和浮点数采用的是同样的储存方法，所以 25 和 25.0 被视为同一个值,参数不是数值， 返回false
Number.isInteger(25.1); // false
Number.isInteger(25.0); // true
Number.isInteger("15"); // false

// 采用 IEEE 754 标准，数值存储为64位双精度格式，数值精度最多可以达到 53 个二进制位（1 个隐藏位与 52 个有效位）。如果数值的精度超过这个限度，第54位及后面的位就会被丢弃
Number.isInteger(3.0000000000000002);
Number.isInteger(5e-325);

// 常量Number.EPSILON。根据规格，它表示 1 与大于 1 的最小浮点数之间的差
Number.EPSILON === Math.pow(2, -52); // true
Number.EPSILON; // 2.220446049250313e-16
Number.EPSILON.toFixed(20); // "0.00000000000000022204"

0.1 + 0.2 - 0.3;
0.1 + 0.2 === 0.3; // false
// JavaScript 能够准确表示的整数范围在-2^53到2^53之间（不含两个端点），超过这个范围，无法精确表示这个值
Number.MAX_SAFE_INTEGER === Math.pow(2, 53) - 1;

Number.isSafeInteger(3); // true
Number.isSafeInteger(1.2); // false
Number.isSafeInteger(9007199254740990); // true

// 去除一个数的小数部分，返回整数部分
Math.trunc(-4.9); // -4
Math.trunc(-0.1234); // -0
Math.trunc("123.456"); // 123
Math.trunc(true); //1
Math.trunc(false); // 0
Math.trunc(null); // 0

// Math.sign方法用来判断一个数到底是正数、负数、还是零。对于非数值，会先将其转换为数值
Math.sign(-5); // -1
Math.sign(5); // +1
Math.sign(0); // +0
Math.sign(-0); // -0
Math.sign(NaN); // NaN
Math.sign(""); // 0
Math.sign(true); // +1
Math.sign(false); // 0
Math.sign(null); // 0
Math.sign("9"); // +1
Math.sign("foo"); // NaN
Math.sign(); // NaN
Math.sign(undefined); // NaN

// Math.cbrt()方法用于计算一个数的立方根
Math.cbrt(2); // 1.2599210498948732
Math.cbrt("hello"); // NaN

// 将参数转为 32 位无符号整数的形式，然后返回这个 32 位值里面有多少个前导 0
Math.clz32(0b01000000000000000000000000000000); // 1
Math.clz32(1 << 29); // 2
// 对于小数，Math.clz32方法只考虑整数部分。
Math.clz32(3.2); // 30
Math.clz32(3.9); // 30
// Math.imul方法返回两个数以 32 位带符号整数形式相乘的结果，返回的也是一个 32 位的带符号整数
Math.imul(-2, -2); // 4
// Math.hypot方法返回所有参数的平方和的平方根。

Math.hypot(3, 4); // 5
Math.hypot(3, 4, 5); // 7.0710678118654755
Math.hypot(); // 0
Math.hypot(NaN); // NaN
Math.hypot(3, 4, "foo"); // NaN
Math.hypot(3, 4, "5"); // 7.0710678118654755

// Math.expm1(x)返回 ex - 1
Math.expm1(1); // 1.718281828459045
// Math.log1p(x)方法返回1 + x的自然对数
Math.log1p(-1); // -Infinity
// Math.log10(x)返回以 10 为底的x的对数
Math.log10(1); // 0

2 ** 3; // 8

// BigInt 只用来表示整数，没有位数的限制，任何位数的整数都可以精确表示
// BigInt()构造函数必须有参数，而且参数必须可以正常转为数值
0b1101n; // 二进制
0o777n; // 八进制
0xffn; // 十六进制
Math.pow(2, 53) === Math.pow(2, 53) + 1; // true
const a = 2172141653n;
const b = 15346349309n;
// BigInt 可以保持精度
a * b; // 33334444555566667777n
// 普通整数无法保持精度
Number(a) * Number(b); // 33334444555566670000
const max = 2n ** (64n - 1n) - 1n;

BigInt.asIntN(64, max); // 9223372036854775807n
BigInt.asIntN(64, max + 1n); // -9223372036854775808n
BigInt.asUintN(64, max + 1n); // 9223372036854775808n
Number.parseInt("9007199254740993", 10); // 9007199254740992

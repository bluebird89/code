## [ECMAScript6](https://es6.ruanyifeng.com/#docs/intro)

- ECMAScript 和 JavaScript 的关系:前者是后者的规格，后者是前者的一种实现
- ES6 与 ECMAScript 2015 的关系
  - 标准委员会最终决定，标准在每年的 6 月份正式发布一次，作为当年的正式版本。接下来的时间，就在这个版本的基础上做改动，直到下一年的 6 月份，草案就自然变成了新一年的版本。这样一来，就不需要以前的版本号了，只要用年份标记就可以了
  - ES6 第一个版本，在 2015 年 6 月发布了，正式名称就是《ECMAScript 2015 标准》（简称 ES2015）
  - ES6 既是一个历史名词，也是一个泛指，含义是 5.1 版以后的 JavaScript 的下一代标准，涵盖了 ES2015、ES2016、ES2017 等等，而 ES2015 则是正式名称，特指该年发布的正式版本的语言标准

## [Babel](https://babeljs.io/)

- 一个广泛使用的 ES6 转码器，将 ES6 代码转为 ES5 代码，从而在老版本的浏览器执行
- 配置
  ts 字段设定转码规则
- @babel/cli:命令行工具，用于命令行转码
- @babel/node:提供一个支持 ES6 的 REPL 环境。支持 Node 的 REPL 环境的所有功能，而且可以直接运行 ES6 代码
- @babel/register:改写 require 命令，为它加上一个钩子。此后每当使用 require 加载.js、.jsx、.es 和.es6 后缀名的文件，就会先用 Babel 进行转码.只会对 require 命令加载的文件转码，而不会对当前文件转码。另外，由于它是实时转码，所以只适合在开发环境使用
- polyfill
  - 只转换新的 JavaScript 句法（syntax），而不转换新的 API，比如 Iterator、Generator、Set、Map、Proxy、Reflect、Symbol、Promise 等全局对象，以及一些定义在全局对象上的方法（比如 Object.assign）都不会转码
  - 使用 core-js 和 regenerator-runtime(后者提供 generator 函数的转码)，为当前环境提供一个垫片
- 使用@babel/standalone 模块提供的浏览器版本，将其插入网页.网页实时将 ES6 代码转为 ES5

```
npm install --save-dev @babel/core
# 最新转码规则
npm install --save-dev @babel/preset-env
# react 转码规则
npm install --save-dev @babel/preset-react

npm install --save-dev @babel/cli

# .babelrc
{
"presets": [
    "@babel/env",
    "@babel/preset-react"
],
"plugins": []
}

npx babel example.js --out-file|-o compiled.js
npx babel src --out-dir|-d lib
npm install --save-dev @babel/node
npx babel-node # 进入 REPL 环境
npx babel-node es6.js

npm install --save-dev @babel/register

npm install --save-dev core-js regenerator-runtime

import 'core-js';
import 'regenerator-runtime/runtime';

require('core-js');
require('regenerator-runtime/runtime);
```

## 变量

- ES5 只有两种声明变量的方法：var命令和function命令
- ES6 添加let和const import命令和class命令
- let:只在 let 命令所在的代码块内有效
  - 支持块级作用域的任意嵌套
- const声明的变量不得改变值,一旦声明变量，就必须立即初始化，不能留到以后赋值
  - 只在声明所在的块级作用域内有效
  - 不提升，同样存在暂时性死区，只能在声明的位置后面使用
  - 保证变量指向的那个内存地址所保存的数据不得改动
  - 对于简单类型的数据（数值、字符串、布尔值），值就保存在变量指向的那个内存地址，因此等同于常量。但
  - 对于复合类型的数据（主要是对象和数组），变量指向的内存地址，保存的只是一个指向实际数据的指针，const只能保证这个指针是固定的（即总是指向另一个固定的地址），至于它指向的数据结构是不是可变的，就完全不能控制
- 顶层对象
  - JavaScript 语言存在一个顶层对象，提供全局环境（即全局作用域），所有代码都是在这个环境中运行。但是，顶层对象在各种实现里面是不统一。在浏览器环境指的是window对象，在 Node 指的是global对象，浏览器和 Web Worker 里面，self也指向顶层对象
    - 全局环境中，this会返回顶层对象。但是，Node 模块和 ES6 模块中，this返回的是当前模块。
    - 函数里面的this，如果函数不是作为对象的方法运行，而是单纯作为函数运行，this会指向顶层对象。但是，严格模式下，这时this会返回undefined。
    - 不管是严格模式，还是普通模式，new Function('return this')()，总是会返回全局对象。但是，如果浏览器用了 CSP（Content Security Policy，内容安全策略），那么eval、new Function这些方法都可能无法使用
  - ES5 之中，顶层对象的属性与全局变量是等价的。顶层对象的属性与全局变量挂钩，被认为是 JavaScript 语言最大的设计败笔之一
    - 没法在编译时就报出变量未声明的错误，只有运行时才能知道
    - 程序员很容易不知不觉地就创建了全局变量
    - 顶层对象的属性是到处可以读写的，这非常不利于模块化编程
    - ES6 为了改变这一点，一方面规定，为了保持兼容性，var命令和function命令声明的全局变量，依旧是顶层对象的属性；另一方面规定，let命令、const命令、class命令声明的全局变量，不属于顶层对象的属性
- 解构（Destructuring）:按照一定模式，从数组和对象中提取值，对变量进行赋值
  - 模式匹配：只要等号两边的模式相同，左边的变量就会被赋予对应的值.解构不成功，变量的值就等于undefined
  - 不完全解构:等号左边的模式，只匹配一部分的等号右边的数组
  - 只要某种数据结构具有 Iterator 接口，都可以采用数组形式的解构赋值
  - 允许指定默认值
  - 支持嵌套
  - 对象的解构与数组有一个重要的不同。数组的元素是按次序排列的，变量的取值由它的位置决定；而对象的属性没有次序，变量必须与属性同名，才能取到正确的值
  - 只要等号右边的值不是对象或数组，就先将其转为对象。由于undefined和null无法转为对象
  - 函数参数也支持
  - 可以使用圆括号的情况只有一种：赋值语句的非模式部分，可以使用圆括号
  - 只要有可能导致解构的歧义，就不得使用圆括号
    - 函数参数
    - 赋值语句的模式
    - 变量声明语句
  - 用途
    - 交换变量的值
    - 从函数返回多个值
    - 函数参数定义
    - 提取 JSON 数据
    - 函数参数的默认值
    - 遍历 Map 结构
    - 输入模块的指定方法

## String

- 允许采用\uxxxx形式表示一个字符，其中xxxx表示字符的 Unicode 码点,只限于码点在\u0000~\uFFFF之间的字符。超出这个范围的字符，必须用两个双字节的形式表示
- \u后面跟上超过0xFFFF的数值:将码点放入大括号，就能正确解读该字符
- 添加了遍历器接口,最大的优点是可以识别大于0xFFFF的码点，传统的for循环无法识别这样的码点
- 有5个字符，不能在字符串里面直接使用，只能使用转义形式,JSON 格式允许字符串里面直接使用 U+2028（行分隔符）和 U+2029（段分隔符）。这样一来，服务器输出的 JSON 被JSON.parse解析，就有可能直接报错.ES2019 允许 JavaScript 字符串直接输入 U+2028（行分隔符）和 U+2029（段分隔符）
  - U+005C：反斜杠（reverse solidus)
  - U+000D：回车（carriage return）
  - U+2028：行分隔符（line separator）
  - U+2029：段分隔符（paragraph separator）
  - U+000A：换行符（line feed）
- JSON.stringify()方法有可能返回不符合 UTF-8 标准的字符串
  - UTF-8 标准规定，0xD800到0xDFFF之间的码点，不能单独使用，必须配对使用.为了表示码点大于0xFFFF的字符的一种变通方法.JSON.stringify()的问题在于可能返回0xD800到0xDFFF之间的单个码点
  - ES2019 改变了JSON.stringify()的行为。如果遇到0xD800到0xDFFF之间的单个码点，或者不存在的配对形式，它会返回转义字符串
- 模板字符串（template string）：增强版的字符串，用反引号（`）标识。它可以当作普通字符串使用，也可以用来定义多行字符串，或者在字符串中嵌入变量
  - 如果使用模板字符串表示多行字符串，所有的空格和缩进都会被保留在输出之中
  - 板字符串之中嵌入变量，需要将变量名写在${}之中，还能调用函数
  - 如果大括号中的值不是字符串，将按照一般的规则转为字符串，是一个对象，将默认调用对象的toString方法
  - 支持嵌套
  - 编译模板
  - 标签模板（tagged template）：紧跟在一个函数名后面，该函数将被调用来处理这个模板字符串
  - 过滤 HTML 字符串，防止用户输入恶意内容
  - 多语言转换（国际化处理）

## 对象

- 对象冻结：使用Object.freeze方法，添加新属性不起作用
- 严格模式时还会报错：除了将对象本身冻结，对象的属性也应该冻结。下面是一个将对象彻底冻结的函数

## 函数

－　arguments

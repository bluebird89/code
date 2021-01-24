# JAVA

## 基础

- 环境搭建
- 基本类型
- 引用类型(reference)
    - 数组:相同类型变量集合(定长)
        - 索引数组：变量名是第一个内存地址（指向），实际是一块地址连续内存
        - 0 开始方便使用索引
        - 多维数组是索引多维,第一维指向数组的起始地址
        - 引用数组
    + 寻址：初始地址　+ 偏移
    + string
    + 引用与对象，数据类型一致
- 编码
- 运算符
- 控制语句
- 变量作用域
    + 作用域：局限于当前代码块内部使用
* 异常
    - Throwable
    - Error
    - Exception
* 工具类
    - Collection
    - List

## 面向对象

* class object
- 属性　private
* 实例：堆
* 类属性引用
    + 自定义类
    + 当前类
* package
    + 全限定名唯一
- 封装
    + 类内部方法操作内部数据
    + 缺省修饰符　protected：只能被当前包内类以及子类引用
    + private 构造 + static　构造（实例化前检查）
    + public 方法是一种约定，不能随意改动,对外公布,private 内部实现共享
    + 非public　class 可以名字不一样，调用范围有限
- 继承
    + 覆盖：方法　签名　返回值一样
    + super:必须第一行
    + 子类会默认调用弗父类无参构造方法，父类没有无参构造，子类必须生命构造调用父类有参构造
    - 组合:注入
- 多态
    + 重载（overload）：方法名+参数 唯一，调用别的重载方法，多态在于参数。参数可以转换就行
        * 调动最近的转换类型：byte->short->int->long->float->double
        * 构造方法重载 this(),第一行
        * 静态多态：跟引用类型有关，与实际对象无关，没有回溯，往链上方
    + 重写　override　动态多态
        + 父类应用可以指向子类对象,引用对象类型决定调用的方法，可以转换为父类类型
    + 75
- 方法不改变实参（引用）
- 返回参数不受外边影响
- 隐藏　this 自引用
- 方法是类的一部分，不是对象
- 静态变量：大写 下划线
    + 可以修改
- 静态方法：不能直接 this 自引用
    + 重载
— 静态代码块
    + 使用到静态变量，必须在前面声明
- instanceof
- final
    + 属性必须被赋值且一次
    + 引用
- Object
    + String
    + Class
- 反射
    - invoke
- 枚举
- 接口
    + 允许静态方法　私有方法　带缺省实现的抽象方法
    + 接口继承　
- 抽象类
- 静态内部类
- 构造函数不会被继承
- 调用 Clone()，被复制对象类必须实现 Cloneable 接口 
    - 浅复制
    - super.clone()

## 源码

* Math:工具类，禁止实例化，封装成静态方法
* Scanner
* BigInterger
* String:char array->byte array
    - immutable
    - 数据 private
    - charAt
    - substring
    - toCharArray
    - split
    - indexOf
    - contains
    - equals equalsIngoreCase
    - trim()
* StringBuilder
    - toString()
    - reverse()
    - append()
    - delete()
    - insert()
* main
* System
    - currentTimeMillis()

## 规范

* 变量命名
* 逻辑清楚
* 反复练习：经典例题
* 先主逻辑
* 边界
    - 输入范围与现实限制(库存不够)
    - 领域
        + 类属性　只能自己方法操作
        + 内聚
* 功能整理 实现

## 工具

* debug
    - step over
    - condition stop
    - step into/out:压栈
* javadoc
* IDEA
    * psvm
    * sout

## 练习

* 超市　商品　车位　购买　顾客 41节 45 第二件半价

## 算法

* 态度
    * 坚持、刻意练习
    * 练习缺陷、弱点地方
    * 不舒服，枯燥
* 方法
    * 反馈

## TDD

* 任务一:打印出从1到100的数字，将其中3的倍数替换成“Fizz”，5的倍数替换成“Buzz”。既能被3整除、又能被5整除的数则替换成“FizzBuzz”
    - 要求：每行代码都必须有单元测试覆盖
    * 分析 task
        - task1 数字到字符串的转换逻辑：创建一个对象，对象可以对输入的数字做必要的转换，输出一个字符串（可能是“Fizz”、“Buzz”、“FizzBuzz”，或者是原数字的字符串形式）。
        - task2 转换特定的列表：创建一个列表，其中包含从1到100的整数，依次使用前面说的这个对象进行转换，转换后的结果是另一个长度为100的列表。
        - task3 打印输出结果：打印输出任务2得到的结果列表
* 成绩单
    - 阶段：
        + 核心业务实现
        + 与命令行对接
    - 目标
        + 训练基本任务分解能力
        + TDD
    - 要求:在做一个命令行应用。当程序启动的时候，会看到一个命令行的主界面
    - 任务要求
        + 列出完整的任务列表
        + 每个任务需要预估完成所需时间
        + 测试覆盖lv100%
* [出租车计价](https://github.com/gigix/tdd-taxi)：
    - Kata介绍
        + 通过文本文件向应用程序提供输入数据testData.txt，结果以console的形式输出。
        + 应用程序必须能够运行。
    - 要求
        + 不大于2公里时只收起步价6元。
        + 超过2公里时每公里0.8元。
        + 超过8公里则每公里加收50%长途费。
        + 停车等待时加收每分钟0.25元。
        + 最后计价的时候司机会四舍五入只收到元
    - 测试数据：
        + 1公里,等待0分钟
        + 3公里,等待0分钟
        + 10公里,等待0分钟
        + 2公里,等待3分钟
    - 期望输出：
        + 收费6元
        + 收费7元
        + 收费13元
        + 收费7元


```
1. 添加学生
2. 生成成绩单
3. 退出
请输入你的选择（1～3）：

1，那么界面就会变成：
请输入学生信息（格式：姓名, 学号，数学：分数，语文：分数，英语：分数，编程：分数），按回车提交：

# 输入格式不正确，就返回：
请按正确的格式输入（格式：姓名, 学号，数学：分数，语文：分数，英语：分数，编程：分数）：
# 输入格式正确就会返回
学生xxx的成绩被添加

1. 添加学生
2. 生成成绩单
3. 退出
请输入你的选择（1～3）：

# 2，那么界面就会变成：
请输入要打印的学生的学号（格式： 学号, 学号,...），按回车提交：
# 输入不正确，打印：
请按正确的格式输入要打印的学生的学号（格式： 学号, 学号,...），按回车提交：
# 输入的格式正确，则会打印成绩单并回到主界面
成绩单
姓名|数学|语文|英语|编程|平均分|总分
========================
张三|75|95|80|80|82.5|330
李四|85|80|70|90|81.25|325
========================
全班总平均分：xxx
全班总分中位数：xxx

// testData.txt
1公里,等待0分钟
3公里,等待0分钟
10公里,等待0分钟
2公里,等待3分钟
```

## 能力

* 从需求中找出合理的对象设计，是软件开发者的一项必备能力。不过这事也没有那么难，只要专心听需求的描述、留意其中提到的“名词”，你就会找到对象的蛛丝马迹
* 越小的愿望，就越是容易实现

## 设计模式

* 图解设计模式

### Iterator

- 将遍历与实现分离开来，while 循环不依赖 bookShelf 实现
- 不要使用具体实现编程，优先使用抽象类与接口编程
- 角色
    - Aggretate 定义创建 Iterator 接口
    - Iterator 定义遍历接口
    - ConcreteIterator 实现 Iterator 接口
    - ConcreteAggregate 实现 Aggregate 定义接口
- TODO:通过 arraylist 实现
- visitor
- Composite
- Factory Method

### Adapter|Wrapper

- 方法
    - 类适配器：继承
    - 对象适配器：委托
- 角色
    - target 负责定义所需方法
    - adaptee 持有既定方法
    - adapter 使用adaptee的方法满足 target 需求
    - client 负责使用 target 定义方法具体实现
- TODO:2-2
- Bridge
- Decorator

### Template

* 父类为抽象类定义行为框架、处理流程，实现模版算法
* 里氏替换原则：通过父类类型保存子类实例
* Factory Method
* Strategy

### Factory Method

* 父类决定实例生成方式，并不决定要生成的具体类
* creator 负责生成Product的抽象类，使用模版模式构造，具体规则由子类 ConcreteCreator 实现    
* Product:抽象类，定义生成实例持有接口，具体实现由 ConcreteProduct 实现
* framework 不依赖具体类
* 生成实例方法  
    - 通过抽象方法
    - 为其实现默认处理，子类不存在，就进行默认处理，因为通过 new,不能抽象类
    - 默认处理为抛出异常
* 相关
    - Template
    - Singleton
    - Composite
    - iterator
    
### Singleton

* Singleton 返回一个唯一实例的static方法
* 多线程调用getInstance时，会生成多个实例
* 相关
    - AbstractFactory
    - Builder
    - Facade
    - Prototype

### Prototype

* 不根据类，根据实例生成实例
* Prototype 定义用于复制现有实例生成新实例的方法
* ConcretePrototype 实现复制现有实例生成新实例
* client 使用复制实例方法生成新实例

### Builder

* Builder 定义实例接口
* Director 使用 builder 接口生成实例

### abstract factory

* AbstractProduct 定义 abstractFactory 生成抽象零件的接口
* AbstractFactory 定义生成抽象对象接口

```
javac design_pattern/abstract_factory/Main.java  design_pattern/abstract_factory/listfactory/ListFactory.java
java design_pattern.abstract_factory.Main design_pattern.abstract_factory.listfactory.ListFactory

javac design_pattern/abstract_factory/Main.java  design_pattern/abstract_factory/tableFactory/TableFactory.java
java design_pattern.abstract_factory.Main design_pattern.abstract_factory.tableFactory.TableFactory
``` 
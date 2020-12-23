package main

import "fmt"

// 常量:只可以是数值类型,包括整型、 浮点型、复数类型、布尔类型、字符串类型等标量类型
// 常量赋值是一个编译期行为，所以右值不能出现任何需要运行期才能得出结果的表达式
// 作用域: 以大写字母开头的常量在包外可见,以小写字母开头的常量只能在包内访问
const Pi float64 = 3.14159265358979323846
const zero = 0.0 // 无类型浮点常量
const (          // 通过一个 const 关键字定义多个常量，和 var 类似
	size int64 = 1024
	eof        = -1 // 无类型整型常量
)
const u, v float32 = 0, 3   // u = 0.0, v = 3.0，常量的多重赋值
const a, b, c = 3, 4, "foo" // a = 3, b = 4, c = "foo", 无类型整型和字符串常量
const f1 = -12
// 可以是在编译期运算的常量表达式
const mask = 1 << 3

// iota比较特殊，可以被认为是一个可被编译器修改的常量，在每一个const关键字出现时被重置为0，然后在下一个const出现之前，每出现一次iota，其所代表的数字会自动增1
const (
	c0 = iota
	c1
	c2
)

const (
	u1 = iota * 2
	v1
	w
)

const x = iota
const y = iota

// 枚举:包含了一系列相关常量
const (
	Sunday = iota
	Monday
	Tuesday
	Wednesday
	Thursday
	Friday
	Saturday
	numberOfDays
)

func main() {
	fmt.Println(x, y, c0, c1, c2, u1, v1, w)
}

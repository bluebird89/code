package main

import "fmt"

// 全局变量:在函数体外声明,在整个包甚至外部包（变量名以大写字母开头）使用
// 局部变量:函数体内声明的变量,作用域只在函数体内，参数和返回值变量也是局部变量
func GetName() (userName, nickName string, age int) {
	return "nonfu", "学院君", 18
}

func main() {
	// 初始化
	// new 函数作用于值类型，仅分配内存空间，返回的是指针
	// make 函数作用于引用类型，除了分配内存空间，还会对对应类型进行初始化，返回的是初始值
	var v1 int = 10 // 整型
	var v11 = 10
	// 同时进行声明和初始化:推导是在编译期做，而不是运行时
	v12 := 10
	var v2 string   // 字符串
	var v3 bool     // 布尔型
	var v4 [10]int  // 数组，数组元素类型为整型
	var v5 struct { // 结构体，成员变量 f 的类型为64位浮点型
		f float64
	}
	var v6 *int            // 指针，指向整型
	var v7 map[string]int  // map（字典），key为字符串类型，value为整型
	var v8 func(a int) int // 函数，参数类型为整型，返回值类型为整型
	fmt.Println("The value of fval is", v1, v11, v12, v4, v6, v7, v8)
	fmt.Printf("fval=%f, ival=%d, sval=%s\n, bval=%b\n", v5, v1, v2, v3)

	p1 := new(int)    // 返回 int 类型指针
	p2 := new(string) // 返回 string 类型指针
	p3 := new([3]int) // 返回数组类型指针，数组长度是3

	type Student struct {
		id    int
		name  string
		grade string
	}
	p4 := new(Student) // 返回对象类型指针

	println("p1: ", p1)
	println("p2: ", p2)
	println("p3: ", p3)
	println("p4: ", p4)
	s1 := make([]int, 3)          // 返回初始化后的切片类型值，[]int{0, 0, 0}
	m1 := make(map[string]int, 2) // 返回初始化的字典类型值：散列化的 map 结构

	println(len(s1)) // 3
	for i, v := range s1 {
		println(i, v)
	}

	println(len(m1)) // 0
	m1["test"] = 100
	for k, v := range m1 {
		println(k, v)
	}

	// 多重赋值
	var nickname string
	var age int
	_, nickname, age = GetName()
	fmt.Println("Nickname's", nickname, ",Age is ", age)
	fmt.Printf("Nickname's %s,Age is %d. \n", nickname, age)
}

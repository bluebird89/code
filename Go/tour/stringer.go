package main

import "fmt"

type Person struct {
	Name string
	Age  int
}

// fmt 包中定义的 Stringer 是最普遍的接口之一
// Stringer 是一个可以用字符串描述自己的类型]
//type Stringer interface {
//	String() string
//}

func (p Person) String() string {
	return fmt.Sprintf("%v (%v years)", p.Name, p.Age)
}

func main() {
	a := Person{"Arthur Dent", 42}
	z := Person{"Zaphod Beeblebrox", 9001}
	fmt.Println(a, "\r\n", z)

	hosts := map[string]IPAddr{
		"loopback":  {127, 0, 0, 1},
		"googleDNS": {8, 8, 8, 8},
	}
	for name, ip := range hosts {
		// Printf 自动调用类型的string() 方法
		fmt.Printf("%v: %v\n", name, ip)
	}
}

// IPAddr 类型实现 fmt.Stringer 来打印点号分隔的地址
// IPAddr{1, 2, 3, 4} 应当打印为 "1.2.3.4"
type IPAddr [4]byte

//给 IPAddr 添加一个 "String() string" 方法
func (p IPAddr) String() string {
	return fmt.Sprintf("%d.%d.%d.%d", p[0], p[1], p[2], p[3])
}

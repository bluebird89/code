package main

import (
	"fmt"
	"math"
)

type I interface {
	M()
}

type T struct {
	S string
}

func (t *T) M() {
	fmt.Println(t.S)
}

type F float64

func (f F) M() {
	fmt.Println(f)
}

func main() {
	// 接口声明
	var i I
	// 实例化，接口实现后对于对象为值
	i = &T{"Hello"}
	describe(i) // (&{Hello}, *main.T)
	i.M()

	i = F(math.Pi) //(3.141592653589793, main.F)
	describe(i)
	i.M()
}

func describe(i I) {
	fmt.Printf("(%v, %T)\n", i, i)
}

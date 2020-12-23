package main

import "fmt"

// 指针保存了值的内存地址
// *T 是指向 T 类型值的指针
// 其零值为 nil
// & 取地址 * 取值
func main() {
	i, j := 42, 76

	p := &i         // 指向 i
	fmt.Println(*p) // 通过指针读取 i 的值
	*p = 21         // 通过指针设置 i 的值
	fmt.Println(i)  // 查看 i 的值

	p = &j         // 指向 j
	*p = *p / 37   // 通过指针对 j 进行除法运算
	fmt.Println(j) // 查看 j 的值

	var p1 *string
	fmt.Println(p1)
}

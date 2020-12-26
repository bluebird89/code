package main

import "fmt"

// 指针:保存 值内存地址, *T 指向 T 类型值的指针 A pointer holds the memory address of a value.
// 零值为 nil
// & generates a pointer to its operand.
// * operator denotes the pointer's underlying value
func main() {
	i, j := 42, 76

	p := &i         // 指向 i
	fmt.Println(*p) // 通过指针读取 i 的值

	*p = 21        // set i through the pointer
	fmt.Println(i) // 查看 i 的值

	p = &j         // 指向 j
	*p = *p / 37   // 通过指针对 j 进行除法运算
	fmt.Println(j) // 查看 j 的值

	var p1 *string
	fmt.Println(p1)
}

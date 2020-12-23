package main

import "fmt"

func swap(a, b int) {
	a, b = b, a
	fmt.Println(a, b)
}

func swapByPointer(a, b *int) {
	*a, *b = *b, *a
	fmt.Println(*a, *b)
}

func main() {
	// 指针变量:指向一个值的内存地址
	// 指针指向的内存地址的大小是固定的，在 32 位机器上占 4 个字节，在 64 位机器上占 8 个字节，这与指针指向内存地址存储的值类型无关
	var ptr *int
	var pptr **int
	fmt.Println(ptr)

	a := 100
	ptr = &a
	pptr = &ptr
	fmt.Printf("指针变量 ptr = %d\n", ptr)
	fmt.Printf("指针变量值 *ptr = %d\n", *ptr)
	fmt.Printf("指向指针的指针变量 **pptr = %d\n", **pptr)

	b := 2
	swap(a, b)
	fmt.Println(a, b)
	swapByPointer(&a, &b)
	//  类型指针:允许对这个指针类型的数据进行修改指向其它内存地址，传递数据时如果使用指针则无须拷贝数据从而节省内存空间，此外和 C 语言中的指针不同，Go 语言中的类型指针不能进行偏移和运算，因此更为安全

	arr := []int{10, 100, 200}
	for i := 0; i < len(arr); i++ {
		fmt.Printf("a[%d] = %d\n", i, arr[i])
	}
	fmt.Println("==================================")
	// 有一种情况，可能需要保存数组，这样我们就需要使用到指针。
	// 以下声明了整型指针数组：
	var ptrA [3]*int
	for i := 0; i < len(arr); i++ {
		/* 整数地址赋值给指针数组 */
		ptrA[i] = &arr[i]
	}
	for i := 0; i < len(ptrA); i++ {
		fmt.Printf("a[%d] = %d\n", i, *ptrA[i])
	}
}

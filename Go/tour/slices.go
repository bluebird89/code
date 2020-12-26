package main

import (
	"fmt"
	//"golang.org/x/tour/pic"
	"strings"
)

// A slice is a dynamically-sized, flexible view into the elements of an array.
// In practice, slices are much more common than arrays.
func main() {
	fmt.Print("------slices formed by specifying two indices------ \r\n")
	primes := [6]int{2, 3, 5, 7, 11, 13}
	//formed by specifying two indices, a low and high bound, separated by a colon
	//selects a half-open range which includes the first element, but excludes the last one.
	var s []int = primes[1:4]
	fmt.Println(s)

	// Slices are like references to arrays 切片就像数组的引用
	// 切片并不存储任何数据，只是描述了底层数组中的一段。
	// 更改切片的元素会修改其底层数组中对应的元素。Changing the elements of a slice modifies the corresponding elements of its underlying array.
	// 与它共享底层数组的切片都会观测到这些修改。Other slices that share the same underlying array will see those changes.
	fmt.Print("------slices share the same underlying------ \r\n")
	names := [4]string{
		"John",
		"Paul",
		"George",
		"Ringo",
	}
	fmt.Println(names)
	a := names[0:2]
	b := names[1:3]
	fmt.Println(a, b)
	b[0] = "XXX"
	fmt.Println(a, b)
	fmt.Println(names)

	fmt.Print("------Slice literals------ \r\n")
	//Slice literals like an array literal without the length.
	//creates the same array, then builds a slice that references it
	q := []int{2, 3, 5, 7, 11, 13}
	//Slice defaults: When slicing, you may omit the high or low bounds to use their defaults instead.
	//q[:]
	printSlice(q)

	// Slice length and capacity
	//The length of a slice is the number of elements it contains
	//The capacity of a slice is the number of elements in the underlying array, counting from the first element in the slice
	// Slice the slice to give it zero length.
	// 有状态
	q = q[1:4]
	printSlice(q)
	q = q[:2]
	printSlice(q)
	q = q[1:]
	printSlice(q)
	q = q[:0]
	printSlice(q)

	// Extend its length. extend a slice's length by re-slicing it, provided it has sufficient capacity
	q = q[:4]
	printSlice(q)
	// Drop its first two values.
	q = q[2:]
	printSlice(q)

	r := []bool{true, false, true, true, false, true}
	r = append(r, false, true, false)
	fmt.Println(r)

	s1 := []struct {
		i int
		b bool
	}{
		{2, true},
		{3, false},
		{5, true},
		{7, true},
		{11, false},
		{13, true},
	}
	fmt.Println(s1)

	//has a length and capacity of 0 and has no underlying array.
	fmt.Print("------Nil slices------ \r\n")
	var zero []int
	fmt.Println(zero, len(zero), cap(zero))
	if zero == nil {
		fmt.Println("nil!")
	}

	//The make function allocates a zeroed array and returns a slice that refers to that array:
	fmt.Print("------Creating a slice with make------ \r\n")
	a1 := make([]int, 5)
	printSlice1("a1", a1)
	//specify a capacity, pass a third argument to make
	b1 := make([]int, 0, 5) // len(b)=0, cap(b)=5
	printSlice1("b1", b1)

	c1 := b1[:2]
	printSlice1("c1", c1)

	d1 := c1[2:5]
	printSlice1("d1", d1)

	fmt.Print("------Slices of slices------ \r\n")
	//Slices can contain any type, including other slices.
	// 创建一个井字板（经典游戏） Create a tic-tac-toe board.
	board := [][]string{
		[]string{"_", "_", "_"},
		[]string{"_", "_", "_"},
		[]string{"_", "_", "_"},
	}

	// 两个玩家轮流打上 X 和 O
	board[0][0] = "X"
	board[2][2] = "O"
	board[1][2] = "X"
	board[1][0] = "O"
	board[0][2] = "X"

	for i := 0; i < len(board); i++ {
		fmt.Printf("%s\n", strings.Join(board[i], " "))
	}

	// Appending to a slice
	s = []int{}
	fmt.Print("------append works on nil slices.----- \r\n")
	s = append(s, 0)
	printSlice(s)

	// The slice grows as needed.
	s = append(s, 1)
	printSlice(s)
	fmt.Print("------add more than one element at a time.----- \r\n")
	s = append(s, 2, 3, 4)
	printSlice(s)

	//pic.Show(Pic)
}

func printSlice(s []int) {
	fmt.Printf("len=%d cap=%d %v\n", len(s), cap(s), s)
}

func printSlice1(s string, x []int) {
	fmt.Printf("%s len=%d cap=%d %v\n",
		s, len(x), cap(x), x)
}

// 实现 Pic:返回一个长度为 dy 的切片，其中每个元素是一个长度为 dx，元素类型为 uint8 的切片。当你运行此程序时，它会将每个整数解释为灰度值（好吧，其实是蓝度值）并显示它所对应的图像
func Pic(dx, dy int) [][]uint8 {
	a := make([][]uint8, dy) //外层切片
	for x := range a {
		b := make([]uint8, dx) //里层切片
		for y := range b {
			// b[y] = uint8(x*y - 1)     //给里层切片里的每一个元素赋值。其中x*y可以替换成别的函数
			// b[y] = uint8((x+y)/2 - 1) //给里层切片里的每一个元素赋值。其中x*y可以替换成别的函数
			// b[y] = uint8(x ^ y - 1)   //给里层切片里的每一个元素赋值。其中x*y可以替换成别的函数
			b[y] = uint8(x%(y+1) - 1) //给里层切片里的每一个元素赋值。其中x*y可以替换成别的函数
		}
		a[x] = b //给外层切片里的每一个元素赋值
	}
	return a
}

package main

import (
	"fmt"
)

func main() {
	// 在声明时指定元素类型和数组长度.长度定义后就不可更改
	var a [8]byte          // 长度为8的数组，每个元素为一个字节
	var b [3][3]int        // 二维数组（9宫格）
	var c [3][3][3]float64 // 三维数组（立体的9宫格）

	var d = [3]int{1, 2, 3} // 声明时初始化
	var e = new([3]string)  // 通过 new 初始化
	f := [5]int{1, 2, 3}
	g := [...]int{1, 2, 3}
	h := [5]int{1: 3, 3: 7}
	fmt.Println(a, b, c, d, e, f, g, h)

	// 获取　修改
	v1, v2 := d[0], d[len(d)-1]
	d[1] = 88
	fmt.Println(v1, v2)

	// 遍历
	for i := 0; i < len(d); i++ {
		fmt.Println("Element", i, "of arr is", d[i])
	}

	for i, v := range d {
		fmt.Println("Element", i, "of arr is", v)
	}

	var multi [9][9]string
	//arr := [][]int{{1, 2, 3}, {4, 5, 6}, {7, 8, 9}}
	for i := 0; i < 9; i++ {
		for j := 0; j <= i; j++ {
			multi[i][j] = fmt.Sprintf("%d x %d = %d ", j+1, i+1, (i+1)*(j+1))
		}
		fmt.Println()
	}
	for _, v1 := range multi {
		for _, v2 := range v1 {
			fmt.Printf("%-8s ", v2) // 位宽为8，左对齐
		}
		fmt.Println()
	}

	for i := 0; i < 9; i++ {
		for j := 0; j <= i; j++ {
			fmt.Printf("%d x %d = %d ", j+1, i+1, (i+1)*(j+1))
		}
		fmt.Println()
	}
}

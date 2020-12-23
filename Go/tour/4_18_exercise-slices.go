package main

import "golang.org/x/tour/pic"

// 实现 Pic。它应当返回一个长度为 dy 的切片，其中每个元素是一个长度为 dx，元素类型为 uint8 的切片。当你运行此程序时，它会将每个整数解释为灰度值（好吧，其实是蓝度值）并显示它所对应的图像
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

func main() {
	pic.Show(Pic)
}

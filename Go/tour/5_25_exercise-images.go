package main

import "golang.org/x/tour/pic"

import "image"

import "image/color"

type Image struct{}

// 定义自己的 Image 类型，实现必要的方法并调用 pic.ShowImage。
// Bounds 应当返回一个 image.Rectangle ，例如 image.Rect(0, 0, w, h)。
// ColorModel 应当返回 color.RGBAModel。
// At 应当返回一个颜色。上一个图片生成器的值 v 对应于此次的 color.RGBA{v, v, 255, 255}

func (i Image) ColorModel() color.Model {
	return color.RGBAModel
}

func (i Image) Bounds() image.Rectangle {
	w, h := 110, 110
	return image.Rect(0, 0, w, h)
}

func (i Image) At(x, y int) color.Color {
	v := uint8(x % (y + 1))
	return color.RGBA{v, v, 110, 110}
}

func main() {
	m := Image{}
	pic.ShowImage(m)
}

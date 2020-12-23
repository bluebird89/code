package main

import "golang.org/x/tour/reader"

// 实现一个 Reader 类型，它产生一个 ASCII 字符 'A' 的无限流
type MyReader struct{}

func (reader MyReader) Read(b []byte) (int, error) {
	for i := range b {
		b[i] = 'A'
	}
	return len(b), nil
}

func main() {
	reader.Validate(MyReader{})
}

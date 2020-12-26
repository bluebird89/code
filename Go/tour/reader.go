package main

import (
	"fmt"
	//"golang.org/x/tour/reader"
	"io"
	"strings"
)

//io 包指定了 io.Reader 接口，表示从数据流的末尾进行读取。 io.Reader 接口有一个 Read 方法：
//Read 用数据填充给定的字节切片并返回填充的字节数和错误值。在遇到数据流的结尾时，它会返回一个 io.EOF 错误。
//func (T) Read(b []byte) (n int, err error)
//标准库包含了该接口的许多实现，包括文件、网络连接、压缩和加密等等

type MyReader struct{}

// 实现一个 Reader 类型，产生一个 ASCII 字符 'A' 的无限流
func (reader MyReader) Read(b []byte) (int, error) {
	for i := range b {
		b[i] = 'A'
	}
	return len(b), nil
}

func main() {
	r := strings.NewReader("Hello, Reader!")

	b := make([]byte, 8)
	for {
		n, err := r.Read(b)
		fmt.Printf("n = %v err = %v b = %v\n", n, err, b)
		fmt.Printf("b[:n] = %q\n", b[:n])

		if err == io.EOF {
			break
		}
	}

	//reader.Validate(MyReader{})
}

package main

import (
	"fmt"
	"io"
	"os"
	"strings"
)

// 编写一个实现了 io.Reader 并从另一个 io.Reader 中读取数据的 rot13Reader，通过应用 rot13 代换密码对数据流进行修改。
type rot13Reader struct {
	r io.Reader
}

//自定义错误类型
type ErrNegativeByte string

//实现Error接口
func (e ErrNegativeByte) Error() string {
	return fmt.Sprintf("get Byte error: %v", e)
}

func (r rot13Reader) Read(b []byte) (n int, err error) {
	//return 0, ErrNegativeByte("length is empty")
	//判断b的长度类型是否正确
	if len(b) <= 0 {
		return len(b), ErrNegativeByte("length is empty")
	}

	n, err = r.r.Read(b)

	if err != nil {
		return len(b), ErrNegativeByte(err.Error())
	}
	for i := 0; i < n; i++ {
		b[i] = rot13(b[i])
		fmt.Printf("n =%v rot = %q Type: %T \n", n, rot13(b[i]), b[i])
		if typeof(b[i]) != "uint8" {
			//元素类型是否为字符串
			return len(b), ErrNegativeByte("element is no string")
		}
	}
	return 0, nil
	//return 返回默认值
}

func rot13(b byte) byte {
	var a, z byte
	switch {
	case 'a' <= b && b <= 'z':
		a, z = 'a', 'z'
	case 'A' <= b && b <= 'Z':
		a, z = 'A', 'Z'
	default:
		return b
	}
	return (b-a+13)%(z-a+1) + a
}

func typeof(v interface{}) string {
	return fmt.Sprintf("%T", v)
}

func main() {
	s := strings.NewReader("Lbh penpxrq gur pbqr!")
	r := rot13Reader{s}

	io.Copy(os.Stdout, &r)
	/*n,err := io.Copy(os.Stdout, &r)
	  if err != nil {
	      fmt.Printf("n %d err %v", n, err)
	  }*/
}

package main

import (
	"errors"
	"fmt"
	"io"
	"os"
)

func Sqrt(f float64) (float64, error) {
	if f < 0 {
		return 0, errors.New("math: square root of negative number")
	}
	// 实现
	return f, nil
}

func main() {
	//fi, err := os.Stat("test.txt")
	//if err != nil {
	//	switch err := err.(type) {
	//	case *os.PathError:
	//		err.New()
	//	case *os.LinkError:
	//		// dome something
	//	case *os.SyscallError:
	//		// dome something
	//	case *exec.Error:
	//		// dome something
	//	}
	//} else {
	//	// ...
	//}
	_, err := Sqrt(-1)

	if err != nil {
		fmt.Println(err)
	}

	for _, i := range []int{-1, 4, 1000} {
		if r, e := error_test(i); e != nil {
			fmt.Println("failed:", e)
		} else {
			fmt.Println("success:", r)
		}
	}
}

//自定义的出错结构
type myError struct {
	arg    int
	errMsg string
}

//实现Error接口
func (e *myError) Error() string {
	return fmt.Sprintf("%d - %s", e.arg, e.errMsg)
}

//两种出错
func error_test(arg int) (int, error) {
	if arg < 0 {
		return -1, errors.New("Bad Arguments - negtive!")
	} else if arg > 256 {
		return -1, &myError{arg, "Bad Arguments - too large!"}
	}
	return arg * arg, nil
}

func CopyFile(dstName, srcName string) (written int64, err error) {
	src, err := os.Open(srcName)
	if err != nil {
		return
	}
	defer src.Close()

	dst, err := os.Create(dstName)
	if err != nil {
		return
	}
	defer dst.Close()

	return io.Copy(dst, src)
}

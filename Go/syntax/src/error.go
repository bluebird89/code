package main

import (
	"errors"
	"fmt"
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
}

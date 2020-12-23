package main

import (
	"fmt"
)

// Sqrt 接受到一个负数时，应当返回一个非 nil 的错误值。复数同样也不被支持。
type ErrNegativeSqrt float64

func (e ErrNegativeSqrt) Error() string {
	return fmt.Sprintf("cannot Sqrt negative number: %v", float64(e))
}
func Sqrt(x float64) (float64, error) {
	if x < 0 {
		return -1, ErrNegativeSqrt(-2)
	}

	z := 1.0
	for i := 1; (z-x) < 0.001 && i < 10; i++ {
		z -= (z*z - x) / (2 * z)
	}
	return z, nil
}

func main() {
	fmt.Println(Sqrt(2))
	fmt.Println(Sqrt(-5))

	// fmt.Println(Sqrt(2i))
}

package main

// 每个 Go 程序都是由包构成的。
// 程序从 main 包开始运行

import (
	"fmt"
	"math/rand"
)

// 约定：包名与导入路径的最后一个元素一致
func main() {
	fmt.Println("My favorite number is", rand.Intn(100))
}

package main

// 每个 Go 程序都是由包构成的。
//using the packages with import paths "fmt" and "math/rand".
// 约定：包名与导入路径的最后一个元素一致
// “分组”形式的导入 imports into a parenthesized, "factored" import statement.
import (
	"fmt"
	"math"
	"math/rand"
)

// 程序从 main 包开始运行
func main() {
	fmt.Println("My favorite number is", rand.Intn(10))

	fmt.Printf("Now you have %g problems.\n", math.Sqrt(7))

	//  a name is exported if it begins with a capital letter.
	// When importing a package, you can refer only to its exported names. Any "unexported" names are not accessible from outside the package.
	fmt.Println(math.Pi)
}

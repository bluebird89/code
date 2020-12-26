package main

import (
	"fmt"
	"golang.org/x/tour/wc"
	"strings"
)

type Vertex1 struct {
	Lat, Long float64
}

// Map literals:与结构体相似，不过必须有键名
//零值为 nil 。nil 映射既没有键，也不能添加键。
// 只是一个类型名，可以在文法的元素中省略它
// Map literals
var m = map[string]Vertex1{
	"Bell Labs": Vertex1{
		40.68433, -74.39967,
	},
	"Google": Vertex1{
		37.42202, -122.08408,
	},
	//If the top-level type is just a type name, you can omit it from the elements of the literal.
	"Bell Lab": {40.68433, -74.39967},
	"Apple":    {37.42202, -122.08408},
}

// 统计字符串 s 中每个“单词”的个数
func WordCount(s string) map[string]int {
	m := make(map[string]int) // 创建map
	// 用range语句遍历得到的切片s，并对出现的每一个词汇在我们的计数器c上加1
	for _, c := range strings.Fields(s) {
		m[c]++
	}
	return m
}

//The zero value of a map is nil. A nil map has no keys, nor can keys be added.
func main() {
	fmt.Print("------A nil map.----- \r\n")
	var m1 map[string]Vertex1
	fmt.Println(m1)

	// returns a map of the given type, initialized
	m1 = make(map[string]Vertex1)
	m1["Bell Labs"] = Vertex1{
		40.68433, -74.39967,
	}
	fmt.Println(m1["Bell Labs"])

	fmt.Print("------mutating maps----- \r\n")
	m["Amazon"] = Vertex1{50, 70}
	fmt.Println(m)

	m["Amazon"] = Vertex1{55, 77}
	fmt.Println("The value:", m["Amazon"])

	delete(m, "Amazon")
	fmt.Println("The value:", m["Amazon"])

	v, ok := m["Amazon"]
	fmt.Println("The value:", v, "Present?", ok)

	fmt.Printf("Fields are: %q", strings.Fields("  foo bar  baz   "))
	wc.Test(WordCount)
}

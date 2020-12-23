package main

import "fmt"

type Vertex struct {
	Lat, Long float64
}

// 与结构体相似，不过必须有键名
// 只是一个类型名，你可以在文法的元素中省略它
var m = map[string]Vertex{
	"Bell Labs": Vertex{
		40.68433, -74.39967,
	},
	"Google": Vertex{
		37.42202, -122.08408,
	},
	"Bell Lab": {40.68433, -74.39967},
	"Apple":    {37.42202, -122.08408},
}

func main() {
	// mutating maps
	m["Amazon"] = Vertex{50, 70}
	fmt.Println(m)
	delete(m, "Amazon")
	fmt.Println(m)
}

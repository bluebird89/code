package oop

import "fmt"

type Country struct {
	Name string
}
type City struct {
	Name string
}
type Stringable interface {
	ToString() string
}

func (c Country) ToString() string {
	return "Country = " + c.Name
}
func (c City) ToString() string {
	return "City = " + c.Name
}

// Program to an interface not an implementation:把“业务类型” Country 和 City 和“控制逻辑” Print() 给解耦
func PrintStr(p Stringable) {
	fmt.Println(p.ToString())
}

func main() {

	d1 := Country{"USA"}
	d2 := City{"Los Angeles"}
	PrintStr(d1)
	PrintStr(d2)
}

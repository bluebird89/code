package main

import (
	"fmt"
	gen "go_study/design_pattern"
	"reflect"
)

// Type Assert
// Container is a generic container, accepting anything.
type Container []interface{}

//Put adds an element to the container.
func (c *Container) Put(elem interface{}) {
	*c = append(*c, elem)
}

//Get gets an element from the container.
func (c *Container) Get() interface{} {
	elem := (*c)[0]
	*c = (*c)[1:]
	return elem
}

// Reflection
type Container1 struct {
	s reflect.Value
}

func NewContainer(t reflect.Type, size int) *Container1 {
	if size <= 0 {
		size = 64
	}
	return &Container1{
		s: reflect.MakeSlice(reflect.SliceOf(t), 0, size),
	}
}
func (c *Container1) Put(val interface{}) error {
	if reflect.ValueOf(val).Type() != c.s.Type().Elem() {
		return fmt.Errorf("Put: cannot put a %T into a slice of %s", val, c.s.Type().Elem())
	}
	c.s = reflect.Append(c.s, reflect.ValueOf(val))
	return nil
}
func (c *Container1) Get(refval interface{}) error {
	if reflect.ValueOf(refval).Kind() != reflect.Ptr ||
		reflect.ValueOf(refval).Elem().Type() != c.s.Type().Elem() {
		return fmt.Errorf("Get: needs *%s but got %T", c.s.Type().Elem(), refval)
	}
	reflect.ValueOf(refval).Elem().Set(c.s.Index(0))
	c.s = c.s.Slice(1, c.s.Len())
	return nil
}

func main() {
	intContainer := &Container{}
	intContainer.Put(7)
	intContainer.Put(42)

	// assert that the actual type is int
	elem, ok := intContainer.Get().(int)
	if !ok {
		fmt.Println("Unable to read an int from intContainer")
	}
	fmt.Printf("assertExample: %d (%T)\n", elem, elem)

	//  Reflection
	f1 := 3.1415926
	f2 := 1.41421356237
	c := NewContainer(reflect.TypeOf(f1), 16)
	if err := c.Put(f1); err != nil {
		panic(err)
	}
	if err := c.Put(f2); err != nil {
		panic(err)
	}
	g := 0.0
	if err := c.Get(&g); err != nil {
		panic(err)
	}
	fmt.Printf("%v (%T)\n", g, g) //3.1415926 (float64)
	fmt.Println(c.s.Index(0))     //1.4142135623

	filterEmployeeExample()
}


//go:generate ./gen.sh ./template/filter.tmp.go gen Employee filter

func filterEmployeeExample() {

	var list = EmployeeList{
		{"Hao", 44, 0, 8000},
		{"Bob", 34, 10, 5000},
		{"Alice", 23, 5, 9000},
		{"Jack", 26, 0, 4000},
		{"Tom", 48, 9, 7500},
	}

	var filter gen.EmployeeList
	filter = list.Filter(func(e *Employee) bool {
		return e.Age > 40
	})

	fmt.Println("----- Employee.Age > 40 ------")
	for _, e := range filter {
		fmt.Println(e)
	}

	filter = list.Filter(func(e *Employee) bool {
		return e.Salary <= 5000
	})

	fmt.Println("----- Employee.Salary <= 5000 ------")
	for _, e := range filter {
		fmt.Println(e)
	}
}

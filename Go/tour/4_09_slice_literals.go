package main

import "fmt"

func main() {
	q := []int{2, 3, 5, 7, 11, 13}
	fmt.Println(q)
	printSlice(q)

	q = q[1:4]
	fmt.Println(q)
	printSlice(q)
	q = q[:2]
	fmt.Println(q)
	printSlice(q)
	q = q[1:]
	fmt.Println(q)
	printSlice(q)

	r := []bool{true, false, true, true, false, true}
	r = append(r, false, true, false)
	fmt.Println(r)

	s := []struct {
		i int
		b bool
	}{
		{2, true},
		{3, false},
		{5, true},
		{7, true},
		{11, false},
		{13, true},
	}
	fmt.Println(s)

	var zero []int
	fmt.Println(zero, len(zero), cap(zero))
	if zero == nil {
		fmt.Println("nil!")
	}
}

func printSlice(s []int) {
	fmt.Printf("len=%d cap=%d %v\n", len(s), cap(s), s)
}

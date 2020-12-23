package main

import "fmt"

//Variables with initializers
var i, j int = 1, 2

func main() {
	var c, python, java = true, false, "no!"
	fmt.Println(i, j, c, python, java)

	//Short variable declarations
	var i, j int = 4, 5
	k := 3
	c1, python1, java1 := true, false, "no!"

	fmt.Println(i,j, k, c1, python1, java1)
}

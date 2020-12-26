package main

import "fmt"

//The range form of the for loop iterates over a slice or map
func main() {
	var pow2 = []int{1, 2, 4, 8, 16, 32, 64, 128}
	for i, v := range pow2 {
		fmt.Printf("2**%d = %d\n", i, v)
	}

	pow := make([]int, 10)
	for i := range pow {
		pow[i] = 1 << uint(i) // == 2**i
	}

	for _, value := range pow {
		fmt.Printf("%d\n", value)
	}
}

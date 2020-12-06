package main

import "fmt"
import "rsc.io/quote"
import "./geetings"

func main(){
	fmt.Println("Hello World!")
	fmt.Println(quote.Go())
	message := greetings.Hello("Gladys")
	fmt.Println(message)
}
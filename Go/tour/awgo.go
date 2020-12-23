package main

// Package is called aw
import "github.com/deanishe/awgo"

// Your workflow starts here
func run() {
	// Add a "Script Filter" result
	aw.NewItem("First result!")
	// Send results to Alfred
	aw.SendFeedback()
}

func main() {
	// Wrap your entry point with Run() to catch and log panics and
	// show an error in Alfred instead of silently dying
	aw.Run(run)
}

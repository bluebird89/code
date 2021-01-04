package main

import (
	"context"
	"fmt"
	"log"
	"net/http"
	"os"
	"os/signal"
	"syscall"
)

type HelloHandlerStruct struct {
	content string
}

func (handler *HelloHandlerStruct) ServeHTTP(w http.ResponseWriter, r *http.Request) {
	fmt.Fprintf(w, handler.content)
}

type WelcomeHandlerStruct struct {
}

func HelloHandler(w http.ResponseWriter, r *http.Request) {
	fmt.Fprintf(w, "Hello World")
}

func (*WelcomeHandlerStruct) ServeHTTP(w http.ResponseWriter, r *http.Request) {
	fmt.Fprintf(w, "Welcome")
}

func main() {
	mux := http.NewServeMux()
	mux.HandleFunc("/", HelloHandler)
	mux.Handle("/welcome", &WelcomeHandlerStruct{})

	http.HandleFunc("/hello", func(writer http.ResponseWriter, request *http.Request) {
		params := request.URL.Query()
		fmt.Fprintf(writer, "你好, %s", params.Get("name"))
	})
	http.Handle("/", &HelloHandlerStruct{content: "Hello World"})

	server := &http.Server{
		Addr:    ":8081",
		Handler: mux,
	}
	// 创建系统信号接收器
	done := make(chan os.Signal)
	signal.Notify(done, os.Interrupt, syscall.SIGINT, syscall.SIGTERM)
	go func() {
		<-done

		if err := server.Shutdown(context.Background()); err != nil {
			log.Fatal("Shutdown server:", err)
		}
	}()

	log.Println("Starting HTTP server...")
	err := server.ListenAndServe()
	if err != nil {
		if err == http.ErrServerClosed {
			log.Print("Server closed under request")
		} else {
			log.Fatal("Server closed unexpected")
		}
	}
}

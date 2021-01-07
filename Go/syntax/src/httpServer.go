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

const http_root = "/home/haoel/coolshell.cn/"

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
	http.HandleFunc("/", rootHandler)
	http.HandleFunc("/view/", viewHandler)
	http.HandleFunc("/html/", htmlHandler)

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

//读取一些HTTP的头
func rootHandler(w http.ResponseWriter, r *http.Request) {
	fmt.Fprintf(w, "rootHandler: %s\n", r.URL.Path)
	fmt.Fprintf(w, "URL: %s\n", r.URL)
	fmt.Fprintf(w, "Method: %s\n", r.Method)
	fmt.Fprintf(w, "RequestURI: %s\n", r.RequestURI)
	fmt.Fprintf(w, "Proto: %s\n", r.Proto)
	fmt.Fprintf(w, "HOST: %s\n", r.Host)
}

//特别的URL处理
func viewHandler(w http.ResponseWriter, r *http.Request) {
	fmt.Fprintf(w, "viewHandler: %s", r.URL.Path)
}

//一个静态网页的服务示例。（在http_root的html目录下）
func htmlHandler(w http.ResponseWriter, r *http.Request) {
	fmt.Printf("htmlHandler: %s\n", r.URL.Path)

	filename := http_root + r.URL.Path
	fileext := filepath.Ext(filename)
	content, err := ioutil.ReadFile(filename)
	if err != nil {
		fmt.Printf("   404 Not Found!\n")
		w.WriteHeader(http.StatusNotFound)
		return
	}

	var contype string
	switch fileext {
	case ".html", "htm":
		contype = "text/html"
	case ".css":
		contype = "text/css"
	case ".js":
		contype = "application/javascript"
	case ".png":
		contype = "image/png"
	case ".jpg", ".jpeg":
		contype = "image/jpeg"
	case ".gif":
		contype = "image/gif"
	default:
		contype = "text/plain"
	}
	fmt.Printf("ext %s, ct = %s\n", fileext, contype)

	w.Header().Set("Content-Type", contype)
	fmt.Fprintf(w, "%s", content)
}

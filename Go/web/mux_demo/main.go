package main

import (
	"github.com/gorilla/mux"
	"net/http"
)

func main() {
	muxRouter := mux.NewRouter()

	RegisterRouters(muxRouter)

	server := &http.Server{
		Addr:    ":8080",
		Handler: muxRouter,
	}

	err := server.ListenAndServer()
}

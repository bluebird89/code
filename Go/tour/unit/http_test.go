package main

import (
	"fmt"
	"github.com/stretchr/testify/assert"
	"io/ioutil"
	"net/http"
	"testing"
)

func TestRun(t *testing.T) {
	req, err := http.Get("http://0.0.0.0:2019")
	if err != nil {
		fmt.Println("请求失败1")
	}

	body, err := ioutil.ReadAll(req.Body)
	req.Body.Close()
	if err != nil {
		fmt.Println("请求失败2")
	}

	assert.Equal(t, 200, req.StatusCode)
	assert.Equal(t, "text/plain; charset=utf-8", req.Header.Get("Content-Type"))
	assert.Equal(t, "hello world!", string(body))
}

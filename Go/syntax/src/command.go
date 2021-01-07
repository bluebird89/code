package main

import (
	"bytes"
	"flag"
	"log"
	"os"
	"os/exec"
	"strings"
)
import "fmt"

func main() {
	//cmd := exec.Command("ping", "127.0.0.1")
	//out, err := cmd.Output()
	//if err != nil {
	//	println("Command Error!", err.Error())
	//	return
	//}
	//fmt.Println(string(out))

	cmd := exec.Command("tr", "a-z", "A-Z")
	cmd.Stdin = strings.NewReader("some input")
	var out bytes.Buffer
	cmd.Stdout = &out
	err := cmd.Run()
	if err != nil {
		log.Fatal(err)
	}
	fmt.Printf("in all caps: %q\n", out.String())

	args := os.Args
	fmt.Println(args) //带执行文件的
	fmt.Println(args[1:]) //不带执行文件的

	//第一个参数是“参数名”，第二个是“默认值”，第三个是“说明”。返回的是指针
	host := flag.String("host", "coolshell.cn", "a host name ")
	port := flag.Int("port", 80, "a port number")
	debug := flag.Bool("d", false, "enable/disable debug mode")
	//正式开始Parse命令行参数
	flag.Parse()
	fmt.Println("host:", *host)
	fmt.Println("port:", *port)
	fmt.Println("debug:", *debug)
}

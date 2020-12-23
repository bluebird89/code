package main

import "fmt"

type IPAddr [4]byte

// IPAddr 类型实现 fmt.Stringer 来打印点号分隔的地址
// IPAddr{1, 2, 3, 4} 应当打印为 "1.2.3.4"
func (p IPAddr) String() string {
	// [4]byte 通过 p[2]调用
	return fmt.Sprintf("%d.%d.%d.%d", p[0], p[1], p[2], p[3])
}

func main() {
	hosts := map[string]IPAddr{
		"loopback":  {127, 0, 0, 1},
		"googleDNS": {8, 8, 8, 8},
	}
	for name, ip := range hosts {
		// Printf 自动调用类型的string() 方法
		fmt.Printf("%v: %v\n", name, ip)
	}
}

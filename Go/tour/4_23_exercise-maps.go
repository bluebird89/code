package main

import (
	"fmt"
	"golang.org/x/tour/wc"
	"strings"
)

// 统计字符串 s 中每个“单词”的个数
func WordCount(s string) map[string]int {
	m := make(map[string]int) // 创建map
	// 用range语句遍历得到的切片s，并对出现的每一个词汇在我们的计数器c上加1
	for _, c := range strings.Fields(s) {
		m[c]++
	}
	return m
}

func main() {
	fmt.Printf("Fields are: %q", strings.Fields("  foo bar  baz   "))
	wc.Test(WordCount)
}

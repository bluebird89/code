package main

import "fmt"

// ListNode 链表节点
type ListNode struct {
    Val  int
    Next *ListNode
}

//反转链表的实现
func reversrList(head *ListNode) *ListNode {
    cur := head
    var pre *ListNode = nil
    for cur != nil {
        pre, cur, cur.Next = cur, cur.Next, pre //这句话最重要
    }
    return pre
}

// Print 打印链表
func (l *ListNode) Print() {
    for l != nil {
        if l.Val > 0 {
            fmt.Println(l.Val)
        }
        l = l.Next
    }
}

func main() {
    m := 1
    n := 4
    root := new(ListNode)//头结点
    p := root
    for i := 1; i < 7; i++ {//初始化链表
        node := new(ListNode)
        node.Val = i
        p.Next = node
        p = p.Next
    }
    p.Next = new(ListNode)//尾节点
    l1 := root
    var l2, l3 *ListNode
    p = root
    index := 0
    for l3 == nil {//截成三段
        if index == m {
            l2 = p.Next
            p.Next = nil
            p = l2
        }
        if index == n {
            l3 = p.Next
            p.Next = nil
        }
        p = p.Next
        index++
    }
    l2 = reversrList(l2)// 反转l2
    list := []*ListNode{l2, l3}
    p = l1
    index = 0
    for index < len(list) {//拼接起来
        for p.Next != nil {
            p = p.Next
        }
        p.Next = list[index]
        index++
    }
    l1.Print()
}

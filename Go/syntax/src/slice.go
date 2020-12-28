package main

import (
	"bytes"
	"fmt"
)

func main() {
	// 与数组最大的不同在于，切片的类型字面量中只有元素的类型，没有长度
	// 一个可变长度的、同一类型元素集合，切片的长度可以随着元素数量的增长而增长（不会随着元素数量的减少而减少），不过数组切片从底层管理上来看依然使用数组来管理元素，可以看作是对数组做了一层简单的封装
	// 数组可以看作是切片的底层数组，而切片则可以看作是数组某个连续片段的引用
	// 数组切片底层引用了一个数组，由三个部分构成：指针、长度和容量，指针指向数组起始下标，长度对应切片中元素的个数，容量则是切片起始位置到底层数组结尾的位置，切片长度不能超过容量
	var slice []string = []string{"a", "b", "c"}
	months := [...]string{"January", "February", "March", "April", "May", "June",
		"July", "August", "September", "October", "November", "December"}

	q2 := months[3:6]
	all := months[:]
	firstHalf := months[:6]
	secondHaf := months[6:]
	// 数组切片可以基于另一个数组切片创建
	// 可以超过所包含元素个数
	q1 := firstHalf[:9]

	fmt.Println(slice, q2, all, firstHalf, secondHaf, q1)
	fmt.Printf("len=%d cap=%d slice=%v\n", len(firstHalf), cap(firstHalf), firstHalf)
	fmt.Printf("len=%d cap=%d slice=%v\n", len(secondHaf), cap(secondHaf), secondHaf)

	// 初始元素个数为 5 的整型数组切片
	//预留 10 个元素的存储空间（容量为10）
	slice1 := make([]int, 5)
	slice2 := make([]int, 5, 10)
	slice3 := []int{1, 3, 5, 7, 9}
	fmt.Println(slice1, slice2, len(slice2), cap(slice2), slice3)

	summer := months[5:8]
	for i, v := range summer {
		fmt.Println("summer[", i, "] =", v)
	}

	// 元素个数和实际可分配的存储空间是两个不同的值，元素的个数即切片的实际长度，而可分配的存储空间就是切片的容量
	// 对于基于数组和切片创建的切片而言，默认容量是从切片起始索引到对应底层数组的结尾索引
	// 通过内置 make 函数创建的切片而言，在没有指定容量参数的情况下，默认容量和切片长度一致
	slice4 := append(slice2, 1, 2, 3)
	slice5 := []int{1, 2, 3, 4}
	slice6 := append(slice2, slice5...)
	// 如果追加的元素个数超出 oldSlice 的默认容量，则底层会自动进行扩容
	// append() 函数并不会改变原来的切片，而是会生成一个容量更大的切片，然后把原有的元素和新元素一并拷贝到新切片中，默认情况下，扩容后新切片的容量将会是原切片容量的 2 倍，如果还不足以容纳新元素，则按照同样的操作继续扩容，直到新容量不小于原长度与要追加的元素数量之和。但是，当原切片的长度大于或等于 1024 时，Go 语言将会以原容量的 1.25 倍作为新容量的基准
	slice7 := append(slice2, 99, 98, 77, 45, 67, 5, 5, 7, 4, 6, 7, 8)
	fmt.Println(slice2, slice4, slice6, slice7)

	// 复制
	slice1 = []int{1, 2, 3, 4, 5}
	slice2 = []int{5, 4, 3}
	copy(slice2, slice1)
	fmt.Println(slice1, slice2)

	slice2 = []int{5, 4, 3}
	copy(slice1, slice2)
	fmt.Println(slice1, slice2)

	// 删除：通过切片实现的 伪删除
	slice3 = []int{1, 2, 3, 4, 5, 6, 7, 8, 9, 10}
	slice31 := slice3[:len(slice3)-5]
	slice32 := slice3[5:]
	fmt.Println(slice3[:0], slice31, cap(slice31), slice32, cap(slice32), len(slice3), cap(slice3))

	// append 会改变原来数据
	slice34 := append(slice3[:0], slice3[3:]...)
	fmt.Println("删除开头三个元素", slice34, "slice3:", slice3) // [4 5 6 7 8 9 10]

	slice3 = []int{1, 2, 3, 4, 5, 6, 7, 8, 9, 10}
	slice35 := append(slice3[:1], slice3[4:]...)
	fmt.Println("删除中间三个元素", slice35, "slice3:", slice3)

	slice3 = []int{1, 2, 3, 4, 5, 6, 7, 8, 9, 10}
	slice36 := append(slice3[:0], slice3[:7]...) //
	fmt.Println("删除最后三个元素", slice36, "slice3:", slice3)

	slice3 = []int{1, 2, 3, 4, 5, 6, 7, 8, 9, 10}
	slice37 := slice3[:copy(slice3, slice3[3:])] // 删除开头前三个元素
	fmt.Println(slice37)

	// 使用range去求一个slice的和。使用数组跟这个很类似
	nums := []int{2, 3, 4}
	sum := 0
	for _, num := range nums {
		sum += num
	}
	fmt.Println("sum:", sum)
	//在数组上使用range将传入index和值两个变量。上面那个例子我们不需要使用该元素的序号，所以我们使用空白符"_"省略了。有时侯我们确实需要知道它的索引。
	for i, num := range nums {
		if num == 3 {
			fmt.Println("index:", i)
		}
	}

	//range也可以用在map的键值对上。
	kvs := map[string]string{"a": "apple", "b": "banana"}
	for k, v := range kvs {
		fmt.Printf("%s -> %s\n", k, v)
	}

	//range也可以用来枚举Unicode字符串。第一个参数是字符的索引，第二个是字符（Unicode的值）本身。
	for i, c := range "go" {
		fmt.Println(i, c)
	}

	path := []byte("AAAA/BBBBBBBBB")
	sepIndex := bytes.IndexByte(path, "/")
	dir1 := path[:sepIndex:sepIndex]
	dir2 := path[sepIndex+1:]
	fmt.Println("dir1 =>", string(dir1)) //prints: dir1 => AAAA
	fmt.Println("dir2 =>", string(dir2)) //prints: dir2 => BBBBBBBBB

	dir1 = append(dir1, "suffix"...)
	fmt.Println("dir1 =>", string(dir1)) //prints: dir1 => AAAAsuffix
	fmt.Println("dir2 =>", string(dir2)) //prints: dir2 => uffixBBBB
}

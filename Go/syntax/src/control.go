package main

import "fmt"

func main() {
	score := 60
	if score > 90 {
		fmt.Println("Grade: A")
	} else if score > 80 {
		fmt.Println("Grade: B")
	} else if score > 70 {
		fmt.Println("Grade: C")
	} else if score > 60 {
		fmt.Println("Grade: D")
	} else {
		fmt.Println("Grade: F")
	}

	// 条件为布尔值
	switch {
	case score >= 90:
		fmt.Println("Grade: A")
	case score >= 80 && score < 90:
		fmt.Println("Grade: B")
	case score >= 70 && score < 80:
		fmt.Println("Grade: C")
	case score >= 60 && score < 70:
		fmt.Println("Grade: D")
	default:
		fmt.Println("Grade: F")
	}

	// 等值判断
	switch score {
	case 90, 100:
		fmt.Println("Grade: A")
	case 80:
		fmt.Println("Grade: B")
	case 70:
		fmt.Println("Grade: C")
	case 60:
		// 继续执行后续分支代码
		fallthrough
	case 65:
		fmt.Println("Grade: D")
	default:
		fmt.Println("Grade: F")
	}

	sum := 0
	for i := 1; i <= 100; i++ {
		sum += i
	}
	fmt.Println(sum)

	sum = 0
	i := 0
	for i < 10 {
		i++
		sum += i
	}
	fmt.Println(sum)

	arr := [][]int{{1, 2, 3}, {4, 5, 6}, {7, 8, 9}}
	for i := 0; i < 3; i++ {
		for j := 0; j < 3; j++ {
			num := arr[i][j]
			if j > 1 {
				break
			} else {
				continue
			}
			fmt.Println(num)
		}
	}

	// lable 与标签结合跳转到指定的标签语句
ITERATOR1:
	for i := 0; i < 3; i++ {
		for j := 0; j < 3; j++ {
			num := arr[i][j]
			if j > 1 {
				break ITERATOR1
			}
			fmt.Println(num)
		}
	}

	for i := 0; i < 3; i++ {
		for j := 0; j < 3; j++ {
			num := arr[i][j]
			if j > 1 {
				goto EXIT
			}
			fmt.Println(num)
		}
	}

EXIT:
	fmt.Println("Exit.")
}

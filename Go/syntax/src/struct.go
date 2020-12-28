package main

import "fmt"

// 定义
type Books struct {
	title   string
	author  string
	subject string
	book_id int
}

type Person struct {
	name  string
	age   int
	email string
}

func main() {
	// 通过构造方法实例化
	// 创建一个新的结构体
	fmt.Println(Books{"Go 语言", "Google", "Go 语言教程", 6495407})
	// 使用 key => value 格式
	fmt.Println(Books{title: "Go 语言", author: "Google", subject: "Go 语言教程", book_id: 6495407})
	// 忽略字段为 0 或 空
	fmt.Println(Books{title: "Go 语言", author: "Google"})
	fmt.Println("=========================")

	/* book 2 描述 */
	var Book2 Books
	Book2.title = "Python 教程"
	Book2.author = "Python"
	Book2.subject = "Python 语言教程"
	Book2.book_id = 6495700

	// 访问结构体成员
	/* 打印 Book2 信息 */
	fmt.Printf("Book 2 title : %s\n", Book2.title)
	fmt.Printf("Book 2 author : %s\n", Book2.author)
	fmt.Printf("Book 2 subject : %s\n", Book2.subject)
	fmt.Printf("Book 2 book_id : %d\n", Book2.book_id)
	fmt.Println("=========================")
	// 作为函数参数
	printBook(Book2)
	fmt.Println("=========================")
	// 结构体指针
	printBook2(&Book2)

	//初始化
	person := Person{"Tom", 30, "tom@gmail.com"}
	person = Person{name: "Tom", age: 30, email: "tom@gmail.com"}
	fmt.Println(person) //输出 {Tom 30 tom@gmail.com}

	pPerson := &person
	fmt.Println(pPerson) //输出 &{Tom 30 tom@gmail.com}

	pPerson.age = 40
	person.name = "Jerry"
	fmt.Println(person) //输出 {Jerry 40 tom@gmail.com}
}

func printBook(book Books) {
	fmt.Printf("Book title : %s\n", book.title)
	fmt.Printf("Book author : %s\n", book.author)
	fmt.Printf("Book subject : %s\n", book.subject)
	fmt.Printf("Book book_id : %d\n", book.book_id)
}

func printBook2(book *Books) {
	fmt.Printf("Book title : %s\n", book.title)
	fmt.Printf("Book author : %s\n", book.author)
	fmt.Printf("Book subject : %s\n", book.subject)
	fmt.Printf("Book book_id : %d\n", book.book_id)
}

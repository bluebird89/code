package main

import (
	animal2 "syntax/animal"
	"syntax/oop"
	"fmt"
	//"reflect"
)

func main() {
	//继承
	l := oop.Light{}
	fmt.Println(l.On())
	fmt.Println(l.Off())

	ani := animal2.NewAnimal("狗")
	dog := animal2.Dog{"Asia", &ani}
	puppy := animal2.Puppy{dog, ani}
	fmt.Println(dog.GetName(), "的叫声是", dog.Call(), "，最爱是", dog.FavorFood())
	fmt.Println(puppy.Dog.Animal.GetName(), "的叫声是", ani.Call(), "，最爱是", dog.FavorFood())
	//animal := animal.Animal{"Dog"}
	//dog2 := animal2.Dog{"Asia", &animal}
	////dog2 := animal.Dog{"Euporean", &ani}
	//fmt.Println(dog2.GetName(), "的叫声是", dog2.Call(), "，最爱是", dog2.Favriate())
	//// 多重继承有重复方法时：直接调用会报错，使用时用声明该方法的类调用
	//puppy := animal2.Puppy{dog2, &animal}
	//fmt.Println(puppy.Dog.Animal.GetName(), "的叫声是", animal.Call(), "，最爱是", dog2.Favriate())

	// 将对象实例赋值给接口:会根据类似下面这样的非指针成员方法,自动生成一个新的与之对应的指针成员方法
	var a oop.Integer = 1
	var b oop.IntNumber = &a
	var c oop.IntNumber2 = a
	fmt.Println(b, c)

	// 将接口赋值给接口
	// 不要求两个接口完全等价（方法完全相同）。如果接口 A 的方法列表是接口 B 的方法列表的子集，那么接口 B 可以赋值给接口 A
	var num1 oop.Number = 1
	var num2 oop.Number1 = num1
	//var num3 oop1.Number2 = num2
	// 接口查询和转化:判断 num2 是否是 Number1 的实例,在运行期才能够确定
	if num3, ok := num2.(oop.Number1); ok {
		fmt.Println(num3.Equal(1))
	}

	// 类型查询和转化
	//var ianimal animal.IAnimal = animal.Dog{"Asia", ani}
	//if dog1, ok := ianimal.(animal.Dog); ok {
	//	fmt.Println(dog1.GetName())
	//}

	// 归属于子类的实例并不归属于父类,因为类与类之间的「继承」是通过组合实现的
	// 要获取实际类型通过 reflect.TypeOf(ianimal) 获取,基本数据类型 通过 type 关键字即可获取对应的类型值
	//fmt.Println(reflect.TypeOf(ianimal))

	// 接口实现不是强制的，是根据类实现的方法来动态判定的
	// 只有都实现了系统才会判定实现了接口，才能进行相应的接口赋值
	// 接口组合是匿名类型组合（没有显式为组合类型设置对应的属性名称）的一个特定场景，只不过接口只包含方法，而不包含任何成员变量

	// 所有的类型都实现了空接口，就可以通过这个空接口来指向任意类型
	// 最典型使用场景就是用于声明函数支持任意类型的参数
	var v1 interface{} = 1              // 将 int 类型赋值给 interface{}
	var v2 interface{} = "学院君"          // 将 string 类型赋值给 interface{}
	var v3 interface{} = true           // 将 bool 类型赋值给 interface{}
	var v4 interface{} = &v2            // 将 *interface{} 类型（指针）赋值给 interface{}
	var v5 interface{} = []int{1, 2, 3} // 将切片类型赋值给 interface{}
	var v6 interface{} = struct {       // 将自定义类型赋值给 interface{}
		id   int
		name string
	}{1, "学院君"}

	// 实现类型判断和转化
	var myarr = [3]int{1, 2, 3}
	value, ok := interface{}(myarr).([3]int)

	fmt.Println(v1, v2, v3, v4, v5, v6, value, ok)
}

struct tag
{
    member_list
} variable_list;

//此声明声明了拥有3个成员的结构体，分别为整型的a，字符型的b和双精度的c，但没有标明其标签，声明了结构体变量s1
struct
{
    int a;
    char b;
    double c;
} s1;

//此声明声明了拥有3个成员的结构体，分别为整型的a，字符型的b和双精度的c，结构体的标签被命名为SIMPLE，用SIMPLE标签的结构体，另外声明了变量t1, t2[20], *t3
struct SIMPLE
{
    int a;
    char b;
    double c;
};
SIMPLE t1, t2[20], *t3;

//可以用typedef创建新类型，此声明声明了拥有3个成员的结构体，分别为整型的a，字符型的b和双精度的c，结构体的标签被命名为Simple2，用Simple2作为类型声明新的结构体变量u1, u2[20], *u3
typedef struct
{
    int a;
    char b;
    double c;
} Simple2;
Simple2 u1, u2[20], *u3; //若去掉typedef则编译报错，error C2371: “Simple2”: 重定义；不同的基类型

// 注：在上面的声明中，第一个和第二声明被编译器当作两个完全不同的类型，即使他们的成员列表是一样的，如果令t3=&s1，则是非法的。
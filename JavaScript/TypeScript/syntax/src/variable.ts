// 定义基本类型的值
const lie: boolean = false;
const pi: number = 3.14159;
const tree_of_knowledge: string = "Yggdrasil";

// 定义数组有两种写法
const divine_lovers: string[] = ["Zeus", "Aphrodite"];
const digits: Array<number> = [143219876, 112347890];

let date_triplet: [number, number, number];
date_triplet = [31, 6, 2016];

let athena: [string, number];
athena = ['Athena', 9386];

var name1: string = athena[0];
const age1: number = athena[1];

enum Color1 { Red, Green, Blue };
// const red : Color = Color1.Red;
console.log(Color1[0]); // 'Red'

// 允许指定起始序号
enum RomanceLanguages { Spanish = 1, French, Italian, Romanian, Portuguese };
console.log(RomanceLanguages[4]); // 'Romanian'
console.log(RomanceLanguages[0]); // undefined

let mystery: any = 4; // number
mystery = "four"; // string -- no error

const not_only_strings: any[] = [];
not_only_strings.push("This Works!")
not_only_strings.push(42); // This does too.


let the_void: void = undefined;
the_void = null;

// the_void = "nothing"; // Error

// alert('hello world in TypeScript!');

// 类型批注
// function area(shape: string, width: number, height: number) {
//   var area = width * height;
//   return "I'm a " + shape + " with an area of " + area  + " cm aquard ";
// }
//
// document.body.innerHTML = area('rectangle', 30, 15);

// 接口
// interface Shape {
//   name: string;
//   width: number;
//   height: number;
//   color: string;
// }
//
// function area(shape: Shape) {
//   var area = shape.width * shape.height;
//   return "I'm a " + shape.name + " with an area of " + area  + " cm aquard ";
// }
//
// console.log( area( {name: "square", width: 30, height: 30, color: "blue"} ) );

// 箭头函数表达式
// var shape = {
//     name: "rectangle",
//     popup: function() {
//
//         console.log('This inside popup(): ' + this.name);
//
//         setTimeout(function() {
//             console.log('This inside setTimeout(): ' + this.name);
//             console.log("I'm a " + this.name + "!");
//         }, 3000);
//
//     }
// };
//
// shape.popup();

// 类
class Shape {

  area: number;
  color: string;

  constructor(public name: string, public width: number, public height: number) {
    this.area = width * height;
    this.color = "pink";
  };

  shoutout() {
    return "I'm " + this.color + " " + this.name + " with an area of " + this.area + " cm squared.";
  }
}

var square = new Shape("square", 30, 30);

console.log(square.shoutout());
console.log('Area of Shape: ' + square.area);
console.log('Name of Shape: ' + square.name);
console.log('Color of Shape: ' + square.color);
console.log('Width of Shape: ' + square.width);
console.log('Height of Shape: ' + square.height);

// 继承
class Shape3D extends Shape {

  volume: number;

  constructor(public name: string, width: number, height: number, length: number) {
    // super 方法调用了基类 Shape 的构造函数 Shape
    super(name, width, height);
    this.volume = length * this.area;
  };

  shoutout() {
    return "I'm " + this.name + " with a volume of " + this.volume + " cm cube.";
  }

  superShout() {
    return super.shoutout();
  }
}

var cube = new Shape3D("cube", 30, 30, 30);
console.log(cube.shoutout());
console.log(cube.superShout());

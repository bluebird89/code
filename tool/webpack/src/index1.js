import _ from 'lodash';
import './css/base.scss';
import './main.scss';
import './main2.scss';

let result = [1, 2, 3].map((n) => n + 1);

let element = document.createElement('div');
element.innerHTML = _.join(result, '-');
document.body.appendChild(element);

// let smallSizeImageElement = document.createElement(('img'));
// smallSizeImageElement.src = smallSizeImage;
// document.body.appendChild(smallSizeImageElement)

// let normalSizeImageElement = document.createElement(('img'));
// normalSizeImageElement.src = normalSizeImage;
// document.body.appendChild(normalSizeImageElement)

// let bigSizeImageElement = document.createElement(('img'));
// bigSizeImageElement.src = bigSizeImage;
// document.body.appendChild(bigSizeImageElement)

let m = [4, 6, 7];

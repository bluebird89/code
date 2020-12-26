import _ from 'lodash';
import bigSizeImage from './assets/big-image.jpg';
import normalSizeImage from './assets/normal-image.jpg';
import smallSizeImage from './assets/small-image.jpg';
import { createElement } from './createElement';
import './css/base.scss';
import './main.css';
import './main.scss';
import './main2.scss';

createElement('yellow');
createElement('blue');
createElement('green');
createElement('fuchsia');
createElement('gray');

let result = [1, 2, 3].map((n) => n + 1);

let element = document.createElement('div');
element.innerHTML = _.join(result, '-');
document.body.appendChild(element);

let smallSizeImageElement = document.createElement(('img'));
smallSizeImageElement.src = smallSizeImage;
document.body.appendChild(smallSizeImageElement)

let normalSizeImageElement = document.createElement(('img'));
normalSizeImageElement.src = normalSizeImage;
document.body.appendChild(normalSizeImageElement)

let bigSizeImageElement = document.createElement(('img'));
bigSizeImageElement.src = bigSizeImage;
document.body.appendChild(bigSizeImageElement)

let m = [4, 6, 7];

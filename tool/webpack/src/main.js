// const greeter = require('./Greeter.js');
// document.querySelector("#root").appendChild(greeter());

import React from 'react';
import {render} from 'react-dom';
import Greeter from './Greeter.js';

import './main.css';

render(<Greeter />, document.getElementById('root'));
import chai from 'chai';
import fetch from 'node-fetch';
import request from 'superagent';

let expect = chai.expect;

describe('异步请求测试', function () {
    it('返回对象', function (done) {
        request
            .get('https://api.github.com')
            .end(function (err, res) {
                expect(res).to.be.an('object');
                done();
            });
    });

    it('返回promise', function () {
        return fetch('https://api.github.com')
            .then(function (res) {
                return res.json();
            }).then(function (json) {
                expect(json).to.be.an('object');
            });
    });
});

// npx mocha --require babel-register -t  1000 test/async.test.js

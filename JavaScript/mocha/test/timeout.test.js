import chai from 'chai';

let expect = chai.expect;

describe('测试超时的测试', function () {
    it('测试应该5000毫秒后结束', function (done) {
        var x = true;
        var f = function () {
            x = false;
            expect(x).to.be.not.ok;
            done(); // 通知Mocha测试结束
        };
        setTimeout(f, 4000);
    });
});

// npx mocha --require babel-register -t 5000 -s 1000 test/timeout.test.js

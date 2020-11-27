import { expect } from 'chai';

describe('hooks例子', function () {

    before(function () {
        // 在本区块的所有测试用例之前执行
    });

    after(function () {
        // 在本区块的所有测试用例之后执行
    });

    var foo = false;

    beforeEach(function () {
        foo = true;
    });

    it('修改全局变量成功', function () {
        expect(foo).to.be.equal(true);
    });
    // 异步
    // beforeEach(function (done) {
    //     setTimeout(function () {
    //         foo = true;
    //         done();
    //     }, 50);
    // });

    afterEach(function () {
        // 在本区块的每个测试用例之后执行
    });

    // test cases
});

// npx  mocha --require babel-register test/hooks.test.js

((global, factory) => {
    if (typeof exports == "object" && typeof module == "object") {
        module.exports = factory();
    } else {
        global.MyPromise = factory();
    }
})(this, () => {
    const State = {
        Pending: 0,
        Fulfilled: 1,
        Rejected: 2,
    };

    class Promise {
        constructor(fn) {
            this.state = State.Pending;
            this.value = undefined;
            this.pending = [];
            this.isScheduled = false;

            setTimeout(() =>
                fn(resolve.bind(null, this), reject.bind(null, this))
            );
        }

        then(onFulfilled, onRejected) {
            const promise = new Promise(() => {});
            this.pending.push([promise, onFulfilled, onRejected]);
            if (this.state != State.Pending) schedule(this);
            return promise;
        }

        catch(callback) {
            return this.then(null, callback);
        }
    }

    Promise.resolve = (val) => {
        const promise = new Promise((resolve) => resolve(val));
        return promise;
    };

    Promise.reject = (err) => {
        const promise = new Promise((_, reject) => reject(err));
        return promise;
    };

    Promise.deferred = () => {
        const promise = new Promise(() => {});

        return {
            resolve: (val) => resolve(promise, val),
            reject: (err) => reject(promise, err),
            promise,
        };
    };

    function resolve(promise, val) {
        if (promise.state != State.Pending) return;
        if (promise == val) return reject(promise, "cycle error");

        try {
            if (isPromise(val)) {
                val.then(
                    resolve.bind(null, promise),
                    reject.bind(null, promise)
                );
            } else {
                promise.state = State.Fulfilled;
                promise.value = val;
                schedule(promise);
            }
        } catch (err) {
            reject(promise, err);
        }
    }

    function reject(promise, err) {
        if (promise.state != State.Pending) return;

        promise.state = State.Rejected;
        promise.value = err;

        schedule(promise);
    }

    function schedule(promise) {
        if (promise.isScheduled) return;
        promise.isScheduled = true;

        setTimeout(() => {
            promise.isScheduled = false;

            if (!promise.pending.length && promise.state == State.Rejected) {
                throw new Error(`uncaught (in promise) ${promise.value}`);
            }

            for (let i = 0; i < promise.pending.length; i++) {
                const pending = promise.pending[i];

                try {
                    if (promise.state == State.Fulfilled) {
                        resolve(
                            pending[0],
                            isFunction(pending[1])
                                ? pending[1](promise.value)
                                : promise.value
                        );
                    } else if (promise.state == State.Rejected) {
                        isFunction(pending[2])
                            ? resolve(pending[0], pending[2](promise.value))
                            : reject(pending[0], promise.value);
                    }
                } catch (err) {
                    reject(pending[0], err);
                }
            }
        });
    }

    function isPromise(val) {
        return isFunction(Object(val).then);
    }

    function isFunction(val) {
        return typeof val == "function";
    }

    return Promise;
});

function timeout(ms) {
    return new Promise((resolve, reject) => {
        setTimeout(resolve, ms, "done");
    });
}

timeout(100).then((value) => {
    console.log(value);
});

let promise = new Promise(function (resolve, reject) {
    console.log("Promise");
    resolve();
});
promise.then(function () {
    console.log("resolved.");
});
console.log("Hi!");

function loadImageAsync(url) {
    return new Promise(function (resolve, reject) {
        const image = new Image();

        image.onload = function () {
            resolve(image);
        };

        image.onerror = function () {
            reject(new Error("Could not load image at " + url));
        };

        image.src = url;
    });
}

const getJSON = function (url) {
    const promise = new Promise(function (resolve, reject) {
        const handler = function () {
            if (this.readyState !== 4) {
                return;
            }
            if (this.status === 200) {
                resolve(this.response);
            } else {
                reject(new Error(this.statusText));
            }
        };
        const client = new XMLHttpRequest();
        client.open("GET", url);
        client.onreadystatechange = handler;
        client.responseType = "json";
        client.setRequestHeader("Accept", "application/json");
        client.send();
    });

    return promise;
};

getJSON("/posts.json").then(
    function (json) {
        console.log("Contents: " + json);
    },
    function (error) {
        console.error("出错了", error);
    }
);

const promises = [2, 3, 5, 7, 11, 13].map(function (id) {
    return getJSON("/post/" + id + ".json");
});

Promise.all(promises)
    .then(function (posts) {
        // ...
    })
    .catch(function (reason) {
        // ...
    });

var readFile = require("fs-readfile-promise");

readFile(fileA)
    .then(function (data) {
        console.log(data.toString());
    })
    .then(function () {
        return readFile(fileB);
    })
    .then(function (data) {
        console.log(data.toString());
    })
    .catch(function (err) {
        console.log(err);
    });

var fetch = require("node-fetch");

function* gen() {
    var url = "https://api.github.com/users/github";
    var result = yield fetch(url);
    console.log(result.bio);
}
var g = gen();
var result = g.next();

result.value
    .then(function (data) {
        return data.json();
    })
    .then(function (data) {
        g.next(data);
    });

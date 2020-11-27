const Koa = require('koa');
const bodyParser = require('koa-bodyparser');
const controller = require('./controller');
const templating = require('./templating');
const app = new Koa();

const isProduction = process.env.NODE_ENV === 'production';

if (!isProduction) {
    let staticFiles = require('./static-files');
    app.use(staticFiles('/static/', __dirname + '/static'));
}

let staticFiles = require('./static-files');
app.use(templating('view', {
    noCache: !isProduction,
    watch: !isProduction
}));

// log request URL:
app.use(async(ctx, next) => {
    console.log(`Process ${ctx.request.method} ${ctx.request.url}...`);
    var
        start = new Date().getTime(),
        execTime;
    await next();
    execTime = new Date().getTime() - start;
    ctx.response.set('X-Response-Time', `${execTime}ms`);
});

// app.use(async(ctx, next) => {
//     if (ctx.request.path === '/template') {
//         var s = env.render('hello.html', { name: '<script>alert("小明")</script>' });
//         ctx.response.body = s;
//         console.log(s);
//         await next();
//     } else if (ctx.request.path === '/template/list') {
//         var s = env.render('list.html', ['apple', 'banana', 'orange']);
//         ctx.response.body = s;
//         console.log(s);
//         await next();
//     } else if (ctx.request.path === '/template/block') {
//         var s = env.render('block.html', {
//             header: 'Hello',
//             body: 'bla bla bla...',
//             footer: 'Arseanl'
//         });
//         ctx.response.body = s;
//         console.log(s);
//         await next();
//     }
// });
// parse request body:
app.use(bodyParser());
// add nunjucks as view:
app.use(templating('views', {
    noCache: !isProduction,
    watch: !isProduction
}));
// add controllers:
app.use(controller());

app.listen(3000);
console.log('app started at port 3000...');
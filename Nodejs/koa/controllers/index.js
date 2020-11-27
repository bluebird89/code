// var fn_index = async(ctx, next) => {
//     ctx.response.body = `<h1>Index</h1>
//         <form action="/signin" method="post">
//             <p>Name: <input name="name" value="koa"></p>
//             <p>Password: <input name="password" type="password"></p>
//             <p><input type="submit" value="Submit"></p>
//         </form>`;
// };

// var fn_signin = async(ctx, next) => {
//     var
//         name = ctx.request.body.name || '',
//         password = ctx.request.body.password || '';
//     console.log(`signin with name: ${name}, password: ${password}`);
//     if (name === 'koa' && password === '12345') {
//         ctx.response.body = `<h1>Welcome, ${name}!</h1>`;
//     } else {
//         ctx.response.body = `<h1>Login failed!</h1>
//         <p><a href="/">Try again</a></p>`;
//     }
// };

// async(ctx, next) => {
//     ctx.render('index.html', {
//         title: 'Welcome'
//     });
// }

// async(ctx, next) => {
//     var
//         email = ctx.request.body.email || '',
//         password = ctx.request.body.password || '';
//     if (email === 'admin@example.com' && password === '123456') {
//         // 登录成功:
//         ctx.render('signin-ok.html', {
//             title: 'Sign In OK',
//             name: 'Mr Node'
//         });
//     } else {
//         // 登录失败:
//         ctx.render('signin-failed.html', {
//             title: 'Sign In Failed'
//         });
//     }
// }

// module.exports = {
//     'GET /': fn_index,
//     'POST /signin': fn_signin
// };
// index:

module.exports = {
    'GET /': async(ctx, next) => {
        ctx.render('index.html', {
            title: 'Welcome'
        });
    }
};
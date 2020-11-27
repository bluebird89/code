const merge = require('webpack-merge');
const webpack = require('webpack');
const baseWebpackConfig = require('./webpack.base.conf');


const webpackConfig = merge(baseWebpackConfig, {
    //environment specific config goes here
    mode: 'development',
    output: {
        filename: '[name].js',
        chunkFilename: '[name].js'
    },
    devtool: 'inline-source-map',
    devServer: {
        contentBase: './distribution',
        inline: true, //do not use iframe for the page, true is default
        open: true, //open browser after dev server starts
        port: 8080, //8080 is default
        proxy: { //proxy backend api
            '/api': 'http://localhost:3000'
        },
        publicPath: '/assets/'
    },
    module: {
        rules: [{
            test: /\.css$/,
            use: [
                'style-loader',
                {
                    loader: 'css-loader',
                    options: {
                        sourceMap: true,
                        modules: true,
                        localIdentName: '[name]---[local]---[hash:base64:5]'
                    }
                }
            ]
        },
        {
            test: /\.less$/,
            use: [
                'style-loader',
                'css-loader',
                'less-loader'
            ],
            exclude: /node_modules/
        }]
    },
    externals = {
        react: 'React',
        'react-dom': 'ReactDOM'
    },
    plugins: [
        new webpack.HotModuleReplacementPlugin(),
        new webpack.SourceMapDevToolPlugin({
            filename: '[file].map',
            exclude: ['vendor.js'] // vendor 通常不需要 sourcemap
        })
    ]

});
// Hot module replacement
// Object.keys(config.entry).forEach((key) => {
//     // 这里有一个私有的约定，如果 entry 是一个数组，则证明它需要被 hot module replace
//     if (Array.isArray(config.entry[key])) {
//         config.entry[key].unshift(
//             'webpack-dev-server/client?http://0.0.0.0:8080',
//             'webpack/hot/only-dev-server'
//         );
//     }
// });

module.exports = webpackConfig;

const path = require('path');
var HtmlWebpackPlugin = require('html-webpack-plugin');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const webpack = require('webpack');
const ESLintPlugin = require('eslint-webpack-plugin');

const SRC_PATH = path.resolve('./src');
const ASSETS_BUILD_PATH = path.resolve('./dist');
const ASSETS_PUBLIC_PATH = '/assets/';

function resolve(dir) {
    return path.join(__dirname, '..', dir)
}

module.exports = {
    context: SRC_PATH, // 设置源代码的默认根路径

    resolve: {
        extensions: ['.js', '.jsx'] // 同时支持 js 和 jsx
    },
    entry: {
        'index': './index1.js',
        // 注意 entry 中的路径都是相对于 SRC_PATH 的路径
        // vendor: './vendor',
        // a: ['./entry-a'],
        // b: ['./entry-b'],
        // c: ['./entry-c']
        bundle1: './main.js',
        bundle2: './main2.js',
    },
    output: {
        path: ASSETS_BUILD_PATH,
        publicPath: ASSETS_PUBLIC_PATH,
        filename: './js/[name].[contenthash].js',
        chunkFilename: '[name].[contenthash].js',
        path: path.resolve(__dirname, 'distribution')
    },
    module: {
        rules: [{
            test: /\.js$/,
            loader: 'babel-loader',
            include: [resolve('src')],
            exclude: [resolve('node_modules')]
        },
        {
            test: /\.(gif|png|jpe?g|svg)$/i,
            use: [{
                loader: 'url-loader',
                options: {
                    limit: 8 * 1024
                }
            }]
        },
        {
            test: /\.css$/,
            use: ['style-loader', 'css-loader']
        }, {
            test: /\.less$/,
            use: [
                'style-loader',
                'css-loader',
                // 将less文件编译成css文件
                // 需要下载 less-loader和less
                'less-loader'
            ]
        },
        {
            test: /\.(sass|scss)$/,
            use: [
                'style-loader',
                {
                    loader: 'css-loader',
                    options: {
                        sourceMap: true,
                        // modules: true,
                        modules: {
                            localIdentName: '[name]---[local]---[hash:base64:5]'
                        }
                    }
                },
                {
                    loader: 'postcss-loader',
                    options: {
                        plugins: [require("autoprefixer")],
                        sourceMap: true
                    }
                },
                {
                    loader: 'sass-loader',
                    options: {
                        sourceMap: true
                    }
                },

            ]
        },
        {
            test: /\.jsx?$/,
            exclude: /node_modules/,
            loader: 'babel-loader'
        },

        {
            test: /\.(png|jpg|gif)$/,
            use: [{
                loader: 'url-loader',
                options: {
                    limit: 8192,
                    name: 'images/[name].[ext]'
                }
            }]
        },

        {
            test: /\.woff(2)?(\?v=[0-9]\.[0-9]\.[0-9])?$/,
            use: [{
                loader: 'url-loader',
                options: {
                    limit: 8192,
                    mimetype: 'application/font-woff',
                    name: 'fonts/[name].[ext]'
                }
            }]
        },

        {
            test: /\.(ttf|eot|svg)(\?v=[0-9]\.[0-9]\.[0-9])?$/,
            use: [{
                loader: 'file-loader',
                options: {
                    limit: 8192,
                    mimetype: 'application/font-woff',
                    name: 'fonts/[name].[ext]'
                }
            }]
        }
        ]
    },
    optimization: {
        splitChunks: {
            chunks: 'all'
        }
    },
    plugins: [
        new CleanWebpackPlugin(),
        new HtmlWebpackPlugin({
            template: 'index1.html',
            filename: 'index1.html'
        }),
        new ESLintPlugin()
        // 启用 CommonChunkPlugin
        // new webpack.optimize.CommonsChunkPlugin({
        // 	names: 'vendor',
        // 	minChunks: Infinity
        // })
    ]

};

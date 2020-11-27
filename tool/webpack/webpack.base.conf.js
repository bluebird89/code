const path = require('path');
var HtmlWebpackPlugin = require('html-webpack-plugin');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const webpack = require('webpack');
const ESLintPlugin = require('eslint-webpack-plugin');

// 配置常量
// 源代码的根目录（本地物理文件路径）
const SRC_PATH = path.resolve('./app');
// 打包后的资源根目录（本地物理文件路径）
const ASSETS_BUILD_PATH = path.resolve('./dist');
// 资源根目录（可以是 CDN 上的绝对路径，或相对路径）
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
        'index': './src/index1.js',
        // 注意 entry 中的路径都是相对于 SRC_PATH 的路径
        // vendor: './vendor',
        // a: ['./entry-a'],
        // b: ['./entry-b'],
        // c: ['./entry-c']
        bundle1: './main1.js',
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
            }, {
                loader: 'image-webpack-loader',
                options: {
                    mozjpeg: {
                        progressive: true,
                        quality: 65
                    },
                    optipng: {
                        enabled: false,
                    },
                    pngquant: {
                        quality: [0.65, 0.90],
                        speed: 4
                    },
                    gifsicle: {
                        interlaced: false,
                    },
                    webp: {
                        quality: 75
                    }
                }
            }]
        },
        {
            test: /\.(s*)css$/,
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
                }
            ]
        },
        {
            test: /\.jsx?$/,
            exclude: /node_modules/,
            // 建议把 babel 的运行时配置放在 .babelrc 里，从而与 eslint-loader 等共享配置
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
            template: './src/index1.html',
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

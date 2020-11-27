const webpack = require('webpack');

const path = require('path');
var HtmlWebpackPlugin = require('html-webpack-plugin');

const {
    CleanWebpackPlugin
} = require('clean-webpack-plugin');

const {
    BundleAnalyzerPlugin
} = require('webpack-bundle-analyzer');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');

function resolve(dir) {
    return path.join(__dirname, '..', dir);
}

module.exports = {
    entry: {
        index1: './src/index1.js',
        'index2': './src/index2.js',
        'index3': './src/index3.js'
    },
    output: {
        filename: '[name].[hash].js',
        chunkFilename: '[name].[hash].js',
        path: path.resolve(__dirname, 'distribution'),
    },
    devtool: 'inline-source-map',
    devServer: {
        contentBase: './distribution',
        hot: true
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
                // 'style-loader',
                MiniCssExtractPlugin.loader,
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
        }, {
            test: /\.less$/,
            use: ExtractTextPlugin.extract({
                use: [
                    'css-loader',
                    'less-loader'
                ],
                fallback: 'style-loader'
            }),
            exclude: /node_modules/
        }
        ]
    },
    optimization: {
        runtimeChunk: {
            "name": "manifest" // 会为runtime代码单独生成名为manifest-*.js的文件
        },
        splitChunks: {
            chunks: 'all',
            minSize: 0,
            cacheGroups: {
                default: false,
                vendors: false,
                common: {
                    minChunks: 2, // 引用次数大于等于2的module符合该cacheGroup的条件
                    name: 'commons', // 所有符合条件的module都放到同一个名为commons的文件中
                    chunks: 'async', // 通过异步加载的module符合条件
                    priority: 10,
                    reuseExistingChunk: true,
                    enforce: true
                },
                vendor: {
                    test: /[\\/]node_modules[\\/]/,
                    name: 'vendors',
                    chunks: 'all' // 对所有的第三方库进行代码分割(包括async和initial)。此时生产的代码中多了一个vendors~main.*.js文件
                },
                styles: {
                    name: 'styles',
                    test: /\.(s*)css$/,
                    chunks: 'all',
                    enforce: true
                }
            }
        }
    },
    plugins: [
        new CleanWebpackPlugin({
            root: path.resolve(__dirname, '..'),
            exclude: ['assets'],
            verbose: true,
            dry: false
        }),
        new BundleAnalyzerPlugin({
            openAnalyzer: false,
            analyzerMode: 'static',
            reportFilename: 'bundle-analyzer-report.html'
        }),
        new HtmlWebpackPlugin({
            template: './src/index1.html',
            filename: 'index1.html',
            chunks: ['index', 'manifest', 'vendors', 'styles']
        }),
        new HtmlWebpackPlugin({
            template: './src/index2.html',
            filename: 'index2.html',
            chunks: ['index', 'manifest', 'vendors', 'styles']
        }),
        new HtmlWebpackPlugin({
            template: './src/index3.html',
            filename: 'index3.html'
        }),
        new webpack.HotModuleReplacementPlugin(),
        new webpack.HashedModuleIdsPlugin(),
        new MiniCssExtractPlugin({
            filename: "[name].[contenthash].css",
            chunkFilename: "[name].[contenthash].css"
        }),
        new webpack.DefinePlugin({
            'process.env.NODE_ENV': JSON.stringify(process.env.NODE_ENV || 'production')
        }),
        // 启动 minify
        new webpack.LoaderOptionsPlugin({
            minimize: true
        })
    ]

};

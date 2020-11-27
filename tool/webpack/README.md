
## 流程

```sh
npm init -y
npm install webpack webpack-cli --save-dev
npm build

npm install --save-dev webpack-dev-server

npm install --save-dev @babel/core @babel/preset-env
npm install --save-dev babel-loader
npm install --save-dev html-webpack-plugin
npm install --save-dev clean-webpack-plugin

npm install --save-dev file-loader
npm install --save-dev url-loader
npm install --save-dev image-webpack-loader

npm install sass-loader node-sass webpack --save-dev

npm install --save-dev postcss-loader
npm install --save-dev autoprefixer
```

## 错误

```sh
npm install --save-dev clean-webpack-plugin

#Error: spawn /Users/henry/Workspace/webpack_learning/node_modules/mozjpeg/vendor/cjpeg ENOENT
npm rebuild
```

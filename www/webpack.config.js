const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const VueLoaderPlugin = require('vue-loader/lib/plugin');
const webpack = require('webpack');

module.exports = ()  => {

    let valid_environments = ['production', 'development', 'none'];
    let ENVIRONMENT = process.env.NODE_ENV.toLowerCase();
    let mode = 'production';

    if (valid_environments.includes(ENVIRONMENT)) {
        mode = ENVIRONMENT;
    }

    return {
        entry: {
            app: path.resolve(__dirname, 'assets/js/app.js'),
            admin: path.resolve(__dirname, 'assets/js/admin.js'),
        },
        output: {
            path: path.resolve(__dirname, 'assets/build/js'),
            filename: '[name].js'
        },
        mode: mode,
        resolve: {
            alias: {
                'vue$': 'vue/dist/vue.esm.js'
            },
            extensions: ['*', '.js', '.vue', '.json']
        },
        module: {
            rules: [
                {
                    test: /\.vue$/,
                    loader: 'vue-loader'
                },
                {
                    test: /\.js$/,
                    loader: 'babel-loader',
                },
                {
                    test: /\.(css|scss|sass)$/,
                    use: [
                        MiniCssExtractPlugin.loader,
                        'css-loader',
                        {
                            loader: 'postcss-loader',
                            options: {
                                plugins: () => [require('autoprefixer')]
                            }
                        },
                        {
                            loader: 'sass-loader',
                            options: {
                                sourceMap: true,
                                sourceMapContents: false
                            }
                        }
                    ]
                },
                {
                    test: /\.(ico|gif|png|jpg|jpeg|svg|webp)$/,
                    loader: 'file-loader',
                    options: {
                        name: '[name].[ext]?[hash]',
                        outputPath: '../../build/img/',
                        publicPath: '/assets/build/img/',
                    }
                },
                {
                    test: /\.(woff(2)?|ttf|eot|svg)(\?v=\d+\.\d+\.\d+)?$/,
                    use: [{
                        loader: 'file-loader',
                        options: {
                            name: '[name].[ext]',
                            outputPath: '../../build/fonts/'
                        }
                    }]
                }
            ]
        },
        plugins: [
            new MiniCssExtractPlugin({
                filename: '../../build/css/[name].css',
            }),
            new VueLoaderPlugin(),
            new webpack.ProvidePlugin({
                $: 'jquery',
                jQuery: 'jquery'
            })
        ]
    };
};
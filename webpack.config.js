var webpack = require('webpack');
var Path = require('path');

module.exports = {
    entry: './src/js',
    output: {
        path: __dirname + '/prod/js',
        filename: 'bundle.js',
    },
    module: {
        loaders: [
            {
                test: /\.js/,
                loader: 'babel-loader',
                //include: __dirname + '/src/js',
                exclude: /(node_modules|bower_components)/,
            }
        ]
    },
    plugins: [
        new webpack.ProvidePlugin({
            $: "jquery",
            jQuery: "jquery",
            'window.jQuery': "jquery"
        }),
        //new webpack.optimize.UglifyJsPlugin({
        //    minimize: true,
        //    extractComments: true,
        //})
    ],
    resolve: {
        alias: {
            "TweenLite": Path.resolve('node_modules', 'gsap/src/uncompressed/TweenLite.js'),
            "TweenMax": Path.resolve('node_modules', 'gsap/src/uncompressed/TweenMax.js'),
            "TimelineLite": Path.resolve('node_modules', 'gsap/src/uncompressed/TimelineLite.js'),
            "TimelineMax": Path.resolve('node_modules', 'gsap/src/uncompressed/TimelineMax.js'),
            "ScrollMagic": Path.resolve('node_modules', 'scrollmagic/scrollmagic/uncompressed/ScrollMagic.js'),
            "animation.gsap": Path.resolve('node_modules', 'scrollmagic/scrollmagic/uncompressed/plugins/animation.gsap.js'),
            "debug.addIndicators": Path.resolve('node_modules', 'scrollmagic/scrollmagic/uncompressed/plugins/debug.addIndicators.js')
        }
    },
};
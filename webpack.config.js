'use strict';

// Us eextract text plugin
let ExtractText = require('extract-text-webpack-plugin');

// Define settings
module.exports = {
    // The main .js file path
    entry: './src/client/js/client.js',

    // Define loaders
    module: {
        loaders: [
            // Babel.js
            {
                test: /\.js$/,
                loader: 'babel',
                query: {
                    presets: ['es2015']
                }
            },

            // Sass
            {
                test: /\.scss$/,
                loader: ExtractText.extract('style', 'css?sourceMap!sass?sourceMap')
            }
        ]
    },

    // Automatically accept these extensions
    resolve: {
        extensions: ['', '.js', '.json', '.scss']
    },
    
    // Output .js file
    output: {
        filename: './public/js/client.js'
    },

    // Output .css file
    plugins: [
        new ExtractText('./public/css/client.css', { allChunks: true })
    ]
};

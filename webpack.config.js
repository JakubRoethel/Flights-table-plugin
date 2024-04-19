const path = require('path');

module.exports = {
    mode: 'development',
    entry: {
        main: './js/main.js',
    },
    output: {
        path: path.resolve(__dirname, 'dist'),
        filename: '[name].min.js',
    },
    module: {
        rules: [
            {
                test: /\.scss$/,
                use: [
                    'style-loader',
                    'css-loader',
                    'sass-loader'
                ],
            },
        ],
    },
};

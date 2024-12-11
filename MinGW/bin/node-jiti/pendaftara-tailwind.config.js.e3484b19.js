"use strict";Object.defineProperty(exports, "__esModule", {value: true}); function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }var _defaultTheme = require('tailwindcss/defaultTheme'); var _defaultTheme2 = _interopRequireDefault(_defaultTheme);

/** @type {import('tailwindcss').Config} */
exports. default = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ..._defaultTheme2.default.fontFamily.sans],
            },
        },
    },
    plugins: [],
};
 /* v7-48eb44c9e5384408 */
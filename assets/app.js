/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */

// Need jQuery? Install it with "yarn add jquery", then uncomment to import it.
const $ = require('jquery');
global.$ = global.jQuery = $;

// any CSS you import will output into a single scss file (appFile.scss in this case)
import './app.scss';

// Bootstrap js
require('bootstrap');

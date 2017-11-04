<?php declare(strict_types = 1);

return [
    ['GET', '/', ['src\Controllers\Home', 'show']],
    ['GET', '/books', ['src\Controllers\Books', 'show']],
    ['GET', '/drawings', ['src\Controllers\Drawings', 'show']],
    ['GET', '/animation', ['src\Controllers\Animation', 'show']],
    ['GET', '/about', ['src\Controllers\About', 'show']],
    ['GET', '/{slug}', ['src\Controllers\Page', 'show']],
];
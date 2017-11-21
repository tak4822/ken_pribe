<?php declare(strict_types = 1);

return [
    ['GET', '/', ['src\Controllers\Home', 'show']],
    ['GET', '/books', ['src\Controllers\Books', 'show']],
    ['GET', '/drawings', ['src\Controllers\Drawings', 'show']],
    ['GET', '/animation', ['src\Controllers\Animation', 'show']],
    ['GET', '/about', ['src\Controllers\About', 'show']],
    ['GET', '/login', ['src\Controllers\Login', 'show']],
    ['GET', '/admin', ['src\Controllers\Admin', 'show']],
    ['GET', '/admin/books', ['src\Controllers\AdminBooks', 'show']],
    ['GET', '/admin/drawings', ['src\Controllers\AdminDrawings', 'show']],
    ['GET', '/admin/animation', ['src\Controllers\AdminAnimation', 'show']],
    ['GET', '/admin/about', ['src\Controllers\AdminAbout', 'show']],
    ['GET', '/admin/user', ['src\Controllers\AdminUser', 'show']],
    //books
    ['GET', '/book/insert', ['src\Controllers\AdminBooks', 'showInsert']],
    ['POST', '/book/insert', ['src\Controllers\AdminBooks', 'store']],
    ['GET', '/book/delete', ['src\Controllers\AdminBooks', 'delete']],
    ['GET', '/book/edit', ['src\Controllers\AdminBooks', 'showEdit']],
    ['POST', '/book/update', ['src\Controllers\AdminBooks', 'update']],
    //animation
    ['GET', '/anim/insert', ['src\Controllers\AdminAnimation', 'showInsert']],
    ['POST', '/anim/insert', ['src\Controllers\AdminAnimation', 'store']],
    ['GET', '/anim/delete', ['src\Controllers\AdminAnimation', 'delete']],
    ['GET', '/anim/edit', ['src\Controllers\AdminAnimation', 'showEdit']],
    ['POST', '/anim/update', ['src\Controllers\AdminAnimation', 'update']],
    //Drawings
    ['GET', '/drawings/insert', ['src\Controllers\AdminDrawings', 'showInsert']],
    ['POST', '/drawings/insert', ['src\Controllers\AdminDrawings', 'store']],
    ['GET', '/drawings/delete', ['src\Controllers\AdminDrawings', 'delete']],
    ['GET', '/drawings/edit', ['src\Controllers\AdminDrawings', 'showEdit']],
    ['POST', '/drawings/update', ['src\Controllers\AdminDrawings', 'update']],
    //about
    ['GET', '/about/edit', ['src\Controllers\AdminAbout', 'showEdit']],
    ['POST', '/about/update', ['src\Controllers\AdminAbout', 'update']],
    //password
    ['POST', '/user/update', ['src\Controllers\AdminUser', 'update']],
    //login
    ['POST', '/user/login', ['src\Controllers\AdminUser', 'login']],
    ['GET', '/user/logout', ['src\Controllers\AdminUser', 'logout']],


];
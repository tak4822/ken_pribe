<?php declare(strict_types = 1);

$injector = new \Auryn\Injector;

$injector->alias('Http\Request', 'Http\HttpRequest');
$injector->share('Http\HttpRequest');
$injector->define('Http\HttpRequest', [
    ':get' => $_GET,
    ':post' => $_POST,
    ':cookies' => $_COOKIE,
    ':files' => $_FILES,
    ':server' => $_SERVER,
]);

$injector->alias('Http\Response', 'Http\HttpResponse');
$injector->share('Http\HttpResponse');

$injector->define('src\Page\FilePageReader', [
    ':pageFolder' => __DIR__ . '/../pages',
]);
$injector->alias('src\Template\Renderer', 'src\Template\TwigRenderer');

$injector->alias('src\Template\FrontendRenderer', 'src\Template\FrontendTwigRenderer');

$injector->alias('src\Page\PageReader', 'src\Page\FilePageReader');
$injector->share('src\Page\FilePageReader');

//$injector->define('Mustache_Engine', [
//    ':options' => [
//        'loader' => new Mustache_Loader_FilesystemLoader(dirname(__DIR__) . '/templates', [
//            'extension' => '.html',
//        ]),
//    ],
//]);
$injector->delegate('Twig_Environment', function () use ($injector) {
    $loader = new Twig_Loader_Filesystem(dirname(__DIR__) . '/templates');
    $twig = new Twig_Environment($loader);
    return $twig;
});

$injector->alias('src\Menu\MenuReader', 'src\Menu\ArrayMenuReader');
$injector->share('src\Menu\ArrayMenuReader');

return $injector;
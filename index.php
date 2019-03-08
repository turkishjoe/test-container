<?php
try {
    include 'vendor/autoload.php';

    $configDir = __DIR__ . DIRECTORY_SEPARATOR . 'config';
    $viewDir = __DIR__ . DIRECTORY_SEPARATOR . 'view';

    $config = new \Config\ConfigRegistry($configDir);
    $request = new \Http\Request;
    $urlParser = new \Http\Router\UriParser();
    $viewer = new \View\SimpleViewer($viewDir);
    $router = new \Http\Router\Router($config->get('routes'), $urlParser);
    $router->callAction($request, $viewer);
}catch (Throwable $exception){
    echo sprintf('There was an exception:%s', $exception->getMessage());
}
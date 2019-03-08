<?php
try {
    include 'vendor/autoload.php';

    $configDir = __DIR__ . DIRECTORY_SEPARATOR . 'config';
    $config = new \Config\ConfigRegistry($configDir);
    $request = new \Http\Router\Request;
    $urlParser = new \Http\Router\UriParser();
    $router = new \Http\Router\Router($config->get('routes'), $urlParser);
    $router->callAction($request);
}catch (Throwable $exception){
    echo sprintf('There was an exception:%s', $exception->getMessage());
}
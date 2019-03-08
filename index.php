<?php
try {
    include 'vendor/autoload.php';
    //TODO: Move to container
    $configDir = __DIR__ . DIRECTORY_SEPARATOR . 'config';
    $viewDir = __DIR__ . DIRECTORY_SEPARATOR . 'view';
    $config = new \Config\ConfigRegistry($configDir);

    $dbConfig = $config->get('db');

    $options = [
        \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
        \PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    try {
        $pdo = new \PDO($dbConfig['dsn'], $dbConfig['user'], $dbConfig['pass'], $options);
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }


    $request = new \Http\Request;
    $urlParser = new \Http\Router\UriParser();
    $viewer = new \View\SimpleViewer($viewDir);
    $router = new \Http\Router\Router($config->get('routes'), $urlParser);
    $router->callAction($request, $viewer, $pdo);
}catch (Throwable $exception){
    echo sprintf('There was an exception:%s', $exception->getMessage());
}
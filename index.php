<?php
include 'vendor/autoload.php';

$containerBuilder = new \Container\ContainerBuilder();
$containerBuilder->build();
$c = $containerBuilder->getContainer()->get(\Demo\C::class);
$c->test();
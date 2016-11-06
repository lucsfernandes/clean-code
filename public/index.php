<?php

$containerBuilder = include __DIR__ . '/../bootstrap.php';

$loader = $containerBuilder->get('app.response.loader');
$loader->setContainer($containerBuilder);
$loader->loadResponse()
    ->send();

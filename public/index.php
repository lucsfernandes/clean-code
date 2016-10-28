<?php

$containerBuilder = include __DIR__ . '/../bootstrap.php';

$loader = $containerBuilder->get('app.controller_loader');
$loader->setContainer($containerBuilder);
$loader->loadResponse()
    ->send();

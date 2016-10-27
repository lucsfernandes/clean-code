<?php

require __DIR__ . '/../vendor/autoload.php';

use \Symfony\Component\HttpKernel\Controller\ArgumentResolver;
use \Symfony\Component\DependencyInjection\ContainerBuilder;
use \Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use \Symfony\Component\Config\FileLocator;

$fileLocator = new FileLocator(__DIR__ . '/../di');
$container = new ContainerBuilder();

$loader = new XmlFileLoader($container, $fileLocator);
$loader->load('all.xml');

$loader = $container->get('app.controller_loader');
$loader->setContainer($container);
$loader->loadResponse();
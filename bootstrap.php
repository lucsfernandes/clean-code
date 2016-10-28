<?php

require __DIR__ . '/vendor/autoload.php';

use \Symfony\Component\HttpKernel\Controller\ArgumentResolver;
use \Symfony\Component\DependencyInjection\ContainerBuilder;
use \Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use \Symfony\Component\Config\FileLocator;

$fileLocator = new FileLocator(realpath(__DIR__ . '/di'));
$containerBuilder = new ContainerBuilder();

$loader = new XmlFileLoader($containerBuilder, $fileLocator);
$loader->load('all.xml');

$containerBuilder->set('container', $containerBuilder);
$containerBuilder->compile();

return $containerBuilder;
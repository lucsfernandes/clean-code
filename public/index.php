<?php

require __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;
use \Symfony\Component\HttpFoundation\Response;
use \Symfony\Component\HttpFoundation\Request;
use \Symfony\Component\Routing\RequestContext;
use \Symfony\Component\Routing\Matcher\UrlMatcher;
use \Symfony\Component\HttpKernel\Controller\ControllerResolver;
use \Symfony\Component\HttpKernel\Controller\ArgumentResolver;
use \Symfony\Component\Routing\Exception\ResourceNotFoundException;
use \Symfony\Component\DependencyInjection\ContainerBuilder;
use \Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use \Symfony\Component\Config\FileLocator;

$loader = new XmlFileLoader(
    $container = new ContainerBuilder(),
    new FileLocator(__DIR__ . '/../di')
);
$loader->load('all.xml');

$request = Request::createFromGlobals();

$route = new Route(
    '',
    [
        'year' => null,
        '_controller' => [
            $container->get('controller.index'),
            'indexAction'
        ],
    ]
);

$routes = new RouteCollection();
$routes->add('route_name', $route);

$context = new RequestContext();
$context->fromRequest($request);

$matcher = new UrlMatcher($routes, $context);

$controllerResolver = new ControllerResolver();
$argumentResolver = new ArgumentResolver();

try {
    $request->attributes
        ->add($matcher->match($request->getPathInfo()));

    $controller = $controllerResolver->getController($request);
    $arguments = $argumentResolver->getArguments($request, $controller);

    $response = call_user_func_array($controller, $arguments);
} catch (ResourceNotFoundException $e) {
    $response = new Response('Not Found', 404);
} catch (Exception $e) {
    $response = new Response('An error occurred', 500);
}

$response->send();

<?php

namespace GSoares\CleanCode\Application\Controller;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Loader\XmlFileLoader;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;

class Loader
{

    use ContainerAwareTrait;

    public function loadResponse()
    {
        $request = Request::createFromGlobals();

        $fileLocator = new FileLocator(__DIR__ . '/../../../../../di');

        $xmlFileLoader = new XmlFileLoader($fileLocator);

        $routeCollection = $xmlFileLoader->load('routes.xml');

        $this->configureRoutes($routeCollection);

        $context = new RequestContext();
        $context->fromRequest($request);

        $matcher = new UrlMatcher($routeCollection, $context);

        $controllerResolver = new ControllerResolver();
        $argumentResolver = new ArgumentResolver();

        try {
            $request->attributes
                ->add($matcher->match($request->getPathInfo()));

            $controller = $controllerResolver->getController($request);
            $arguments = $argumentResolver->getArguments($request, $controller);

            return call_user_func_array($controller, $arguments);
        } catch (ResourceNotFoundException $e) {
            return new Response('Not Found', 404);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * @param RouteCollection $routeCollection
     */
    private function configureRoutes(RouteCollection $routeCollection)
    {
        foreach ($routeCollection as $route) {
            list($controllerId, $action) = explode(':', $route->getDefault('_controller'));

            $route->setDefault('_controller', [$this->container->get($controllerId), $action]);
        }
    }
}
<?php

namespace GSoares\CleanCode\Application\Controller;

use Symfony\Component\HttpFoundation\Request;

/**
 * @author Gabriel Felipe Soares <gabrielfs7@gmail.com>
 */
class QualityController extends AbstractController
{
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function codeStandardsAction(Request $request)
    {
        return $this->renderResponse(
            'base/iframe.html.twig',
            [
                'title' => 'Code Standard',
                'url' => '/phpcs/index.php'
            ]
        );
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function messControlAction(Request $request)
    {
        return $this->renderResponse(
            'base/iframe.html.twig',
            [
                'title' => 'Mess Control',
                'url' => '/phpmd/index.html'
            ]
        );
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function docAction(Request $request)
    {
        return $this->renderResponse(
            'base/iframe.html.twig',
            [
                'title' => 'Documentation',
                'url' => '/phpdoc/index.html'
            ]
        );
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function testAction(Request $request)
    {
        return $this->renderResponse(
            'base/iframe.html.twig',
            [
                'title' => 'Documentation',
                'url' => '/phpunit/testdox.html'
            ]
        );
    }
}

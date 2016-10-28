<?php

namespace GSoares\CleanCode\Application\Controller;

use Symfony\Component\HttpFoundation\Request;

/**
 * @author Gabriel Felipe Soares <gabrielfs7@gmail.com>
 */
class AccountController extends AbstractController
{
    /**
     * @param Request $request
     */
    public function listAction(Request $request)
    {
        return $this->renderResponse('account/list.html.twig');
    }

    /**
     * @param Request $request
     */
    public function createAction(Request $request)
    {
        return $this->renderResponse('account/form.html.twig');
    }

    /**
     * @param Request $request
     */
    public function editAction(Request $request)
    {
        return $this->renderResponse('account/form.html.twig');
    }
}
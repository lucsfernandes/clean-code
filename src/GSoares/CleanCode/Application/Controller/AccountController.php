<?php

namespace GSoares\CleanCode\Application\Controller;

use Symfony\Component\HttpFoundation\Request;

/**
 * @author Gabriel Felipe Soares <gabrielfs7@gmail.com>
 */
class AccountController extends AbstractController
{

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listAction()
    {
        $accounts = $this->container
            ->get('repository.account')
            ->findAll();

        return $this->renderResponse('account/list.html.twig', ['accounts' => $accounts]);
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function createAction()
    {
        return $this->renderResponse('account/form.html.twig');
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editAction(Request $request)
    {
        $account = $this->container
            ->get('repository.account')
            ->find($request->get('id'));

        return $this->renderResponse('account/form.html.twig', ['account' => $account]);
    }
}

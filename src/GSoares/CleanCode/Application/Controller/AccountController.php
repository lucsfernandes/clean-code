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
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listAction(Request $request)
    {
        $accounts = $this->container
            ->get('repository.account')
            ->addFilter('term', $request->get('term'))
            ->search();

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

<?php

namespace GSoares\CleanCode\Application\Controller;

use Symfony\Component\HttpFoundation\Request;

/**
 * @author Gabriel Felipe Soares <gabrielfs7@gmail.com>
 */
class AccountEntryController extends AbstractController
{
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listAction(Request $request)
    {
        $account = $this->container
            ->get('repository.account')
            ->find($request->get('id'));

        return $this->renderResponse('account-entry/list.html.twig', ['account' => $account]);
    }
}

<?php

namespace GSoares\CleanCode\Application\Controller;

use Symfony\Component\HttpFoundation\Request;

/**
 * @author Gabriel Felipe Soares <gabrielfs7@gmail.com>
 */
class IndexController extends AbstractController
{
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        $totalAccounts = $this->container
            ->get('repository.account')
            ->getTotal();

        $totalEntries = $this->container
            ->get('repository.account_entry')
            ->getTotal();

        return $this->renderResponse(
            'index.html.twig',
            [
                'totalAccounts' => $totalAccounts,
                'totalEntries' => round($totalEntries, 2),
                'average' => round($totalEntries / $totalAccounts, 2)
            ]
        );
    }
}

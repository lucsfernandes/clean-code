<?php

namespace GSoares\CleanCode\Application\Controller;

/**
 * @author Gabriel Felipe Soares <gabrielfs7@gmail.com>
 */
class IndexController extends AbstractController
{

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $totalAccounts = $this->container
            ->get('repository.account')
            ->search()
            ->count();

        $totalEntries = $this->container
            ->get('repository.account_entry')
            ->search()
            ->count();

        $averageEntries = round($totalEntries / $totalAccounts, 2);

        return $this->renderResponse(
            'index.html.twig',
            [
                'totalAccounts' => $totalAccounts,
                'totalEntries' => round($totalEntries, 2),
                'average' => $averageEntries
            ]
        );
    }
}

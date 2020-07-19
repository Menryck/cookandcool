<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MenuJoursController extends AbstractController
{
    /**
     * @Route("/menu/jours", name="menu_jours")
     */
    public function index()
    {
        return $this->render('menu_jours/index.html.twig', [
            'controller_name' => 'MenuJoursController',
        ]);
    }
}

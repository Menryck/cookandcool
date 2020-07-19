<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ConfigMenuController extends AbstractController
{
    /**
     * @Route("/config/menu", name="config_menu")
     */
    public function index()
    {
        return $this->render('config_menu/index.html.twig', [
            'controller_name' => 'ConfigMenuController',
        ]);
    }
}

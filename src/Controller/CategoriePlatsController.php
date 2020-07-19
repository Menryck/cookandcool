<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CategoriePlatsController extends AbstractController
{
    /**
     * @Route("/categorie/plats", name="categorie_plats")
     */
    public function index()
    {
        return $this->render('categorie_plats/index.html.twig', [
            'controller_name' => 'CategoriePlatsController',
        ]);
    }
}

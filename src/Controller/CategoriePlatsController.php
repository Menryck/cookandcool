<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CategoriePlatsController extends AbstractController
{
    /**
     * @Route("/categorie/plats", name="categorie_plats")
     */
    public function plats()
    {
        return $this->render('categorie_plats/plats.html.twig', [
            'controller_name' => 'CategoriePlatsController',
        ]);
    }
    /**
     * @Route("/categorie/entrees", name="categorie_entrees")
     */
    public function entrees()
    {
        return $this->render('categorie_Plats/entrees.html.twig', [
            'controller_name' => 'CategoriePlatsController',
        ]);
    }
    /**
     * @Route("/categorie/desserts", name="categorie_desserts")
     */
    public function desserts()
    {
        return $this->render('categorie_Plats/desserts.html.twig', [
            'controller_name' => 'CategoriePlatsController',
        ]);
    }
}

<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ListeRecettesController extends AbstractController
{
    /**
     * @Route("/liste/recettes", name="liste_recettes")
     */
    public function index()
    {
        return $this->render('liste_recettes/index.html.twig', [
            'controller_name' => 'ListeRecettesController',
        ]);
    }
}

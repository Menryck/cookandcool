<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BrouillonController extends AbstractController
{
    /**
     * @Route("/brouillon", name="brouillon")
     */
    public function index()
    {
        return $this->render('brouillon/index.html.twig', [
            'controller_name' => 'BrouillonController',
        ]);
    }
}

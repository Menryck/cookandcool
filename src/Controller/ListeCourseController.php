<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ListeCourseController extends AbstractController
{
    /**
     * @Route("/liste/course", name="liste_course")
     */
    public function index()
    {
        return $this->render('liste_course/index.html.twig', [
            'controller_name' => 'ListeCourseController',
        ]);
    }
}

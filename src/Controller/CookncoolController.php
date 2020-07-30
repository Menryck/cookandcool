<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CookncoolController extends AbstractController
{
    /**
     * @Route("/cookncool", name="cookncool")
     */
    public function index()
    {
        return $this->render('cookncool/index.html.twig', [
            'controller_name' => 'CookncoolController',
        ]);
    }
    /**
     * @Route("/admin", name="admin")
     */
    public function admin()
    {
        return $this->render('cookncool/admin.html.twig', [
            'controller_name' => 'CookncoolController',
        ]);
    }
}

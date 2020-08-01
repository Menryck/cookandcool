<?php

namespace App\Controller;

// use App\Entity\Recette;
// use Symfony\Component\HttpFoundation\Response;
use App\Repository\RecetteRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CookncoolController extends AbstractController
{
     /**
     * @Route("/", name="accueil")
     */
    public function index()
    {
        return $this->render('cookncool/index.html.twig', [
            'controller_name' => 'CookncoolController',
        ]);
    }

     /**
     * @Route("/menu/jours", name="menu_jours")
     */
    public function menu_jours()
    {
        return $this->render('cookncool/menu_jours.html.twig', [
            'controller_name' => 'CookncoolController',
        ]);
    }

     /**
     * @Route("/type", name="type")
     */
    public function type()
    {
        return $this->render('cookncool/type.html.twig', [
            'controller_name' => 'CookncoolController',
        ]);
    }

      /**
     * @Route("/liste/recettes", name="liste_recettes")
     */
    public function liste_recettes()
    {
        return $this->render('cookncool/liste_recettes.html.twig', [
            'controller_name' => 'CookncoolController',
        ]);
    }
    

    // /**
    //  * @Route("/detail/{id}", name="recette_detail", methods={"GET"})
    //  */
    // public function detail(Recette $recette): Response
    // {
    //     return $this->render('cookncool/detail_recette.html.twig', [
    //         'recette' => $recette,
    //     ]);
    // }

    /**
     * @Route("/liste/course", name="liste_course")
     */
    public function liste_course()
    {
        return $this->render('cookncool/liste_course.html.twig', [
            'controller_name' => 'CookncoolController',
        ]);
    }

    /**
     * @Route("/stock", name="stock")
     */
    public function stock()
    {
        return $this->render('cookncool/stock.html.twig', [
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

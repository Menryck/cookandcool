<?php

namespace App\Controller;

use App\Entity\TableRecetteIngredients;
use App\Form\TableRecetteIngredientsType;
use App\Repository\TableRecetteIngredientsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/table/recette/ingredients")
 */
class TableRecetteIngredientsController extends AbstractController
{
    /**
     * @Route("/", name="table_recette_ingredients_index", methods={"GET"})
     */
    public function index(TableRecetteIngredientsRepository $tableRecetteIngredientsRepository): Response
    {
        return $this->render('table_recette_ingredients/index.html.twig', [
            'table_recette_ingredients' => $tableRecetteIngredientsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="table_recette_ingredients_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $tableRecetteIngredient = new TableRecetteIngredients();
        $form = $this->createForm(TableRecetteIngredientsType::class, $tableRecetteIngredient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tableRecetteIngredient);
            $entityManager->flush();

            return $this->redirectToRoute('table_recette_ingredients_index');
        }

        return $this->render('table_recette_ingredients/new.html.twig', [
            'table_recette_ingredient' => $tableRecetteIngredient,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="table_recette_ingredients_show", methods={"GET"})
     */
    public function show(TableRecetteIngredients $tableRecetteIngredient): Response
    {
        return $this->render('table_recette_ingredients/show.html.twig', [
            'table_recette_ingredient' => $tableRecetteIngredient,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="table_recette_ingredients_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TableRecetteIngredients $tableRecetteIngredient): Response
    {
        $form = $this->createForm(TableRecetteIngredientsType::class, $tableRecetteIngredient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('table_recette_ingredients_index');
        }

        return $this->render('table_recette_ingredients/edit.html.twig', [
            'table_recette_ingredient' => $tableRecetteIngredient,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="table_recette_ingredients_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TableRecetteIngredients $tableRecetteIngredient): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tableRecetteIngredient->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tableRecetteIngredient);
            $entityManager->flush();
        }

        return $this->redirectToRoute('table_recette_ingredients_index');
    }
}

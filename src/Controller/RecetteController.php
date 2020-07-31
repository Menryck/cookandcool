<?php

namespace App\Controller;

use App\Entity\Recette;
use App\Form\RecetteType;
use App\Repository\RecetteRepository;
use App\Entity\TableRecetteIngredients;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("recette")
 */
class RecetteController extends AbstractController
{


    /**
     * @Route("/liste/{categorie}", name="recette_liste", methods={"GET"})
     */
    public function liste(RecetteRepository $recetteRepository, Request $request, $categorie): Response
    {
        return $this->render('liste_recettes/index.html.twig', [
            'recettes' => $recetteRepository->findBy(
                array('categorie' => $categorie)
            ),
        ]);
    }

    /**
     * @Route("/", name="recette_index", methods={"GET"})
     */
    public function index(RecetteRepository $recetteRepository): Response
    {
        return $this->render('recette/index.html.twig', [
            'recettes' => $recetteRepository->findAll(),
        ]);
    }


    /**
     * @Route("/new", name="recette_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $recette = new Recette();

        // dummy code - add some example tags to the task
        // (otherwise, the template will render an empty list of tags)
        // $tableRecetteIngredients1 = new tableRecetteIngredients();
        // $tableRecetteIngredients1->setQuantite(1);
        // $recette->getIngredient()->add($tableRecetteIngredients1);
        // $tableRecetteIngredients2 = new tableRecetteIngredients();
        // $tableRecetteIngredients2->setName('tableRecetteIngredients2');
        // $recette->getIngredient()->add($tableRecetteIngredients2);
        // end dummy code



        $form = $this->createForm(RecetteType::class, $recette);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
 // ... do your form processing, like saving the Task and Tag entities
        $photoFile = $form->get('photo')->getData();
        dump($photoFile);
        if ($photoFile){
            $originalFilename = pathinfo($photoFile->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $photoFile->guessExtension();
            // A TERME: IL FAUDRA CHANGER LE NOM...
            $newFilename = "$originalFilename.$extension"; //TEMPORAIRE: A AMELIORER...

            // ON DEPLACE LE FICHIER
            $photoFile->move(
                $this->getParameter('upload_directory'), 
                        // CHEMIN DU DOSSIER QUI STOCK LES IMAGES UPLOADEES
                        // CONFIGURER DANS config/services.yaml
                $newFilename
            );

            // ON CHANGE LE CHEMIN DU FICHIER POUR POUVOIR STOCKER LE BON CHEMIN DANS SQL
            $recette->setPhoto($newFilename);
        }

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($recette);
            $entityManager->flush();

            return $this->redirectToRoute('recette_index');
        }

        return $this->render('recette/new.html.twig', [
            'recette' => $recette,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="recette_show", methods={"GET"})
     */
    public function show(Recette $recette, TableRecetteIngredients $tableRecetteIngredient): Response
    {

        return $this->render('recette/show.html.twig', [
            'recette' => $recette,
            // a completer pour affichage du nombre
          // 'table_recette_ingredient' => $tableRecetteIngredient,  
          'table_recette_ingredient' => $recette -> getIngredient(),
        ]);
       
    }

    /**
     * @Route("/{id}/edit", name="recette_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Recette $recette): Response
    {
        $form = $this->createForm(RecetteType::class, $recette);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('recette_index');
        }

        return $this->render('recette/edit.html.twig', [
            'recette' => $recette,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="recette_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Recette $recette): Response
    {
        if ($this->isCsrfTokenValid('delete'.$recette->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($recette);
            $entityManager->flush();
        }

        return $this->redirectToRoute('recette_index');
    }

    /**
     * @Route("/detail/{id}", name="recette_detail", methods={"GET"})
     */
    public function detail(Recette $recette): Response
    {
        return $this->render('recette/detail.html.twig', [
            'recette' => $recette,
        ]);
    }

}

<?php

namespace App\Controller;

use App\Entity\Categories;
use App\Repository\CategoriesRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
/**
 * @Route("/categories", name="app_categories_")
 */
class CategoriesController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function indexCategories(CategoriesRepository $categoriesRepos,PaginatorInterface $paginator,Request $request): Response
    {
        // Méthode findBy qui permet de récupérer les données avec des critères de filtre et de tri
        $donnees = $this->getDoctrine()->getRepository(Categories::class)->findAll();
        $categoriesRepos = $paginator->paginate(
            $donnees, // Requête contenant les données à paginer (ici nos articles)
            $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
            9 // Nombre de résultats par page
        );
        return $this->render('categories/indexCategories.html.twig', [
            'categories' => $categoriesRepos,
            'controller_name' => 'Nos categories',
        ]);
    }

    /**
     * @Route("/{slug}", name="show", methods={"GET"})
     */
    public function show(Categories $categories): Response
    {
        return $this->render('categories/show.html.twig', [
            'controller_name' => $categories->getName(),
            'categories' => $categories
        ]);
    }
    
}

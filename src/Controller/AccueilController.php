<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use App\Repository\CategoriesRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AccueilController extends AbstractController
{
    /**
     * @Route("/", name="app_accueil")
     */
    public function index(ArticleRepository $articles,CategoriesRepository $categoriesRepos,PaginatorInterface $paginator,Request $request): Response
    {
        // Méthode findBy qui permet de récupérer les données avec des critères de filtre et de tri
        $donnees = $this->getDoctrine()->getRepository(Article::class)->findBy([],['createdAt' => 'desc']);
        $articles = $paginator->paginate(
            $donnees, // Requête contenant les données à paginer (ici nos articles)
            $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
            3 // Nombre de résultats par page
        );
        return $this->render('accueil/index.html.twig', [
            'articles' => $articles,
            'categories' => $categoriesRepos->findAll(),
            'controller_name' => 'Agence Digitale|Toulouse',
        ]);
    }
}

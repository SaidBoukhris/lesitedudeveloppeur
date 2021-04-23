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

/**
 * @Route("/articles", name="app_articles_")
 */
class ArticleController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function index(ArticleRepository $articles,CategoriesRepository $categories,PaginatorInterface $paginator,Request $request): Response
    {
        // Méthode findBy qui permet de récupérer les données avec des critères de filtre et de tri
        $donnees = $this->getDoctrine()->getRepository(Article::class)->findBy([],['createdAt' => 'desc']);
        $articles = $paginator->paginate(
            $donnees, // Requête contenant les données à paginer (ici nos articles)
            $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
            7 // Nombre de résultats par page
        );
        return $this->render('article/index.html.twig', [
            'articles' => $articles,
            'controller_name' => 'Les Articles',
            'categories' => $categories->findAll()
        ]);
    }

    /**
     * @Route("/{slug}", name="show", methods={"GET"})
     */
    public function show(Article $article=null,CategoriesRepository $categories): Response
    {
        return $this->render('article/show.html.twig', [
        'controller_name' => $article->getTitle(),
            'article' => $article,
            'categories' => $categories->findAll()
        ]);
    }

}

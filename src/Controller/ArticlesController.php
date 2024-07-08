<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ArticlesController extends AbstractController
{
    #[Route('/articles', name: 'app_articles')]
    public function index(): Response
    {
        $articles = [
            ['title' => 'poisson rouge', 'img' => 'https://images.ctfassets.net/b85ozb2q358o/2N2vFVY5g4IHQYAlue5ht5/7c5e3dd32f98402052ff771178bc3ad0/vignette-poissons-choisir-aquarium-deau-froide.jpg','categorie' => 'rouge','description' => 'description rouge'],
            ['title' => 'poisson orange', 'img' => 'https://images.ctfassets.net/b85ozb2q358o/2N2vFVY5g4IHQYAlue5ht5/7c5e3dd32f98402052ff771178bc3ad0/vignette-poissons-choisir-aquarium-deau-froide.jpg','categorie' => 'orange','description' => 'description orange'],
            ['title' => 'poisson bleu', 'img' => 'https://images.ctfassets.net/b85ozb2q358o/2N2vFVY5g4IHQYAlue5ht5/7c5e3dd32f98402052ff771178bc3ad0/vignette-poissons-choisir-aquarium-deau-froide.jpg','categorie' => 'bleu','description' => 'description bleu'],
        ];
        return $this->render('articles/index.html.twig', [
            'articles' => $articles,
        ]);
    }
    
}

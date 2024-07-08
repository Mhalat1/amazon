<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use src\Repository\CommercantsRepository;

class CommercantsController extends AbstractController
{
    #[Route('/commercants', name: 'book_index')]
    public function index(CommercantsRepository $CommercantsRepository): Response
    {
        $books = $CommercantsRepository->findAllWithAuthors();

        return $this->render('commercants/index.html.twig', [
            'books' => $books,
        ]);
    }
}
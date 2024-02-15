<?php

// src/Controller/ReadAuthorBookController.php
namespace App\Controller;

use App\Repository\AuthorRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ReadAuthorBookController extends AbstractController
{
    #[Route('/api/authors/{id}/books', name: 'author_books', methods: ['GET'])]
    public function index(
        int $id,
        AuthorRepository $authorRepository
    ): JsonResponse {
        $author = $authorRepository->findOneBy(['id' => $id]);

        if (null === $author) {
            return $this->json([
                'message' => 'Author doesnt exists'
            ]);
        }

        return $this->json($author->getBooks());
    }
}

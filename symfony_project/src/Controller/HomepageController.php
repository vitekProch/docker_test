<?php

namespace App\Controller;

use App\Entity\PeopleReviews;
use App\Entity\PhotoCategories;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class HomepageController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function homepage(EntityManagerInterface $entityManager): Response
    {
        $photoCategoryRepository = $entityManager->getRepository(PhotoCategories::class);
        $peopleReviewRepository = $entityManager->getRepository(PeopleReviews::class);

        $peopleReview = $peopleReviewRepository->findAll();
        $categories = $photoCategoryRepository->findAll();
        return $this->render('Homepage/homepage.html.twig', [
            'title' => 'Homapage',
            'categories' => $categories,
            'peopleReviews' => $peopleReview,
        ]);
    }

}

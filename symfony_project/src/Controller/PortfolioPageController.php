<?php

namespace App\Controller;

use App\Repository\PhotoCategoriesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class PortfolioPageController extends AbstractController
{
    #[Route('/portfolio/{slug}', name: "portfolio_page")]
    public function portfolio(PhotoCategoriesRepository $photoCategoryRepository, string $slug = null): Response
    {
        $portfolioPhotoData = [];
        $categories = $photoCategoryRepository->findAll();

        if ($slug){
            $portfolioPhoto = $photoCategoryRepository->findOneBy(['slug' => $slug]);
            $portfolioPhotoData = $portfolioPhoto->getPortfolioPhotos();
        }
        return $this->render('PortfolioPage/portfolio_page.html.twig', [
            'slug' => $slug,
            'categories' => $categories,
            'portfolioPhoto' => $portfolioPhotoData,
        ]);
    }
}

<?php

namespace App\Controller;

use App\Repository\PhotoPackageNamesRepository;
use App\Repository\WeddingPackageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class PriceListPageController extends AbstractController
{
    #[Route('/price-list', name: 'price_list_page')]
    public function priceListPage(PhotoPackageNamesRepository $packageNamesRepository, WeddingPackageRepository $weddingPackageRepository): Response
    {
        return $this->render('PriceListPage/price_list_page.html.twig', [
            'title' => 'Ceník',
            'smallPriceList' => $packageNamesRepository->findAll(),
            'weddingPackages' => $weddingPackageRepository->findAll(),
        ]);
    }
}

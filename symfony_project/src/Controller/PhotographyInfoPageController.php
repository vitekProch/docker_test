<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class PhotographyInfoPageController extends AbstractController
{
    #[Route('/photography-info', name: 'photography_info_page')]
    public function photographyInfoPage(): Response
    {
        return $this->render('PhotographyInfoPage/photography_info_page.html.twig', [
            'title' => 'Informace o focení',
        ]);
    }
}

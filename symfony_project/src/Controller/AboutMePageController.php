<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class AboutMePageController extends AbstractController
{
    #[Route('/about-me', name: 'about_me_page')]
    public function aboutMePage(): Response
    {
        return $this->render('AboutMePage/about_me_page.html.twig', [
            'title' => 'O mně',
        ]);
    }
}

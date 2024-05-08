<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class BusinessConditionsPageController extends AbstractController
{
    #[Route('/business-conditions', name: 'business_conditions_page')]
    public function businessConditionsPageController(): Response
    {
        return $this->render('BusinessConditionsPage/business_conditions_page.html.twig', [
            'title' => 'Obchodní podmínky',
        ]);
    }
}

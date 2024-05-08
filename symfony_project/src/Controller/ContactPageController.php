<?php

namespace App\Controller;

use App\Form\ContactFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\Transport\TransportInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class ContactPageController extends AbstractController
{
    #[Route('/contact', name: 'contact_page')]
    public function contactPage(Request $request, TransportInterface $transport): Response
    {
        $form = $this->createForm(ContactFormType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $email = (new Email())
                ->from($form->getData()['email'])
                ->to('fotografieodhanky@seznam.cz')
                ->subject("Potenciální zákazník z webovky - {$form->getData()['name']}")
                ->html("<p><strong>{$form->getData()['name']}</strong></p>
                              <hr>
                              <p>{$form->getData()['content']}</p>");
            $transport->send($email);
            $this->addFlash('success', 'Děkuji za Vaší zprávu! Brzy Vám na ní odpovím');
            return $this->redirect($request->getRequestUri());
        }

        return $this->render('ContactPage/contact_page.html.twig', [
            'title' => 'Kontakt',
            'contactForm' => $form->createView(),
        ]);
    }

}

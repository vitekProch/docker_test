<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class ContactFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label'   => false,
                'attr' => [
                    'class'=>'w-100 p-2',
                    'placeholder'=>'Vaše jméno',
                ]
            ])
            ->add('email', EmailType::class, [
                'label'   => false,
                'attr' => [
                    'class'=>'w-100 p-2',
                    'placeholder'=>'Váš email',
                ]
            ])
            ->add('content', TextareaType::class, [
                'label'   => false,
                'attr' => [
                    'class'=>'w-100 p-2 contact-textarea',
                    'placeholder'=>'Vaše zpráva',
                    'rows'=>'8',
                ],
            ]);
    }

}
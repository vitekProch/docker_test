<?php

namespace App\Form;

use App\Entity\PhotoPackageDetails;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use \Symfony\Component\Form\Extension\Core\Type\MoneyType;
use \Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PhotoPackageDetailsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('PhotoPackageDetailTitle', TextType::class, [
                'label' => 'Název podbalíčku',
            ])
            ->add('PhotoPackageDetailPhotoAmount', IntegerType::class, [
                    'label' => 'Počet kusů',
                ])
            ->add('PhotoPackageDetailPrice', MoneyType::class, [
                'label' => 'Cena',
                'currency' => 'CZK',
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => PhotoPackageDetails::class,
        ]);
    }
}

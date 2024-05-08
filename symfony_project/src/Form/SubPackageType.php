<?php

// src/Form/SubPackageType.php

namespace App\Form;

use App\Entity\PackageItem;
use App\Entity\SubPackage;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SubPackageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Název podbalíčku',
            ])
            ->add('price', MoneyType::class, [
                'currency' => 'CZK',
                'label' => 'Cena'
            ])
            ->add('items', EntityType::class, [
                'class' => PackageItem::class,
                'multiple' => true,
                'attr' => array('data-ea-widget' => 'ea-autocomplete'),
                'label' => 'Položky podbalíčku'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SubPackage::class,
        ]);
    }
}

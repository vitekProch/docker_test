<?php

// src/Form/PackageItemType.php

namespace App\Form;

use App\Entity\PackageItem;
use App\Repository\PackageItemRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PackageItemType extends AbstractType
{
    private $packageItemRepository;

    public function __construct(PackageItemRepository $packageItemRepository)
    {
        $this->packageItemRepository = $packageItemRepository;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $packageItems = $this->packageItemRepository->findAll();

        $choices = [];
        foreach ($packageItems as $packageItem) {
            $choices[$packageItem->getName()] = $packageItem->getName();
        }

        $builder
            ->add('name', ChoiceType::class, [
                'label' => 'Název položky',
                'choices' => $choices,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PackageItem::class,
        ]);
    }
}

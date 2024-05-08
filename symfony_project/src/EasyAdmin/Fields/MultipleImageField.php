<?php

namespace App\EasyAdmin\Fields;

use EasyCorp\Bundle\EasyAdminBundle\Contracts\Field\FieldInterface;
use EasyCorp\Bundle\EasyAdminBundle\Field\FieldTrait;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class MultipleImageField implements FieldInterface
{
    use FieldTrait;

    public static function new(string $propertyName, ?string $label = null): self
    {
        return (new self())
            ->setProperty($propertyName)
            ->setLabel($label)
            ->onlyWhenCreating()
            ->setTemplateName('crud/field/image')
            ->setCssClass('field-image')

            ->setFormType(FileType::class)
            ->setFormTypeOptions([
                'multiple' => true,
            ]);
    }
}

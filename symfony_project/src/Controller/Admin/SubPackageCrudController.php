<?php

namespace App\Controller\Admin;

use App\Entity\SubPackage;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class SubPackageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SubPackage::class;
    }
    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('name', 'Název podbalíčku');
        yield TextField::new('price', 'Cena podbalíčku');
    }
}

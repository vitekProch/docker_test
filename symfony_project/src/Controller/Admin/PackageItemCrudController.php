<?php

namespace App\Controller\Admin;

use App\EasyAdmin\Helpers\ActionHelper;
use App\Entity\PackageItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PackageItemCrudController extends AbstractCrudController
{
    private ActionHelper $actionHelper;

    public function __construct(ActionHelper $actionHelper)
    {
        $this->actionHelper = $actionHelper;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $this->actionHelper->changeActionsLabel($actions);
    }

    public function configureCrud(Crud $crud): Crud
    {
        return parent::configureCrud($crud)
            ->setPageTitle('index','Názvy svatebních odrážek')
            ->setPageTitle('edit','Uprav odrážku')
            ->setPageTitle('new','Přidej odrážku');
    }

    public static function getEntityFqcn(): string
    {
        return PackageItem::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name', 'Název odrážky'),
        ];
    }
}

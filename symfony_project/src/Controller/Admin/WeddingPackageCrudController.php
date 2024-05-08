<?php

namespace App\Controller\Admin;

use App\EasyAdmin\Helpers\ActionHelper;
use App\Entity\WeddingPackage;
use App\Form\SubPackageType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class WeddingPackageCrudController extends AbstractCrudController
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

    public static function getEntityFqcn(): string
    {
        return WeddingPackage::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return parent::configureCrud($crud)
            ->setPageTitle('index','Svatební balíčky')
            ->setPageTitle('edit','Uprav svatební balíček')
            ->setPageTitle('new','Přidej svatební balíček');
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name', 'Název balíčku'),
            CollectionField::new('subPackages', 'Podbalíčky')
                ->setEntryType(SubPackageType::class)
                ->renderExpanded()
                ->setRequired(true)
        ];
    }
}

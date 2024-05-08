<?php

namespace App\Controller\Admin;

use App\EasyAdmin\Helpers\ActionHelper;
use App\Entity\PhotoPackageNames;
use App\Form\PhotoPackageDetailsType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PhotoPackageNamesCrudController extends AbstractCrudController
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
        return PhotoPackageNames::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return parent::configureCrud($crud)
            ->setPageTitle('index','Klasické balíčky')
            ->setPageTitle('edit','Uprav balíček')
            ->setPageTitle('new','Přidej balíček');
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('photoPackageTitle', 'Název balíčku')
            ->setRequired(true);
        yield CollectionField::new('photoPackageDetails', 'Položky balíčku')
            ->setFormTypeOption('entry_type',PhotoPackageDetailsType::class)
            ->renderExpanded()
            ->setRequired(true);
    }
}

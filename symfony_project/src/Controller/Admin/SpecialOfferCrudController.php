<?php

namespace App\Controller\Admin;

use App\EasyAdmin\Helpers\ActionHelper;
use App\Entity\SpecialOffer;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class SpecialOfferCrudController extends AbstractCrudController
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
            ->setPageTitle('index','Speciální nabídky')
            ->setPageTitle('edit','Uprav speciální nabídku')
            ->setPageTitle('new','Přidej speciální nabídku');
    }

    public static function getEntityFqcn(): string
    {
        return SpecialOffer::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('specialOfferName', 'Název nabídky');
        yield ImageField::new('specialOfferImage', 'Obrázek nabídky')
            ->setBasePath('uploads/specialOffer')
            ->setUploadDir('public/uploads/specialOffer')
            ->setUploadedFileNamePattern('[slug]-[timestamp].[extension]')
            ->setRequired($pageName !== Crud::PAGE_EDIT)
            ->setFormTypeOptions($pageName == Crud::PAGE_EDIT ? ['allow_delete' => false] : []);

        yield BooleanField::new('specialOfferShow', 'Ukázet hned na stránce');
    }
}

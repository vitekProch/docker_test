<?php

namespace App\Controller\Admin;

use App\EasyAdmin\Fields\ImageUploadHelper;
use App\EasyAdmin\Helpers\ActionHelper;
use App\Entity\PhotoCategories;
use App\Repository\PhotoCategoriesRepository;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Dto\BatchActionDto;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\HttpFoundation\Response;

class PhotoCategoriesCrudController extends AbstractCrudController
{
    private ImageUploadHelper $uploadHelper;
    private PhotoCategoriesRepository $categoriesRepository;
    private ActionHelper $actionHelper;

    public static function getEntityFqcn(): string
    {
        return PhotoCategories::class;
    }

    public function __construct(PhotoCategoriesRepository $categoriesRepository, ImageUploadHelper $uploadHelper, ActionHelper $actionHelper)
    {
        $this->categoriesRepository = $categoriesRepository;
        $this->uploadHelper = $uploadHelper;
        $this->actionHelper = $actionHelper;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $this->actionHelper->changeActionsLabel($actions);
    }
    
    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('categoryName', 'Název kategorie');
        yield ImageField::new('CategoryPhotoName', 'Obrázek kategorie')
            ->setBasePath('uploads/categories')
            ->setUploadDir('public/uploads/categories')
            ->setUploadedFileNamePattern('[slug]-[timestamp].[extension]');
        yield TextField::new('fontAwesomeIcon', 'Ikona');
    }

    public function configureCrud(Crud $crud): Crud
    {
        return parent::configureCrud($crud)
            ->setPageTitle('index','Kategorie fotografií')
            ->setPageTitle('edit','Upravit kategorii fotografií')
            ->setPageTitle('new','Přidat kategorii fotografií');
    }

    public function batchDelete(AdminContext $context, BatchActionDto $batchActionDto): Response
    {
        foreach ($batchActionDto->getEntityIds() as $entityId) {
            $entityToRemove = $this->categoriesRepository->find($entityId);
            $reviewToRemovePath = $entityToRemove->getCategoryPhotoPath();
            $this->uploadHelper->deletePhotoFromDirectory($reviewToRemovePath);
        }
        return parent::batchDelete($context, $batchActionDto); // TODO: Change the autogenerated stub
    }

    public function delete(AdminContext $context): Response
    {
        $imgPath = $context->getEntity()->getInstance()->getCategoryPhotoPath();
        $this->uploadHelper->deletePhotoFromDirectory($imgPath);
        return parent::delete($context); // TODO: Change the autogenerated stub
    }
}

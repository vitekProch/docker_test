<?php

namespace App\Controller\Admin;

use App\Entity\PackageItem;
use App\Entity\PeopleReviews;
use App\Entity\PhotoCategories;
use App\Entity\PhotoPackageNames;
use App\Entity\PortfolioPhotos;
use App\Entity\SpecialOffer;
use App\Entity\User;
use App\Entity\WeddingPackage;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class DashboardController extends AbstractDashboardController
{

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(PhotoCategoriesCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Hlavní administrace');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToUrl('Hlavní stránka', 'fa fa-home', $this->generateUrl('homepage'));
        yield MenuItem::section('Uprav svou stránku');
        yield MenuItem::subMenu('Úprava domů', 'fa-solid fa-house-circle-check')
            ->setSubItems([
                MenuItem::linkToCrud('Recenze', 'fa-solid fa-comment', PeopleReviews::class)
            ]);
        yield MenuItem::subMenu('Úprava portfólia', 'fa-solid fa-camera-retro')
            ->setSubItems([
                MenuItem::linkToCrud('Úprava fotek', 'fa-regular fa-image', PortfolioPhotos::class),
                MenuItem::linkToCrud('Úprava kategorií', 'fa-solid fa-list', PhotoCategories::class),
            ]);
        yield MenuItem::subMenu('Úprava Novinek', 'fa-regular fa-newspaper')
            ->setSubItems([
                MenuItem::linkToCrud('Speciální nabídky', 'fa-solid fa-wand-magic-sparkles', SpecialOffer::class)
        ]);

        yield MenuItem::subMenu('Úprava ceníku', 'fa-solid fa-coins')
            ->setSubItems([
                MenuItem::linkToCrud('Svatební balíčky', 'fa-solid fa-ring', WeddingPackage::class),
                MenuItem::linkToCrud('Odrážky svatebních balíčků', 'fa-solid fa-align-left', PackageItem::class),
                MenuItem::linkToCrud('Klasické balíčky', 'fa-solid fa-box-open', PhotoPackageNames::class),
            ]);

        MenuItem::linkToCrud('Uživatelé', 'fas fa-users', User::class)
            ->setPermission('ROLE_SUPER_ADMIN');
    }

}

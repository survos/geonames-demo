<?php

namespace App\Controller\Admin;

use Bordeux\Bundle\GeoNameBundle\Entity\Country;
use Bordeux\Bundle\GeoNameBundle\Entity\GeoName;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Geonames');
    }

    public function configureCrud(): Crud
    {
        return Crud::new();
    }

    public function configureMenuItems(): iterable
    {
        $submenu1 = [
            MenuItem::linkToCrud('Geo_Admin1', '', GeoName::class),
            MenuItem::linkToCrud('Geo_Admin2', '', GeoName::class),
            MenuItem::linkToCrud('Geo_Admin3', '', GeoName::class),
        ];

        $submenu2 = [
            MenuItem::linkToCrud('Geo_FeatureA', '', GeoName::class),
            MenuItem::linkToCrud('Geo_FeatureV', '', GeoName::class),
        ];

        yield MenuItem::linkToCrud('Country', 'fas fa-fas fas fa-map-marker-alt', Country::class);
        yield MenuItem::linkToCrud('GeoName', 'fas fa-fas fas fa-map-marker-alt', GeoName::class);
        yield MenuItem::subMenu('Administrative', 'fas fa-fas fas fa-map-marker-alt')->setSubItems($submenu1);
        yield MenuItem::subMenu('Feature', 'fas fa-fas fas fa-map-marker-alt')->setSubItems($submenu2);
    }
}

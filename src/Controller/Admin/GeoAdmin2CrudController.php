<?php

namespace App\Controller\Admin;

use Bordeux\Bundle\GeoNameBundle\Entity\GeoName;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class GeoAdmin2CrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return GeoName::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setSearchFields(['id', 'name', 'asciiName', 'latitude', 'longitude', 'featureClass', 'featureCode', 'countryCode', 'administrativeCode', 'cc2', 'population', 'elevation', 'dem']);
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->disable('delete', 'edit', 'new');
    }

    public function configureFields(string $pageName): iterable
    {
        $name = TextField::new('name');
        $asciiName = TextField::new('asciiName');
        $latitude = NumberField::new('latitude');
        $longitude = NumberField::new('longitude');
        $featureClass = TextField::new('featureClass');
        $featureCode = TextField::new('featureCode');
        $countryCode = TextField::new('countryCode');
        $administrativeCode = TextField::new('administrativeCode');
        $cc2 = TextField::new('cc2');
        $population = TextField::new('population');
        $elevation = IntegerField::new('elevation');
        $dem = IntegerField::new('dem');
        $modificationDate = DateField::new('modificationDate');
        $country = AssociationField::new('country');
        $admin1 = AssociationField::new('admin1');
        $admin2 = AssociationField::new('admin2');
        $admin3 = AssociationField::new('admin3');
        $admin4 = AssociationField::new('admin4');
        $timezone = AssociationField::new('timezone');
        $parents = AssociationField::new('parents');
        $id = IntegerField::new('id', 'ID');

        if (Crud::PAGE_INDEX === $pageName) {
            return [$id, $name, $asciiName, $latitude, $longitude, $featureClass, $featureCode];
        } elseif (Crud::PAGE_DETAIL === $pageName) {
            return [$id, $name, $asciiName, $latitude, $longitude, $featureClass, $featureCode, $countryCode, $administrativeCode, $cc2, $population, $elevation, $dem, $modificationDate, $country, $admin1, $admin2, $admin3, $admin4, $timezone, $parents];
        } elseif (Crud::PAGE_NEW === $pageName) {
            return [$name, $asciiName, $latitude, $longitude, $featureClass, $featureCode, $countryCode, $administrativeCode, $cc2, $population, $elevation, $dem, $modificationDate, $country, $admin1, $admin2, $admin3, $admin4, $timezone, $parents];
        } elseif (Crud::PAGE_EDIT === $pageName) {
            return [$name, $asciiName, $latitude, $longitude, $featureClass, $featureCode, $countryCode, $administrativeCode, $cc2, $population, $elevation, $dem, $modificationDate, $country, $admin1, $admin2, $admin3, $admin4, $timezone, $parents];
        }
    }
}

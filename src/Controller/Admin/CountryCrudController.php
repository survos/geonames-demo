<?php

namespace App\Controller\Admin;

use Bordeux\Bundle\GeoNameBundle\Entity\Country;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CountryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Country::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Country')
            ->setEntityLabelInPlural('Country')
            ->setSearchFields(['id', 'iso', 'iso3', 'isoNumeric', 'fips', 'name', 'capital', 'area', 'population', 'tld', 'currency', 'currencyName', 'phonePrefix', 'postalFormat', 'postalRegex', 'languages']);
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->disable('delete', 'edit', 'new');
    }

    public function configureFields(string $pageName): iterable
    {
        $iso = TextField::new('iso');
        $iso3 = TextField::new('iso3');
        $isoNumeric = IntegerField::new('isoNumeric');
        $fips = TextField::new('fips');
        $name = TextField::new('name');
        $capital = TextField::new('capital');
        $area = TextField::new('area');
        $population = TextField::new('population');
        $tld = TextField::new('tld');
        $currency = TextField::new('currency');
        $currencyName = TextField::new('currencyName');
        $phonePrefix = IntegerField::new('phonePrefix');
        $postalFormat = TextareaField::new('postalFormat');
        $postalRegex = TextareaField::new('postalRegex');
        $geoName = AssociationField::new('geoName');
        $id = IntegerField::new('id', 'ID');
        $languages = TextField::new('languages');

        if (Crud::PAGE_INDEX === $pageName) {
            return [$id, $iso, $iso3, $isoNumeric, $fips, $name, $capital];
        } elseif (Crud::PAGE_DETAIL === $pageName) {
            return [$id, $iso, $iso3, $isoNumeric, $fips, $name, $capital, $area, $population, $tld, $currency, $currencyName, $phonePrefix, $postalFormat, $postalRegex, $languages, $geoName];
        } elseif (Crud::PAGE_NEW === $pageName) {
            return [$iso, $iso3, $isoNumeric, $fips, $name, $capital, $area, $population, $tld, $currency, $currencyName, $phonePrefix, $postalFormat, $postalRegex, $geoName];
        } elseif (Crud::PAGE_EDIT === $pageName) {
            return [$iso, $iso3, $isoNumeric, $fips, $name, $capital, $area, $population, $tld, $currency, $currencyName, $phonePrefix, $postalFormat, $postalRegex, $geoName];
        }
    }
}

<?php

namespace App\Controller\Admin;

use Bordeux\Bundle\GeoNameBundle\Entity\Timezone;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class TimezoneCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Timezone::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Timezone')
            ->setEntityLabelInPlural('Timezone')
            ->setSearchFields(['id', 'timezone', 'countryCode', 'gmtOffset', 'dstOffset', 'rawOffset']);
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->disable('delete', 'edit', 'new');
    }

    public function configureFields(string $pageName): iterable
    {
        $timezone = TextField::new('timezone');
        $countryCode = TextField::new('countryCode');
        $gmtOffset = NumberField::new('gmtOffset');
        $dstOffset = NumberField::new('dstOffset');
        $rawOffset = NumberField::new('rawOffset');
        $id = IntegerField::new('id', 'ID');

        if (Crud::PAGE_INDEX === $pageName) {
            return [$id, $timezone, $countryCode, $gmtOffset, $dstOffset, $rawOffset];
        } elseif (Crud::PAGE_DETAIL === $pageName) {
            return [$id, $timezone, $countryCode, $gmtOffset, $dstOffset, $rawOffset];
        } elseif (Crud::PAGE_NEW === $pageName) {
            return [$timezone, $countryCode, $gmtOffset, $dstOffset, $rawOffset];
        } elseif (Crud::PAGE_EDIT === $pageName) {
            return [$timezone, $countryCode, $gmtOffset, $dstOffset, $rawOffset];
        }
    }
}

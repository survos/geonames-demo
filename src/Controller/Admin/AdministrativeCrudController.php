<?php

namespace App\Controller\Admin;

use Bordeux\Bundle\GeoNameBundle\Entity\Administrative;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AdministrativeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Administrative::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Administrative')
            ->setEntityLabelInPlural('Administrative')
            ->setSearchFields(['id', 'code', 'name', 'asciiName']);
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->disable('delete', 'edit', 'new');
    }

    public function configureFields(string $pageName): iterable
    {
        $code = TextField::new('code');
        $name = TextField::new('name');
        $asciiName = TextField::new('asciiName');
        $id = IntegerField::new('id', 'ID');

        if (Crud::PAGE_INDEX === $pageName) {
            return [$id, $code, $name, $asciiName];
        } elseif (Crud::PAGE_DETAIL === $pageName) {
            return [$id, $code, $name, $asciiName];
        } elseif (Crud::PAGE_NEW === $pageName) {
            return [$code, $name, $asciiName];
        } elseif (Crud::PAGE_EDIT === $pageName) {
            return [$code, $name, $asciiName];
        }
    }
}

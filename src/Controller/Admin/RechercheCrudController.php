<?php

namespace App\Controller\Admin;

use App\Entity\Recherche;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class RechercheCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Recherche::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}

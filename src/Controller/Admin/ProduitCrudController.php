<?php

namespace App\Controller\Admin;

use App\Entity\Produit;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ColorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ProduitCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Produit::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            FormField::addTab('Descriptions'),
            IdField::new('id')->hideOnForm(),
            TextField::new('nom'),
            MoneyField::new('prixVente')->setCurrency("CDF"),
            BooleanField::new('isArrivage'),
            TextField::new('code'),
            FormField::addTab('Stock'),
            BooleanField::new('isBestSelling'),
            IntegerField::new('qteStock'),
            IntegerField::new('qteAlerte')->hideOnIndex(),
            FormField::addTab('Caracteristiques'),
            ColorField::new('couleur')->hideOnIndex(),
            // ImageField::new('photos')->setBasePath("uploads/images/produits/")->setUploadDir("public/uploads/images/produits/"),
            TextField::new('video'),
            TextEditorField::new('description'),
            AssociationField::new('categories'),
        ];
    }
    
}

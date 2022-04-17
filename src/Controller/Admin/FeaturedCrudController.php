<?php

namespace App\Controller\Admin;

use App\Entity\Featured;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class FeaturedCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Featured::class;
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

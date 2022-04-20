<?php

namespace App\Controller\Admin;

use App\Entity\Featured;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class FeaturedCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Featured::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title')->addHtmlContentsToBody(),
            TextEditorField::new('body'),
            TextField::new('imageFile')->setFormType(VichImageType::class)->hideOnIndex(),
            ImageField::new('image')->setBasePath('/uploads/images')->onlyOnIndex(),
            AssociationField::new('logos')->setFormTypeOptions([
                'by_reference' => false,
            ]),
        ];
    }
}

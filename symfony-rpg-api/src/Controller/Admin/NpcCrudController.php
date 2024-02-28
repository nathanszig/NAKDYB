<?php

namespace App\Controller\Admin;

use App\Entity\Npc;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;


class NpcCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Npc::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name'),
            TextEditorField::new('description'),

            // create choice field for the role
            ArrayField::new('role'),

            NumberField::new('physical'),
            NumberField::new('mental'),
            NumberField::new('social'),
            AssociationField::new('games'),
            AssociationField::new('places')
        ];
    }
    
}

<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategorieFixtures extends Fixture
{
    // ====================================================== //
    // ===================== Proprietes ===================== //
    // ====================================================== //
    public const BD = 'bande dessinée';
    public const POLAR = 'polar';
    // ====================================================== //
    // ====================== Methodes ====================== //
    // ====================================================== //
    public function load(ObjectManager $manager): void
    {
        $categorie = new Categorie();
        $categorie->setNom('Bandes dessinée');
        $categorie->setSlug('bande-dessinee');
        $manager->persist($categorie);
        $this->addReference(self::BD, $categorie);

        $categorie = new Categorie();
        $categorie->setNom('Roman policier');
        $categorie->setSlug('roman-policier');
        $manager->persist($categorie);
        $this->addReference(self::POLAR, $categorie);

        $manager->flush();
    }
}

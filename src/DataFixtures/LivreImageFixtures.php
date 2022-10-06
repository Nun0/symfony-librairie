<?php

namespace App\DataFixtures;

use App\Entity\LivreImage;
use App\DataFixtures\LivreFixtures;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class LivreImageFixtures extends Fixture implements DependentFixtureInterface
{
    // ====================================================== //
    // ===================== Proprietes ===================== //
    // ====================================================== //
    

    // ====================================================== //
    // ====================== Methodes ====================== //
    // ====================================================== //
    public function load(ObjectManager $manager): void
    {
        $livreimage = new LivreImage();
        $livreimage->setNom('Alvin - Tome 2');
        $livreimage->setImageName('alvin-tome-2-le-bal-des-monstres.jpg');
        $livreimage->addLivre($this->getReference(LivreFixtures::ALVIN_TOME2));
        $manager->persist($livreimage);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            LivreFixtures::class,
        ];
    }
}
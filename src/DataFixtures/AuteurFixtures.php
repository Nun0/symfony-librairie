<?php

namespace App\DataFixtures;

use App\Entity\Auteur;
use App\DataFixtures\LivreFixtures;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class AuteurFixtures extends Fixture implements DependentFixtureInterface
{
    // ====================================================== //
    // ===================== Proprietes ===================== //
    // ====================================================== //
    public const REGIS = 'regis';
    public const RENAUD = 'renaud';
    public const BOUCHARD = 'bouchard';
    public const HERGE = 'herge';
    public const JACQUES = 'jacques';

    // ====================================================== //
    // ====================== Methodes ====================== //
    // ====================================================== //
    public function load(ObjectManager $manager): void
    {
        $auteur = new Auteur();
        $auteur->setNom('Hautière');
        $auteur->setPrenom('Régis');
        $auteur->addLivre($this->getReference(LivreFixtures::ALVIN_TOME2));
        $auteur->addLivre($this->getReference(LivreFixtures::PAPIER));
        $auteur->addLivre($this->getReference(LivreFixtures::CENDRE));
        $auteur->addLivre($this->getReference(LivreFixtures::PERICO));
        $auteur->addLivre($this->getReference(LivreFixtures::HERITAGE));
        $manager->persist($auteur);
        $this->addReference(self::REGIS, $auteur);
        
        $auteur = new Auteur();
        $auteur->setNom('Dillies');
        $auteur->setPrenom('Renaud');
        $auteur->addLivre($this->getReference(LivreFixtures::ALVIN_TOME2));
        $auteur->addLivre($this->getReference(LivreFixtures::PAPIER));
        $auteur->addLivre($this->getReference(LivreFixtures::CENDRE));
        $auteur->addLivre($this->getReference(LivreFixtures::HERITAGE));
        $manager->persist($auteur);
        $this->addReference(self::RENAUD, $auteur); 
        
        $auteur = new Auteur();
        $auteur->setNom('Bouchard');
        $auteur->setPrenom('Christophe');
        $auteur->addLivre($this->getReference(LivreFixtures::ALVIN_TOME2));
        $auteur->addLivre($this->getReference(LivreFixtures::PAPIER));
        $auteur->addLivre($this->getReference(LivreFixtures::CENDRE));
        $auteur->addLivre($this->getReference(LivreFixtures::HERITAGE));
        $manager->persist($auteur);
        $this->addReference(self::BOUCHARD, $auteur);
        
        $auteur = new Auteur();
        $auteur->setNom('Hergé');
        $auteur->addLivre($this->getReference(LivreFixtures::TT_CRABE));
        $auteur->addLivre($this->getReference(LivreFixtures::CONGO));
        $auteur->addLivre($this->getReference(LivreFixtures::LUNE));
        $auteur->addLivre($this->getReference(LivreFixtures::SOVIETS));
        $manager->persist($auteur);
        $this->addReference(self::HERGE, $auteur);

        $auteur = new Auteur();
        $auteur->setNom('Ferrandez');
        $auteur->setPrenom('Jacques ');
        $auteur->addLivre($this->getReference(LivreFixtures::DESERT));
        $manager->persist($auteur);
        $this->addReference(self::JACQUES, $auteur);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            LivreFixtures::class,
        ];
    }
}
<?php

namespace App\DataFixtures;

use App\Entity\Livre;
use App\DataFixtures\EditeurFixtures;
use App\DataFixtures\CategorieFixtures;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class LivreFixtures extends Fixture implements DependentFixtureInterface

{
    // ====================================================== //
    // ===================== Proprietes ===================== //
    // ====================================================== //
    public const ALVIN_TOME2 = 'alvin tome2';
    public const TT_CRABE = 'tintin le crabe';
    public const PAPIER = 'abelard papier';
    public const HERITAGE = 'abelard heritage';
    public const CENDRE = 'abelard cendre';
    public const SOVIETS = 'tintin soviets';
    public const LUNE = 'tintin lune';
    public const CONGO = 'tintin congo';
    public const DESERT = 'le desert';
    public const PERICO = 'perico tome2';

    // ====================================================== //
    // ====================== Methodes ====================== //
    // ====================================================== //
    public function load(ObjectManager $manager): void
    {
        $livre = new Livre();
        $livre->setTitre('Perico - Tome 2');
        $livre->setImageName('perico.jpg');
        $livre->setDescription('Suite et fin de Perico, polar noir bien serré de Régis Hautière et Philippe Berthet... Au programme : corruption, Mafia, Cuba, jolies filles et suspense !');
        $livre->setEditeur($this->getReference(EditeurFixtures::DARGAUD));
        $livre->setCategorie($this->getReference(CategorieFixtures::BD));
        $manager->persist($livre);
        $this->addReference(self::PERICO, $livre);

        $livre = new Livre();
        $livre->setTitre('Le désert sans détour');
        $livre->setImageName('desert.jpg');
        $livre->setDescription('Deux survivants, à la recherche d\'une réponse à l\'énigme du monde déambulent dans le désert. Un maitre Hagg Bar et son fidèle valet, Siklist. Une sorte de Don Quichotte et Sancho Pança aux rôles inversés qui attendraient Godot….');
        $livre->setEditeur($this->getReference(EditeurFixtures::OEST));
        $livre->setCategorie($this->getReference(CategorieFixtures::BD));
        $manager->persist($livre);
        $this->addReference(self::DESERT, $livre);

        $livre = new Livre();
        $livre->setTitre('Les tribulations de Tintin au Congo');
        $livre->setImageName('congo.jpg');
        $livre->setDescription('Dévoilant les secrets de l\'élaboration et de la publication des différentes versions de Tintin au Congo, Philippe Goddin élargit ses commentaires à la relation entre Hergé et les Africains depuis les débuts du dessinateur au milieu des années vingt jusqu\'à ses ultimes réalisations à l\'aube des années quatre-vingt.');
        $livre->setEditeur($this->getReference(EditeurFixtures::CASTERMAN));
        $livre->setCategorie($this->getReference(CategorieFixtures::BD));
        $manager->persist($livre);
        $this->addReference(self::CONGO, $livre);

        $livre = new Livre();
        $livre->setTitre('Le Crabe aux pinces d\'or - édition spéciale 80 ans');
        $livre->setImageName('tintin.jpg');
        $livre->setDescription('Il y a 80 ans, naissait sous le crayon d\'Hergé ce personnage si attachant et devenu le préféré des lecteurs, notre fameux Capitaine Haddock.');
        $livre->setEditeur($this->getReference(EditeurFixtures::CASTERMAN));
        $livre->setCategorie($this->getReference(CategorieFixtures::BD));
        $manager->persist($livre);
        $this->addReference(self::TT_CRABE, $livre);

        $livre = new Livre();
        $livre->setTitre('Tintin au pays des Soviets');
        $livre->setImageName('soviets.jpg');
        $livre->setDescription('Le jeune auteur avait 21 ans et n\'avait jamais été initié au dessin. Il ne se doutait pas qu\'il venait de créer un héros qui deviendrait universel et mythique au cours de ses vingt-quatre aventures… ');
        $livre->setEditeur($this->getReference(EditeurFixtures::CASTERMAN));
        $livre->setCategorie($this->getReference(CategorieFixtures::BD));
        $manager->persist($livre);
        $this->addReference(self::SOVIETS, $livre);

        $livre = new Livre();
        $livre->setTitre('Tintin et la Lune');
        $livre->setImageName('lune.jpg');
        $livre->setDescription('Nous retrouvons nos héros à bord de la première fusée lunaire. Mais le vol est loin d\'être de tout repos : outre la présence involontaire des Dupondt ce qui limite sérieusement les réserves');
        $livre->setEditeur($this->getReference(EditeurFixtures::CASTERMAN));
        $livre->setCategorie($this->getReference(CategorieFixtures::BD));
        $manager->persist($livre);
        $this->addReference(self::LUNE, $livre);

        $livre = new Livre();
        $livre->setTitre('Alvin - Tome 2');
        $livre->setImageName('alvin-tome-2-le-bal-des-monstres.jpg');
        $livre->setDescription('Alvin est déjà de retour ! Hautière et Dillies clôturent ce diptyque au son du banjo !');
        $livre->setEditeur($this->getReference(EditeurFixtures::DARGAUD));
        $livre->setCategorie($this->getReference(CategorieFixtures::BD));
        $manager->persist($livre);
        $this->addReference(self::ALVIN_TOME2, $livre);


        $livre = new Livre();
        $livre->setTitre('La Danse des petits papiers');
        $livre->setImageName('papier.jpg');
        $livre->setDescription('Le charme de Renaud Dillies a encore frappé : après la souris de Bulles et nacelle, voici un autre doux rêveur, le poussin Abélard, dans un nouveau diptyque.');
        $livre->setEditeur($this->getReference(EditeurFixtures::DARGAUD));
        $livre->setCategorie($this->getReference(CategorieFixtures::BD));
        $manager->persist($livre);
        $this->addReference(self::PAPIER, $livre);

        $livre = new Livre();
        $livre->setTitre('Une brève histoire de poussière et de cendre');
        $livre->setImageName('cendre.jpg');
        $livre->setDescription('Dans l\'espoir de décrocher la lune pour séduire la belle Épilie, Abélard poursuit son voyage vers le Nouveau Monde. Pendant la traversée en bateau, aux côtés de Gaston, il va apprendre la vie, la vraie, et comprendra que celle qu\'il avait dans son marais n\'était qu\'un miroir déformant et tronqué d\'une réalité qui peut se montrer cruelle.');
        $livre->setEditeur($this->getReference(EditeurFixtures::DARGAUD));
        $livre->setCategorie($this->getReference(CategorieFixtures::BD));
        $manager->persist($livre);
        $this->addReference(self::CENDRE, $livre);

        $livre = new Livre();
        $livre->setTitre('L\'Héritage d\'Abélard');
        $livre->setImageName('heritage.jpg');
        $livre->setDescription('Régis Hautière et Renaud Dillies signent la suite d\'Abélard avec le nouveau diptyque Alvin. Son ami disparu, l\'ours mal léché Gaston traîne son désespoir à New York. ');
        $livre->setEditeur($this->getReference(EditeurFixtures::DARGAUD));
        $livre->setCategorie($this->getReference(CategorieFixtures::BD));
        $manager->persist($livre);
        $this->addReference(self::HERITAGE, $livre);


        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            EditeurFixtures::class,
            CategorieFixtures::class,
        ];
    }
}
<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Livre;
use Faker\Factory;


class LivreFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
           $faker = Factory::create('fr_FR');
           $livres = Array();
           for ($i = 0; $i < 1000; $i++) {
               $livres[$i] = new Livre();

               $livres[$i]->setTitre($faker->catchPhrase())
                      ->setAnneeEdition($faker->year('-10 years','now'))
                      ->setNombrePages($faker->randomNumber(3, false))
                      ->setCodeIsbn($faker->isbn10());

               $manager->persist($livres[$i]);
           }

           $manager->flush();
    }
}
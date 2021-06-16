<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Auteur;
use Faker\Factory;


class AuteurFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
           $faker = Factory::create('fr_FR');
           $auteurs = Array();
           for ($i = 0; $i < 500; $i++) {
               $auteurs[$i] = new Auteur();
               $auteurs[$i]->setNom($faker->lastName);
               $auteurs[$i]->setPrenom($faker->firstName);

               $manager->persist($auteurs[$i]);
           }

           $manager->flush();
    }
}

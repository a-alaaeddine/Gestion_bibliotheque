<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Emprunteur;
use Faker\Factory;

class EmprunteurFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');        
           $emprunteurs = Array();
           for ($i = 0; $i < 100; $i++) {
               $emprunteurs[$i] = new Emprunteur();

               $emprunteurs[$i]->setNom($faker->lastname())
                               ->setPrenom($faker->firstName())
                               ->setTel($faker->mobileNumber())
                               ->setActif($faker->boolean('now'))
                               ->setDateCreation($faker->dateTime('now'))
                               ->setDateModification($faker->dateTime('now'));

               $manager->persist($emprunteurs[$i]);
           }

        $manager->flush();
    }
}


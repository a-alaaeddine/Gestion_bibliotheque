<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Emprunt;
use Faker\Factory;

class EmpruntFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');        
           $emprunts = Array();
           for ($i = 0; $i < 200; $i++) {
               $emprunts[$i] = new Emprunt();

               $emprunts[$i]->setDateEmprunt($faker->dateTime('now'))
                            ->setDateRetour($faker->dateTime('now'));

               $manager->persist($emprunts[$i]);
           }

        $manager->flush();
    }
}

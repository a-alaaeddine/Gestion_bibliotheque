<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Genre;
use Faker\Factory;

class GenreFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
           $genres = Array();
           for ($i = 0; $i < 1000; $i++) {
               $genres[$i] = new Genre();

               $genres[$i]->setNom($faker->text(10))
                          ->setDescription($faker->paragraph(10));

               $manager->persist($genres[$i]);
           }

        $manager->flush();
    }
}

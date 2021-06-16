<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;
use Faker\Factory;

class UserFixtures extends Fixture

{
    private $encoder;
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');        
           $user = Array();
               $user = new User();

               $user->setEmail($faker->email())
                        ->setRoles($faker->firstName());
                
                $password = $this->encoder->encodePassword($user, 'password');
                $user->setPassword($password);

               $manager->persist($user);
           

        $manager->flush();
    }
}


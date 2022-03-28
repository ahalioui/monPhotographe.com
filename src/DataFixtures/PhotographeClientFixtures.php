<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Client;
use App\Entity\Photographe;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class PhotographeClientFixtures extends Fixture
{
    private $passwordHasher;
    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager) 
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 5; $i++) {
            $photographe = new Photographe();
            $photographe->setNom('nom' . $i);
            $photographe->setPrenom($faker->firstName());
            $photographe->setEmail('test'.$i.'@test.com');
            // //$user->setRoles(['ROLE_ENTRAINEUR', 'ROLE_ADMIN', 'ROLE_WEBDEV']);
            $photographe->setPassword($this->passwordHasher->hashPassword($photographe,'test'));
            $photographe->setCodePostal($faker->numberBetween($min = 1000, $max = 9999));
            $photographe->setRoles(['ROLE_PHOTOGRAPHE']);
            $photographe-> setPays($faker->country());
            $photographe-> setTVA($faker->numberBetween(1, 5));
            $photographe-> setPhoto('test.jpg');
            $manager->persist($photographe);
        }


        for ($i = 6; $i < 10; $i++) {
            $client = new Client();
            $client->setNom('nom' . $i);
            $client->setPrenom($faker->firstName());
            $client->setEmail('test'.$i.'@test.com');
            $client->setRoles(['ROLE_CLIENT']);
            // //$user->setRoles(['ROLE_ENTRAINEUR', 'ROLE_ADMIN', 'ROLE_WEBDEV']);
            $client->setPassword($this->passwordHasher->hashPassword($client,'test'));
            $client->setCodePostal($faker->numberBetween($min = 1000, $max = 9999));
            $client-> setPays($faker->country());
            $manager->persist($client);
        }
        $manager->flush();
    }
}

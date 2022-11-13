<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setEmail('ruben@btv.de');
        $user->setFirstName('Ruben');
        $user->setPassword('ruben123');
        $user->setRoles('ROLE_ADMIN');
        $manager->persist($user);

        $manager->flush();
    }
}

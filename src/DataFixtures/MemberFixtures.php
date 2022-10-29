<?php

namespace App\DataFixtures;

use App\Entity\Member;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MemberFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $member = new Member();
        $member->setEmail('ruben@btv123123.de');
        $member->setFirstName('Ruben');
        $manager->persist($member);

        $manager->flush();
    }
}

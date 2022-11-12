<?php

namespace App\DataFixtures;

use App\Entity\Court;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CourtFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $court1 = new Court();
        $court1->setCourtNumber('Platz 1');
        $manager->persist($court1);

        $court2 = new Court();
        $court2->setCourtNumber('Platz 2');
        $manager->persist($court2);

        $court3 = new Court();
        $court3->setCourtNumber('Platz 3');
        $manager->persist($court3);

        $court4 = new Court();
        $court4->setCourtNumber('Platz 4');
        $manager->persist($court4);

        $court5 = new Court();
        $court5->setCourtNumber('Platz 5');
        $manager->persist($court5);

        $court6 = new Court();
        $court6->setCourtNumber('Platz 6');
        $manager->persist($court6);

        $court7 = new Court();
        $court7->setCourtNumber('Platz 7');
        $manager->persist($court7);

        $court8 = new Court();
        $court8->setCourtNumber('Platz 8');
        $manager->persist($court8);

        $manager->flush();
    }
}

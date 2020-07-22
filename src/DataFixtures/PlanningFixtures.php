<?php

namespace App\DataFixtures;

use App\Entity\Planing;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class PlanningFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i = 1; $i <= 4; $i++) {
            $planing = new Planing();
            $planing->setTitle($faker->word);
            $planing->setLocation($faker->word);
            $planing->setinfoDate($faker->dateTime);

            $manager->persist($planing);
        }
        $manager->flush();
    }
}
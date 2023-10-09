<?php

namespace App\DataFixtures;

use Faker\Generator;
use Faker\Factory;
use App\Entity\Review;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    /**
     *
     * @var Generator
     */
    private Generator $faker;

    public function __construct()
    {
        $this->faker = Factory::create('fr_FR');
    }   
    public function load(ObjectManager $manager): void
    {
        for ($i=1; $i <= 50 ; $i++) {
            $review = new Review();
            $review->setName($this->faker->name())
            ->setReviewText($this->faker->text())
            ->setScore(mt_rand(3, 4))
            ->setApproved(False);

            $manager->persist($review);
        }
        
        
        
        $manager->flush();
    }
}
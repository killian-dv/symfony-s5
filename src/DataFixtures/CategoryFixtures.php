<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Category;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Génère moi 5 objets Category fictifs

        foreach (range(1, 5) as $i) {
            $category = new Category();
            $category->setName('Category ' . $i);
            $manager->persist($category);
            $this->addReference('category_' . $i, $category); // expose l'objet à l'extérieur de la classe pour les liaisons avec Movie
        }

        $manager->flush();
    }
}

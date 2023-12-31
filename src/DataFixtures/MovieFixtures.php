<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Movie;

class MovieFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        // Génère 40 films avec un titre, une date de sortie, une durée, un synopsis une catégorie (en lien avec les autres fixtures) et entre 2 et 4 acteurs différents (en lien avec les autres fixtures)

        foreach (range(1, 40)as $i){
            $movie = new Movie();
            $movie->setTitle('Movie ' . $i);
            // Créez une date au format "yyyy-mm-jj"
            $releaseDate = \DateTimeImmutable::createFromFormat('Y-m-d', '2023-12-31');
            $movie->setReleaseDate($releaseDate);
            $movie->setDuration(rand(60, 180));
            $movie->setDescription('Synopsis ' . $i);
            $movie->setCategory($this->getReference('category_' . rand(1, 5)));
            $movie->addActor($this->getReference('actor_' . rand(1, 10)));
            $movie->addActor($this->getReference('actor_' . rand(1, 10)));
            $movie->addActor($this->getReference('actor_' . rand(1, 10)));
            $movie->addActor($this->getReference('actor_' . rand(1, 10)));
            $manager->persist($movie);
        }

        $manager->flush();
    }

public function getDependencies(): array
    {
        return [
            ActorsFixtures::class,
        ];
    }


}

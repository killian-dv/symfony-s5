<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Actor;

class ActorsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Génère les données pour 10 acteurs avec un first name et un last name réaliste

        $firstName = ['Jean', 'Pierre', 'Paul', 'Jacques', 'Marie', 'Julie', 'Julien', 'Jeanne', 'Pierre', 'Paul'];
        $lastName = ['Dupont', 'Durand', 'Martin', 'Bernard', 'Dubois', 'Thomas', 'Robert', 'Richard', 'Petit', 'Durand'];

        foreach (range(1, 10) as $i) {
            $actor = new Actor();
            $actor->setFirstName($firstName[rand(0, 9)]);
            $actor->setLastName($lastName[rand(0, 9)]);
            $manager->persist($actor);
            $this->addReference('actor_' . $i, $actor); // expose l'objet à l'extérieur de la classe pour les liaisons avec Movie
        }

        $manager->flush();
    }
}

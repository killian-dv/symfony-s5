<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Nationality;

class NationalityFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Génère 10 nationalités différentes et entre 2 et 4 acteurs différents (en lien avec les autres fixtures)

        $nationalities = ['Française', 'Américaine', 'Anglaise', 'Allemande', 'Espagnole', 'Italienne', 'Belge', 'Suisse', 'Canadienne', 'Japonaise'];
        foreach (range(1, 10) as $i) {
            $nationality = new Nationality();
            $nationality->setNationality($nationalities[rand(0, 9)]);
            $this->addReference('nationality_' . $i, $nationality);
            $manager->persist($nationality);
        }

        $manager->flush();
    }
}

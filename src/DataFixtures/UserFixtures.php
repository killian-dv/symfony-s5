<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Core\Validator\Constraints\UserPassword;


class UserFixtures extends Fixture
{
    public function __construct( protected UserPasswordHasherInterface $passwordHasherInterface)
    {
    }
    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setEmail('user@mail.com');
        $user->setPassword($this->passwordHasherInterface->hashPassword($user, 'password'));
        $manager->persist($user);
        $manager->flush();
    }
}

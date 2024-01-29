<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class ResetPasswordController extends AbstractController
{
    #[Route('/api/users/{id}/reset-password', name: 'app_reset_password', methods: ['POST'])]
    public function resetPassword(User $user, Request $request, UserPasswordHasherInterface $passwordHasherInterface, EntityManagerInterface $entityManager): JsonResponse
    {
        // Récupérer les données JSON de la requête
        $data = json_decode($request->getContent(), true);

        // Si il y a le mail alors modifier le mail
        if (isset($data['mail'])) {
            $user->setEmail($data['mail']);
        }

        // Si il y a le mot de passe alors modifier le mot de passe en le hashant
        if (isset($data['password'])) {
            $user->setPassword($passwordHasherInterface->hashPassword($user, $data['password']));
        }

        // Sauvegarder l'utilisateur mis à jour
        $entityManager->persist($user);
        $entityManager->flush();

        return $this->json(['message' => 'Mot de passe réinitialisé avec succès.']);
    }
}

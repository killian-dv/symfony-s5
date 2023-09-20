<?php

namespace App\Controller;

use App\Services\Slugify;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\SlugifyService;

class SlugifyController extends AbstractController
{
    #[Route('/slugify', name: 'app_slugify')]
    public function slugify(Slugify $slugify,): Response
    {
        $texte = $slugify->generateSlug('Hello World, ceci est une phrase de test !');
//        dd($texte);

        return $this->render('slugify/index.html.twig', [
            'slugifiedText' => $texte,
        ]);
    }
}
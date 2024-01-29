<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SecurityControllerTest extends WebTestCase
{
    public function LoginTest()
    {
        $client = static::createClient();

        // Remplacez l'URL par celle de votre endpoint de connexion JWT
        $client->request('POST', '/auth', [], [], ['CONTENT_TYPE' => 'application/json'], json_encode([
            'email' => 'test@test.com',
            'password' => 'test',
        ]));

        // Vérifiez si la réponse a un code HTTP 200 (HTTP OK)
        $this->assertResponseStatusCodeSame(200);

        // Vous pouvez également effectuer d'autres vérifications ici, par exemple vérifier la structure de la réponse JSON
        // en utilisant $this->assertJson($response->getContent());

        // Assurez-vous d'ajuster le chemin de l'URL et les données de connexion en fonction de votre application
    }
}

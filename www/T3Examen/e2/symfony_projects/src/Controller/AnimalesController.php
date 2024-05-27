<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\Cache\CacheInterface;

class AnimalesController extends AbstractController
{
    private $animales;

    public function __construct()
    {
        // Array de los animales
        $this->pets = [
            [
            "name" =>  "Purrsloud",
            "species" =>  "Cat",
            "favFoods" =>  ["wet food", "dry food", "<strong>any</strong> food"],
            "birthYear" =>  2016,
            "photo" =>  "https://learnwebcode.github.io/json-example/images/cat-2.jpg"
            ],
            [
            "name" =>  "Barksalot",
            "species" =>  "Dog",
            "birthYear" =>  2008,
            "photo" =>  "https://learnwebcode.github.io/json-example/images/dog-1.jpg"
            ],
            [
            "name" =>  "Meowsalot",
            "species" =>  "Cat",
            "favFoods" =>  ["tuna", "catnip", "celery"],
            "birthYear" =>  2012,
            "photo" =>  "https://learnwebcode.github.io/json-example/images/cat-1.jpg"
            ]
        
            ];
    }

    #[Route('/pets')]
    public function pets()
    {
        

        return $this->render('animales/pets.html.twig', [
            'pets' => $this->pets
        ]);
    }

    #[Route('/petscache')]
    
    public function petscache(HttpClientInterface $httpClient, CacheInterface $cache): Response{
        $pets = $cache->get('animales_data', function ($cacheItem) use ($httpClient) {
            $response = $httpClient->request('GET', 'https://raw.githubusercontent.com/a22fatimasb/docker-lamp/main/www/T3Examen/pets.json');
            $data = $response->toArray();
            $cacheItem->expiresAfter(2);
            return $data;
        });
       
        return $this->render('animales/petscache.html.twig', [
            'pets'=> $pets
        ]);
    }
}

    
    
<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AnimalesController extends AbstractController
{
    private $animales;

    public function __construct()
    {
        // Array de las películas 
        $this->animales = [
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
            'animales' => $this->animales
        ]);
    }

    #[Route('/petscache')]
    
    public function petscache(){


        return $this->render('animales/petscache.html.twig', [
        ]);
    }
}

    

<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\Cache\CacheInterface;

class CinemaController extends AbstractController
{
    private $nombreCine;
    private $imagenPrincipal;

    public function __construct()
    {
        // Nombre del cine
        $this->nombreCine = 'Cinema Picheleiras';
        $this->imagenPrincipal = '/images/small.jpg';
    }

    #[Route('/')]
    public function homepage()
    {

        return $this->render('cinema/homepage.html.twig', [
            'title' => $this->nombreCine,
            'image' => $this->imagenPrincipal
        ]);
    }

    #[Route('/presenta')]
    public function presenta(HttpClientInterface $httpClient, CacheInterface $cache): Response
    {
        $peliculas = $cache->get('peliculas_data', function ($cacheItem) use ($httpClient) {
            $response = $httpClient->request('GET', 'https://raw.githubusercontent.com/a22fatimasb/docker-lamp/main/www/ud08/symfony_projects/public/data/data.json');
            $data = $response->toArray();
            $cacheItem->expiresAfter(10);
            return $data;
        });
        return $this->render('cinema/presenta.html.twig', [
            'title' => $this->nombreCine,
            'peliculas' => $peliculas
        ]);
    }

    #[Route('/fichas/{id}', 'ficha_pelicula')]

    public function fichas(
        HttpClientInterface  $httpClient,
        CacheInterface $cache,
        $id
    ): Response {

        $peliculas = $cache->get('peliculas_data', function ($cacheItem) use ($httpClient) {
            $response = $httpClient->request('GET', 'https://raw.githubusercontent.com/a22fatimasb/docker-lamp/main/www/ud08/symfony_projects/public/data/data.json');
            $data = $response->toArray();
            $cacheItem->expiresAfter(10);
            return $data;
        });

        $id = (int) $id;
        // Buscar la película correspondiente al id
        $peliculaSeleccionada = null;
        foreach ($peliculas as $pelicula) {
            if ($pelicula['id'] === $id) {
                $peliculaSeleccionada = $pelicula;
                break;
            }
        }
       
        // Verificar si se encontró la película
        if (!$peliculaSeleccionada) {
            $error = 'La película no fue encontrada';
        } else {
            $error = null;
            $titulo = $peliculaSeleccionada['titulo'];
            $foto = $peliculaSeleccionada['foto'];
        }

        return $this->render('cinema/fichas.html.twig', [
            'titulo' => $titulo ?? null,
            'pelicula' => $peliculaSeleccionada,
            'foto' => $foto ?? null,
            'error' => $error,
        ]);
    }
}

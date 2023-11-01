<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Stream;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\VoiceActor;
use App\Repository\VoiceActorRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Service\TmdbService;

class HomeController extends AbstractController
{
    #[Route('/api/home/trending-movies', name: 'homeTrendingMovies')]
    public function getHomeTrendingMovies(TmdbService $tmdb): Response
    {
        $trending = $tmdb->getTrendingMovies();

        return $this->json($trending);
    }

    #[Route('/api/home/trending-series', name: 'homeTrendingSeries')]
    public function getHomeTrendingSeries(TmdbService $tmdb): Response
    {
        $trending = $tmdb->getTrendingSeries();

        return $this->json($trending);
    }
}

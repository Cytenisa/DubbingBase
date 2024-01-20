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

class VoiceActorController extends AbstractController
{
    #[Route('/api/voice-actor/{id}/infos', name: 'voice-actor-infos')]
    public function getVoiceActorInfos(EntityManagerInterface $entityManager, int $id): Response
    {
        $repository = $entityManager->getRepository(VoiceActor::class);
        $va = $repository->findById($id);

        return $this->json($va);
    }

    #[Route('/api/voice-actor/{id}/movies', name: 'voice-actor-movies')]
    public function getVoiceActorMovies(TmdbService $tmdb, EntityManagerInterface $entityManager, int $id): Response
    {
        $repository = $entityManager->getRepository(VoiceActor::class);
        $movies = $repository->findMovies($id);
        $detailedMovies = $tmdb->getMovies($movies);

        return $this->json($detailedMovies);
    }

    #[Route('/api/voice-actor/{id}/shows', name: 'voice-actor-shows')]
    public function getVoiceActorShows(EntityManagerInterface $entityManager, int $id): Response
    {
        $repository = $entityManager->getRepository(VoiceActor::class);
        $shows = $repository->findShows($id);

        return $this->json($shows);
    }
}
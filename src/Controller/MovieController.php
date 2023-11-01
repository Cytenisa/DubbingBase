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

class MovieController extends AbstractController
{
    #[Route('/api/movie/{id}', name: 'movie')]
    public function getMovie(TmdbService $tmdb, EntityManagerInterface $entityManager, int $id): Response
    {
        $movie = $tmdb->getMovie($id);

        $repository = $entityManager->getRepository(VoiceActor::class);
        $va = $repository->findVaActorByMovie($id);

        $result = array(
            'movie' => $movie,
            'voiceActors' => $va
        );

        return $this->json($result);
    }
}
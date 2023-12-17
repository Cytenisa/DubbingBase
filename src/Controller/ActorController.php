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

class ActorController extends AbstractController
{
    #[Route('/api/actor/{id}', name: 'actor')]
    public function getActor(TmdbService $tmdb, EntityManagerInterface $entityManager, int $id): Response
    {
        $actor = $tmdb->getActorAndCredits($id);

        return $this->json($actor);
    }
}
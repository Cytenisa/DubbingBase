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

class HomeController extends AbstractController
{
    #[Route('/api/home', name: 'homeDeBase')]
    public function number(): Response
    {

        $client = new Client([
            'verify' => false
        ]);

        $response = $client->request('GET', 'https://api.themoviedb.org/3/trending/movie/day?language=fr-FR', [
        'headers' => [
            'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIxMTMwYTY4OWQwNTlmNzZmZTc0MDczNjZmMWU0OWIxYyIsInN1YiI6IjU5YTc0MTg3YzNhMzY4M2QwNzAwNTRlNiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.rk7_VC1cbfkTRWny38IpYSmADc4p2hSmp9c_5Qikcf0',
            'accept' => 'application/json',
        ],
        ]);

        return $this->json(json_decode($response->getBody()));
    }

    #[Route('/api/home/movie/{id}', name: 'movie')]
    public function test(EntityManagerInterface $entityManager, int $id) :Response
    {

        $client = new Client([
            'verify' => false
        ]);


        $response = $client->request('GET', 'https://api.themoviedb.org/3/movie/968051?language=en-US', [
        'headers' => [
            'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIxMTMwYTY4OWQwNTlmNzZmZTc0MDczNjZmMWU0OWIxYyIsInN1YiI6IjU5YTc0MTg3YzNhMzY4M2QwNzAwNTRlNiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.rk7_VC1cbfkTRWny38IpYSmADc4p2hSmp9c_5Qikcf0',
            'accept' => 'application/json',
        ],
        ]);


        $repository = $entityManager->getRepository(VoiceActor::class);

        // look for a single Product by its primary key (usually "id")
        $va = $repository->findVaActorByMovie($id);

        

        return new Response($va);

    }
}
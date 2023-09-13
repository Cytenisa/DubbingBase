<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Stream;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'homeDeBase')]
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
}
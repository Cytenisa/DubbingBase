<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Stream;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\VoiceActor;
use App\Repository\VoiceActorRepository;
use Doctrine\ORM\EntityManagerInterface;

class TmdbService
{
    public function getTrendingMovies()
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

        return json_decode($response->getBody());
    }

    public function getTrendingSeries()
    {
        $client = new Client([
            'verify' => false
        ]);

        $response = $client->request('GET', 'https://api.themoviedb.org/3/trending/tv/day?language=fr-FR', [
            'headers' => [
                'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIxMTMwYTY4OWQwNTlmNzZmZTc0MDczNjZmMWU0OWIxYyIsInN1YiI6IjU5YTc0MTg3YzNhMzY4M2QwNzAwNTRlNiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.rk7_VC1cbfkTRWny38IpYSmADc4p2hSmp9c_5Qikcf0',
                'accept' => 'application/json',
            ],
        ]);

        return json_decode($response->getBody());
    }

    public function getMovie(int $id) {
        $client = new Client([
            'verify' => false
        ]);


        $response = $client->request('GET', 'https://api.themoviedb.org/3/movie/' . $id . '?append_to_response=credits&language=fr-FR', [
            'headers' => [
                'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIxMTMwYTY4OWQwNTlmNzZmZTc0MDczNjZmMWU0OWIxYyIsInN1YiI6IjU5YTc0MTg3YzNhMzY4M2QwNzAwNTRlNiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.rk7_VC1cbfkTRWny38IpYSmADc4p2hSmp9c_5Qikcf0',
                'accept' => 'application/json',
            ],
        ]);

        return json_decode($response->getBody());
    }

    public function getActorAndCredits(int $id) {
        $client = new Client([
            'verify' => false
        ]);


        $response = $client->request('GET', 'https://api.themoviedb.org/3/person/' . $id . '?append_to_response=combined_credits&language=fr-FR', [
            'headers' => [
                'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIxMTMwYTY4OWQwNTlmNzZmZTc0MDczNjZmMWU0OWIxYyIsInN1YiI6IjU5YTc0MTg3YzNhMzY4M2QwNzAwNTRlNiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.rk7_VC1cbfkTRWny38IpYSmADc4p2hSmp9c_5Qikcf0',
                'accept' => 'application/json',
            ],
        ]);

        return json_decode($response->getBody());
    }
}
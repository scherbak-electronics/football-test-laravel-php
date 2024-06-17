<?php

namespace App\Services;

use GuzzleHttp\Client;

class FootballService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://api-football.com/',
            'headers' => [
                'X-RapidAPI-Key' => env('API_FOOTBALL_KEY'),
                'X-RapidAPI-Host' => 'api-football.com'
            ]
        ]);
    }

    public function getLeagues()
    {
        $response = $this->client->get('leagues');
        return json_decode($response->getBody()->getContents(), true);
    }

    public function getMatches($leagueId)
    {
        $response = $this->client->get("fixtures?league={$leagueId}&upcoming=10");
        return json_decode($response->getBody()->getContents(), true);
    }

    public function getOdds($matchId)
    {
        $response = $this->client->get("odds?fixture={$matchId}");
        return json_decode($response->getBody()->getContents(), true);
    }
}

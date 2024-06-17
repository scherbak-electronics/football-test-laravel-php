<?php

namespace App\Http\Controllers;

use App\Services\FootballService;
use App\Models\League;

class MatchController extends Controller
{
    protected $footballService;

    public function __construct(FootballService $footballService)
    {
        $this->footballService = $footballService;
    }

    public function index()
    {
        $leagues = League::where('status', 'published')->get();
        $matches = [];
        foreach ($leagues as $league) {
            $matches = array_merge($matches, $this->footballService->getMatches($league->league_service_id));
        }
        return view('matches.index', compact('matches'));
    }
}

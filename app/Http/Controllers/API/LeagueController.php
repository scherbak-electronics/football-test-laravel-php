<?php
// app/Http/Controllers/API/LeagueController.php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\League;
use Illuminate\Http\Request;

class LeagueController extends Controller
{
    public function index()
    {
        return League::where('status', 'published')->get();
    }

    public function store(Request $request)
    {
        $league = League::create($request->all());
        return response()->json($league, 201);
    }

    public function show($id)
    {
        return League::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $league = League::findOrFail($id);
        $league->update($request->all());
        return response()->json($league, 200);
    }

    public function destroy($id)
    {
        League::destroy($id);
        return response()->json(null, 204);
    }
}

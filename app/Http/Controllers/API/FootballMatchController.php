<?php
// app/Http/Controllers/API/FootballMatchController.php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\FootballMatch;
use Illuminate\Http\Request;

class FootballMatchController extends Controller
{
    public function index()
    {
        return FootballMatch::all();
    }

    public function store(Request $request)
    {
        $match = FootballMatch::create($request->all());
        return response()->json($match, 201);
    }

    public function show($id)
    {
        return FootballMatch::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $match = FootballMatch::findOrFail($id);
        $match->update($request->all());
        return response()->json($match, 200);
    }

    public function destroy($id)
    {
        FootballMatch::destroy($id);
        return response()->json(null, 204);
    }
}

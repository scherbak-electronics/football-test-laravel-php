<?php
// app/Models/FootballMatch.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FootballMatch extends Model
{
    use HasFactory;

    protected $fillable = ['start_date', 'league_name', 'home_team_name', 'away_team_name', 'home_team_logo', 'away_team_logo', 'odds'];
}

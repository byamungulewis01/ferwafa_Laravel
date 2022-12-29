<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Team;

class Calender extends Model
{
    
    use HasFactory;
    protected $table = 'calender';
    protected $fillable = [
        'home',
        'away',
        'week',
        'stadium',
        'date',
        'time',
    ];
    public function homelogo()
    {
       return $this->belongsTo(Team::class, 'home','name');
    }
    public function awaylogo()
    {
       return $this->belongsTo(Team::class,'away','name');
    }
}

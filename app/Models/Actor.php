<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;

    protected $fillable = ['e_id', 'name', 'image'];


    public function genres()
    {
        return $this->belongsToMany(Genere::class,'genere_movie','genre_id','movie_id');

    }// end of Movie

    public function moives()
    {
        return $this->belongsToMany(Moive::class,'movie_actor','movie_id','actor_id');

    }// end of Movie
}



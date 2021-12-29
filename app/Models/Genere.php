<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genere extends Model
{
    use HasFactory;

    protected $fillable = ['e_id', 'name'];

    //attr
    //scope

    //rel
    public function genres()
    {
        return $this->belongsToMany(Movie::class,'genere_movie','genre_id','movie_id');

    }// end of Movie
}




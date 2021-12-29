<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'e_id',
        'original_language',
        'original_title',
        'overview',
        'popularity',
        'poster_path',
        'release_date',
        'title',
        'video',
        'vote_average',
        'vote_count',
    ];


    // public function genress()
    // {
    //     return $this->belongsToMany(Genere::class,'genere_movie','movie_id');
    // }

    public function genres()
    {
        return $this->belongsToMany(Genere::class,'genere_movie','genre_id','movie_id');

    }// end of Movie
}

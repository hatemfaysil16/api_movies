<?php

namespace App\Console\Commands;

use App\Models\Genere;
use App\Models\Movie;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GetGenres extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:genere';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $this->getprivaed();
        $this->getpublic();


    }

    public function getprivaed()
    {

        $response = Http::get(config('services.tmbd.base_url').'genre/movie/list?api_key='.config('services.tmbd.api_key'));



        foreach($response->json()['genres'] as $gener){
            Genere::create([
                'e_id'=>$gener['id'],
                'name'=>$gener['name'],
            ]);
        }
    }

    public function getpublic()
    {

        $response = Http::get('https://api.themoviedb.org/3/movie/popular?api_key=9f08afb5ea281633e16b760d2fe238a2&language=en-US&page=1');



        foreach($response->json()['results'] as $result){

            // dd($result);
           $Movie = Movie::create([
                'e_id'=>$result['id'],
                'original_language'=>$result['original_language'],
                'original_title'=>$result['original_title'],
                'overview'=>$result['overview'],
                'popularity'=>$result['popularity'],
                'poster_path'=>$result['poster_path'],
                'release_date'=>$result['release_date'],
                'title'=>$result['title'],
                'video'=>$result['video'],
                'vote_average'=>$result['vote_average'],
                'vote_count'=>$result['vote_count'],
            ]);



            foreach ($result['genre_ids'] as $generId) {


                $generes = Genere::where('e_id',$generId)->first();
                $Movie->genres()->attach($generId);


            }
        }


    }
}







<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class hatem extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'c:d';

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
        // dd(config('services.tmbd.base_url'));

        $response = Http::get(config('services.tmbd.base_url').'genre/movie/list?api_key='.config('services.tmbd.api_key'));

        // foreach ($response->json()['genere'] as $genre) {
        //     Genere::create([
        //       'name'=>$genre
        //   ]);

        // };

        dd($response->json()['genres']);


    }
}

<?php

namespace App\Console\Commands;

use App\Imports\AirportImport;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ImportCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-airport';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Imports data from csv to database';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $files = Storage::disk('airports')->allFiles();

        foreach($files as $file){
            $csv = new AirportImport();
            $csv->import($file,'airports');

            $this->info('Process was finsihed');
            $this->info('Go to http://127.0.0.1:8000/api/airports on postman with input json');
        }
    }
}

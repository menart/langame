<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class LoadNewsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'load:news';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'load news';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        return 0;
    }
}

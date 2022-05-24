<?php

namespace App\Console\Commands;

use App\Loaders\URLLoader;
use App\Parsers\HabrRSSParser;
use App\Repository\NewsRepository;
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
        $loader = new URLLoader();
        $habr = new HabrRSSParser();
        echo "Загружаем ...";
        $newsHabrDTO = $habr->parse($loader->load('https://habr.com/ru/rss/best/daily/?fl=ru'));
        echo "insert db ...";
        $newsRepository = new NewsRepository();
        foreach ($newsHabrDTO as $newsDTO){
            $newsRepository->new($newsDTO);
        }
        return 0;
    }
}

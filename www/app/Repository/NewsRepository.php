<?php

namespace App\Repository;

use App\DTO\NewsDTO;
use App\Models\News;

class NewsRepository
{
    public function new(NewsDTO $newsDTO)
    {
        $news = new News();
        $news->title = $newsDTO->title;
        $news->description = $newsDTO->description;
        $news->context = $newsDTO->context;
        $news->save();
        $news->categories()->attach(CategoryRepository::findCategory($newsDTO->categories));
    }
}

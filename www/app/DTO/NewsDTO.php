<?php

namespace App\DTO;

use App\Models\Category;

class NewsDTO
{
    public string $title;
    public string $description;
    public string $context;
    /**
     * @var Category[]
     */
    public array $categories;
}

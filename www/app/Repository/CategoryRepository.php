<?php

namespace App\Repository;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use function PHPUnit\Framework\isNull;

class CategoryRepository
{
    static Collection $categories;

    /**
     * @param string[] $category
     * @return Collection
     */
    public static function findCategory(array $categories): Collection
    {
        if(!isset(static::$categories))
            static::$categories = new Collection();

        $findCategories = new Collection();
        foreach (array_unique($categories) as $category) {
            $findCategory = static::$categories->firstWhere('title', $category);
            if (isNull($findCategory)) {
                $findCategory = Category::firstOrCreate(['title' => $category]);
                static::$categories->push($findCategory);
            }
            $findCategories->push($findCategory);
        }
        return $findCategories;
    }
}

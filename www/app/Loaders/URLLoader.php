<?php

namespace App\Loaders;

class URLLoader implements Loader
{

    public function load(string $path): string
    {
        return file_get_contents($path);
    }
}

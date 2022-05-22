<?php

namespace App\Loaders;

interface Loader
{
    public function load(string $path): string;
}

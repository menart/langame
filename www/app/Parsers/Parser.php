<?php

namespace App\Parsers;

use App\DTO\NewsDTO;

interface Parser
{
    /**
     * @return NewsDTO[]
     */
    function parse(string $rawText): array;
}

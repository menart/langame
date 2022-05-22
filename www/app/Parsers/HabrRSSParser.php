<?php

namespace App\Parsers;

use App\DTO\NewsDTO;
use App\Models\News;

class HabrRSSParser implements Parser
{

    /**
     * @param string $rawText
     * @return NewsDTO[]
     */
    function parse(string $rawText): array
    {
        $xml = new \SimpleXMLElement($rawText);
        $arrayNewsDTO = [];
        foreach ($xml->item as $item) {
            $newsDTO = new NewsDTO();
            $newsDTO->title = trim((string)$item->title);
            $newsDTO->description = trim((string)$item->description);
            $newsDTO->context = trim($this->getContext((string)$item->link));
            $newsDTO->categories = [];
            foreach ($item->category as $category) {
                $newsDTO->categories[] = (string)$category;
            }
            $arrayNewsDTO[] = $newsDTO;
        }
        return $arrayNewsDTO;
    }

    private function getContext(string $url): string
    {
        $rawHTML = file_get_contents($url);
        $domDocument = new \DOMDocument();
        $domDocument->loadHTML($rawHTML);
        return $domDocument->getElementById("post-content-body")->textContent;
    }
}

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
        foreach ($xml->channel->item as $item) {
            $newsDTO = new NewsDTO();
            $newsDTO->title = trim((string)$item->title);
            $newsDTO->description = trim((string)$item->description);
            $newsDTO->context = trim($this->getContext((string)$item->link));
            $categories = [];
            foreach ($item->category as $category) {
                $categories[] = (string)$category;
            }
            $newsDTO->categories = array_unique($categories);
            $arrayNewsDTO[] = $newsDTO;
        }
        return $arrayNewsDTO;
    }

    private function getContext(string $url): string
    {
        libxml_use_internal_errors(true);
        $domDocument = new \DOMDocument();
        $domDocument->loadHTMLFile($url);
        libxml_use_internal_errors(false);
        $pattern = '/<a href="https:\/\/habr.com\/ru([^"]*)<\/a>/';
        $result = $domDocument->getElementById("post-content-body")->C14N();
        return preg_replace($pattern, '', $result);;
    }
}

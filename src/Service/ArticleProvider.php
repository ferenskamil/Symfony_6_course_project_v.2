<?php

namespace App\Service;

class ArticleProvider
{
    public function transformDataForTwig(array $articles) : array
    {
        $transformedData['articles'] = [];

        foreach ($articles as $article) {
            $transformedData['articles'][] = [
                'title' => $article->getTitle(),
                'content' => substr($article->getContent() , 0 , 30) . '...',
                'link' => "article/{$article->getId()}"
            ];
        }

        return $transformedData;
    }
}

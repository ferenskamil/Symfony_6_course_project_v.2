<?php

namespace App\Service;

use App\Service\ImageProvider;

class ArticleProvider
{
    public function __construct(
        private ImageProvider $imageProvider
    )
    {
    }

    public function transformDataForTwig(array $articles) : array
    {
        $transformedData['articles'] = [];

        foreach ($articles as $article) {

            $images = $article->getImages()->toArray();

            $transformedData['articles'][] = [
                'title' => $article->getTitle(),
                'content' => substr($article->getContent() , 0 , 30) . '...',
                'link' => "article/{$article->getId()}",
                'addedAt' => $article->getAddedAt(),
                'images' => $this->imageProvider->transformDataForTwig($images)
            ];
        }

        return $transformedData;
    }
}

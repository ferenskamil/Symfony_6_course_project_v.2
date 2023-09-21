<?php

namespace App\Service;

use App\Entity\Article;
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
            $transformedData['articles'][] = $this->prepareOneArticle($article , true);
        }

        return $transformedData;
    }

    public function prepareOneArticle(Article $article , bool $shortenContent = false) : array
    {
        $images = $article->getImages()->toArray();

        $content = $article->getContent();
        if ($shortenContent) $content = substr($content, 0, 30);

        return [
            'title' => $article->getTitle(),
            'content' => $content,
            'link' => "article/{$article->getId()}",
            'addedAt' => $article->getAddedAt(),
            'images' => $this->imageProvider->transformDataForTwig($images)
        ];
    }
}

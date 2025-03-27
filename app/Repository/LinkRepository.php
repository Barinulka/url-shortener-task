<?php

namespace App\Repository;

use App\Interface\LinkRepositoryInterface;
use App\Models\Link;

class LinkRepository implements LinkRepositoryInterface
{

    public function __construct(
        private Link $model,
    ) {
    }

    public function create(array $data): Link
    {
        return $this->model->create([
            'original_url' => $data['original_url'],
            'short_url' => $data['short_url'],
            'user_id' => $data['user_id'],
        ]);
    }

    public function countByShortUrl(string $sortUrl): int
    {
        return $this->model->where('short_url', $sortUrl)->count();
    }

    public function getByShortUrl(string $shortUrl): ?Link
    {
        return $this->model->where('short_url', $shortUrl)->first();
    }

    public function createClick(string $shortUrl, array $clickData): void
    {
        $link = $this->getByShortUrl($shortUrl);
        $link->clicks()->create($clickData);
    }
}

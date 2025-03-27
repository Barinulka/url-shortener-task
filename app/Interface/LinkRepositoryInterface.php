<?php

namespace App\Interface;

use App\Models\Link;

interface LinkRepositoryInterface
{
    public function create(array $data): Link;
    public function countByShortUrl(string $sortUrl): int;
    public function getByShortUrl(string $shortUrl): ?Link;
    public function createClick(string $shortUrl, array $clickData): void;
}

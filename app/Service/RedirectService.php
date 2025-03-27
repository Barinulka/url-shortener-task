<?php

namespace App\Service;

use App\Interface\LinkRepositoryInterface;
use App\Interface\RedirectServiceInterface;
use App\Models\Link;

class RedirectService implements RedirectServiceInterface
{

    public function __construct(
        private LinkRepositoryInterface $repository,
    ) {
    }

    public function getLinkByCode(string $code): Link
    {
        return $this->repository->getByShortUrl($code);
    }

    public function saveData(string $shortUrl): void
    {
        $data =  [
            "user_ip" => request()->ip(),
            "user_agent" => request()->userAgent(),
        ];

        $this->repository->createClick($shortUrl, $data);
    }
}

<?php

namespace App\Service;

use App\Exceptions\GenerateShortUrlException;
use App\Helper\ShortUrlGenerator;
use App\Interface\LinkRepositoryInterface;
use App\Interface\LinkServiceInterface;

class LinkService implements LinkServiceInterface
{
    public function __construct(
        private LinkRepositoryInterface $repository,
        private ShortUrlGenerator $generator
    ) {
    }

    /**
     * @throws GenerateShortUrlException
     */
    public function create(array $data): array
    {
        $shortUrl = $this->generate();

        if (empty($shortUrl)) {
            throw new GenerateShortUrlException();
        }

        $user = auth()->user();

        $link = $this->repository->create(['original_url' => $data['url'], 'short_url' => $shortUrl, 'user_id' => $user->id]);

        return ['short_url' => url("/{$link->short_url}")];
    }

    private function generate(): string
    {
        $result = $this->generator->generate();

        if (0 !== $this->repository->countByShortUrl($result)) {
            $this->generate();
        }

        return $result;
    }
}

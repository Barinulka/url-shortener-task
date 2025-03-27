<?php

namespace App\Interface;

use App\Models\Link;

interface RedirectServiceInterface
{
    public function getLinkByCode(string $code): ?Link;
    public function saveData(string $shortUrl): void;
}

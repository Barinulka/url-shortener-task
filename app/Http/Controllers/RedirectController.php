<?php

namespace App\Http\Controllers;

use App\Interface\RedirectServiceInterface;
use Illuminate\Http\RedirectResponse;

class RedirectController extends Controller
{
    public function __construct(
        private RedirectServiceInterface $service,
    ) {
    }

    public function redirect(string $shortUrl): RedirectResponse
    {
        $link = $this->service->getLinkByCode($shortUrl);

        if (!$link) {
            abort(404, 'Страница не найдена');
        }

        $this->service->saveData($shortUrl);

        return redirect()->away($link->original_url);
    }
}

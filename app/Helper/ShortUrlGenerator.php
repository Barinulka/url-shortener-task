<?php

namespace App\Helper;

final class ShortUrlGenerator
{
    private const CHARACTERS = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    public function generate(int $stringLength = 8): string
    {
        $length = strlen(self::CHARACTERS);
        $code = '';
        for ($j = 0; $j < $stringLength; $j++) {
            $code = self::CHARACTERS[rand(0, $length - 1)] . $code;
        }

        return $code;
    }
}

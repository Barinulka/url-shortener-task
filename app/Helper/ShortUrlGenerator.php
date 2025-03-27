<?php

namespace App\Helper;

final class ShortUrlGenerator
{
    private const CHARACTERS = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    public function generate(): \Generator
    {
        $length = strlen(self::CHARACTERS);

        for ($i = 0; $i < pow($length, 2); $i++) {
            $code = '';
            $temp = $i;

            for ($j = 0; $j < 15; $j++) {
                $code = self::CHARACTERS[rand(0, $length - 1)] . $code;
            }

            yield $code;
        }
    }
}

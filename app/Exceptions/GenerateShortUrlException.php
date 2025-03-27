<?php

namespace App\Exceptions;

use Exception;

class GenerateShortUrlException extends Exception
{
    protected $message = "Не удалось сгенерировать короткую ссылку";
    protected $code = 500;
}

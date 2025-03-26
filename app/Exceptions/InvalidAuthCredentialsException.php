<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class InvalidAuthCredentialsException extends Exception
{
    protected $message = 'Неправильные данные для входа';
    protected $code = Response::HTTP_UNAUTHORIZED;
}

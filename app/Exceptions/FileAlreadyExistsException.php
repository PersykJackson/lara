<?php

namespace App\Exceptions;

use Exception;

class FileAlreadyExistsException extends Exception
{
    protected $message = 'File already exists!';
}

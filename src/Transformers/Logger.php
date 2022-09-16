<?php

namespace App\Transformers;

class Logger
{
    public function logTOFile(string $message): void
    {
        error_log($message , 3 ,'../log.info');
    }
}
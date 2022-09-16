<?php

namespace App;

use App\Transformers\Logger;

class Master
{
    private \Itransform $capitalEveryOther;
    private \Itransform $spaceToDash;
    private Logger $logger;

    public function __construct(\Itransform $capitalEveryOther , \Itransform $spaceToDash , Logger $logger)
    {
        $this->capitalEveryOther = $capitalEveryOther;
        $this->spaceToDash = $spaceToDash;
        $this->logger = $logger;
    }

    public function logMessage ($message) : void{
        $this->logger->logTOFile($message);
    }

    public function echoMessage($message): void{
        $space = $this->spaceToDash->transform($message);
        $cap = $this->capitalEveryOther->transform($message);
        echo $space;
        echo $cap;
    }
}
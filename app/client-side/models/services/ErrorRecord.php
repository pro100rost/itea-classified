<?php

namespace ClientModels\services;

use Common\exceptions\NotFoundHttpException;

class ErrorRecord extends \Exception
{
    public function recordError()
    {
        $filename = __DIR__ . '/../../../../configs/error.log';
        $data = new NotFoundHttpException();
        file_put_contents($filename, date("d-m-Y H:i:s") . ' -> ' . $data . PHP_EOL, FILE_APPEND);
    }
}
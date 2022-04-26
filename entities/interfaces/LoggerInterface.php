<?php

class LoggerInterface {
    public function logMessage($log)
    {
        $log = error_reporting(E_ALL);
        ini_set('Display_errors', 1);
        file_put_contents(__DIR__ . '/log.txt', $log . PHP_EOL , FILE_APPEND);
    }

    public function lastMessages($list)
    {
        $list = file_get_contents('/log.txt');
        return $list;
    }
}

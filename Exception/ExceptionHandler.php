<?php

class ExceptionHandler
{
    public static function handle(Exception $exception)
    {
        echo $exception->getMessage() . "\n";
    }
}
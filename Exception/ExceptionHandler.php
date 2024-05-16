<?php

class ExceptionHandler
{
    /**
     * @param Exception $exception
     * @return void
     */
    public static function handle(Exception $exception): void
    {
        echo $exception->getMessage() . "\n";
    }
}
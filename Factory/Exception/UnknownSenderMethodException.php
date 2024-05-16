<?php

class UnknownSenderMethodException extends Exception
{
    /**
     * @var string
     */
    protected $message = 'invalid sender type';
}
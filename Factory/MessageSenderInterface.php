<?php

interface MessageSenderInterface
{
    /**
     * @param GetActivityResponse $activityResponse
     * @return void
     */
    public function send(GetActivityResponse $activityResponse): void;
}
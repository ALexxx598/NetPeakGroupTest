<?php

require_once "MessageSender.php";

class ConsoleMessageSender extends MessageSender
{
    /**
     * @inheritDoc
     */
    public function send(GetActivityResponse $activityResponse): void
    {
        echo $this->makeMessageFromActivityResponse($activityResponse) . "\n";
    }
}
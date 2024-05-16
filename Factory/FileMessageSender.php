<?php

require_once "MessageSender.php";

class FileMessageSender extends MessageSender
{
    /**
     * @inheritDoc
     */
    public function send(GetActivityResponse $activityResponse): void
    {
        file_put_contents("activity.txt", $this->makeMessageFromActivityResponse($activityResponse));
        echo "check file activity.txt \n";
    }
}
<?php

require_once "MessageSenderInterface.php";

abstract class MessageSender implements MessageSenderInterface
{
    /**
     * @param GetActivityResponse $activityResponse
     * @return string
     */
    protected function makeMessageFromActivityResponse(GetActivityResponse $activityResponse): string
    {
        return implode("\n", [
            'activity' => "Activity - " . $activityResponse->getActivity(),
            'type' => 'Type - ' . $activityResponse->getType()->value,
            'participants' => 'Participants - ' . $activityResponse->getParticipants(),
            'price' => 'Price - ' . $activityResponse->getPrice(),
            'link' => 'Link - ' . (empty($activityResponse->getLink()) ? 'Not data' : $activityResponse->getLink()),
            'key' => 'Key - ' . $activityResponse->getKey(),
            'accessibility' => 'Accessibility - ' . $activityResponse->getAccessibility(),
        ]);
    }
}
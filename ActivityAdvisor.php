<?php

require_once "./BorderApi/BorderApiInterface.php";
require_once "./Factory/MessageSenderFactoryInterface.php";
require_once "ActivityAdvisorInterface.php";

class ActivityAdvisor implements ActivityAdvisorInterface
{
    /**
     * @param BorderApiInterface $borderApi
     * @param MessageSenderFactoryInterface $messageSenderFactory
     */
    public function __construct(
        private BorderApiInterface $borderApi,
        private MessageSenderFactoryInterface $messageSenderFactory
    ) {
    }

    /**
     * @inheritDoc
     */
    public function advise(int $participants, HolidayType $type, SenderType $sender): void
    {
        $activityResponse = $this->borderApi->getActivity($participants, $type);

        $this->messageSenderFactory->make($sender)->send($activityResponse);
    }
}
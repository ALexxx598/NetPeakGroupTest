<?php

interface ActivityAdvisorInterface
{
    /**
     * @param int $participants
     * @param HolidayType $type
     * @param SenderType $sender
     * @return void
     * @throws UnknownSenderMethodException
     */
    public function advise(int $participants, HolidayType $type, SenderType $sender): void;
}
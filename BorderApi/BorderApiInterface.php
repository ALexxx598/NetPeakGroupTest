<?php

interface BorderApiInterface
{
    /**
     * @param int $participants
     * @param HolidayType $type
     * @return GetActivityResponse
     */
    public function getActivity(int $participants, HolidayType $type): GetActivityResponse;
}
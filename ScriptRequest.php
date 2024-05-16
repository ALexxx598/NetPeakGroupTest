<?php

require_once "Exception/ValidationException.php";
require_once "SenderType.php";
require_once "HolidayType.php";

class ScriptRequest
{
    private function __construct(
        private int $participants,
        private HolidayType $holidayType,
        private SenderType $senderType,
    ) {
    }

    public static function make(
        array $argv
    ): self {
        self::validate($argv);

        return new self(
            participants: $argv[1],
            holidayType: HolidayType::from($argv[2]),
            senderType: SenderType::from($argv[3])
        );
    }

    public function getParticipants(): int
    {
        return $this->participants;
    }

    public function getHolidayType(): HolidayType
    {
        return $this->holidayType;
    }

    public function getSenderType(): SenderType
    {
        return $this->senderType;
    }

    private static function validate(array $argv): void
    {
        $participants = intval($argv[1] ?? null);
        $holidayType = $argv[2] ?? null;
        $senderType = $argv[3] ?? null;

        if (empty($participants)) {
            throw new ValidationException("participants must present");
        }

        if ($participants >= 8 || $participants <= 0) {
            throw new ValidationException("participants must be greater than 0 and less than or equal to 8");
        }

        if (empty($holidayType) || HolidayType::tryFrom($holidayType) === null) {
            throw new ValidationException(
                sprintf("holidayType must present and be one of %s.", implode(", ",HolidayType::cases()))
            );
        }

        if (empty($senderType) || SenderType::from($senderType) === null) {
            throw new ValidationException(
                sprintf("senderType must present and be one of %s.", implode(", ",SenderType::cases()))
            );
        }
    }
}
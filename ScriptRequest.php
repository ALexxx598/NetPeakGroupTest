<?php

require_once "Exception/ValidationException.php";
require_once "SenderType.php";
require_once "HolidayType.php";

class ScriptRequest
{
    /**
     * @param int $participants
     * @param HolidayType $holidayType
     * @param SenderType $senderType
     */
    private function __construct(
        private int $participants,
        private HolidayType $holidayType,
        private SenderType $senderType,
    ) {
    }

    /**
     * @param array $argv
     * @return self
     * @throws ValidationException
     */
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

    /**
     * @return int
     */
    public function getParticipants(): int
    {
        return $this->participants;
    }

    /**
     * @return HolidayType
     */
    public function getHolidayType(): HolidayType
    {
        return $this->holidayType;
    }

    /**
     * @return SenderType
     */
    public function getSenderType(): SenderType
    {
        return $this->senderType;
    }

    /**
     * @param array $argv
     * @return void
     * @throws ValidationException
     */
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
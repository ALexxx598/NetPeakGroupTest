<?php

enum HolidayType: string
{
    case EDUCATION = "education";
    case RECREATIONAL = "recreational";
    case SOCIAL = "social";
    case DIY = "diy";
    case CHARITY = "charity";
    case COOKING = "cooking";
    case RELAXATION = "relaxation";
    case MUSIC = "music";
    case BUSYWORK = "busywork";

    /**
     * @return HolidayType[]
     */
    public static function getTypes(): array
    {
        return [
            self::BUSYWORK->value,
            self::MUSIC->value,
            self::RELAXATION->value,
            self::CHARITY->value,
            self::COOKING->value,
            self::DIY->value,
            self::SOCIAL->value,
            self::EDUCATION->value,
            self::RECREATIONAL->value
        ];
    }
}
<?php

enum SenderType: string
{
    case CONSOLE = "console";
    case FILE = "file";

    /**
     * @return SenderType[]
     */
    public static function getTypes(): array
    {
        return [
            self::CONSOLE->value, self::FILE->value
        ];
    }
}
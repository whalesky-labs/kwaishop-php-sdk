<?php

declare(strict_types=1);

namespace Kwaishop\PhpSdk\Support;

final class Clock
{
    public static function currentMilliseconds(): string
    {
        return (string) (int) floor(microtime(true) * 1000);
    }
}

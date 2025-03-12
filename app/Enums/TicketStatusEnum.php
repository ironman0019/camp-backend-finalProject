<?php

namespace App\Enums;

use Illuminate\Support\Arr;

enum TicketStatusEnum: int
{
    case OPEN = 0;
    case CLOSED = 1;

    public function getLabel(): ?string
    {
        return match ($this) {
            self::OPEN => 'باز',
            self::CLOSED => 'بسته شده',
            default => 'نا معتبر',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::OPEN => 'fa-times',
            self::CLOSED => 'fa-check',
        };
    }

    public static function getBy(string|int|null $value): ?self
    {
        if (is_null($value)) {
            return null;
        }
        return Arr::first(self::cases(), static fn($case): bool => $case->value == $value);
    }


}

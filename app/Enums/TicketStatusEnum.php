<?php

namespace App\Enums;

use Illuminate\Support\Arr;

enum TicketStatusEnum: int
{
    case UNSEEN = 0;
    case SEEN = 1;
    case CLOSED = 2;

    public function getLabel(): ?string
    {
        return match ($this) {
            self::UNSEEN => 'مشاهده نشده',
            self::SEEN => 'مشاهده شده',
            self::CLOSED => 'بسته شده',
            default => 'نا معتبر',
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

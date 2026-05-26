<?php

namespace VoicecodeBv\NativephpBadge\Facades;

use Illuminate\Support\Facades\Facade;
use VoicecodeBv\NativephpBadge\NativeBadge as NativeBadgeService;

/**
 * @see NativeBadgeService
 */
class NativeBadge extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return NativeBadgeService::class;
    }
}

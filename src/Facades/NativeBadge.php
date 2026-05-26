<?php

namespace VoicecodeBv\NativeBadge\Facades;

use Illuminate\Support\Facades\Facade;
use VoicecodeBv\NativeBadge\NativeBadge as NativeBadgeService;

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

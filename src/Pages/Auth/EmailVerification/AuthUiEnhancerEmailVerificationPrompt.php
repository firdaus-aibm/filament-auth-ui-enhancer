<?php

namespace DiogoGPinto\AuthUIEnhancer\Pages\Auth;

use DiogoGPinto\AuthUIEnhancer\Pages\Auth\Concerns\HasCustomLayout;
use Filament\Pages\Auth\EmailVerification\EmailVerificationPrompt;

class AuthUiEnhancerEmailVerificationPrompt extends EmailVerificationPrompt
{
    use HasCustomLayout;
}

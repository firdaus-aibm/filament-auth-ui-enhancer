<?php

namespace DiogoGPinto\AuthUIEnhancer;

use DiogoGPinto\AuthUIEnhancer\Concerns\BackgroundAppearance;
use DiogoGPinto\AuthUIEnhancer\Concerns\FormPanelWidth;
use DiogoGPinto\AuthUIEnhancer\Concerns\FormPosition;
use DiogoGPinto\AuthUIEnhancer\Concerns\MobileFormPosition;
use DiogoGPinto\AuthUIEnhancer\Pages\Auth\Login;
use Filament\Contracts\Plugin;
use Filament\Panel;
use Filament\Support\Facades\FilamentView;
use Filament\View\PanelsRenderHook;

class AuthUIEnhancerPlugin implements Plugin
{
    use BackgroundAppearance;
    use FormPanelWidth;
    use FormPosition;
    use MobileFormPosition;

    public function getId(): string
    {
        return 'filament-auth-ui-enhancer';
    }

    public function register(Panel $panel): void
    {
        $panel
            ->login(Login::class);
    }

    public function boot(Panel $panel): void
    {
        FilamentView::registerRenderHook(
            PanelsRenderHook::HEAD_END,
            function () {
                return '<style>
                            :root {
                                --form-width: ' . $this->getFormPanelWidth() . ';
                            }
                        </style>';
            }
        );
    }

    public static function make(): static
    {
        return app(static::class);
    }
}

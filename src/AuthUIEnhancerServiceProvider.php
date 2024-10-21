<?php

namespace DiogoGPinto\AuthUIEnhancer;

use DiogoGPinto\AuthUIEnhancer\Commands\AuthUIEnhancerCommand;
use DiogoGPinto\AuthUIEnhancer\Testing\TestsAuthUIEnhancer;
use Filament\Support\Assets\Asset;
use Filament\Support\Assets\Css;
use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
use Livewire\Features\SupportTesting\Testable;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class AuthUIEnhancerServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-auth-ui-enhancer';

    public static string $viewNamespace = 'filament-auth-ui-enhancer';

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package->name(static::$name)
            ->hasCommands($this->getCommands())
            ->hasInstallCommand(function (InstallCommand $command) {
                $command
                    ->publishConfigFile()
                    ->publishMigrations()
                    ->askToRunMigrations()
                    ->askToStarRepoOnGitHub('diogogpinto/filament-auth-ui-enhancer');
            });

        if (file_exists($package->basePath('/../resources/lang'))) {
            $package->hasTranslations();
        }

        if (file_exists($package->basePath('/../resources/views'))) {
            $package->hasViews(static::$viewNamespace);
        }
    }

    public function packageRegistered(): void {}

    public function packageBooted(): void
    {
        // Asset Registration
        FilamentAsset::register(
            $this->getAssets(),
            $this->getAssetPackageName()
        );

        // Testing
        Testable::mixin(new TestsAuthUIEnhancer);
    }

    protected function getAssetPackageName(): ?string
    {
        return 'diogogpinto/filament-auth-ui-enhancer';
    }

    /**
     * @return array<Asset>
     */
    protected function getAssets(): array
    {
        return [
            //            Css::make('filament-auth-ui-enhancer-styles', __DIR__ . '/../resources/dist/filament-auth-ui-enhancer.css'),
            //            Js::make('filament-auth-ui-enhancer-scripts', __DIR__ . '/../resources/dist/filament-auth-ui-enhancer.js'),
        ];
    }

    /**
     * @return array<class-string>
     */
    protected function getCommands(): array
    {
        return [
            AuthUIEnhancerCommand::class,
        ];
    }
}

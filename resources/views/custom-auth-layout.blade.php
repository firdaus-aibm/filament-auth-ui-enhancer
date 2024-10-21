@php
    $formPosition = filament('filament-auth-ui-enhancer')->getFormPosition();
    $mobileFormPosition = filament('filament-auth-ui-enhancer')->getMobileFormPosition();
    $emptyPanelBackgroundImage = filament('filament-auth-ui-enhancer')->getEmptyPanelBackgroundImage();
    $emptyPanelBackgroundImageOpacity = filament('filament-auth-ui-enhancer')->getEmptyPanelBackgroundImageOpacity();
    $showEmptyPanelOnMobile = filament('filament-auth-ui-enhancer')->getShowEmptyPanelOnMobile();
@endphp
<x-filament-panels::layout.base :livewire="$livewire">
    <div
        @class([
          'custom-auth-wrapper flex w-full min-h-screen',
          'lg:flex-row-reverse' => $formPosition === 'left',
          'lg:flex-row' => $formPosition === 'right',
          'flex-col' => $mobileFormPosition === 'bottom' && $showEmptyPanelOnMobile,
          'flex-col-reverse' => $mobileFormPosition === 'top' && $showEmptyPanelOnMobile,
        ])
    >
        <!-- Empty Container -->
        <div @class([
            'custom-auth-empty-panel relative justify-center px-4',
            'bg-[var(--empty-panel-background-color)]',
            'hidden lg:flex lg:flex-col lg:flex-grow' => $showEmptyPanelOnMobile === false,
            'flex flex-col flex-grow' => $showEmptyPanelOnMobile === true
            ])
        >
            @if($emptyPanelBackgroundImage)
                <div class="absolute inset-0 h-full w-full bg-cover bg-center"
                     style="background-image: url('{{ $emptyPanelBackgroundImage }}'); opacity: {{ $emptyPanelBackgroundImageOpacity }}; background-position: center;">
                </div>
            @endif
        </div>

        <!-- Form Container -->
        <div class="custom-auth-form-panel flex flex-col justify-center px-4 py-12 sm:px-6 lg:px-20 xl:px-36 w-full lg:w-[var(--form-panel-width)] bg-[var(--form-panel-background-color)]">
            <div class="custom-auth-form-wrapper mx-auto w-full max-w-sm">
                {{ $slot }}
            </div>
        </div>

    </div>
</x-filament-panels::layout.base>

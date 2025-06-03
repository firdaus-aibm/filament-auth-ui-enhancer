@php
    $formPanelPosition = filament('filament-auth-ui-enhancer')->getFormPanelPosition();
    $mobileFormPanelPosition = filament('filament-auth-ui-enhancer')->getMobileFormPanelPosition();
    $emptyPanelBackgroundImageUrl = filament('filament-auth-ui-enhancer')->getEmptyPanelBackgroundImageUrl();
    $emptyPanelBackgroundImageOpacity = filament('filament-auth-ui-enhancer')->getEmptyPanelBackgroundImageOpacity();
    $showEmptyPanelOnMobile = filament('filament-auth-ui-enhancer')->getShowEmptyPanelOnMobile();
    $emptyPanelView = filament('filament-auth-ui-enhancer')->getEmptyPanelView();
@endphp
<x-filament-panels::layout.base :livewire="$livewire">
  <nav x-data="{ mobileMenuIsOpen: false }" x-on:click.away="mobileMenuIsOpen = false" class="flex items-center justify-between border-b border-neutral-300 px-6 py-4 dark:border-neutral-700" aria-label="penguin ui menu">
    <!-- Brand Logo -->
    <a href="#" class="text-2xl font-bold text-neutral-900 dark:text-white">
      <span><span class="text-black dark:text-white"></span></span>
      <!-- <img src="./your-logo.svg" alt="brand logo" class="w-10" /> -->
    </a>
    <!-- Desktop Menu -->
    <ul class="hidden items-center gap-4 md:flex">
      <li><a href="#" class="font-medium text-neutral-600 underline-offset-2 hover:text-black focus:outline-hidden focus:underline dark:text-neutral-300 dark:hover:text-white">Contact Us</a></li>
    </ul>
    <!-- Mobile Menu Button -->
    <button x-on:click="mobileMenuIsOpen = !mobileMenuIsOpen" x-bind:aria-expanded="mobileMenuIsOpen" x-bind:class="mobileMenuIsOpen ? 'fixed top-6 right-6 z-20' : null" type="button" class="flex text-neutral-600 dark:text-neutral-300 md:hidden" aria-label="mobile menu" aria-controls="mobileMenu">
      <svg x-cloak x-show="!mobileMenuIsOpen" xmlns="http://www.w3.org/2000/svg" fill="none" aria-hidden="true" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
      </svg>
      <svg x-cloak x-show="mobileMenuIsOpen" xmlns="http://www.w3.org/2000/svg" fill="none" aria-hidden="true" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
      </svg>
    </button>
    <!-- Mobile Menu -->
    <ul x-cloak x-show="mobileMenuIsOpen" x-transition:enter="transition motion-reduce:transition-none ease-out duration-300" x-transition:enter-start="-translate-y-full" x-transition:enter-end="translate-y-0" x-transition:leave="transition motion-reduce:transition-none ease-out duration-300" x-transition:leave-start="translate-y-0" x-transition:leave-end="-translate-y-full" id="mobileMenu" class="fixed max-h-svh overflow-y-auto inset-x-0 top-0 z-10 flex flex-col divide-y divide-neutral-300 rounded-b-sm border-b border-neutral-300 bg-neutral-50 px-6 pb-6 pt-20 dark:divide-neutral-700 dark:border-neutral-700 dark:bg-neutral-900 md:hidden">
      <li class="py-4"><a href="#" class="w-full text-lg font-medium text-neutral-600 focus:underline dark:text-neutral-300">Contact Us</a></li>
    </ul>
  </nav>

    <div
        @class([
          'custom-auth-wrapper flex w-full min-h-screen',
          'lg:flex-row-reverse' => $formPanelPosition === 'left',
          'lg:flex-row' => $formPanelPosition === 'right',
          'flex-col' => $mobileFormPanelPosition === 'bottom' && $showEmptyPanelOnMobile,
          'flex-col-reverse' => $mobileFormPanelPosition === 'top' && $showEmptyPanelOnMobile,
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
            @if($emptyPanelView)
                @include($emptyPanelView)
            @else
                @if($emptyPanelBackgroundImageUrl)
                    <div class="absolute inset-0 h-full w-full bg-cover bg-center"
                         style="background-image: url('{{ $emptyPanelBackgroundImageUrl }}'); opacity: {{ $emptyPanelBackgroundImageOpacity }}; background-position: center;">
                </div>
                @endif
            @endif
        </div>

        <!-- Form Container -->
        <div class="custom-auth-form-panel flex flex-col justify-center px-4 py-12 sm:px-6 lg:px-20 xl:px-36 w-full lg:w-[var(--form-panel-width)] bg-[var(--form-panel-background-color)]">
            <div class="mb-16 flex items-center justify-center">
              <span class="font-extrabold text-[#a5308a] text-3xl md:text-4xl">
                {{config('app.name')}}
              </span>
            </div>
          <div class="custom-auth-form-wrapper mx-auto w-full max-w-sm">
                {{ $slot }}
            </div>
        </div>

    </div>
    <!-- Footer starts here -->
  <!-- ========== FOOTER ========== -->
  <footer class="mt-auto bg-[#a5308a] w-full dark:bg-neutral-950">
    <div class="mt-auto w-full py-4 px-4 lg:pt-10 mx-auto">
      <!-- justify between -->
      <div class="grid grid-cols-2 gap-8 md:grid-cols-2">
        <div class="col-span-1">
          <a class="flex-none font-bold text-white focus:outline-hidden focus:opacity-80" href="#" aria-label="Brand">Terms and Conditions</a>
          <a class="flex-none font-bold text-white focus:outline-hidden focus:opacity-80" href="#" aria-label="Brand">Privacy Policy</a>
        </div>
        <!-- End Col -->


        <div class="col-span-1">
          <h4 class="font-base text-gray-100">Managed and Distributed by:</h4>

          {{--image--}}
          <div class="mt-3 grid space-y-3 mb-4">
            {{--svg--}}
            <p class="inline-flex gap-x-2 text-white hover:text-gray-200 focus:outline-hidden focus:text-gray-200 dark:text-neutral-400 dark:hover:text-neutral-200 dark:focus:text-neutral-200">
              <svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 434 56" width="279" height="36" fill="currentColor">
                <style>
                  .a {
                    fill: none;
                    stroke: #fefefe;
                    stroke-miterlimit: 10;
                    stroke-width: 2.9
                  }

                  .b {
                    fill: #495da9
                  }

                  .c {
                    fill: #f9a519
                  }

                  .d {
                    fill: #fefefe
                  }
                </style>
                <path class="a" d="m4.3 2.3h45.6c1.4 0 2.5 1.1 2.5 2.5v47.1c0 1.5-1.1 2.6-2.5 2.6h-45.6c-1.5 0-2.6-1.1-2.6-2.6v-47.1c0-1.4 1.1-2.5 2.6-2.5z" />
                <path class="b" d="m4.3 2.3h45.6c1.4 0 2.5 1.1 2.5 2.5v47.1c0 1.5-1.1 2.6-2.5 2.6h-45.6c-1.5 0-2.6-1.1-2.6-2.6v-47.1c0-1.4 1.1-2.5 2.6-2.5z" />
                <path class="c" d="m1.7 20h2.4c22 0 39.7-2.3 39.7-6.1 0-4.1-17.7-7.5-39.7-7.5h-2.4v-0.9c1.7-0.1 3.7 0.1 5.4 0.1 23.7 0 42.8 4.8 42.8 10.4 0 5.5-19.1 9.5-42.8 9.5-1.7 0-3.7 0-5.4-0.1z" />
                <path class="d" d="m17.7 35.7v2.4c1.3 0.2 3 0.3 5 0.3 0.3 0 0.8 0 1.1 0l-0.1-0.1v-0.2c0-0.1-0.1-0.6-0.1-1.1 0-3.8 3.1-6.8 6.7-6.8 3.8 0 6.8 3 6.8 6.8 0 3.7-3 6.8-6.8 6.8-2.9 0-5.1-1.7-6.2-4.2-0.5 0-1.1 0-1.6 0-1.8 0-3.4-0.1-4.8-0.3v3h6.3v1.3h-7.7v-4.6c-1.8-0.4-3-1-3-1.6 0-0.7 1-1.2 3-1.7v-4.3l-8.5 12.2h-1.8l9.2-13.1h8.8v1.4h-6.3v3.6c1.2-0.2 1.9-0.3 4.8-0.4 0 0 0.1 0 0.1 0.2 0 0 0 0.1-0.1 0.1 0 0-2.3-0.1-4.8 0.3z" />
                <path class="d" d="m48.1 30.5v13.1h-1.4l-7.5-10.6v10.6h-1.3v-13.1h1.3l7.5 10.7v-10.7z" />
                <path class="b" d="m16.4 37.9c-1.2-0.3-1.8-0.7-1.8-1 0-0.3 0.5-0.6 1.8-0.9v1.8z" />
                <path class="b" d="m30.4 31.6c2.9 0 5.3 2.4 5.4 5.4 0 3-2.4 5.5-5.4 5.5-2 0-3.9-1.2-4.8-3 3.5-0.4 6.2-1.2 6-2.2-0.1-1-2.7-1.8-5.9-2-0.2 0-0.2 0.1-0.2 0.1 0 0.1 0.2 0.1 0.2 0.1 4.8 0.4 4.6 1.4 4.6 1.4 0 0.6-1.9 1.2-5.1 1.4 0 0-0.7-2.4 1-4.6 0 0 1.4-2.1 4.2-2.1z" />
                <path class="d" d="m6 47.1h0.6v2.8h-0.6z" />
                <path class="d" d="m7.1 47.1h0.9l1.1 2.2v-2.2h0.5v2.8h-0.8l-1.1-2.4v2.4h-0.6z" />
                <path class="d" d="m10.7 49c0 0.1-0.1 0.5 0.5 0.5 0.3 0 0.5-0.1 0.5-0.4 0-0.2-0.2-0.3-0.5-0.4-0.7-0.1-1.1-0.3-1.1-0.8 0-0.5 0.4-0.9 1.1-0.9 0.3 0 0.7 0.1 0.9 0.3 0.2 0.3 0.2 0.5 0.2 0.6h-0.6c0-0.1-0.1-0.5-0.5-0.5-0.3 0-0.5 0.2-0.5 0.4 0 0.3 0.3 0.3 0.7 0.4 0.4 0.2 0.9 0.3 0.9 0.8 0 0.5-0.4 1-1.2 1-1.1 0-1.1-0.7-1.1-1z" />
                <path class="d" d="m13.4 47.1v1.7c0 0.3 0 0.7 0.6 0.7 0.1 0 0.4 0 0.5-0.3 0.1 0 0.1-0.2 0.1-0.4v-1.7h0.6v1.7c0 0.9-0.6 1.1-1.2 1.1-0.3 0-0.8 0-1.1-0.4-0.1-0.3-0.1-0.5-0.1-0.7v-1.7z" />
                <path fill-rule="evenodd" class="d" d="m15.8 47.1h1c0.4 0 0.7 0 0.9 0.2 0.2 0.1 0.3 0.3 0.3 0.5 0 0.5-0.5 0.6-0.6 0.7 0.4 0 0.4 0.3 0.5 0.6 0 0.4 0 0.5 0.1 0.6 0 0.1 0 0.1 0 0.2h-0.6c-0.1-0.2-0.1-0.9-0.2-1 0-0.2-0.2-0.2-0.3-0.2h-0.5v1.2h-0.6zm0.6 1.2h0.5c0 0 0.2 0 0.3-0.1 0 0 0.1-0.1 0.1-0.3 0-0.2-0.1-0.3-0.1-0.3-0.1-0.1-0.2-0.1-0.4-0.1h-0.4z" />
                <path fill-rule="evenodd" class="d" d="m19.9 47.1l1 2.8h-0.6l-0.2-0.6h-1.2l-0.2 0.6h-0.5l1-2.8zm0 1.7l-0.4-1.2-0.4 1.2z" />
                <path class="d" d="m21.2 47.1h0.9l1.1 2.2v-2.2h0.5v2.8h-0.8l-1.1-2.4v2.4h-0.6z" />
                <path class="d" d="m25.8 48c0-0.1 0-0.5-0.4-0.5-0.5 0-0.6 0.5-0.6 1 0 0.2 0 1 0.5 1 0.3 0 0.5-0.2 0.5-0.5h0.7c0 0.1 0 0.4-0.3 0.6-0.2 0.3-0.5 0.4-0.8 0.4-1 0-1.3-0.8-1.3-1.5 0-0.9 0.5-1.5 1.3-1.5 0.6 0 1.1 0.4 1.1 1z" />
                <path class="d" d="m26.9 47.1h1.9v0.4h-1.3v0.7h1.2v0.5h-1.2v0.7h1.3v0.5h-1.9z" />
                <path fill-rule="evenodd" class="d" d="m30.3 47.1h1.1c0.1 0 0.5 0 0.7 0.1 0.2 0.2 0.3 0.4 0.3 0.6 0 0.1 0 0.3-0.2 0.4 0 0-0.1 0.2-0.3 0.2 0.4 0.1 0.6 0.4 0.6 0.7 0 0.3-0.2 0.6-0.4 0.7-0.2 0.1-0.6 0.1-0.7 0.1h-1.1zm0.6 1.1h0.4c0.2 0 0.5 0 0.5-0.3 0-0.4-0.3-0.4-0.5-0.4h-0.4zm0 1.2h0.4c0.3 0 0.6 0 0.6-0.3 0-0.4-0.4-0.4-0.7-0.4h-0.3z" />
                <path fill-rule="evenodd" class="d" d="m32.9 47.1h1.1c0.3 0 0.6 0 0.8 0.2 0.2 0.1 0.3 0.3 0.3 0.5 0 0.5-0.5 0.6-0.6 0.7 0.4 0 0.4 0.3 0.5 0.6 0 0.4 0.1 0.5 0.1 0.6 0 0.1 0 0.1 0.1 0.2h-0.7c0-0.2-0.1-0.9-0.2-1 0-0.2-0.2-0.2-0.3-0.2h-0.5v1.2h-0.6zm0.6 1.2h0.5c0 0 0.2 0 0.3-0.1 0 0 0.1-0.1 0.1-0.3 0-0.2-0.1-0.3-0.1-0.3-0.1-0.1-0.2-0.1-0.4-0.1h-0.4z" />
                <path fill-rule="evenodd" class="d" d="m36.7 47c0.3 0 0.8 0.1 1 0.4 0.3 0.3 0.4 0.8 0.4 1 0 0.5-0.1 0.9-0.4 1.2-0.3 0.3-0.7 0.4-1 0.4-0.3 0-0.7-0.2-1-0.4-0.3-0.4-0.3-0.8-0.3-1.1 0-0.7 0.3-1.5 1.3-1.5zm-0.5 2.3c0.1 0.1 0.3 0.2 0.5 0.2q0.4 0 0.6-0.3c0.1-0.1 0.2-0.3 0.2-0.8 0-0.1-0.1-0.3-0.1-0.5-0.1-0.3-0.4-0.5-0.7-0.5q-0.3 0-0.5 0.3c-0.1 0.2-0.2 0.5-0.2 0.8 0 0.3 0.1 0.6 0.2 0.8z" />
                <path class="d" d="m38.5 47.1h0.6v1.2l1-1.2h0.7l-1.1 1.2 1.2 1.6h-0.8l-1-1.5v1.5h-0.6z" />
                <path class="d" d="m41.1 47.1h1.9v0.4h-1.3v0.7h1.3v0.5h-1.3v0.7h1.4v0.5h-2z" />
                <path fill-rule="evenodd" class="d" d="m43.5 47.1h1.1c0.3 0 0.6 0 0.8 0.2 0.2 0.1 0.3 0.3 0.3 0.5 0 0.5-0.5 0.6-0.6 0.7 0.4 0 0.4 0.3 0.5 0.6 0 0.4 0 0.5 0.1 0.6 0 0.1 0 0.1 0 0.2h-0.6c-0.1-0.2-0.1-0.9-0.2-1 0-0.2-0.2-0.2-0.3-0.2h-0.5v1.2h-0.6zm0.6 1.2h0.5c0 0 0.2 0 0.3-0.1 0 0 0.1-0.1 0.1-0.3 0-0.2-0.1-0.3-0.1-0.3-0.1-0.1-0.2-0.1-0.4-0.1h-0.4z" />
                <path class="d" d="m46.6 49c0 0.1-0.1 0.5 0.5 0.5 0.3 0 0.5-0.1 0.5-0.4 0-0.2-0.2-0.3-0.5-0.4-0.7-0.1-1.1-0.3-1.1-0.8 0-0.5 0.4-0.9 1.1-0.9 0.3 0 0.7 0.1 0.9 0.3 0.2 0.3 0.2 0.5 0.2 0.6h-0.6c0-0.1-0.1-0.5-0.5-0.5-0.3 0-0.4 0.2-0.4 0.4 0 0.3 0.2 0.3 0.6 0.4 0.5 0.2 0.9 0.3 0.9 0.8 0 0.5-0.4 1-1.2 1-1.1 0-1.1-0.7-1.1-1z" />
                <path fill-rule="evenodd" d="m77.6 34h-6.4l-2.4 4.5h-3.7l10.3-19.9h15.4v3.3h-9.3v4.8h8.8v3.1h-8.8v5.4h9.5v3.3h-13.4zm0-12.3l-4.9 9.4h4.9z" />
                <path fill-rule="evenodd" d="m111.6 28.2c0 3.2-1 6.2-2.5 8-2.2 2.4-5.4 2.8-7.1 2.8-2.9 0-5.4-1-7.1-2.7-2-2.2-2.4-5.3-2.4-7.6 0-2.5 0.7-10.8 9.6-10.8 2.1 0 5 0.5 7 2.7 2.2 2.6 2.5 5.9 2.5 7.6zm-4.1 0q0-2.2-0.6-3.8c-1-3.1-3.2-3.7-4.8-3.7-1.6 0-3 0.6-3.9 1.8-1.1 1.3-1.6 3.3-1.6 6.1q0 3.8 1.6 5.9c0.8 1.1 2.1 1.7 3.9 1.7 1.8 0 3.1-0.7 3.9-2 0.7-1 1.5-2.6 1.5-6z" />
                <path d="m126 38.5h5.6v-20.1h-3.6v16.9l-8-16.9h-5.9v20.1h3.6v-17.8z" />
                <path d="m142.1 18.2h4.3v20.3h-4.3z" />
                <path d="m149.5 18.3h6.3l7.6 15.9v-15.9h4v20.2h-5.9l-7.9-16.8v16.8h-4.1z" />
                <path d="m174 32c0 1-0.1 3.9 3.7 3.9 2.3 0 3.8-1.1 3.8-2.9 0-1.7-1.3-2-3.8-2.7-4.9-1.2-7.5-2.6-7.5-6.1 0-3.3 2.4-6.3 8-6.3 2.1 0 4.6 0.5 6.1 2.4 1.2 1.5 1.2 3.1 1.2 3.8h-4.2c-0.1-0.7-0.3-3.1-3.3-3.1-2 0-3.3 1.1-3.3 2.7 0 1.9 1.5 2.2 4.4 3 3.5 0.8 6.9 1.8 6.9 5.7 0 3.6-3 6.6-8.6 6.6-7.7 0-7.8-5-7.8-7z" />
                <path d="m192.9 18.3v12.3c0 2.3 0.2 5 4.4 5 0.7 0 2.8 0 3.9-1.7 0.5-0.7 0.7-1.4 0.7-3.5v-12.1h4.2v12.7c0 6-4.8 7.9-8.9 7.9-2 0-5.7-0.4-7.6-3.5-1-1.5-1-3.1-1-5v-12.1z" />
                <path fill-rule="evenodd" d="m209.3 18.3h7.8c2.2-0.1 4.5-0.1 6.1 1.3 1.3 1.1 1.8 2.6 1.8 3.9 0 3.8-3.3 4.7-4.2 5 3 0.3 3.2 2 3.6 4.6 0.3 2.4 0.5 3.4 0.6 4 0.2 0.9 0.4 1.1 0.6 1.4h-4.8c-0.2-1.1-0.8-6.2-1-7-0.4-1.2-1.5-1.2-2.2-1.2h-3.8v8.2h-4.5zm4.3 8.9h3.5c0.5 0 1.5 0 2.2-0.6 0.3-0.2 1.2-0.9 1.2-2.4 0-1.3-0.7-2-1.1-2.2-0.7-0.5-1.5-0.5-2.9-0.5h-2.9z" />
                <path fill-rule="evenodd" d="m238.2 18.3l7.1 20.2h-4.4l-1.5-4.4h-8l-1.5 4.4h-4.1l7.3-20.2zm0.1 12.6l-2.8-8.7-3 8.7z" />
                <path d="m247.2 18.3h6.2l7.6 15.9v-15.9h4.1v20.2h-6l-7.8-16.8v16.8h-4.1z" />
                <path d="m279.6 24.9c-0.1-0.7-0.4-3.6-3.3-3.6-3.2 0-4.6 3.4-4.6 7.6 0 1.2 0 6.9 4.3 6.9 1.8 0 3.5-1.2 3.6-3.8h4.6c-0.1 1.2-0.2 3-1.9 4.7-1.8 1.9-4 2.3-5.9 2.3-6.9 0-9.2-5.2-9.2-10.2 0-6.4 3.6-10.6 9.3-10.6 4.4 0 7.5 2.6 7.5 6.7z" />
                <path d="m286.3 18.3h13.5v3.3h-9.2v4.8h8.6v3.3h-8.6v5.4h9.5v3.4h-13.8z" />
                <path fill-rule="evenodd" d="m309.6 18.3h7.6c1.1 0 3.4 0 5 0.9 1.8 1.2 2.2 3.2 2.2 4.4 0 0.7-0.1 2-1.2 3-0.1 0.1-1.1 1-2.2 1.4 3 0.6 4.2 2.8 4.2 4.9 0 2.4-1.4 4-2.9 4.8-1.6 0.8-4.3 0.8-5.1 0.8h-7.6zm4.2 8.2h3c1.2 0 3.5 0 3.5-2.6 0-2.5-2.2-2.5-3.6-2.5h-2.9zm0 8.8h2.9c2 0 4.2 0 4.2-2.8 0-2.8-2.6-2.8-4.7-2.8h-2.4z" />
                <path fill-rule="evenodd" d="m327.4 18.3h7.7c2.3-0.1 4.5-0.1 6.2 1.3 1.2 1.1 1.7 2.6 1.7 3.9 0 3.8-3.2 4.7-4.2 5 3 0.3 3.3 2 3.6 4.6 0.3 2.4 0.5 3.4 0.6 4 0.3 0.9 0.4 1.1 0.7 1.4h-4.8c-0.2-1.1-0.8-6.2-1.1-7-0.4-1.2-1.5-1.2-2.2-1.2h-3.8v8.2h-4.4zm4.2 8.9h3.5c0.6 0 1.6 0 2.3-0.6 0.3-0.2 1.1-0.9 1.1-2.4 0-1.3-0.7-2-1.1-2.2-0.7-0.5-1.5-0.5-2.8-0.5h-3z" />
                <path fill-rule="evenodd" d="m354.3 17.8c2.1 0 5.1 0.5 7.1 2.8 2.1 2.5 2.6 5.6 2.6 7.6 0 2.9-0.9 6.1-2.6 7.9-2.2 2.5-5.5 2.9-7.2 2.9-2.6 0-5.3-0.8-7.1-2.8-2.3-2.3-2.5-5.7-2.5-7.5 0-5.4 2.4-10.9 9.7-10.9zm-3.7 16.4c0.6 0.8 1.7 1.6 3.7 1.6 1.7 0 2.9-0.6 3.8-1.9 0.6-1 1.3-2.5 1.3-5.8 0-0.9-0.1-2.3-0.5-3.6-0.8-2.5-2.5-3.5-4.6-3.5-1.6 0-2.9 0.6-3.7 1.7-1.2 1.4-1.5 3.5-1.5 5.8 0 2 0.3 4.1 1.5 5.7z" />
                <path d="m366.4 18.3h4.3v8.7l6.8-8.7h5l-7.4 9 8.1 11.2h-5.4l-7.1-10.3v10.3h-4.3z" />
                <path d="m384.5 18.3h13.6v3.3h-9.2v4.8h8.6v3.3h-8.6v5.4h9.5v3.4h-13.9z" />
                <path fill-rule="evenodd" d="m400.5 18.3h7.8c2.2-0.1 4.5-0.1 6.1 1.3 1.3 1.1 1.8 2.6 1.8 3.9 0 3.8-3.3 4.7-4.2 5 3 0.3 3.2 2 3.6 4.6 0.3 2.4 0.5 3.4 0.6 4 0.2 0.9 0.4 1.1 0.6 1.4h-4.8c-0.1-1.1-0.8-6.2-1-7-0.4-1.2-1.5-1.2-2.2-1.2h-3.8v8.2h-4.5zm4.3 8.9h3.5c0.5 0 1.5 0 2.2-0.6 0.3-0.2 1.2-0.9 1.2-2.4 0-1.3-0.7-2-1.1-2.2-0.7-0.5-1.5-0.5-2.9-0.5h-2.9z" />
                <path d="m422 32c0 1-0.1 3.9 3.6 3.9 2.4 0 3.9-1.1 3.9-2.9 0-1.7-1.3-2-3.9-2.7-4.8-1.2-7.4-2.6-7.4-6.1 0-3.3 2.4-6.3 8-6.3 2.1 0 4.6 0.5 6.1 2.4 1.1 1.5 1.1 3.1 1.1 3.8h-4.1c-0.1-0.7-0.3-3.1-3.3-3.1-2 0-3.3 1.1-3.3 2.7 0 1.9 1.5 2.2 4.4 3 3.5 0.8 6.9 1.8 6.9 5.7 0 3.6-3 6.6-8.6 6.6-7.8 0-7.8-5-7.9-7z" />
              </svg>


            </p>
          </div>

          <h4 class="text-sm font-base text-white dark:text-neutral-400">
            AEON Insurance Brokers (M) Sdn. Bhd. (198201005186 / 84938-X)
          </h4>
        </div>
        <!-- End Col -->
      </div>
      <!-- End Grid -->


    </div>
    <div class="flex flex-col sm:gap-y-0 sm:flex sm:justify-center sm:items-center bg-black bg-opacity-50 dark:bg-opacity-50 p-2">
      <div class="flex flex-wrap items-center gap-2">
        <p class="text-sm text-white dark:text-neutral-400">
          Copyright © 2025 AEON Insurance Brokers (M) Sdn. Bhd. All Rights Reserved.
        </p>
      </div>
      <!-- End Col -->


    </div>
  </footer>
  <!-- ========== END FOOTER ========== -->
</x-filament-panels::layout.base>

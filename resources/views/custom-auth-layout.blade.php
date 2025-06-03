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
				<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
			</svg>
			<svg x-cloak x-show="mobileMenuIsOpen" xmlns="http://www.w3.org/2000/svg" fill="none" aria-hidden="true" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6">
				<path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/>
			</svg>
		</button>
		<!-- Mobile Menu -->
		<ul x-cloak x-show="mobileMenuIsOpen" x-transition:enter="transition motion-reduce:transition-none ease-out duration-300" x-transition:enter-start="-translate-y-full" x-transition:enter-end="translate-y-0" x-transition:leave="transition motion-reduce:transition-none ease-out duration-300" x-transition:leave-start="translate-y-0" x-transition:leave-end="-translate-y-full" id="mobileMenu"
		    class="fixed max-h-svh overflow-y-auto inset-x-0 top-0 z-10 flex flex-col divide-y divide-neutral-300 rounded-b-sm border-b border-neutral-300 bg-neutral-50 px-6 pb-6 pt-20 dark:divide-neutral-700 dark:border-neutral-700 dark:bg-neutral-900 md:hidden">
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
              <span class="font-extrabold text-[#a5308a] text-2xl md:text-3xl md:text-4xl">
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
	<footer class="bg-[#a5308a] w-full dark:bg-neutral-950">
		<div class="w-full py-6 px-4 mx-auto">
			<div class="grid grid-cols-1 gap-8 md:grid-cols-2">
				<div class="col-span-1">
					<div class="flex items-center md:items-start gap-4">
						<a class="flex-none font-semibold text-white focus:outline-hidden focus:opacity-80" href="https://aeoninsurance.com.my/terms-and-conditions" aria-label="Brand">Terms and Conditions</a>
						<a class="flex-none font-semibold text-white focus:outline-hidden focus:opacity-80" href="https://aeoninsurance.com.my/privacy-policy" aria-label="Brand">Privacy Policy</a>
					</div>
					<!-- Social Brands -->
					<div class="flex py-4 gap-2 text-center">
						<a class="size-10 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-white hover:bg-white/10 focus:outline-hidden focus:bg-white/10 disabled:opacity-50 disabled:pointer-events-none" href="#">
							<svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" viewBox="0 0 24 24">
								<path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
							</svg>
						</a>
						<a class="size-10 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-white hover:bg-white/10 focus:outline-hidden focus:bg-white/10 disabled:opacity-50 disabled:pointer-events-none" href="#">
							<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-instagram" viewBox="0 0 24 24">
								<path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>
							</svg>
						</a>
						<a class="size-10 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-white hover:bg-white/10 focus:outline-hidden focus:bg-white/10 disabled:opacity-50 disabled:pointer-events-none" href="#">
							<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 24 24">
								<path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z"/>
							</svg>
						</a>
					</div>
					<!-- End Social Brands -->
				</div>


				<div class="col-span-1 w-90%">
					<h4 class="font-base text-gray-100">Managed and Distributed by:</h4>
					<div class="mt-3 grid space-y-3 mb-4">
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
			</div>
		</div>
		<div class="flex flex-col sm:gap-y-0 sm:flex sm:justify-center sm:items-center bg-[#7b2567] bg-opacity-90 dark:bg-opacity-90 p-2">
			<div class="flex flex-wrap items-center gap-2">
				<p class="text-white dark:text-neutral-400">
					Copyright © 2025 AEON Insurance Brokers (M) Sdn. Bhd. All Rights Reserved.
				</p>
			</div>
			<!-- End Col -->


		</div>
	</footer>
	<!-- ========== END FOOTER ========== -->
</x-filament-panels::layout.base>

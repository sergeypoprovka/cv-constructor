<header class="block z-10">
    <div class="shadow-lg py-4 px-12 flex flex-row justify-between items-center">
        <div class="logo">
            <img src="/images/logo.svg" class="w-12" />
        </div>
        <nav class="main_menu">
            <ul class="flex flex-row">
                <li class="ml-8"><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                <li class="ml-8"><a href="{{ route('constructor') }}">{{ __('Constructor') }}</a></li>
                <li class="ml-8"><a href="{{ route('about') }}">{{ __('About') }}</a></li>
            </ul>
        </nav>
    </div>
</header>

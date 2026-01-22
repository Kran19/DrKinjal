<!-- NAVBAR -->
<nav class="sticky top-0 left-0 w-full z-50 bg-white/95 backdrop-blur-lg border-b border-sky-100 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 md:px-6 h-20 flex items-center justify-between gap-4">
        <!-- Hamburger button -->
        <button id="menu-btn" type="button" class="lg:hidden p-2 text-stone-700 hover:text-sky-500 transition">
            <i id="menu-icon" data-lucide="menu" class="w-7 h-7"></i>
        </button>

        <!-- Logo -->
        <a href="{{ route('customer.home.index') }}" class="flex items-center gap-3 mx-auto lg:mx-0">
            <img src="{{ asset('storage/assets/images/logo.png') }}" class="w-40 md:w-40 h-auto" alt="Dr Kinjal Beauty Logo">
        </a>

        <!-- Desktop Menu -->
        <div class="hidden lg:flex items-center gap-8 text-base font-semibold text-stone-700 ml-10">
            <a href="{{ route('customer.home.index') }}" 
               class="{{ request()->routeIs('customer.home.index') ? 'text-sky-500 underline underline-offset-4' : 'hover:text-sky-500' }}">
                Home
            </a>
            <a href="{{ route('customer.products.bestsellers') }}" 
               class="{{ request()->routeIs('customer.products.bestsellers') ? 'text-sky-500 underline underline-offset-4' : 'hover:text-sky-500' }}">
                Best Sellers
            </a>
            <a href="{{ route('customer.products.list') }}" 
               class="{{ request()->routeIs('customer.products.*') && !request()->routeIs('customer.products.bestsellers') ? 'text-sky-500 underline underline-offset-4' : 'hover:text-sky-500' }}">
                Shop All
            </a>
            <a href="{{ route('customer.page.concerns') }}" 
               class="{{ request()->routeIs('customer.page.concerns') ? 'text-sky-500 underline underline-offset-4' : 'hover:text-sky-500' }}">
                By Concern
            </a>
            <a href="{{ route('customer.page.ingredients') }}" 
               class="{{ request()->routeIs('customer.page.ingredients') ? 'text-sky-500 underline underline-offset-4' : 'hover:text-sky-500' }}">
                Ingredients
            </a>
            <a href="{{ route('customer.page.about') }}" 
               class="{{ request()->routeIs('customer.page.about') ? 'text-sky-500 underline underline-offset-4' : 'hover:text-sky-500' }}">
                Our Story
            </a>
            @auth('customer')
                <a href="{{ route('customer.account.profile') }}" 
                   class="{{ request()->routeIs('customer.account.*') ? 'text-sky-500 underline underline-offset-4' : 'hover:text-sky-500' }}">
                    My Account
                </a>
                <form method="POST" action="{{ route('customer.logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="hover:text-sky-500">Logout</button>
                </form>
            @else
                <a href="{{ route('customer.login') }}" 
                   class="{{ request()->routeIs('customer.login') ? 'text-sky-500 underline underline-offset-4' : 'hover:text-sky-500' }}">
                    Log-in
                </a>
            @endauth
        </div>

        <!-- Icons - Only Account and Cart -->
        <div class="flex items-center gap-4">
            <!-- Account button -->
            @auth
                <a href="{{ route('customer.account.profile') }}" class="p-2 hover:bg-sky-50 rounded-full transition">
                    <i data-lucide="user" class="w-5 h-5 text-stone-700"></i>
                </a>
            @else
                <a href="{{ route('customer.login') }}" class="p-2 hover:bg-sky-50 rounded-full transition">
                    <i data-lucide="user" class="w-5 h-5 text-stone-700"></i>
                </a>
            @endauth

            <!-- Cart with item count -->
            <a href="{{ route('customer.cart') }}" class="relative">
                <button class="p-2 hover:bg-sky-50 rounded-full transition relative">
                    <i data-lucide="shopping-bag" class="w-5 h-5 text-stone-700"></i>
                    <span id="cartCount" class="absolute -top-2 -right-2 bg-sky-500 text-white text-xs w-6 h-6 rounded-full flex items-center justify-center border-2 border-white font-bold shadow-sm {{ isset($cartCount) && $cartCount > 0 ? '' : 'hidden' }}">
                        {{ $cartCount ?? 0 }}
                    </span>
                </button>
            </a>
        </div>
    </div>

    <!-- MOBILE MENU -->
    <div id="mobile-menu" class="lg:hidden bg-white border-t border-sky-100 px-5 py-0 flex flex-col text-stone-700 text-lg font-medium">
        <a href="{{ route('customer.home.index') }}" 
           class="py-2 {{ request()->routeIs('customer.home.index') ? 'text-sky-500 font-semibold' : '' }}">
            Home
        </a>
        <a href="{{ route('customer.products.bestsellers') }}" 
           class="py-2 {{ request()->routeIs('customer.products.bestsellers') ? 'text-sky-500 font-semibold' : '' }}">
            Best Sellers
        </a>
        <a href="{{ route('customer.products.list') }}" 
           class="py-2 {{ request()->routeIs('customer.products.*') && !request()->routeIs('customer.products.bestsellers') ? 'text-sky-500 font-semibold' : '' }}">
            Shop All
        </a>
        <a href="{{ route('customer.page.concerns') }}" 
           class="py-2 {{ request()->routeIs('customer.page.concerns') ? 'text-sky-500 font-semibold' : '' }}">
            By Concern
        </a>
        <a href="{{ route('customer.page.ingredients') }}" 
           class="py-2 {{ request()->routeIs('customer.page.ingredients') ? 'text-sky-500 font-semibold' : '' }}">
            Ingredients
        </a>
        <a href="{{ route('customer.page.about') }}" 
           class="py-2 {{ request()->routeIs('customer.page.about') ? 'text-sky-500 font-semibold' : '' }}">
            Our Story
        </a>
        @auth
            <a href="{{ route('customer.account.profile') }}" 
               class="py-2 {{ request()->routeIs('customer.account.*') ? 'text-sky-500 font-semibold' : '' }}">
                My Account
            </a>
            <form method="POST" action="{{ route('customer.logout') }}" class="py-2">
                @csrf
                <button type="submit" class="w-full text-left">Logout</button>
            </form>
        @else
            <a href="{{ route('customer.login') }}" 
               class="py-2 {{ request()->routeIs('customer.login') ? 'text-sky-500 font-semibold' : '' }}">
                Log-in
            </a>
        @endauth
    </div>
</nav>
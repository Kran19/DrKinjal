<!-- Footer -->
<footer class="bg-stone-900 text-white pt-16 pb-8">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid md:grid-cols-4 gap-12 mb-12">
            <!-- Brand -->
            <div>
                <a href="{{ route('customer.home.index') }}" class="flex items-center gap-2 mb-6">
                    <span class="text-xl font-bold">{{ \App\Helpers\SettingsHelper::get('store_name', 'Dr.Kinjal') }}</span>
                </a>
                <p class="text-stone-400 text-sm mb-6">{{ \App\Helpers\SettingsHelper::get('meta_description', 'clinically effective, result oriented products.') }}</p>
                <div class="flex gap-4">
                    @php
                        $instagram = \App\Helpers\SettingsHelper::get('social_instagram');
                        $facebook = \App\Helpers\SettingsHelper::get('social_facebook');
                        $email = \App\Helpers\SettingsHelper::get('store_email', 'DrKinjal.official@gmail.com');
                    @endphp

                    @if($instagram)
                    <a href="{{ $instagram }}" target="_blank"
                        class="w-10 h-10 bg-stone-800 rounded-full flex items-center justify-center hover:bg-sky-500 transition-colors">
                        <i data-lucide="instagram" class="w-5 h-5"></i>
                    </a>
                    @endif

                    @if($facebook)
                    <a href="{{ $facebook }}" target="_blank"
                        class="w-10 h-10 bg-stone-800 rounded-full flex items-center justify-center hover:bg-sky-500 transition-colors">
                        <i data-lucide="facebook" class="w-5 h-5"></i>
                    </a>
                    @endif

                    <!-- Email -->
                    <a href="mailto:{{ $email }}" target="_blank"
                        class="w-10 h-10 bg-[#EA4335] rounded-full flex items-center justify-center hover:bg-[#d7372c] transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="white">
                            <path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4-8 5-8-5V6l8 5 8-5v2z" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Shop -->
            <div>
                <h3 class="font-bold text-lg mb-6">Shop</h3>
                <ul class="space-y-3">
                    <li><a href="{{ route('customer.category.products', ['slug' => 'serum']) }}"
                            class="text-stone-400 hover:text-white transition-colors">Serum</a></li>
                    <li><a href="{{ route('customer.category.products', ['slug' => 'moisturizer']) }}"
                            class="text-stone-400 hover:text-white transition-colors">Moisturizer</a></li>
                    <li><a href="{{ route('customer.category.products', ['slug' => 'facewash']) }}"
                            class="text-stone-400 hover:text-white transition-colors">Facewash</a></li>
                    <li><a href="{{ route('customer.category.products', ['slug' => 'sunscreen']) }}"
                            class="text-stone-400 hover:text-white transition-colors">Sunscreen</a></li>
                    <li><a href="{{ route('customer.category.products', ['slug' => 'combos']) }}"
                            class="text-stone-400 hover:text-white transition-colors">Combos</a></li>
                </ul>
            </div>

            <!-- Help -->
            <div>
                <h3 class="font-bold text-lg mb-6">Help</h3>
                <ul class="space-y-3">
                    <li><a href="{{ route('customer.page.contact') }}" class="text-stone-400 hover:text-white transition-colors">Contact Us</a></li>
                    <li><a href="{{ route('customer.page.faq') }}" class="text-stone-400 hover:text-white transition-colors">FAQ</a></li>
                    <li><a href="{{ route('customer.account.orders') }}" class="text-stone-400 hover:text-white transition-colors">Track Order</a></li>
                    <li><a href="{{ route('customer.page.refund') }}" class="text-stone-400 hover:text-white transition-colors">Refund Policy</a></li>
                    <li><a href="{{ route('customer.page.privacy') }}" class="text-stone-400 hover:text-white transition-colors">Privacy Policy</a></li>
                </ul>
            </div>

            <!-- Newsletter -->
            <div>
                <h3 class="font-bold text-lg mb-6">Stay Updated</h3>
                <form action="{{ route('customer.newsletter.subscribe') }}" method="POST" class="space-y-2">
                    @csrf
                    <input type="email" name="email" placeholder="Your email" required
                        class="w-full px-4 py-3 bg-stone-800 border border-stone-700 rounded-full text-white placeholder-stone-500 focus:outline-none focus:border-sky-500">
                    <button type="submit"
                        class="w-full px-6 py-3 bg-sky-500 text-white font-semibold rounded-full hover:bg-sky-600 transition-colors">
                        Subscribe
                    </button>
                </form>
            </div>
        </div>
        
        <!-- Copyright -->
        <div class="pt-8 border-t border-stone-800 text-center text-stone-400 text-sm">
            <p>&copy; {{ date('Y') }} Dr Kinjal. All rights reserved.</p>
        </div>
    </div>
</footer>
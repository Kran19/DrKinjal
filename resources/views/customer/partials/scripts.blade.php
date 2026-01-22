<!-- JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="{{ asset('js/custom.js') }}"></script>

<script>
    // Initialize Lucide icons
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }

    // Cart management functions
    const isLoggedIn = {{ auth('customer')->check() ? 'true' : 'false' }};

    function initializeCartCount() {
        if (isLoggedIn) return;

        // Get cart from localStorage or API
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        const totalItems = cart.reduce((total, item) => total + (item.quantity || 1), 0);
        updateCartCountDisplay(totalItems);
    }

    // Update cart count display
    function updateCartCountDisplay(count) {
        const cartCountElement = document.getElementById('cartCount');
        if (cartCountElement) {
            cartCountElement.textContent = count;
            if (count > 0) {
                cartCountElement.classList.remove('hidden');
            } else {
                cartCountElement.classList.add('hidden');
            }
            
            // Dispatch event for other components
            window.dispatchEvent(new CustomEvent('cartUpdated', { detail: { count } }));
        }
    }

    // Add item to cart function
    window.addItemToCart = function(productId, productName, productPrice, productImage) {
        // Get existing cart or create new one
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        
        // Check if product already exists in cart
        const existingItemIndex = cart.findIndex(item => item.id === productId);
        
        if (existingItemIndex > -1) {
            // Update quantity if item exists
            cart[existingItemIndex].quantity = (cart[existingItemIndex].quantity || 1) + 1;
        } else {
            // Add new item to cart
            cart.push({
                id: productId,
                name: productName,
                price: productPrice,
                image: productImage,
                quantity: 1
            });
        }
        
        // Save to localStorage
        localStorage.setItem('cart', JSON.stringify(cart));
        
        // Update cart count display
        const totalItems = cart.reduce((total, item) => total + (item.quantity || 1), 0);
        updateCartCountDisplay(totalItems);
        
        // Show notification
        if (window.showNotification) {
            window.showNotification(`${productName} added to cart!`, 'success');
        }
        
        return cart;
    }

    // Make functions globally available
    window.updateCartCountDisplay = updateCartCountDisplay;
    window.initializeCartCount = initializeCartCount;

    // Listen for cart updates from other tabs
    window.addEventListener('storage', function(e) {
        if (e.key === 'cart') {
            initializeCartCount();
        }
    });

    // Initialize cart on page load
    document.addEventListener('DOMContentLoaded', function() {
        initializeCartCount();
        
        // Mobile menu functionality
        const menuBtn = document.getElementById("menu-btn");
        const menuIcon = document.getElementById("menu-icon");
        const mobileMenu = document.getElementById("mobile-menu");

        if (menuBtn && mobileMenu) {
            menuBtn.addEventListener("click", () => {
                mobileMenu.classList.toggle("active");
                if (menuIcon) {
                    menuIcon.setAttribute(
                        "data-lucide",
                        mobileMenu.classList.contains("active") ? "x" : "menu"
                    );
                    lucide.createIcons();
                }
            });

            // Close menu on resize
            window.addEventListener("resize", () => {
                if (window.innerWidth >= 1024) {
                    mobileMenu.classList.remove("active");
                    if (menuIcon) {
                        menuIcon.setAttribute("data-lucide", "menu");
                        lucide.createIcons();
                    }
                }
            });
        }
    });

    // Axios setup for AJAX requests
    if (window.axios) {
        const csrfToken = document.querySelector('meta[name="csrf-token"]');
        if (csrfToken) {
            window.axios.defaults.headers.common['X-CSRF-TOKEN'] = csrfToken.getAttribute('content');
        }
    }

    // Global Toast Notification Helper
    window.showToast = function(message, type = 'success') {
        if (typeof Swal !== 'undefined') {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });

            Toast.fire({
                icon: type,
                title: message
            });
        } else if (window.showNotification && window.showNotification !== window.showToast) {
            window.showNotification(message, type);
        } else {
            console.log(type + ': ' + message);
        }
    };
    
    // Ensure showNotification is also linked if not already matching
    if (!window.showNotification) {
        window.showNotification = window.showToast;
    }
</script>
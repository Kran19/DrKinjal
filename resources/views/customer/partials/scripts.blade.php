<!-- JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="{{ asset('js/custom.js') }}"></script>

<script>
    // Initialize Lucide icons
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }

    // Global Cart Helper for dynamic updates
    window.updateCartCount = function(count) {
        const cartCountElement = document.getElementById('cartCount');
        if (cartCountElement) {
            cartCountElement.textContent = count;
            if (count > 0) {
                cartCountElement.classList.remove('hidden');
            } else {
                cartCountElement.classList.add('hidden');
            }
            // Dispatch event for other components if needed
            window.dispatchEvent(new CustomEvent('cartUpdated', { detail: { count } }));
        }
    };

    // Initialize cart on page load
    document.addEventListener('DOMContentLoaded', function() {
        
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
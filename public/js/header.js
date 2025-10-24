document.addEventListener('DOMContentLoaded', async () => {
    const headerPlaceholder = document.getElementById('header-placeholder');
    if (headerPlaceholder) {
        // Load header.html
        const response = await fetch('header.html');
        const headerHTML = await response.text();
        headerPlaceholder.innerHTML = headerHTML;

        // Hide "Contact" link if on browse page
        const currentPage = window.location.pathname.split('/').pop();
        if (currentPage === 'browse.blade.php' || currentPage === 'browse.html') {
            document.querySelectorAll('a[href="#contact"]').forEach(link => {
                link.style.display = 'none';
            });
        }

        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        }
    }
});

document.addEventListener('DOMContentLoaded', () => {
    const currentPath = window.location.pathname;

    if (currentPath.includes('/browse')) {
        document.querySelectorAll('a[href="#contact"]').forEach(link => {
            link.style.display = 'none';
        });
    }
});

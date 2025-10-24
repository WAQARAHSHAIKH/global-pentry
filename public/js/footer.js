document.addEventListener('DOMContentLoaded', async () => {
    const footerPlaceholder = document.getElementById('footer-placeholder');
    if (footerPlaceholder) {
        // Load footer.html
        const response = await fetch('footer.html');
        const footerHTML = await response.text();
        footerPlaceholder.innerHTML = footerHTML;

        // Set current year
        const yearSpan = document.getElementById('currentYearFooter');
        if (yearSpan) {
            yearSpan.textContent = new Date().getFullYear();
        }
    }
});

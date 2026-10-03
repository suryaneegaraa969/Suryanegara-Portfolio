import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();

// Scroll reveal animation
document.addEventListener('DOMContentLoaded', () => {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.12 });

    document.querySelectorAll('.reveal-on-scroll').forEach((el) => observer.observe(el));
});
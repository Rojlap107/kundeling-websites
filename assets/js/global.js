/* ══════════════════════════════════════════════════
   GLOBAL JS — Kundeling Tatsak Rinpoche
   Shared across all pages
   ══════════════════════════════════════════════════ */

// ── Fade-in IntersectionObserver ──
const fadeEls = document.querySelectorAll('.fade-in');
const fadeObserver = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('visible');
            fadeObserver.unobserve(entry.target);
        }
    });
}, { threshold: 0.1 });
fadeEls.forEach(el => fadeObserver.observe(el));

// ── Nav hide-on-scroll-down, show-on-scroll-up ──
const nav = document.getElementById('mainNav');

if (nav) {
    let lastScroll = 0;

    window.addEventListener('scroll', () => {
        const current = window.scrollY;
        const delta = current - lastScroll;

        // Scrolled state (for logo colour switch on hero pages)
        if (current > 50) {
            nav.classList.add('scrolled');
        } else {
            nav.classList.remove('scrolled');
        }

        // Hide when scrolling down past 120px, show when scrolling up
        if (current > 120 && delta > 0) {
            nav.classList.add('nav-hidden');
        } else if (delta < 0) {
            nav.classList.remove('nav-hidden');
        }

        lastScroll = current <= 0 ? 0 : current;
    }, { passive: true });
}

// ── Mobile menu functions ──
function resetDropdowns() {
    document.querySelectorAll('.has-dropdown').forEach(el => el.classList.remove('dropdown-open'));
}

function closeMenu() {
    document.querySelector('.nav-links').classList.remove('open');
    resetDropdowns();
}

function toggleMenu() {
    const navLinks = document.querySelector('.nav-links');
    const isOpen = navLinks.classList.contains('open');
    if (isOpen) {
        closeMenu();
    } else {
        navLinks.classList.add('open');
    }
}

// ── Dropdown toggle (click-to-open on all screen sizes) ──
document.querySelectorAll('.has-dropdown > a').forEach(link => {
    link.addEventListener('click', function(e) {
        e.preventDefault();
        const parent = this.parentElement;
        const wasOpen = parent.classList.contains('dropdown-open');
        resetDropdowns();
        if (!wasOpen) {
            parent.classList.add('dropdown-open');
        }
    });
});

document.addEventListener('click', function(e) {
    if (!e.target.closest('.has-dropdown')) {
        resetDropdowns();
    }
});

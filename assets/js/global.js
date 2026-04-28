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

// ── Nav scroll detection (only for hero nav) ──
const nav = document.getElementById('mainNav');
if (nav && nav.classList.contains('nav-hero')) {
    window.addEventListener('scroll', () => {
        nav.classList.toggle('scrolled', window.scrollY > 50);
    });
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

// ── Mobile dropdown toggle ──
document.querySelectorAll('.has-dropdown > a').forEach(link => {
    link.addEventListener('click', function(e) {
        if (window.innerWidth <= 768) {
            e.preventDefault();
            this.parentElement.classList.toggle('dropdown-open');
        }
    });
});

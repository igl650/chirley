/**
 * Studio de Pilates Chirley Braga — JavaScript Vanilla
 * Acessibilidade e comportamento responsivo do menu de navegação
 */

document.addEventListener('DOMContentLoaded', () => {
    const menuToggle = document.getElementById('menu-toggle');
    const mainNav = document.getElementById('main-nav');
    
    if (menuToggle && mainNav) {
        const toggleMenu = (open) => {
            const shouldOpen = typeof open === 'boolean' 
                ? open 
                : menuToggle.getAttribute('aria-expanded') !== 'true';
            
            menuToggle.setAttribute('aria-expanded', String(shouldOpen));
            menuToggle.setAttribute('aria-label', shouldOpen ? 'Fechar menu de navegação' : 'Abrir menu de navegação');
            mainNav.classList.toggle('is-open', shouldOpen);

            if (shouldOpen) {
                const firstLink = mainNav.querySelector('a');
                if (firstLink) firstLink.focus();
            }
        };

        menuToggle.addEventListener('click', () => toggleMenu());

        // Fechar ao pressionar a tecla Escape
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && mainNav.classList.contains('is-open')) {
                toggleMenu(false);
                menuToggle.focus();
            }
        });

        // Fechar menu mobile ao clicar em qualquer link de âncora
        const navLinks = mainNav.querySelectorAll('a');
        navLinks.forEach(link => {
            link.addEventListener('click', () => {
                if (mainNav.classList.contains('is-open')) {
                    toggleMenu(false);
                }
            });
        });

        // Fechar menu se redimensionar para viewport desktop (>= 769px)
        window.addEventListener('resize', () => {
            if (window.innerWidth > 768 && mainNav.classList.contains('is-open')) {
                toggleMenu(false);
            }
        });
    }
});

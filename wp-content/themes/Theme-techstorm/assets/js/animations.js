/**
 * Animations au scroll pour TechStorm Theme
 */

(function() {
    'use strict';

    // Attendre que le DOM soit chargé
    document.addEventListener('DOMContentLoaded', function() {
        
        console.log('TechStorm animations loaded'); // Pour vérifier que le script fonctionne
        
        // ==========================================
        // SYSTÈME D'ANIMATION AU SCROLL
        // ==========================================
        
        const observerOptions = {
            threshold: 0.15,
            rootMargin: '0px 0px -50px 0px'
        };

        // Observer pour les animations générales
        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                    // On arrête d'observer une fois l'élément visible
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        // Observer tous les éléments à animer
        const elementsToAnimate = document.querySelectorAll(
            '.scroll-reveal, .scroll-reveal-left, .scroll-reveal-right, .scroll-reveal-scale'
        );
        
        elementsToAnimate.forEach(function(element) {
            observer.observe(element);
        });

        // ==========================================
        // ANIMATION EN CASCADE POUR LES CARTES PRODUITS
        // ==========================================
        
        const productCards = document.querySelectorAll('.product-card');
        
        if (productCards.length > 0) {
            const productObserver = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry, index) {
                    if (entry.isIntersecting) {
                        // Animation avec délai progressif
                        setTimeout(function() {
                            entry.target.classList.add('active');
                        }, index * 150);
                        
                        productObserver.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.1 });

            productCards.forEach(function(card) {
                productObserver.observe(card);
            });
        }

        // ==========================================
        // ANIMATIONS SUPPLÉMENTAIRES (optionnel)
        // ==========================================
        
        // Animation du bouton "Ajouter au panier" au survol
        const cartButtons = document.querySelectorAll('.btn-panier');
        cartButtons.forEach(function(button) {
            button.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-3px)';
            });
            
            button.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });

        console.log('Animations initialisées pour ' + productCards.length + ' produits');
    });

})();

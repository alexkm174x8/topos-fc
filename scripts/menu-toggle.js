document.addEventListener('DOMContentLoaded', function() {
    const seccion1 = document.querySelector('.seccion1');
    const seccion2 = document.querySelector('.seccion2');
    const flecha1 = document.querySelector('.seccion1 .flecha a');
    const flecha2 = document.querySelector('.seccion2 .flecha a');

    // Mostrar la primera sección inicialmente
    seccion1.classList.add('active');

    flecha1.addEventListener('click', function(e) {
        e.preventDefault();
        seccion1.classList.add('exit');
        seccion1.addEventListener('animationend', () => {
            seccion1.classList.remove('active', 'exit');
            seccion2.classList.add('active');
        }, { once: true });
    });

    flecha2.addEventListener('click', function(e) {
        e.preventDefault();
        seccion2.classList.add('exit');
        seccion2.addEventListener('animationend', () => {
            seccion2.classList.remove('active', 'exit');
            seccion1.classList.add('active');
        }, { once: true });
    });
});

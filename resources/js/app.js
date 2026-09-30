// Menú del celular: abre y cierra el menú, y cambia el ícono ☰ por ✕
const menuButton = document.getElementById('menu-button');

if (menuButton) {
    menuButton.addEventListener('click', () => {
        const abierto = document.getElementById('menu').classList.toggle('hidden') === false;

        document.getElementById('open-menu-icon').classList.toggle('hidden');
        document.getElementById('close-menu-icon').classList.toggle('hidden');
        menuButton.setAttribute('aria-expanded', abierto);
    });
}

// Selector de tema: light, dark o system
const themeButton = document.getElementById('theme-button');
const themeMenu = document.getElementById('theme-menu');
const sistemaOscuro = window.matchMedia('(prefers-color-scheme: dark)');

function temaGuardado() {
    try {
        return localStorage.getItem('theme') || 'system';
    } catch (e) {
        return 'system';
    }
}

function aplicarTema(tema) {
    const oscuro = tema === 'dark' || (tema === 'system' && sistemaOscuro.matches);
    document.documentElement.classList.toggle('dark', oscuro);

    // Marca en azul la opción elegida
    document.querySelectorAll('.theme-option').forEach((opcion) => {
        opcion.classList.toggle('text-sky-500', opcion.dataset.theme === tema);
    });
}

if (themeButton && themeMenu) {
    aplicarTema(temaGuardado());

    // Abrir y cerrar el menú al darle al sol
    themeButton.addEventListener('click', (evento) => {
        evento.stopPropagation();
        const abierto = themeMenu.classList.toggle('hidden') === false;
        themeButton.setAttribute('aria-expanded', abierto);
    });

    // Elegir una opción
    document.querySelectorAll('.theme-option').forEach((opcion) => {
        opcion.addEventListener('click', () => {
            const tema = opcion.dataset.theme;

            try {
                if (tema === 'system') {
                    localStorage.removeItem('theme');
                } else {
                    localStorage.setItem('theme', tema);
                }
            } catch (e) {}

            aplicarTema(tema);
            themeMenu.classList.add('hidden');
            themeButton.setAttribute('aria-expanded', false);
        });
    });

    // Cerrar el menú si se hace clic fuera de él
    document.addEventListener('click', (evento) => {
        if (!themeMenu.contains(evento.target)) {
            themeMenu.classList.add('hidden');
            themeButton.setAttribute('aria-expanded', false);
        }
    });

    // Si está en "system" y cambias el modo de Windows, la página lo sigue
    sistemaOscuro.addEventListener('change', () => {
        if (temaGuardado() === 'system') {
            aplicarTema('system');
        }
    });
}

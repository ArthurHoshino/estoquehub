
document.addEventListener('DOMContentLoaded', function () {
    const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
    const mobileMenuClose = document.getElementById('mobile-menu-close');
    const mobileMenu = document.getElementById('mobile-menu');
    const overlay = document.getElementById('overlay');
    const telefoneInput = document.getElementById("telefone");
    const precoInput = document.getElementById('preco');

    function openMenu() {
        mobileMenu.classList.add('active');
        overlay.classList.add('active');
        mobileMenuToggle.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeMenu() {
        mobileMenu.classList.remove('active');
        overlay.classList.remove('active');
        mobileMenuToggle.classList.remove('active');
        document.body.style.overflow = '';
    }

    mobileMenuToggle.addEventListener('click', openMenu);
    mobileMenuClose.addEventListener('click', closeMenu);
    overlay.addEventListener('click', closeMenu);

    const mobileLinks = document.querySelectorAll('.mobile-menu-links a');
    mobileLinks.forEach(link => {
        link.addEventListener('click', closeMenu);
    });

    telefoneInput.addEventListener('input', function (e) {
        let value = e.target.value.replace(/\D/g, ''); // Remove tudo que não for dígito

        // Limita ao máximo de 11 dígitos
        value = value.substring(0, 11);

        // Aplica a máscara
        if (value.length > 0) {
            value = '(' + value;
        }
        if (value.length > 3) {
            value = value.slice(0, 3) + ') ' + value.slice(3);
        }
        if (value.length > 10) {
            value = value.slice(0, 10) + '-' + value.slice(10);
        }

        e.target.value = value;
    });

    function formatarPrecoRegex(valor) {
        // Remove tudo que não for número usando regex
        valor = valor.replace(/\D/g, '');

        // Limita a 10 dígitos
        valor = valor.substring(0, 10);

        // Separa parte inteira e decimal usando regex
        const regex = /^(\d+)(\d{2})$/;
        valor = valor.replace(regex, '$1,$2');

        return valor;
    }

    precoInput.addEventListener('input', function(e) {
        let valorFormatado = formatarPrecoRegex(e.target.value);
        e.target.value = valorFormatado;
    });
});
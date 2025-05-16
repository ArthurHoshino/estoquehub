<?php require_once("templates/header.phtml") ?>

<!-- Menu lateral para mobile -->
<div id="mobile-menu" class="mobile-menu">
    <div class="mobile-menu-header">
        <svg viewBox="0 0 300 80" xmlns="http://www.w3.org/2000/svg" width="150" height="40">
            <!-- Fundo do logo -->
            <rect x="10" y="15" width="50" height="50" rx="8" fill="#3498db" />

            <!-- Elementos de estoque (caixas) -->
            <rect x="20" y="25" width="15" height="15" rx="2" fill="white" opacity="0.9" />
            <rect x="35" y="40" width="15" height="15" rx="2" fill="white" opacity="0.9" />
            <rect x="20" y="40" width="15" height="15" rx="2" fill="white" opacity="0.7" />

            <!-- Nome da empresa -->
            <text x="70" y="50" font-family="Segoe UI, sans-serif" font-size="28" font-weight="bold" fill="#333333">
                <tspan fill="#3498db">Estoque</tspan>
                <tspan fill="#2c3e50">Hub</tspan>
            </text>

            <!-- Slogan opcional -->
            <text x="70" y="65" font-family="Segoe UI, sans-serif" font-size="12" fill="#7f8c8d">Gestão de
                estoque simplificada</text>
        </svg>
        <button id="mobile-menu-close" class="close-button" aria-label="Fechar menu">
            &times;
        </button>
    </div>
    <nav class="mobile-menu-links">
        <a href="<?= $BASE_URL ?>/index.php">Início</a>
        <a href="<?= $BASE_URL ?>/registro.php">Registro</a>
        <a href="<?= $BASE_URL ?>/login.php">Login</a>
    </nav>
    <div class="mobile-menu-footer">
        <p>Contato: <a href="mailto:contato@estoquehub.com">contato@estoquehub.com</a></p>
        <div class="mobile-socials">
            <a href="https://wa.me/5500000000000" target="_blank" aria-label="WhatsApp">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 90 90">
                    <path id="WhatsApp" fill="#ffffff"
                        d="M90,43.841c0,24.213-19.779,43.841-44.182,43.841c-7.747,0-15.025-1.98-21.357-5.455L0,90l7.975-23.522   c-4.023-6.606-6.34-14.354-6.34-22.637C1.635,19.628,21.416,0,45.818,0C70.223,0,90,19.628,90,43.841z M45.818,6.982   c-20.484,0-37.146,16.535-37.146,36.859c0,8.065,2.629,15.534,7.076,21.61L11.107,79.14l14.275-4.537   c5.865,3.851,12.891,6.097,20.437,6.097c20.481,0,37.146-16.533,37.146-36.857S66.301,6.982,45.818,6.982z M68.129,53.938   c-0.273-0.447-0.994-0.717-2.076-1.254c-1.084-0.537-6.41-3.138-7.4-3.495c-0.993-0.358-1.717-0.538-2.438,0.537   c-0.721,1.076-2.797,3.495-3.43,4.212c-0.632,0.719-1.263,0.809-2.347,0.271c-1.082-0.537-4.571-1.673-8.708-5.333   c-3.219-2.848-5.393-6.364-6.025-7.441c-0.631-1.075-0.066-1.656,0.475-2.191c0.488-0.482,1.084-1.255,1.625-1.882   c0.543-0.628,0.723-1.075,1.082-1.793c0.363-0.717,0.182-1.344-0.09-1.883c-0.27-0.537-2.438-5.825-3.34-7.977   c-0.902-2.15-1.803-1.792-2.436-1.792c-0.631,0-1.354-0.09-2.076-0.09c-0.722,0-1.896,0.269-2.889,1.344   c-0.992,1.076-3.789,3.676-3.789,8.963c0,5.288,3.879,10.397,4.422,11.113c0.541,0.716,7.49,11.92,18.5,16.223   C58.2,65.771,58.2,64.336,60.186,64.156c1.984-0.179,6.406-2.599,7.312-5.107C68.398,56.537,68.398,54.386,68.129,53.938z" />
                </svg>
            </a>
            <a href="https://t.me/seucanal" target="_blank" aria-label="Telegram">
                <svg viewBox="0 0 24 24" width="20" height="20" fill="#ffffff">
                    <path
                        d="M9.03 16.69l-.39 3.68c.56 0 .8-.24 1.09-.52l2.61-2.48 5.41 3.95c.99.55 1.69.26 1.95-.92L22.94 4.2c.33-1.5-.55-2.1-1.49-1.77L2.37 9.51c-1.43.55-1.41 1.34-.26 1.7l5.74 1.79 13.32-8.39-11.14 10.95z" />
                </svg>
            </a>
            <a href="https://instagram.com/seuusuario" target="_blank" aria-label="Instagram">
                <svg viewBox="0 0 24 24" width="20" height="20" fill="#ffffff">
                    <path
                        d="M7 2C4.24 2 2 4.24 2 7v10c0 2.76 2.24 5 5 5h10c2.76 0 5-2.24 5-5V7c0-2.76-2.24-5-5-5H7zm10 2a3 3 0 013 3v10a3 3 0 01-3 3H7a3 3 0 01-3-3V7a3 3 0 013-3h10zm-5 3a5 5 0 100 10 5 5 0 000-10zm0 2a3 3 0 110 6 3 3 0 010-6zm4.5-2a1 1 0 100 2 1 1 0 000-2z" />
                </svg>
            </a>
        </div>
    </div>
</div>

<div id="overlay" class="overlay"></div>
<main>
    <img src="<?= $BASE_URL ?>/assets/img/imagemfundo2comp.png" alt="Fundo" style="
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        z-index: -1;">
    <div class="form-container">
        <div class="geral-form">
            <h2>Seu perfil</h2>
            <div class="form-group full-width">
                <label for="nome">Nome *</label>
                <input type="name" id="name" name="nome" required placeholder="Digite seu nome">
            </div>

            <div class="form-group full-width">
                <label for="email">E-mail *</label>
                <input type="email" id="email" name="email" required placeholder="exemplo@gmail.com " readonly
                    class="campo-readonly">
            </div>

            <div class="form-group full-width">
                <label for="telefone">Telefone:</label>
                <input type="tel" id="telefone" name="telefone" placeholder="(11) 11111-1111" maxlength="15"
                    required>
            </div>

            <aside class="obrigatorio-alerta">
                &#10071; O campo email não pode ser alterado
            </aside>
            <button type="submit" class="normal-button perfil-button">Atualizar Dados</button>

        </div>
        <div class="geral-form">
            <h2>Mude sua senha</h2>
            <div class="form-group-senha">
                <div class="form-group full-width">
                    <label for="senha">Nova senha *</label>
                    <input type="password" id="senha" name="senha" required placeholder="Digite sua nova senha" />
                </div>

                <div class="form-group full-width">
                    <label for="senha">Confirme sua senha *</label>
                    <input type="password" id="confirmar-senha" name="confirmar-senha" required
                        placeholder="Confirmar sua nova senha" />
                </div>
            </div>
            <div class="botoes-footer">
                <button type="submit" class="normal-button perfil-button">Atualizar Dados</button>
            </div>
        </div>
    </div>

</main>

<?php require_once("templates/footer.phtml") ?>
<?php require_once("templates/header.phtml"); ?>

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
        <a href="#services">Serviços</a>
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

<!-- Overlay para quando o menu mobile estiver aberto -->
<div id="overlay" class="overlay"></div>

<div class="main">
    <div class="container">
        <h1>EstoqueHub</h1>
        <p>Simplifique o gerenciamento do seu estoque com uma solução completa e intuitiva</p>
        <a href="#" class="normal-button">Comece Agora</a>
    </div>
</div>

<div id="services" class="services">
    <div class="container">
        <h2>Nossos serviços</h2>
        <p>Soluções completas para otimizar seu negócio</p>

        <div class="services-grid">
            <div class="service-card">
                <!-- Ícone de Gestão de Estoque -->
                <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" width="80" height="80">
                    <!-- Círculo de fundo -->
                    <circle cx="50" cy="50" r="45" fill="#3498db" opacity="0.1" />

                    <!-- Prateleira de estoque (base) -->
                    <rect x="20" y="70" width="60" height="5" rx="2" fill="#3498db" />
                    <rect x="20" y="50" width="60" height="5" rx="2" fill="#3498db" />
                    <rect x="20" y="30" width="60" height="5" rx="2" fill="#3498db" />

                    <!-- Suportes verticais -->
                    <rect x="25" y="30" width="4" height="45" rx="1" fill="#3498db" />
                    <rect x="71" y="30" width="4" height="45" rx="1" fill="#3498db" />

                    <!-- Itens nas prateleiras -->
                    <rect x="30" y="55" width="10" height="15" fill="#e74c3c" opacity="0.9" rx="1" />
                    <rect x="45" y="55" width="10" height="15" fill="#f39c12" opacity="0.9" rx="1" />
                    <rect x="60" y="55" width="10" height="15" fill="#2ecc71" opacity="0.9" rx="1" />

                    <rect x="35" y="35" width="10" height="15" fill="#9b59b6" opacity="0.9" rx="1" />
                    <rect x="50" y="35" width="10" height="15" fill="#1abc9c" opacity="0.9" rx="1" />

                    <!-- Lista de controle -->
                    <rect x="60" y="15" width="15" height="20" fill="white" stroke="#3498db" stroke-width="1.5" />
                    <line x1="63" y1="20" x2="72" y2="20" stroke="#3498db" stroke-width="1.5" />
                    <line x1="63" y1="25" x2="72" y2="25" stroke="#3498db" stroke-width="1.5" />
                    <line x1="63" y1="30" x2="72" y2="30" stroke="#3498db" stroke-width="1.5" />
                </svg>
                <h3>Gestão de Estoque</h3>
                <p>Controle seu inventário em tempo real com atualizações automáticas e alertas personalizados.</p>
            </div>
            <div class="service-card">
                <!-- Ícone de Relatórios -->
                <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" width="80" height="80">
                    <!-- Círculo de fundo -->
                    <circle cx="50" cy="50" r="45" fill="#3498db" opacity="0.1" />

                    <!-- Documento de relatório -->
                    <rect x="25" y="15" width="40" height="55" fill="white" stroke="#3498db" stroke-width="2"
                        rx="3" />
                    <rect x="30" y="25" width="30" height="3" fill="#3498db" opacity="0.7" rx="1" />
                    <rect x="30" y="32" width="20" height="3" fill="#3498db" opacity="0.7" rx="1" />

                    <!-- Gráfico de barras -->
                    <rect x="30" y="40" width="6" height="20" fill="#e74c3c" rx="1" />
                    <rect x="40" y="45" width="6" height="15" fill="#f39c12" rx="1" />
                    <rect x="50" y="38" width="6" height="22" fill="#2ecc71" rx="1" />

                    <!-- Detalhes do relatório -->
                    <rect x="30" y="65" width="30" height="2" fill="#3498db" opacity="0.5" rx="1" />
                    <rect x="30" y="70" width="25" height="2" fill="#3498db" opacity="0.5" rx="1" />

                    <!-- Lápis/caneta -->
                    <g transform="rotate(-45, 65, 50)">
                        <rect x="60" y="35" width="5" height="30" fill="#3498db" rx="1" />
                        <polygon points="60,35 65,35 62.5,30" fill="#3498db" />
                    </g>
                </svg>
                <h3>Relatórios Detalhados</h3>
                <p>Gere relatórios completos para análise e tomada de decisões estratégicas para seu negócio.</p>
            </div>
            <div class="service-card">
                <!-- Ícone de Integração -->
                <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" width="80" height="80">
                    <!-- Círculo de fundo -->
                    <circle cx="50" cy="50" r="45" fill="#3498db" opacity="0.1" />

                    <!-- Nó central -->
                    <circle cx="50" cy="50" r="10" fill="#3498db" />

                    <!-- Nós conectados -->
                    <circle cx="25" cy="30" r="8" fill="#e74c3c" />
                    <circle cx="20" cy="65" r="8" fill="#f39c12" />
                    <circle cx="75" cy="25" r="8" fill="#2ecc71" />
                    <circle cx="80" cy="70" r="8" fill="#9b59b6" />

                    <!-- Linhas de conexão -->
                    <line x1="50" y1="50" x2="25" y2="30" stroke="#3498db" stroke-width="2" />
                    <line x1="50" y1="50" x2="20" y2="65" stroke="#3498db" stroke-width="2" />
                    <line x1="50" y1="50" x2="75" y2="25" stroke="#3498db" stroke-width="2" />
                    <line x1="50" y1="50" x2="80" y2="70" stroke="#3498db" stroke-width="2" />

                    <!-- Símbolos de conexão -->
                    <circle cx="37.5" cy="40" r="2" fill="white" />
                    <circle cx="35" cy="57.5" r="2" fill="white" />
                    <circle cx="62.5" cy="37.5" r="2" fill="white" />
                    <circle cx="65" cy="60" r="2" fill="white" />

                    <!-- Pequenos detalhes nos nós -->
                    <circle cx="25" cy="30" r="3" fill="white" opacity="0.3" />
                    <circle cx="20" cy="65" r="3" fill="white" opacity="0.3" />
                    <circle cx="75" cy="25" r="3" fill="white" opacity="0.3" />
                    <circle cx="80" cy="70" r="3" fill="white" opacity="0.3" />
                </svg>
                <h3>Integração Total</h3>
                <p>Conecte-se com outras plataformas e sistemas para uma gestão unificada e eficiente.</p>
            </div>
        </div>
    </div>
</div>

<div id="offerings" class="services">
    <div class="container">
        <h2>O que oferecemos</h2>
        <p>Ferramentas inteligentes para acelerar o crescimento da sua empresa</p>

        <div class="services-grid">
            <div class="service-card">
                <!-- Ícone de Automação -->
                <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" width="80" height="80">
                    <circle cx="50" cy="50" r="45" fill="#2ecc71" opacity="0.1" />
                    <circle cx="50" cy="50" r="25" fill="#2ecc71" />
                    <rect x="45" y="25" width="10" height="10" fill="#2ecc71" />
                    <rect x="45" y="65" width="10" height="10" fill="#2ecc71" />
                    <rect x="25" y="45" width="10" height="10" fill="#2ecc71" />
                    <rect x="65" y="45" width="10" height="10" fill="#2ecc71" />
                    <line x1="50" y1="25" x2="50" y2="35" stroke="#27ae60" stroke-width="2" />
                    <line x1="50" y1="65" x2="50" y2="75" stroke="#27ae60" stroke-width="2" />
                    <line x1="25" y1="50" x2="35" y2="50" stroke="#27ae60" stroke-width="2" />
                    <line x1="65" y1="50" x2="75" y2="50" stroke="#27ae60" stroke-width="2" />
                </svg>
                <h3>Automação de Processos</h3>
                <p>Reduza tarefas manuais com fluxos automatizados que aumentam a produtividade.</p>
            </div>
            <div class="service-card">
                <!-- Ícone de Monitoramento -->
                <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" width="80" height="80">
                    <circle cx="50" cy="50" r="45" fill="#e67e22" opacity="0.1" />
                    <rect x="25" y="30" width="50" height="30" fill="#e67e22" rx="5" />
                    <circle cx="50" cy="45" r="8" fill="white" stroke="#d35400" stroke-width="2" />
                    <rect x="30" y="65" width="40" height="8" fill="#e67e22" rx="2" />
                    <rect x="35" y="75" width="30" height="5" fill="#e67e22" rx="1" />
                </svg>
                <h3>Monitoramento Inteligente</h3>
                <p>Acompanhe indicadores-chave com painéis em tempo real e alertas configuráveis.</p>
            </div>
            <div class="service-card">
                <!-- Ícone de Suporte -->
                <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" width="80" height="80">
                    <circle cx="50" cy="50" r="45" fill="#9b59b6" opacity="0.1" />
                    <circle cx="50" cy="40" r="12" fill="#9b59b6" />
                    <path d="M30 70c0-10 15-15 20-15s20 5 20 15v5H30z" fill="#9b59b6" />
                    <rect x="45" y="75" width="10" height="8" fill="#8e44ad" rx="2" />
                </svg>
                <h3>Suporte Especializado</h3>
                <p>Conte com uma equipe pronta para ajudar em cada etapa da sua jornada digital.</p>
            </div>
        </div>
    </div>
</div>

<div class="cta">
    <div class="container">
        <h2>Comece a organizar em segundos</h2>
        <p>Simplifique a gestão do seu estoque hoje mesmo</p>
        <a href="<?= $BASE_URL ?>/registro.php" class="normal-button">Criar Conta Grátis</a>
    </div>
</div>

<?php require_once("templates/footer.phtml") ?>
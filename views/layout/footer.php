</div>
    </main>

    <footer>
        <div class="footer-container">
            <!--<div class="developer-info">
                <p>Desenvolvido por <span class="developer-name">Wesley Barbaro</span></p>
                <div class="footer-tech">
                    <span class="tech-badge">PHP MVC</span>
                    <span class="tech-badge">Arquitetura</span>
                </div>
            </div>
            -->

            <div class="footer-content">
                <div class="footer-section">
                    <h3>📰 Sobre</h3>
                    <p>Blog MVC em PHP - Um projeto moderno de arquitetura de software com design responsivo.</p>
                </div>

                <div class="footer-section">
                    <h3>🔗 Links</h3>
                    <a href="index.php">🏠 Início</a>
                    <a href="index.php?controller=noticia&action=listar">📰 Notícias</a>
                </div>

                <div class="footer-section">
                    <h3>💻 Tech</h3>
                    <p>PHP 8 • HTML5 • CSS3 • JavaScript</p>
                </div>
            </div>

            <div class="footer-divider"></div>

            <div class="footer-bottom">
                <div class="footer-copyright">
                    © <?= date('Y'); ?> Blog MVC em PHP — Todos os direitos reservados.
                </div>
            </div>
        </div>
    </footer>

    <style>
        footer {
            background: linear-gradient(135deg, #1a202c 0%, #2d3748 100%);
            color: white;
            padding: 50px 20px;
            margin-top: auto;
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .developer-info {
            background: rgba(102, 126, 234, 0.1);
            border-left: 4px solid #667eea;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 30px;
        }

        .developer-info p {
            margin-bottom: 8px;
            font-size: 15px;
        }

        .developer-name {
            color: #667eea;
            font-weight: 700;
        }

        .footer-tech {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
            margin-top: 10px;
        }

        .tech-badge {
            background: rgba(102, 126, 234, 0.2);
            color: #667eea;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            margin-bottom: 40px;
        }

        .footer-section h3 {
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 16px;
            text-transform: uppercase;
            letter-spacing: 1px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .footer-section p {
            color: #cbd5e0;
            font-size: 14px;
            line-height: 1.8;
            margin-bottom: 10px;
        }

        .footer-section a {
            color: #cbd5e0;
            text-decoration: none;
            font-size: 14px;
            transition: all 0.3s ease;
            display: block;
            margin-bottom: 8px;
        }

        .footer-section a:hover {
            color: #667eea;
            transform: translateX(4px);
        }

        .footer-divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, #667eea, transparent);
            margin: 30px 0;
        }

        .footer-bottom {
            text-align: center;
        }

        .footer-copyright {
            color: #a0aec0;
            font-size: 13px;
        }

        @media (max-width: 768px) {
            footer {
                padding: 30px 15px;
            }

            .footer-content {
                grid-template-columns: 1fr;
                gap: 25px;
            }
        }
    </style>
</body>
</html>
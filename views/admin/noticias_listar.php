<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 30px 20px;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
        }

        /* Header */
        .dashboard-header {
            background: white;
            border-radius: 20px;
            padding: 35px;
            margin-bottom: 30px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
            animation: slideIn 0.5s ease-out;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .header-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .header-title {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .header-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
        }

        h1 {
            color: #1a202c;
            font-size: 32px;
            font-weight: 700;
        }

        .logout-btn {
            background: #ef5350;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .logout-btn:hover {
            background: #e53935;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(239, 83, 80, 0.3);
        }

        .action-buttons {
            display: flex;
            gap: 12px;
        }

        .btn-new {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 14px 28px;
            border-radius: 12px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .btn-new:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 28px rgba(102, 126, 234, 0.4);
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 15px;
            margin-top: 25px;
        }

        .stat-box {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            border-radius: 12px;
            text-align: center;
        }

        .stat-number {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .stat-label {
            font-size: 12px;
            opacity: 0.9;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* News Section */
        .news-section {
            animation: slideInUp 0.6s ease-out;
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .section-title {
            color: white;
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .news-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }

        .news-card {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            transition: all 0.3s ease;
            animation: fadeIn 0.6s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.95);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .news-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.25);
        }

        .news-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 20px;
            color: white;
        }

        .news-date {
            font-size: 12px;
            opacity: 0.9;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 8px;
        }

        .news-title {
            font-size: 18px;
            font-weight: 700;
            margin: 0;
            line-height: 1.4;
        }

        .news-body {
            padding: 20px;
        }

        .news-excerpt {
            color: #4a5568;
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 16px;
            min-height: 50px;
        }

        .news-actions {
            display: flex;
            gap: 10px;
            margin-top: 16px;
        }

        .btn-action {
            flex: 1;
            padding: 10px 16px;
            border: none;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            text-transform: uppercase;
            letter-spacing: 0.3px;
        }

        .btn-edit {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .btn-edit:hover {
            transform: translateY(-1px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
        }

        .btn-delete {
            background: #fee;
            color: #c53030;
            border: 1px solid #fc8181;
        }

        .btn-delete:hover {
            background: #fed7d7;
            border-color: #f56565;
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }

        .empty-icon {
            font-size: 64px;
            margin-bottom: 16px;
        }

        .empty-state h2 {
            color: #2d3748;
            margin-bottom: 8px;
            font-size: 22px;
        }

        .empty-state p {
            color: #a0aec0;
            margin-bottom: 24px;
        }

        @media (max-width: 768px) {
            .dashboard-header {
                padding: 20px;
            }

            .header-top {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }

            h1 {
                font-size: 24px;
            }

            .news-grid {
                grid-template-columns: 1fr;
            }

            .action-buttons {
                width: 100%;
                flex-direction: column;
            }

            .btn-new {
                width: 100%;
                justify-content: center;
            }

            .logout-btn {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="dashboard-header">
            <div class="header-top">
                <div class="header-title">
                    <div class="header-icon">⚙️</div>
                    <h1>Painel Administrativo</h1>
                </div>
                <a href="index.php?controller=admin&action=logout" class="logout-btn">🚪 Sair</a>
            </div>

            <div class="action-buttons">
                <a href="index.php?controller=admin&action=adicionar" class="btn-new">+ Nova Notícia</a>
            </div>

            <div class="stats">
                <div class="stat-box">
                    <div class="stat-number" id="totalNews">0</div>
                    <div class="stat-label">Total de Notícias</div>
                </div>
            </div>
        </div>

        <!-- News Section -->
        <div class="section-title">
            📰 Notícias Recentes
        </div>

        <div class="news-grid" id="newsContainer">
            <!-- News cards will be generated here -->
        </div>
    </div>

    <script>
        const noticias = <?php echo json_encode($noticias); ?>;

        function formatDate(dateString) {
            const options = { day: '2-digit', month: '2-digit', year: 'numeric', hour: '2-digit', minute: '2-digit' };
            return new Date(dateString).toLocaleDateString('pt-BR', options);
        }

        function renderNews() {
            const container = document.getElementById('newsContainer');
            
            if (noticias.length === 0) {
                container.innerHTML = `
                    <div class="empty-state" style="grid-column: 1 / -1;">
                        <div class="empty-icon">📭</div>
                        <h2>Nenhuma notícia ainda</h2>
                        <p>Comece criando sua primeira notícia</p>
                        <a href="index.php?controller=admin&action=adicionar" class="btn-new">+ Criar Notícia</a>
                    </div>
                `;
                return;
            }

            container.innerHTML = noticias.map(n => `
                <div class="news-card">
                    <div class="news-header">
                        <div class="news-date">${formatDate(n.data_publicacao)}</div>
                        <h2 class="news-title">${n.titulo}</h2>
                    </div>
                    <div class="news-body">
                        <p class="news-excerpt">${n.conteudo.substring(0, 100)}...</p>
                        <div class="news-actions">
                            <a href="index.php?controller=admin&action=editar&id=${n.id}" class="btn-action btn-edit">✏️ Editar</a>
                            <a href="index.php?controller=admin&action=deletar&id=${n.id}" class="btn-action btn-delete" onclick="return confirm('Tem certeza?')">🗑️ Deletar</a>
                        </div>
                    </div>
                </div>
            `).join('');

            document.getElementById('totalNews').textContent = noticias.length;
        }

        renderNews();
    </script>
</body>
</html>
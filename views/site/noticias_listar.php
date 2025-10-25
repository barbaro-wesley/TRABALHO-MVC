<?php include 'views/layout/header.php'; ?>

<style>
    /* Header Section */
    .news-header {
        text-align: center;
        margin-bottom: 50px;
        animation: slideDown 0.6s ease-out;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .header-icon {
        font-size: 48px;
        margin-bottom: 15px;
    }

    .news-header h1 {
        font-size: 42px;
        color: #1a202c;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .header-subtitle {
        font-size: 16px;
        color: #718096;
        margin-bottom: 30px;
    }

    .header-divider {
        width: 80px;
        height: 4px;
        background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
        margin: 0 auto;
        border-radius: 2px;
    }

    /* News Grid */
    .news-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 30px;
        margin-top: 40px;
        animation: fadeIn 0.8s ease-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }

    .news-card {
        background: white;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
        height: 100%;
        animation: slideUp 0.6s ease-out;
    }

    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .news-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
    }

    .news-card-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 25px;
        color: white;
        flex-grow: 0;
    }

    .news-date {
        font-size: 12px;
        opacity: 0.85;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .date-icon {
        font-size: 14px;
    }

    .news-card-title {
        font-size: 20px;
        font-weight: 700;
        margin: 0;
        line-height: 1.4;
    }

    .news-card-body {
        padding: 25px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .news-card-content {
        color: #4a5568;
        font-size: 15px;
        line-height: 1.7;
        margin-bottom: 20px;
        flex-grow: 1;
        word-wrap: break-word;
        overflow-wrap: break-word;
    }

    .read-more {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: #667eea;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        margin-top: auto;
    }

    .read-more:hover {
        gap: 12px;
        color: #764ba2;
    }

    .arrow {
        transition: transform 0.3s ease;
    }

    .read-more:hover .arrow {
        transform: translateX(3px);
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 80px 20px;
        background: white;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        animation: slideUp 0.6s ease-out;
    }

    .empty-icon {
        font-size: 80px;
        margin-bottom: 20px;
        animation: float 3s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
    }

    .empty-state h2 {
        color: #2d3748;
        font-size: 28px;
        margin-bottom: 10px;
        font-weight: 700;
    }

    .empty-state p {
        color: #a0aec0;
        font-size: 16px;
    }

    @media (max-width: 768px) {
        .news-header h1 {
            font-size: 28px;
        }

        .header-subtitle {
            font-size: 14px;
        }

        .news-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .news-card-header {
            padding: 20px;
        }

        .news-card-body {
            padding: 20px;
        }

        .news-card-title {
            font-size: 18px;
        }

        .empty-state {
            padding: 60px 20px;
        }

        .empty-icon {
            font-size: 64px;
        }
    }
</style>

<!-- Header Section -->
<div class="news-header">
    <div class="header-icon">📰</div>
    <h1>Últimas Notícias</h1>
    <p class="header-subtitle">Mantenha-se informado com as notícias mais recentes</p>
    <div class="header-divider"></div>
</div>

<!-- News Grid -->
<?php if (empty($noticias)): ?>
    <div class="empty-state">
        <div class="empty-icon">📭</div>
        <h2>Nenhuma notícia publicada</h2>
        <p>Estamos preparando as melhores notícias para você. Volte em breve!</p>
    </div>
<?php else: ?>
    <div class="news-grid">
        <?php foreach ($noticias as $n): ?>
            <div class="news-card">
                <div class="news-card-header">
                    <div class="news-date">
                        <span class="date-icon">📅</span>
                        <?= date('d/m/Y \à\s H:i', strtotime($n['data_publicacao'])); ?>
                    </div>
                    <h2 class="news-card-title"><?= htmlspecialchars($n['titulo']); ?></h2>
                </div>
                <div class="news-card-body">
                    <p class="news-card-content"><?= nl2br(htmlspecialchars($n['conteudo'])); ?></p>
                    <a href="#" class="read-more">
                        Leia mais 
                        <span class="arrow">→</span>
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<?php include 'views/layout/footer.php'; ?>
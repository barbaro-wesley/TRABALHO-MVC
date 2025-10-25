<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Notícia</title>
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
            padding: 40px 20px;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
        }

        .page-header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 30px;
            animation: slideIn 0.5s ease-out;
        }

        .header-icon {
            width: 50px;
            height: 50px;
            background: white;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        h1 {
            color: white;
            font-size: 32px;
            font-weight: 700;
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

        .form-card {
            background: white;
            border-radius: 20px;
            padding: 45px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
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

        .form-group {
            margin-bottom: 28px;
        }

        label {
            display: block;
            color: #2d3748;
            font-size: 14px;
            font-weight: 700;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            color: #1a202c;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-size: 15px;
            font-family: inherit;
            color: #2d3748;
            transition: all 0.3s ease;
            background-color: #f8f9fa;
        }

        input[type="text"]:focus,
        textarea:focus {
            outline: none;
            border-color: #667eea;
            background-color: #f8f9ff;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
        }

        textarea {
            resize: vertical;
            min-height: 220px;
            line-height: 1.6;
        }

        textarea::placeholder,
        input[type="text"]::placeholder {
            color: #cbd5e0;
        }

        .form-actions {
            display: flex;
            gap: 12px;
            margin-top: 35px;
        }

        .btn {
            padding: 14px 32px;
            border: none;
            border-radius: 12px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-save {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            flex: 1;
        }

        .btn-save:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 28px rgba(102, 126, 234, 0.4);
        }

        .btn-save:active {
            transform: translateY(0);
        }

        .btn-back {
            background: #e2e8f0;
            color: #2d3748;
            text-decoration: none;
        }

        .btn-back:hover {
            background: #cbd5e0;
            transform: translateX(-2px);
        }

        .btn-back::before {
            content: "←";
            font-size: 16px;
        }

        .char-count {
            font-size: 12px;
            color: #a0aec0;
            margin-top: 6px;
            text-align: right;
        }

        .field-hint {
            font-size: 12px;
            color: #a0aec0;
            margin-top: 6px;
            font-style: italic;
        }

        @media (max-width: 768px) {
            .form-card {
                padding: 30px 20px;
            }

            h1 {
                font-size: 24px;
            }

            .form-actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }

            textarea {
                min-height: 180px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="page-header">
            <div class="header-icon">📰</div>
            <h1>Nova Notícia</h1>
        </div>

        <div class="form-card">
            <form method="POST" id="noticiaForm">
                <div class="form-group">
                    <label for="titulo">Título</label>
                    <input 
                        type="text" 
                        id="titulo" 
                        name="titulo" 
                        placeholder="Digite o título da notícia" 
                        required
                        maxlength="200"
                    >
                    <div class="field-hint">Máximo de 200 caracteres</div>
                </div>

                <div class="form-group">
                    <label for="conteudo">Conteúdo</label>
                    <textarea 
                        id="conteudo" 
                        name="conteudo" 
                        placeholder="Digite o conteúdo da notícia aqui..." 
                        required
                    ></textarea>
                    <div class="char-count">
                        <span id="charCount">0</span> caracteres
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-save">💾 Salvar Notícia</button>
                    <a href="index.php?controller=admin&action=painel" class="btn btn-back">Voltar</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        const textarea = document.getElementById('conteudo');
        const charCount = document.getElementById('charCount');

        textarea.addEventListener('input', function() {
            charCount.textContent = this.value.length;
        });

        document.getElementById('noticiaForm').addEventListener('submit', function(e) {
            if(document.getElementById('titulo').value.trim() === '') {
                e.preventDefault();
                alert('Por favor, preencha o título da notícia');
                return;
            }
            if(document.getElementById('conteudo').value.trim() === '') {
                e.preventDefault();
                alert('Por favor, preencha o conteúdo da notícia');
                return;
            }
        });
    </script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        header("Access-Control-Allow-Origin: *");

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            // Identifica qual formulário disparou a requisição
            $acao = $_POST['acao'] ?? '';

            if ($acao === 'cadastro') {
                // Recebe e higieniza os dados do cadastro
                $username          = trim($_POST['username'] ?? '');
                $password          = $_POST['password'] ?? ''; // Senhas não devem ter trim para não afetar espaços intencionais
                $pergunta_seguranca = $_POST['pergunta_seguranca'] ?? '';
                $resposta_seguranca = trim($_POST['resposta_seguranca'] ?? '');

                // --- INTEGRAÇÃO FUTURA COM BANCO DE DADOS ---
                // Exemplo: $senha_hash = password_hash($password, PASSWORD_DEFAULT);
                // INSERT INTO usuarios (username, password, pergunta, resposta) VALUES (...)
                // ---------------------------------------------

                // Cria o log temporário para validação do teste
                $log_cadastro = "--- NOVO CADASTRO ---" . PHP_EOL .
                                "Usuário: $username" . PHP_EOL .
                                "Pergunta: $pergunta_seguranca | Resposta: $resposta_seguranca" . PHP_EOL .
                                "---------------------" . PHP_EOL;
                file_put_contents('usuarios_log.txt', $log_cadastro, FILE_APPEND);

                echo "Cadastro recebido com sucesso no PHP!";
                exit;
            } 
            
            if ($acao === 'login') {
                // Recebe e higieniza dados de login
                $username = trim($_POST['username'] ?? '');
                $password = $_POST['password'] ?? '';

                // --- INTEGRAÇÃO FUTURA COM BANCO DE DADOS ---
                // SELECT * FROM usuarios WHERE username = :username ...
                // ---------------------------------------------

                $log_login = "[LOGIN] Usuário '$username' tentou autenticar em: " . date('Y-m-d H:i:s') . PHP_EOL;
                file_put_contents('usuarios_log.txt', $log_login, FILE_APPEND);

                echo "Requisição de login processada no PHP!";
                exit;
            }
        }
?>
</body>
</html>
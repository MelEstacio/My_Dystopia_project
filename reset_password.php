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
            // Recebe e higieniza os dados enviados
            $pergunta = $_POST['pergunta_seguranca'] ?? '';
            $resposta = trim($_POST['resposta_seguranca'] ?? '');

            if (!empty($pergunta) && !empty($resposta)) {
                // --- INTEGRAÇÃO FUTURA COM BANCO DE DADOS ---
                // SELECT password FROM usuarios WHERE pergunta = :p AND resposta = :r
                // ---------------------------------------------

                // Grava no arquivo de log para verificação do teste
                $log_recuperacao = "[" . date('Y-m-d H:i:s') . "] Tentativa de Recuperação -> Pergunta ID: $pergunta | Resposta: $resposta" . PHP_EOL;
                file_put_contents('recuperacao_log.txt', $log_recuperacao, FILE_APPEND);

                echo "Requisição de recuperação recebida no PHP!";
                exit;
            }

            echo "Dados incompletos.";
            exit;
        }
?>
</body>
</html>
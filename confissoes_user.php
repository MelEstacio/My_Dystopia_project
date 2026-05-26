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
            // Recebe e limpa a confissão enviada
            $confissao = trim($_POST['confissao'] ?? '');

            if (!empty($confissao)) {
                // --- INTEGRAÇÃO FUTURA COM BANCO DE DADOS ---
                // INSERT INTO confissoes (texto, data, usuario_id) VALUES (:texto, NOW(), :id)
                // ---------------------------------------------

                // Grava no arquivo de log para você testar se está chegando
                $log_confissao = "[" . date('Y-m-d H:i:s') . "] Nova Confissão: " . $confissao . PHP_EOL;
                file_put_contents('confissoes_log.txt', $log_confissao, FILE_APPEND);

                echo "Confissão registrada com sucesso no PHP!";
                exit;
            }
            
            echo "Campo vazio.";
            exit;
        }
?>
</body>
</html>
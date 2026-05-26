<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Respostas do Usuário</title>
</head>
<body>
    <header>
    <h1>Respostas do Usuário</h1>
    </header>
    <main>
   <?php
    // Permite que a página receba requisições assíncronas do JS
        header("Access-Control-Allow-Origin: *");

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // O '??' garante que se o PHP não achar a chave, ele assume '' (vazio) sem dar Warning
            $resposta_km      = trim($_POST['resposta-km'] ?? '');
            $resposta_cor     = trim($_POST['resposta-cor'] ?? '');
            $resposta_som     = trim($_POST['resposta-som'] ?? '');
            
            // ATENÇÃO: Forçamos a busca pelas duas formas para garantir que o PHP ache!
            $resposta_problem = trim($_POST['resposta-problem'] ?? $_POST['resposta-problema'] ?? '');

            // --- TESTE DE DEBBUG: Vamos salvar um arquivo de texto para ver se os dados chegaram
            // Isso cria um arquivo chamado 'teste_log.txt' na mesma pasta do PHP toda vez que envia
            $log = "KM: $resposta_km | Cor: $resposta_cor | Som: $resposta_som | Problema: $resposta_problem" . PHP_EOL;
            file_put_contents('teste_log.txt', $log, FILE_APPEND);
            echo "Sucesso";
            exit;
        }
        ?>
    </main>
</body>
</html>
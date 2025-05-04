<?php
$start_time = microtime(true);

$hostname = gethostname();
$ip = gethostbyname($hostname);
$os = php_uname();
$php_version = phpversion();
$server_software = $_SERVER['SERVER_SOFTWARE'] ?? 'N/A';
$user_agent = $_SERVER['HTTP_USER_AGENT'] ?? 'N/A';
$headers = getallheaders();
$env = getenv();

$execution_time = round((microtime(true) - $start_time) * 1000, 2);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Info da Máquina</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container my-5">
        <h1 class="mb-4">Informações da Máquina</h1>
        <div class="card mb-4">
            <div class="card-body">
                <h5>Dados do Servidor</h5>
                <ul>
                    <li><strong>Hostname:</strong> <?= htmlspecialchars($hostname) ?></li>
                    <li><strong>IP:</strong> <?= htmlspecialchars($ip) ?></li>
                    <li><strong>OS:</strong> <?= htmlspecialchars($os) ?></li>
                    <li><strong>PHP:</strong> <?= htmlspecialchars($php_version) ?></li>
                    <li><strong>Web Server:</strong> <?= htmlspecialchars($server_software) ?></li>
                    <li><strong>Tempo de resposta:</strong> <?= $execution_time ?> ms</li>
                </ul>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-body">
                <h5>User-Agent</h5>
                <p><?= htmlspecialchars($user_agent) ?></p>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-body">
                <h5>Cabeçalhos da Requisição</h5>
                <pre><?= htmlspecialchars(print_r($headers, true)) ?></pre>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5>Variáveis de Ambiente</h5>
                <pre><?= htmlspecialchars(print_r($env, true)) ?></pre>
            </div>
        </div>
    </div>
</body>
</html>
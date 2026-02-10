<?php
function consultarAPI($url) {
    
    $pasta = 'cache';
    if (!is_dir($pasta)) {
        mkdir($pasta, 0777, true);
    }

    $nomeArquivo = $pasta . '/' . md5($url) . '.json';

    if (file_exists($nomeArquivo)) {
        return json_decode(file_get_contents($nomeArquivo), true);
    }

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);

    $resposta = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpCode === 200) {
        file_put_contents($nomeArquivo, $resposta);
        return json_decode($resposta, true);
    }

    return ["erro" => true, "mensagem" => "Erro na API"];
}
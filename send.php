<?php

function obterIdDispositivo() {
    return $_SERVER['REMOTE_ADDR'];
}


function nomearDispositivo($id) {
    return "Dispositivo_" . str_replace('.', '_', $id);
}


if (isset($_GET['texto'])) {
    $texto = $_GET['texto'];
} else {
    die("error text.");
}


$idDispositivo = obterIdDispositivo();
$nomeDispositivo = nomearDispositivo($idDispositivo);

$uniqueId = uniqid();


$dados = array(
    "id" => $idDispositivo,
    "nome" => $nomeDispositivo . "_" . $uniqueId, 
    "mensagem" => $texto
);


$arquivoJson = 'mensagens.json';


$conteudoAtual = array();
if (file_exists($arquivoJson)) {
    $conteudoAtual = json_decode(file_get_contents($arquivoJson), true);
    if (!$conteudoAtual) {
        $conteudoAtual = array();
    }
}


$conteudoAtual[] = $dados;


file_put_contents($arquivoJson, json_encode($conteudoAtual, JSON_PRETTY_PRINT));

echo "sucess!";
?>

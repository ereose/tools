<?php

$jsonFile = 'mensagens.json';


if (file_exists($jsonFile)) {
    $jsonContent = file_get_contents($jsonFile);
    $mensagens = json_decode($jsonContent, true);

    if (is_array($mensagens)) {
        $result = "";


        foreach ($mensagens as $dados) {
            if (isset($dados['id']) && isset($dados['mensagem'])) {
                $id = htmlspecialchars($dados['id']);
                $mensagem = htmlspecialchars($dados['mensagem']);

                $result .= "id: " . $id . "\n";
                $result .= $mensagem . "\n";
                $result .= "-------------\n";
            }
        }


        echo $result;
    } else {
        echo "invalid message";
    }
} else {
    echo "no found.";
}
?>

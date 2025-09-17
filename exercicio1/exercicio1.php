<?php
$nomeArquivo = "frases.txt";

$acao = $_GET['acao']; 

switch ($acao) {
    case "criar":
        $frases = [
            "O PHP é uma linguagem poderosa para web.",
            "Aprender programação requer prática.",
            "Persistência leva ao sucesso."
        ];

        $arquivo = fopen($nomeArquivo, "w");
        foreach ($frases as $linha) {
            fwrite($arquivo, $linha);
        }
        fclose($arquivo);

        echo "Arquivo criado e frases gravadas!";
        break;

    case "ler":
        if (file_exists($nomeArquivo)) {
            $conteudo = file_get_contents($nomeArquivo);
            echo ($conteudo);
        } else {
            echo "Arquivo ainda não foi criado.";
        }
        break;

    default:
        echo "Nenhuma ação definida (use ?acao=criar ou ?acao=ler).";
}
?>

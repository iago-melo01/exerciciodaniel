<?php
$arquivo = "tabuada.txt";


function gerarTabuada($numero, $arquivo) {
    $tabuada = "";

    for ($i = 1; $i <= 10; $i++) {
        $linha = "$i x $numero = " . ($i * $numero);
        $tabuada .= $linha;
    }

    file_put_contents($arquivo, $tabuada, FILE_APPEND);
    return $tabuada;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $acao = $_POST["acao"];

    if ($acao === "gerar") {
        $numero = intval($_POST["numero"]);
        $resultado = gerarTabuada($numero, $arquivo);

        echo "<h2>Tabuada do $numero</h2>";
        echo ($resultado);
        echo "<p>Tabuada salva em <b>$arquivo</b></p>";
    }

    if ($acao === "ver") {
        if (file_exists($arquivo)) {
            echo "<h2>Conteúdo do arquivo $arquivo</h2>";
            echo (file_get_contents($arquivo));
        } else {
            echo "Nenhuma tabuada foi gerada ainda.";
        }
    }
}
?>

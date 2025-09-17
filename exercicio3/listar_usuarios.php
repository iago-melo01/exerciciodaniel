<?php
    $arquivo = 'usuarios.json';
    echo "Usuário Cadastrado com sucesso <br><br>";
    if(file_exists($arquivo)){
        $conteudo_json = file_get_contents($arquivo);
        $usuarios = json_decode($conteudo_json, true);

        foreach($usuarios as $usuario){
            echo '- '. $usuario['nome'] . '<br>';

        }
    }


?>
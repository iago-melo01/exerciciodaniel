<?php
$arquivo_json = 'usuarios.json';

if($_SERVER["REQUEST_METHOD"] == "POST"){ // pra testar qual foi o método enviado pelo formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];


    if(file_exists($arquivo_json)){
        $conteudo_json = file_get_contents($arquivo_json);
        $usuarios =  json_decode($conteudo_json, true); 

        if($usuarios === null || !is_array($usuarios)){
            $usuarios = [];
        } else{ 
            $usuarios = [];
        }

        $novoId = count($usuarios) + 1;
        $novo_usuario = [
            'id' => $novoId,
            'nome' => $nome,
            'email' => $email,
        ];   

        $usuarios[] = $novo_usuario;

        $novo_conteudo_json = json_encode($usuarios, JSON_PRETTY_PRINT);

        if(file_put_contents($arquivo_json, $novo_conteudo_json)){
            
            echo "Usuário Criado com sucesso!<br><br>"; 
            echo "<a href='listar_usuarios.php'>Listar usuários</a>";   
            
        }
        else{
            echo "Erro ao salvar usuário";
        }
    }
    else{
        echo "Método de requisição Inválido";
    }
   
}
?>

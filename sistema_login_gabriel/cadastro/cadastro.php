<?php
    include("conexao.php");

    $nome=$_POST['nome'];
    $telefone=$_POST['telefone'];
    $usuario=$_POST['email'];
    $senha=$_POST['senha'];
    $confi_senha=$_POST['nome'];

    $sql="INSERT INTO cadastro(nome, telefone, email, senha, confi_senha)
                VALUES ('$nome', '$telefone', '$email', '$senha', '$confi_senha')";
if(mysqli_query($conexao, sql)){
    echo "Usuário cadastrado com sucesso";
}
else{
    echo "ERRO".mysqli_connect_error($conexao);
}
mysqli_close($conexao);
?>
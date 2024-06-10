<?php
// Parâmetros de conexão
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cadastro.academi";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Informações do usuário
$nome = "Nome do Usuário";
$telefone = "123456789";
$email = "exemplo@email.com";
$senha = "senha123"; // Senha fornecida pelo usuário
$senha_criptografada = password_hash($senha, PASSWORD_DEFAULT);

// Prepara e executa a inserção
$stmt = $conn->prepare("INSERT INTO usuarios (nome, telefone, email, senha) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $nome, $telefone, $email, $senha_criptografada);

if ($stmt->execute()) {
    echo "Novo registro criado com sucesso!";
} else {
    echo "Erro: " . $stmt->error;
}

// Fecha a conexão
$stmt->close();
$conn->close();
?>

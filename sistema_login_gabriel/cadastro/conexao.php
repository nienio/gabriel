<?php
// Configurações do banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cadastro.academi";

try {
    // Conexão com o banco de dados usando PDO
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Configurar o PDO para lançar exceções em caso de erros
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Dados do usuário para inserção
    $nome = "Nome do Usuário";
    $telefone = "123456789";
    $email = "exemplo@email.com";
    $senha = "senha123";
    $senha_criptografada = password_hash($senha, PASSWORD_DEFAULT);

    // Consulta preparada para inserção de usuário
    $sql = "INSERT INTO usuarios (nome, telefone, email, senha) VALUES (:nome, :telefone, :email, :senha)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':telefone', $telefone);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $senha_criptografada);

    // Executar a consulta preparada
    $stmt->execute();

    echo "Novo registro criado com sucesso!";
} catch(PDOException $e) {
    echo "Erro: " . $e->getMessage();
}

// Fechar a conexão com o banco de dados
$pdo = null;
?>
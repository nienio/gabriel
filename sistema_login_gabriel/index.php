<?php
require_once 'classes/Usuarios.php';
$usuario = new Usuarios();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Sistema de Login </title>
    <link rel="stylesheet" href="style/main.css">
    <link rel="shortcut icon" href="imagens/icon/faicon.jpg">
</head>

<body>

<div id="corpo-form">
    <h1>Sistema de Login</h1>
    <form method="POST">
        <input type="email" name="email" placeholder="Usuário"/>
        <input type="password" name="senha" placeholder="Senha"/>
        <input type="submit" value="ACESSAR" name=""/>
        <a href="cadastrar.php">Ainda não é inscrito? <strong>Inscreva-se!</strong></a>
    </form>
    <div>
</body>

<?php

if (isset($_POST['email'])):

    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);

    if (!empty($email) && !empty($senha)):

        $usuario->conectar("projeto_login", "localhost", "root", "");

        if ($usuario->msgERRO == ""):

            if ($usuario->logar($email, $senha)):

                header("location: areaPrivada.php");
            else:
                ?>
                <div class="msg-erro">
                    E-mail e/ou Senha Incorretos!
                </div>

            <?php

            endif;

        else:

            ?>

            <div class="msg-erro">

                <?php echo "Erro: " . $u->msgERRO; ?>

            </div>

        <?php


        endif;

    else:
        ?>
        <div class="msg-erro">
            Preencha Todos os Campos!
        </div>

    <?php
    endif;
endif;


?>

</html>

<?php

    //Conexão com o Banco de Dados
    require_once 'dbconnect.php';

    //Sessão
    session_start();

    //Verificação 
    if(!isset($_SESSION['logado'])) {
        header('Location: index.php');
    }

    if(isset($_POST['btnCadastrarAnalista'])) {

        $adm = mysqli_escape_string($connect, $_POST['adm']);
        $nome = mysqli_escape_string($connect, $_POST['nome']);
        $login = mysqli_escape_string($connect, $_POST['login']);
        $senha = md5(mysqli_escape_string($connect, $_POST['senha']));

        $sql = "INSERT INTO usuarios (adm, nome, login, senha) VALUES ('$adm', '$nome', '$login', '$senha')";

        if(mysqli_query($connect, $sql)) {
            $_SESSION['mensagem'] = 'Analista cadastrado com Suceso!';
            header('Location: dashboard.php');
        } else {
            $_SESSION['mensagem'] = 'Erro ao cadastar o analista, tente novamente!';
            header('Location: dashboard.php');
        }

    }

    include_once './view/rodape.php';

?>  
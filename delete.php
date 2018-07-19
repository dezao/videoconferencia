<?php

    //Conexão com o Banco de Dados
    require_once 'dbconnect.php';

    //Sessão
    session_start();

    //Verificação 
    if(!isset($_SESSION['logado'])) {
        header('Location: index.php');
    }

    if(isset($_POST['btnDeletar'])) {

        $id = mysqli_escape_string($connect, $_POST['id']);

        $sql = "DELETE FROM videoconferencias WHERE id = '$id'";

        if(mysqli_query($connect, $sql)) {
            $_SESSION['mensagem'] = 'Videoconferência deletada com Suceso!';
            header('Location: dashboard.php');
        } else {
            $_SESSION['mensagem'] = 'Erro ao deletar a Videoconferência, tente novamente!';
            header('Location: dashboard.php');
        }
    }

    include_once './view/rodape.php';
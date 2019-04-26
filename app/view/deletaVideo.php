<?php

    //Cabeçalho
    include_once '../../app/inc/topo.php';
    
    //Query para mostrar o campo ticket no log
    $sql = "SELECT * FROM videoconferencias";
    $resultado = mysqli_query($connect, $sql);
    $dados = mysqli_fetch_array($resultado);
    $ticket = $dados['ticket'];

    if(isset($_POST['btnDeletar'])) {

        $id = mysqli_escape_string($connect, $_POST['id']);

        //$sql = "DELETE FROM videoconferencias WHERE id = '$id'";
        $sql = "UPDATE videoconferencias SET excluido = 1 WHERE id='$id' ";
        //$sql = "UPDATE FROM videoconferencias "

        if(mysqli_query($connect, $sql)) {
            $_SESSION['mensagem'] = 'Videoconferência deletada com Suceso!';
            Logger("Videoconferencia ticket " . $ticket . " deletada por [" . $usuarioLogado . "]");
            header('Location: dashboard.php');
        } else {
            $_SESSION['mensagem'] = 'Erro ao deletar a Videoconferência, tente novamente!';
            header('Location: dashboard.php');
        }
    }

    include_once '../../app/inc/rodape.php';
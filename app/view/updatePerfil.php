<?php

    //Topo
    require_once '../../app/inc/topo.php';

    if(isset($_POST['btnAtualizaPerfil'])) {

        $nome = mysqli_escape_string($connect, $_POST['nome']);
        $login = mysqli_escape_string($connect, $_POST['login']);
        $senha = base64_encode(mysqli_escape_string($connect, $_POST['senha']));
        // $adm = mysqli_escape_string($connect, $_POST['adm']);
        $unidade = mysqli_escape_string($connect, $_POST['unidade']);

        $id = mysqli_escape_string($connect, $_POST['id']);

        $sql = "UPDATE usuarios SET nome='$nome', unidade='$unidade', login='$login', senha='$senha' WHERE id='$id' ";

        if(mysqli_query($connect, $sql)) {
            $_SESSION['mensagem'] = 'Dados atualizados com Suceso!';
            header('Location: dashboard.php');
            Logger("Analista " . $login . " alterado por " . "[".$usuarioLogado."]");
        } else {
            $_SESSION['mensagem'] = 'Erro ao atualizar os dados, tente novamente!';
            header('Location: dashboard.php');
        }
    }

    include_once '../../app/inc/rodape.php';
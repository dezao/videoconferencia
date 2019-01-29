<?php

    require_once '../../app/inc/topo.php';

    if(isset($_POST['btnCadastrarAnalista'])) {
        
        $adm = mysqli_escape_string($connect, $_POST['adm']);
        $ativo = mysqli_escape_string($connect, $_POST['ativo']);
        $nome = mysqli_escape_string($connect, $_POST['nome']);
        $unidade = mysqli_escape_string($connect, $_POST['unidade']);
        $login = mysqli_escape_string($connect, $_POST['login']);
        $senha = base64_encode(mysqli_escape_string($connect, $_POST['senha']));

        $sql = "INSERT INTO usuarios (adm, ativo, nome, unidade, login, senha) VALUES ('$adm', '$ativo','$nome', '$unidade', '$login', '$senha')";

        if(mysqli_query($connect, $sql)) {
            $_SESSION['mensagem'] = 'Analista cadastrado com Suceso!';
            header('Location: ./../view/listaAnalista.php');
            Logger("Analista " . $login .' - '.$nome . " cadastrado por " .'['. $usuarioLogado.']');
        } else {
            $_SESSION['mensagem'] = 'Erro ao cadastar o analista, tente novamente!';
            header('Location: ./../view/listaAnalista.php');
            Logger("Erro ao cadastrar o usuário" . $login);
        }

    }

    include_once '../../app/inc/rodape.php';

?>  
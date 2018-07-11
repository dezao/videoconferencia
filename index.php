<?php
    //Conexão com o Banco de Dados
    require_once 'dbconnect.php';
    
    //Sessão
    session_start();
    
    //Botão Enviar
    if(isset($_POST['btnLogar'])){
        $erros = array();
        $login = mysqli_escape_string($connect, $_POST['login']);
        $senha = mysqli_escape_string($connect, $_POST['senha']);

        if(empty($login) || empty($senha)){      
            $erros[] = '<li>O campo login/senha precisa ser preenchido!</li>'; 
        }else {
            $sql = "SELECT login FROM usuarios WHERE login = '$login'";
            $resultado = mysqli_query($connect, $sql);

            if(mysqli_num_rows($resultado) > 0) {
                $senha = md5($senha);
               $sql = "SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha'" ;
               $resultado = mysqli_query($connect, $sql);

                    if(mysqli_num_rows($resultado) == 1) {
                        $dados = mysqli_fetch_array($resultado);
                        $_SESSION['logado'] = true;
                        $_SESSION['id_usuario'] = $dados['id'];
                        header('Location: dashboard.php');
                    } else {
                        $erros[] = '<li>Usuário e senha não conferem</li>';
                    }
            }else {
               $erros[] = '<li>Usuário inexistente</li>';
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Materialize CSS-->
    <link rel="stylesheet" href="css/materialize.min.css">
    <!--Custom CSS-->
    <link rel="stylesheet" href="css/custom.css">
    <title>Agendamento de Video Conferência</title>
</head>
<body>

    <div class="container">
        <div class="row">
            <h1 >Sistema de Video Conferência</h1>
           
            <?php
                if(!empty($erros)){
                    foreach($erros as $erro){
                        echo $erro;
                    }
                }
            ?>
           
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            Login: <input type="text" name="login" id=""><br>
            Senha: <input type="password" name="senha" id=""><br>
            <input type="submit"  name="btnLogar" value="Login">
            </form>
        </div>

    </div>

    <!--JQuery-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <!--Materialize JS-->
    <script src="js/materialize.min.js"></script>
    <!--Custom JavaScript-->
    <script srand="js/custom.js"> </script>
</body>
</html>
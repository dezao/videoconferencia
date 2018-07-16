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
           
                $erros[] = '<div align="center" class="card-panel red lighten-4 red-text text-darken-4">O campo login/senha precisam ser preenchidos!</div><br>'; 

        }else {
            $sql = "SELECT login FROM usuarios WHERE login = '$login'";
            $resultado = mysqli_query($connect, $sql);

            if(mysqli_num_rows($resultado) > 0) {
                $senha = md5($senha);
                $sql = "SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha'" ;
                $resultado = mysqli_query($connect, $sql);

                    if(mysqli_num_rows($resultado) == 1) {
                        $dados = mysqli_fetch_array($resultado);
                        mysqli_close($connect);
                        $_SESSION['logado'] = true;
                        $_SESSION['id_usuario'] = $dados['id'];
                        header('Location: dashboard.php');
                    } else {
                        $erros[] = '<div align="center" class="card-panel red lighten-4 red-text text-darken-4">Usuário e senha não conferem, verifique!</div><br>';
                    }
            }else {
               $erros[] = '<div align="center" class="card-panel red lighten-4 red-text text-darken-4">Usuário inexistente!</div><br>';
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
    <title>Agendamento de Videoconferência</title>
</head>
<body>

    <div class="container">
        <div class="row">
        <h4 align='center'>Sistema de Videoconferência</h4>
            <div class="input-field col s6 offset-s3">
                <?php
                    if(!empty($erros)){
                        foreach($erros as $erro){
                            echo $erro;
                        }
                    }
                ?>
            
                <form class="col s12 m12" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                
                <label for="login">Login</label>
                <input type="text" name="login" id="login"  class="validate" placeholder="Seu CS"><br>
                <label for="senha">Senha</label>
                <input type="password" name="senha" id="senha" class="validate" placeholder="Sua Senha"><br>
                <br>
                <button class="btn waves-effect waves-light btn-large #880e4f pink darken-4" type="submit" name="btnLogar">Logar
                    <i class="material-icons right">send</i>
                </button>

                </form>
            </div>
        </div>

    </div>

    <!--JQuery-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <!--Materialize JS-->
    <script src="js/materialize.min.js"></script>
    <!--Custom JavaScript-->
    <script src="js/custom.js"> </script>
    <!--Sweet Alert-->
    <script src="js/sweetalert.min.js"></script>
</body>
</html>
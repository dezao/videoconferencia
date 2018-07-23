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
           
                $erros[] = '<div align="center" id="erroLogin" class="card-panel red lighten-4 red-text text-darken-4">O campo login/senha precisam ser preenchidos!</div><br>'; 

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
                        $erros[] = '<div align="center" id="erroLogin" class="card-panel red lighten-4 red-text text-darken-4">Usuário e senha não conferem, verifique!</div><br>';
                    }
            }else {
               $erros[] = '<div align="center" id="erroLogin" class="card-panel red lighten-4 red-text text-darken-4">Usuário inexistente!</div><br>';
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
        <h4 class="light center-align">Sistema de Videoconferência</h4>
            <div class="input-field col s6 offset-s3">
                <?php
                    if(!empty($erros)){
                        foreach($erros as $erro){
                            echo $erro;
                        }
                    }
                ?>
                        <div class="col s12 m12">
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                            
                                <div class="input-field col s12">
                                    <input type="text" name="login" id="login" required>
                                    <label for="login">Login</label>
                                </div>
                                <div class="input-field col s12">
                                    <input type="password" name="senha" id="senha" required>
                                    <label for="senha">Senha</label>
                                </div>
                                <br>
                        </div>  
                                <div class="col S6 offset-s3">     
                                    <button class="btn waves-effect waves-light btn-large #880e4f pink darken-4 right" type="submit" name="btnLogar">Logar
                                        <i class="material-icons right">send</i>
                                    </button>
                                </div> 
                            </form>     
            </div>
        </div>
    </div>

    <script type="text/javascript">
        setTimeout(function() {
        $('#erroLogin').fadeOut('fast');
        }, 2000);
	</script>

<?php
    include_once './view/rodape.php';
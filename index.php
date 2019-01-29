<?php
    //Conexão com o Banco de Dados
    require_once './app/inc/dbconnect.php';
    
    //Sessão
    session_start();
    
    //Botão Enviar
    if(isset($_POST['btnLogar'])){
        $erros = array();
        $login = mysqli_escape_string($connect, $_POST['login']);
        $senha = mysqli_escape_string($connect, $_POST['senha']);
	
        if(empty($login) || empty($senha)){      
            $erros[] = '<div align="center" id="erroLogin" class="card-panel red lighten-4 red-text text-darken-4">O campo login/senha precisam ser preenchidos!</div><br>'; 
        } else {
            $sql = "SELECT login FROM usuarios WHERE login = '$login'";
            $resultado = mysqli_query($connect, $sql);

            if(mysqli_num_rows($resultado) > 0) {
                $senha = base64_encode($senha);
                $sql = "SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha' " ;
                $resultado = mysqli_query($connect, $sql);

                    if(mysqli_num_rows($resultado) == 1) {
                        $dados = mysqli_fetch_array($resultado);
                        mysqli_close($connect);
                        if ($dados['ativo'] != 1) {
                            $erros[] = '<div align="center" id="erroLogin" class="card-panel red lighten-4 red-text text-darken-4">Usuaro bloqueado!</div><br>';
                        } else {
                        $_SESSION['logado'] = true;
                        $_SESSION['id_usuario'] = $dados['id'];   
                        header('Location: ./app/view/dashboard.php');
                        }  
                    } else {
                        $erros[] = '<div align="center" id="erroLogin" class="card-panel red lighten-4 red-text text-darken-4">Usuário e senha não conferem, verifique!</div><br>';
                    }
            } else {
               $erros[] = '<div align="center" id="erroLogin" class="card-panel red lighten-4 red-text text-darken-4">Usuário inexistente!</div><br>';
            } 
        }
    }
    
    //Verifica se existe uma sessão do usuário
    if (!empty($_SESSION['logado'])) {
        header ('Location: ./app/view/dashboard.php');
        logar();
    } else {
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Materialize CSS-->
    <link rel="stylesheet" type="text/css" href="./assets/css/materialize.min.css">
    <!--Custom CSS-->
    <link rel="stylesheet" type="text/css" href="./assets/css/login.css"/>
    
    <title>Painel de Videoconferência</title>
</head>

<body>
  <div class="section"></div>
  <main>
    <center>
      <img class="responsive-img" width="250" src="./assets/img/raizen_logo.png" />
      <div class="section"></div>
      <h3 class="flow-text">PAINEL DE VIDEOCONFERÊNCIA</h3> 
      <div class="section"></div>

      <div class="container">
        <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 0px 100px 0px 100px; border: 1px solid #EEE;">
        <?php
            if(!empty($erros)){
                foreach($erros as $erro){
                    echo $erro;
                }
            }
		    ?>
          <form class="col s12" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class='row'>
              <div class='col s12'></div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='text' name='login' id='login'/>
                <label for='login'>Login</label>
              </div>
            </div>
              
            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='password' name='senha' id='senha'/>
                <label>Senha</label>
              </div>
            </div>

            <center>
              <div class='row'>
                <button type='submit' name='btnLogar' class='col s12 btn btn-large waves-effect #880e4f pink darken-4'>Login</button>
              </div>
            </center>
          </form>
        </div>
      </div>
    </center>
  </main>

    <script type="text/javascript">
        setTimeout(function() {
        $('#erroLogin').fadeOut('fast');
        }, 2000);
    </script>

    <script type="text/javascript" src="./assets/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="./assets/js/materialize.min.js"></script>
    <?php }; ?>
</body>
</html>
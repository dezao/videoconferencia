<?php

//Cabeçalho
include_once '../../app/inc/topo.php';

//SELECT
if (isset($_GET['id'])) {
    $id = mysqli_escape_string($connect, $_GET['id']);

    $sqlEdita = "SELECT * FROM usuarios WHERE id = '$id' ";
    $resultadoEdita = mysqli_query($connect, $sqlEdita);
    $dadosEdita = mysqli_fetch_array($resultadoEdita);
}
if ($idUsuario != $id && $usuarioAdm != 1) {
    echo "<h3 align='center'>VOCÊ NÃO TEM PERMISSÃO PARA ACESSA ESTA PÁGINA!</h3>";
} else {
?>

<h3 class="light center-align">EDIÇÃO DE PERFIL</h3>
<hr>
    <div class="container">
        <div class="row">
            <div class="col s12 m12">
                <form action="updatePerfil.php" method="POST">
                   <input type="hidden" name="id" id="id" value="<?php echo $dadosEdita['id']; ?>">
                   <input type="hidden" name="adm" id="adm" value="<?php echo $dadosEdita['adm']; ?>">
                   <input type="hidden" name="ativo" id="ativo" value="<?php echo $dadosEdita['ativo']; ?>">
                    <div class="input-field col s12">
                        <input type="text" name="nome" id="nome" value="<?php echo $dadosEdita['nome']; ?>">
                        <label for="nome">Nome</label>
                    </div>
                    <div class="input-field col s12">
                        <input type="text" name="unidade" id="unidade" value="<?php echo $dadosEdita['unidade']; ?>" readonly>
                        <label for="unidade">Unidade</label>
                    </div>
                    <div class="input-field col s12">
                        <input type="text" name="login" id="login" readonly value="<?php echo $dadosEdita['login']; ?>">
                        <label for="login">Login</label>
                    </div>
                    <div class="input-field col s12">
                        <input type="password" name="senha" id="senha" value="<?php echo base64_decode($dadosEdita['senha']);?>" required>
                        <label for="senha">Senha</label>
                    </div>

                    <button type="submit" name="btnAtualizaPerfil" class="btn green waves-effect waves-light">Atualizar</button>
                    <a href="dashboard.php" class="btn red waves-effect waves-light">Cancelar</a>
                </form>
            </div>
        </div>
    </div>

<?php
	}
    //Rodapé
    include_once '../../app/inc/rodape.php';

?>
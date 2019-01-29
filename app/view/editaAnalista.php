<?php

//Cabeçalho
include_once '../../app/inc/topo.php';

//SELECT
if (isset($_GET['id'])) {
    $id = mysqli_escape_string($connect, $_GET['id']);
    $sqlEdita = "SELECT * FROM usuarios WHERE id = '$id'";
    $resultadoEdita = mysqli_query($connect, $sqlEdita);
    $dadosEdita = mysqli_fetch_array($resultadoEdita);
}

if ($usuarioAdm != 1) {
    echo "<h3 align='center'>VOCÊ NÃO TEM PERMISSÃO PARA ACESSA ESTA PÁGINA!</h3>";
} else {
?>

<h3 class="light center-align">EDIÇÃO DE ANALISTAS</h3>
<hr>
    <div class="container">
        <div class="row">
            <div class="col s12 m12">
                <form action="updateAnalista.php" method="POST">
                   
                   <input type="hidden" name="id" id="id" value="<?php echo $dadosEdita['id']; ?>">
                    <div class="input-field col s12">
                      <select name="adm" id="adm">
                        <?php 
                            $userAdm = $dadosEdita['adm'];
                            if ($userAdm == 1) {
                                echo "<option value='1'>SIM</option>";
                            } else {
                                echo "<option value='0'>NÃO</option>";
                            }
                        ?> 
                            <option value="1">SIM</option>
                            <option value="0">NÃO</option>
                        </select>
                        <label for="vip">ADMINISTRADOR</label>
                    </div>

                    <div class="input-field col s12">
                        <select name="ativo" id="ativo">
                        <?php 

                            $userAtivo = $dadosEdita['ativo'];
                            if ($userAtivo == 1) {
                                echo "<option value='1'>ATIVO</option>";
                            } else {
                                echo "<option value='0'>BLOQUEADO</option>";
                            }
                        ?> 
                            <option value="1">ATIVO</option>
                            <option value="0">BLOQUEADO</option>
                        </select>
                        <label for="ativo">STATUS</label>
                    </div>

                    <div class="input-field col s12">
                        <input type="text" name="nome" id="nome" value="<?php echo $dadosEdita['nome']; ?>">
                        <label for="nome">Nome</label>
                    </div>
                    <div class="input-field col s12">
                        <input type="text" name="unidade" id="unidade" value="<?php echo $dadosEdita['unidade'];?>">
                        <label for="unidade">Unidade</label>
                    </div>
                    <div class="input-field col s12">
                        <input type="text" name="login" id="login" value="<?php echo $dadosEdita['login']; ?>">
                        <label for="login">Login</label>
                    </div>
                    <div class="input-field col s12">
                        <input type="password" name="senha" id="senha" value="<?php echo base64_decode($dadosEdita['senha']); ?>">
                        <label for="senha">Senha</label>
                    </div>

                    <button type="submit" name="btnAtualizaAnalista" class="btn green waves-effect waves-light">Atualizar</button>
                    <a href="listaAnalista.php" class="btn red waves-effect waves-light">Cancelar</a>
                </form>
            </div>
        </div>
    </div>

<?php
    }
    //Rodapé
    include_once '../../app/inc/rodape.php';
?>
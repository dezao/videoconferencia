<?php

//Cabeçalho
include_once './view/topo.php';

//SELECT
if (isset($_GET['id'])) {
    $id = mysqli_escape_string($connect, $_GET['id']);

    $sqlEdita = "SELECT * FROM usuarios WHERE id = '$id' ";
    $resultadoEdita = mysqli_query($connect, $sqlEdita);
    $dadosEdita = mysqli_fetch_array($resultadoEdita);
}

?>
<h3 class="light center-align">EDIÇÃO DE ANALISTAS</h3>
<hr>
    <div class="container">
        <div class="row">
            <div class="col s12 m12">
                <form action="update.php" method="POST">
                   
                   <input type="hidden" name="id" id="id" value="<?php echo $dadosEdita['id']; ?>">
                    <div class="input-field col s12">
                        <select name="adm" id="adm">
                        <?php 

                            $sim_nao = $dadosEdita['adm'];
                            if ($sim_nao == 1) {
                                echo "<option value='SIM'>SIM</option>";
                            } else {
                                echo "<option value='NÂO'>NÃO</option>";
                            }
                            //echo "<option value='".$sim_nao."'>".$sim_nao."</option>"; 
                        ?> 
                            <option value="1">SIM</option>
                            <option value="0">NÃO</option>
                        </select>
                        <label for="vip">ADM?</label>
                    </div>

                    <div class="input-field col s12">
                        <input type="text" name="nome" id="nome" value="<?php echo $dadosEdita['nome']; ?>">
                        <label for="nome">Nome</label>
                    </div>
                    <div class="input-field col s12">
                        <input type="text" name="login" id="login" value="<?php echo $dadosEdita['login']; ?>">
                        <label for="login">Login</label>
                    </div>
                    <div class="input-field col s12">
                        <input type="password" name="senha" id="senha" value="<?php echo $dadosEdita['senha']; ?>">
                        <label for="senha">Senha</label>
                    </div>

                    <button type="submit" name="btnCadastrarAnalista" class="btn green waves-effect waves-light">Cadastrar</button>
                    <a href="dashboard.php" class="btn red waves-effect waves-light">Cancelar</a>
                </form>
            </div>
        </div>
    </div>

<?php

    //Rodapé
    include_once './view/rodape.php';

?>
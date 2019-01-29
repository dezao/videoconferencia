<?php

//Cabeçalho
include_once '../../app/inc/topo.php';

if ($usuarioAdm != 1) {
    echo "<h3 align='center'>VOCÊ NÃO TEM PERMISSÃO PARA ACESSA ESTA PÁGINA!</h3>";
} else {
?>
<h3 class="light center-align">CADASTRO DE ANALISTAS</h3>
<hr>
    <div class="container">
        <div class="row">
            <div class="col s12 m12">
                <form action="./createAnalista.php" method="POST">

                    <div class="input-field col s12">
                        <select name="adm" id="adm" required>
                            <option value="" disabled selected>--</option>
                            <option value="1">SIM</option>
                            <option value="0">NÃO</option>
                        </select>
                        <label for="adm">Administrador</label>
                    </div>
                    
                    <div class="input-field col s12">
                        <select name="ativo" id="ativo" required>
                            <option value="" disabled selected>--</option>
                            <option value="1">ATIVO</option>
                            <option value="0">BLOQUEADO</option>
                        </select>
                        <label for="ativo">Status</label>
                    </div>
                   
                    <div class="input-field col s12">
                        <input type="text" name="nome" id="nome" required>
                        <label for="nome">Nome</label>
                    </div>
                    <div class="input-field col s12">
                        <input type="text" name="unidade" id="unidade" required>
                        <label for="unidade">Unidade</label>
                    </div>
                    <div class="input-field col s12">
                        <input type="text" name="login" id="login" required>
                        <label for="login">Login</label>
                    </div>
                    <div class="input-field col s12">
                        <input type="password" name="senha" id="senha" required>
                        <label for="senha">Senha</label>
                    </div>

                    <button type="submit" name="btnCadastrarAnalista" class="btn green waves-effect waves-light">Cadastrar</button>
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
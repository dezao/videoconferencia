<?php

//Cabeçalho
include_once './view/topo.php';

?>
<h3 class="light center-align">CADASTRO DE VIDEOCONFERÊNCIA</h3>
<hr>
    <div class="container">
        <div class="row">
            <div class="col s12 m12">
                <form action="create.php" method="POST">
                   
                    <div class="input-field col s12">
                        <input type="number" name="ticket" id="ticket">
                        <label for="ticket">Ticket</label>
                    </div>
                    <div class="input-field col s12">
                        <input type="date" name="dia" id="dia">
                        <label for="dia">Dia</label>
                    </div>
                    <div class="input-field col s12">
                        <input type="time" name="inicio" id="inicio">
                        <label for="inicio">Início</label>
                    </div>

                    <div class="input-field col s12">
                        <input type="time" name="fim" id="fim">
                        <label for="fim">Fim</label>
                    </div>

                    <div class="input-field col s12">
                        <input type="text" name="participantes" id="participantes">
                        <label for="participantes">Participantes</label>
                    </div>   

                    <div class="input-field col s12">    
                        <input type="text" name="unidades" id="unidades">
                        <label for="unidades">Unidades</label>
                    </div>  

                    <div class="input-field col s12">
                        <input type="text" name="salasFisicas" id="salasFisicas">
                        <label for="salasFisicas">Salas Físicas</label>
                    </div>     

                    <div class="input-field col s12">    
                        <input type="text" name="pin" id="pin">
                        <label for="pin">PIN</label>
                    </div>

                    <button type="submit" name="btnCadastrar" class="btn waves-effect waves-light">Cadastrar</button>
                    <a href="dashboard.php" class="btn green waves-effect waves-light">Lista de Videoconferência</a>
                </form>
            </div>
        </div>
    </div>

<?php

    //Rodapé
    include_once './view/rodape.php';

?>
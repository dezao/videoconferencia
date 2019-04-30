<?php

//Cabeçalho
include_once '../../app/inc/topo.php';

?>

<h3 class="light center-align">CADASTRO DE VIDEOCONFERÊNCIA</h3>
<hr>
    <div class="container">
        <div class="row">
            <div class="col s12 m12">
                <form action="createVideo.php" method="POST" id="insert_form">

                    <div class="input-field col s12">
                        <input type="number" name="ticket" id="ticket" onblur="valTicket()" required>
                        <label for="ticket">Ticket</label>
                    </div>
                    
                    <div class="input-field col s12">
                        <select name="vip" id="vip" required>
                            <option value="" disabled selected>--</option>
                            <option value="SIM">SIM</option>
                            <option value="NÃO">NÃO</option>
                        </select>
                        <label for="vip">VIP?</label>
                    </div>

                    <div class="input-field col s12">
                        <input type="date" name="dia" id="dia" required>
                        <label for="dia">Dia</label>
                    </div>

                    <div class="input-field col s12">
                        <input type="time" name="inicio" id="inicio" required>
                        <label for="inicio">Início</label>
                    </div>

                    <div class="input-field col s12">
                        <input type="time" name="fim" id="fim" required>
                        <label for="fim">Fim</label>
                    </div>

                    <div class="input-field col s12">
                        <label for="Salas Físicas">Salas Físicas</label>
                    </div>

                    <!--BLOCO 1-->
                    <div class="input-field col s12">

                        <!--CURITIBA-->
                        <div class="input-field col s4">
                            <ul class="collapsible">
                                <li>
                                    <div class="collapsible-header"><i class="material-icons">desktop_mac</i>CURITIBA</div>

                                    <div class="collapsible-body">
                                                                                
                                        <p>
                                            <label>
                                                <input class="with-gap" name="cwb" type="radio" value="CWB (Sala Brasil), ">
                                                <span>BRASIL</span>
                                            </label>
                                        </p>

                                        <p>
                                        <label>
                                            <input class="with-gap" name="cwb" type="radio" value="CWB (Sala Conselho), ">
                                            <span>CONSELHO</span>
                                        </label>
                                        </p>

                                        <p>
                                            <label>
                                                <input class="with-gap" name="cwb" type="radio" value="CWB (Sala Itirapina), ">
                                                <span>ITIRAPINA</span>
                                            </label>
                                        </p>


                                        <p>
                                            <label>
                                                <input class="with-gap" name="cwb" type="radio" value="CWB (Sala Mato Grosso do Sul), ">
                                                <span>MATO GROSSO DO SUL</span>
                                            </label>
                                        </p>

                                        <p>
                                            <label>
                                                <input class="with-gap" name="cwb" type="radio" value="CWB (Sala Rio Grande do Sul), ">
                                                <span>RIO GRANDE DO SUL</span>
                                            </label>
                                        </p>
                                        
                                        <p>
                                            <label>
                                                <input class="with-gap" name="cwb" type="radio" value="CWB (Sala Rondonópolis), ">
                                                <span>RONDONÓPOLIS</span>
                                            </label>
                                        </p>

                                        <p>
                                        <label>
                                            <input class="with-gap" name="cwb" type="radio" value="CWB (Sala 1), ">
                                            <span>SALA 1</span>
                                        </label>
                                        </p>

                                        <p>
                                        <label>
                                            <input class="with-gap" name="cwb" type="radio" value="CWB (Sala 2), ">
                                            <span>SALA 2</span>
                                        </label>
                                        </p>

                                        <p>
                                        <label>
                                            <input class="with-gap" name="cwb" type="radio" value="CWB (Sala São Paulo), ">
                                            <span>SÃO PAULO</span>
                                        </label>
                                        </p>

                                    </div>
                        
                                </li>
                            </ul>
                        </div>

                        <!--CAR-->
                        <div class="input-field col s4">
                            <ul class="collapsible">
                                <li>
                                    <div class="collapsible-header"><i class="material-icons">desktop_mac</i>CAR</div>

                                    <div class="collapsible-body">
                                        <p>
                                            <label>
                                                <input class="with-gap" name="car" type="radio" value="CAR (Sala 1), " />
                                                <span>SALA 1</span>
                                            </label>
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <!--FARIA LIMA-->
                        <div class="input-field col s4">
                            <ul class="collapsible">
                                <li>
                                    <div class="collapsible-header"><i class="material-icons">desktop_mac</i>FARIA LIMA</div>
                                    
                                    <div class="collapsible-body">
                                        <p>
                                            <label>
                                                <input class="with-gap" name="fl" type="radio" value="FL (Sala 14.01), "/>
                                                <span>SALA 1</span>
                                            </label>
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>

                    </div>

                    <!--BLOCO 2-->
                    <div class="input-field col s12">
                        
                        <!--COMGAS-->
                        <div class="input-field col s4">
                                <ul class="collapsible">
                                    <li class="center-text">
                                        <div class="collapsible-header"><i class="material-icons">desktop_mac</i>COMGAS</div>
                                        
                                        <div class="collapsible-body">
                                            <p>
                                                <label>
                                                    <input class="with-gap" name="comgas" type="radio" value="COMGAS (Sala Comgas), " />
                                                    <span>SALA 1</span>
                                                </label>
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                        <!--FIGUEIRA-->                    
                        <div class="input-field col s4">
                            <ul class="collapsible">
                                <li>
                                    <div class="collapsible-header"><i class="material-icons">desktop_mac</i>FIGUEIRA</div>
                                    
                                    <div class="collapsible-body">
                                        <p>
                                            <label>
                                                <input class="with-gap" name="figueira" type="radio"value="FIGUEIRA (Sala Figueira), " />
                                                <span>SALA 1</span>
                                            </label>
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <!--ARARAQUARA-->
                        <div class="input-field col s4">
                            <ul class="collapsible">
                                <li>
                                    <div class="collapsible-header"><i class="material-icons">desktop_mac</i>ARARAQUARA</div>
                                    
                                    <div class="collapsible-body">
                                        <p>
                                            <label>
                                                <input class="with-gap" name="ara" type="radio" value="ARA (Sala PCM), "/>
                                                <span>SALA 1</span>
                                            </label>
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>

                    </div>

                    <!--BLOCO 3-->
                    <div class="input-field col s12">
                        <!--RONDONÓPOLIS-->
                            <div class="input-field col s4">
                                <ul class="collapsible">
                                    <li>
                                        <div class="collapsible-header"><i class="material-icons">desktop_mac</i>RONDONÓPOLIS</div>
                                        
                                        <div class="collapsible-body">
                                            <p>
                                                <label>
                                                    <input class="with-gap" name="tro" type="radio" value="TRO (Sala Brasil), " />
                                                    <span>SALA 1</span>
                                                </label>
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <!--SANTOS TERMINAL-->
                            <div class="input-field col s4">
                                <ul class="collapsible">
                                    <li>
                                        <div class="collapsible-header"><i class="material-icons">desktop_mac</i>SANTOS - TERMINAL</div>
                                        
                                        <div class="collapsible-body">
                                            <p>
                                                <label>
                                                    <input class="with-gap" name="san_ter" type="radio" value="SAN_TRMINAL (Sala Terminal), " />
                                                    <span>SALA 1</span>
                                                </label>
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <!--SANTOS TERMINAL-->
                            <div class="input-field col s4">
                                <ul class="collapsible">
                                    <li>
                                        <div class="collapsible-header"><i class="material-icons">desktop_mac</i>SANTOS - PORTO</div>
                                        
                                        <div class="collapsible-body">
                                            <p>
                                                <label>
                                                    <input class="with-gap" name="san_porto" type="radio" value="SAN_PORTO (Sala Portofer), " />
                                                    <span>SALA 1</span>
                                                </label>
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                    </div>

                    <!--BLOCO 4 OUTRAS UNIDADES - UNIDADES EXTERNAS-->
                    <div class="input-field col s12">
                        <div class="input-field col s12">
                            <ul class="collapsible">
                                <li>
                                    <div class="collapsible-header"><i class="material-icons">desktop_mac</i>OUTRAS UNIDADES OU EMPRESAS EXTERNAS</div>
                                    
                                    <div class="collapsible-body">
                                        <input type="text" name="outros" id="outros">
                                    </div>                                
                                </li>
                            </ul>
                        </div>   
                    </div>

                    <!-- <div class="input-field col s12">
                        <input type="text" name="salasFisicas" id="salasFisicas" required>
                        <label for="salasFisicas">Salas Físicas</label>
                    </div> -->

                    <!--PIN-->
                    <div class="input-field col s12">
                        <select name="pin" id="pin" required>
                                <option value="" disabled selected>--</option>
                                <?php

                                    $resultPin = "SELECT * FROM pin";
                                    $resultadoPin = mysqli_query($connect, $resultPin);
                                    while($rowPin = mysqli_fetch_assoc($resultadoPin)){ ?>
                                        <option value="<?php echo $rowPin['id']; ?>"><?php echo $rowPin['pin'].' - '.$rowPin['pinExtenso']; ?></option> <?php
                                    }
                                ?>
                                <!-- <option value="SIM">SIM</option>
                                <option value="NÃO">NÃO</option> -->
                        </select>
                        <label for="pin">PIN</label>
                    </div>

                    <!-- <div class="input-field col s12">    
                        <input type="number" name="pin" id="pin" required>
                        <label for="pin">PIN</label>
                    </div> -->

                    <div class="input-field col s12">
                        <button type="submit" name="btnCadastrar" class="btn green waves-effect waves-light">Cadastrar</button>
                        <a href="dashboard.php" class="btn red waves-effect waves-light">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
<?php
    //Rodapé
    include_once '../../app/inc/rodape.php';

?>
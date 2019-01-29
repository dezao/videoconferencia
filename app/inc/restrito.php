<?php

// Definimos o nome de usuário e senha de acesso
$usuario = "usuario";
$senha = "senha";
 
// Criamos uma função que exibirá uma mensagem de erro caso os dados estejam errados
function erro(){
    // Definindo Cabeçalhos
    header('WWW-Authenticate: Basic realm="Administracao"');
    header('HTTP/1.0 401 Unauthorized');
	// Mensagem que será exibida
    echo '<br><br><br><h1 class="center">VOCÊ NÃO TEM PERMISSÃO PARA ACESSAR ESSA ÁERA</h1>';
	// Pára o carregamento da página
    exit;
}
 
// Se as informações não foram setadas
if (!isset($_SERVER['PHP_AUTH_USER']) or !isset($_SERVER['PHP_AUTH_PW'])) {
	erro();
} 
// Se as informações foram setadas
else {
	// Se os dados informados forem diferentes dos definidos
	if ($_SERVER['PHP_AUTH_USER'] != $usuario or $_SERVER['PHP_AUTH_PW'] != $senha) {
		erro();
	}
}
?>
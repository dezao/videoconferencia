   <!--JQuery-->
   <script src="../../assets/js/jquery-3.3.1.min.js"></script>
    <!--Materialize JS-->
    <script src="../../assets/js/materialize.min.js"></script>
    <!--Custom JavaScript-->
    <script src="../../assets/js/custom.js"> </script>
    <!--Alert-->
    <script type="text/javascript">
        setTimeout(function() {
        $('#erroLogin').fadeOut('fast');
        }, 2000);
    </script>
    <!--Pesquisa-->
    <script type="text/javascript">
    $(function(){
	$("#pesquisa").keyup(function(){
		//Recuperar o valor do campo
		var pesquisa = $(this).val();
		
		//Verificar se hรก algo digitado
		if(pesquisa != ''){
			var dados = {
				palavra : pesquisa
			}
			$.post('../../app/view/pesquisaVideo.php', dados, function(retorna){
				//Mostra dentro da ul os resultado obtidos 
				$(".resultado").html(retorna);
			});
		}
	});
    });
    </script>
</body>
</html>
$(document).ready(function(){
    //Botão menu
    $('.sidenav').sidenav();
    //Slider
    $('.slider').slider();
    //Modal
    $('.modal').modal();
    //Select
    $('select').formSelect();
    //Dropdown
    //$(".dropdown-trigger").dropdown({hover: false});
    $(".dropdown-trigger").dropdown();
    //Plugin Data Table
    $('#dashboard').DataTable({
        //bInfo: false,
        //bFilter: true,
        //"searching": false,
        "ordering": false,
        "pageLength": 10,
        "bLengthChange": false,
        "oLanguage": {
            "sEmptyTable": "Nenhum registro encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "Exibir _MENU_ resultados por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Pesquisar:",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            }
        }
    });
});
 //Autocomplete analistas
//    $('input.autocomplete').autocomplete({
//        data: {
//            "André": null,
//            "Fabio": null,
//            "Gabriel": null,
//            "Mariane": null,
//            "Murilo": null
//        },
//        });
//        

//Função responsável por validar se já existe uma videoconferência já cadastrada antes de continuar o cadastro
    function valTicket() {
        //Receber o valor do campo e-mail
        var ticket = document.getElementById("ticket").value;
       //$("#msg").html(email);

        //Criar a variável com dados a serem enviados 
        var dados = {
            ticket: ticket
        };

        //Enviar através do método post o e-mail a ser pesquisado para o arquivo "validar_email_unico.php"
        //Em seguida receber o valor de retorno na variável "retorna".
        if (ticket == "") {
            //alert('Campo Ticket é obrigatório!');
        } else {$.post("../../app/view/validaVideo.php", dados, function (retorna) {
            //Verificar qual é o status de retorno, sendo TRUE acessa o IF e FALSE acessa o else
            //E atribui a mensagem de erro ao seletor "msg".
            if(retorna){
                //console.log(ticket);
                alert('Videoconferência já cadastrada, verifique!');
                //$("#msg").html('<div align="center" id="erroLogin" class="card-panel red lighten-4 red-text text-darken-4">O campo login/senha precisam ser preenchidos!</div><br>');
            }else{
//                console.log('Cadastrar');
//                $("#msg").html("<div class='alert alert-success' role='alert'>Este e-mail não está cadastrado!</div>");
            }
        });

    };
    };
<!DOCTYPE html>
<html>
<head>
   <title>Observer Pattern com JQuery UI e Laravel</title>

   <!-- Meta -->
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   <meta charset="utf-8">
   <meta name="csrf-token" content="{{ csrf_token() }}">

   <!-- CSS -->
   <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
   <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

   <!-- Script -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

</head>
<body>
    <div class="row">
        <div class="col-12">
    
    <form>
        <!-- Aqui define o campo nome para a pesquisa de autocompletar -->
        <div class="form-group">
          <label for="exampleInputEmail1">Cliente</label>
         <input type="email" class="form-control" id="busca_cliente" aria-describedby="emailHelp" placeholder="Insira o Nome do Cliente">
        <div>
        <!-- Aqui retorna o email do cliente pesquisado -->
        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Aqui vai aparecer o email do Cliente">
                      
          </div>
        </div>      
    </div>
</div>

   <!-- Script -->
   <script type="text/javascript">

   // CSRF Token
   var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
   $(document).ready(function(){

     $( "#busca_cliente" ).autocomplete({
        source: function( request, response ) {
           // Armazena a data, obtém a rota do método getClientes do ClientesController, com o método post no formato json
           $.ajax({
             url:"{{route('getClientes')}}",
             type: 'post',
             dataType: "json",
             data: {
                _token: CSRF_TOKEN,
                search: request.term
             },
             success: function( data ) {
                response( data );
             }
           });
        },
        select: function (event, ui) {
          // Define a Seleção
          $('#busca_cliente').val(ui.item.label); // demonstra o cliente pesquisado
          $('#email').val(ui.item.value); // demonstra o email do cliente no formulário
          return false;
        }
     });

   });
   </script>
</body>
</html>
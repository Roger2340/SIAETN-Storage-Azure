<?php 
    include("cabecalho.php");
?>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="CSS/uploadfilemulti.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
   <h2>Meus Arquivos para AET</h2>                                                                         
  <div class="table-responsive">          
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Licença</th>
        <th>Cliente</th>
        <th>Placa Cavalo</th>
        <th>Placa Reboque</th>
        <th>Região</th>
        <th>Ações</th>
  
      </tr>
    </thead>
    <tbody id="result">
     
    </tbody>
  </table>
  </div>
</div>

</body>
</html>

<script type="text/javascript">

$(document).ready(function(){
     $.ajax({            
            url:"metodos.php",     
            type:"post",
            data:"metodo=LISTAR_ARQUIVOS",
            beforeSend:function(){
                
            },
            success: function(data){
              $("#result").html(data);
            }
        })

})

function excluir_arquivo(id_arquivo){
    $.ajax({            
            url:"metodos.php",     
            type:"post",
            data:"metodo=EXCLUIR_ARQUIVO&id_arquivo="+id_arquivo,
            beforeSend:function(){
                
            },
            success: function(data){

              if(data != 0){
                 $.ajax({            
                    url:"metodos.php",     
                    type:"post",
                    data:"metodo=LISTAR_ARQUIVOS",
                    beforeSend:function(){
                        
                    },
                    success: function(data){
                      $("#result").html(data);
                    }
                })
               }else{
                  alert("Erro ao deletar o arquivo");
               }
              
            }
        })
}

</script>

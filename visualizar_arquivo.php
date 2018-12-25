<?php

	include("conexao.php");
    include("conexao_azure.php");

	$id_arquivo = $_GET["id_arquivo"];
	$acao 		= $_GET["acao"];

	$result = $conn->query("SELECT nome FROM arquivos WHERE id_arquivo = $id_arquivo");

	$query = mysqli_fetch_object($result);

	$ext = end(explode(".",$query->nome));


	if(mysqli_num_rows($result) > 0){

		if($acao == "VISUALIZAR"){

			if($ext != "pdf"){
				header('Content-Type: image/'.$ext);
			}else{
				header('Content-Type: application/'.$ext);
			}

			try    {

				
	            header('Content-disposition: inline; filename='.$query->nome);
	            
			    $blob = $blobRestProxy->getBlob("arquivos", $query->nome);
			    fpassthru($blob->getContentStream());

			   
			}
			catch(ServiceException $e){
			  
			    $code = $e->getCode();
			    $error_message = $e->getMessage();
			    echo $code.": ".$error_message."<br />";
			}

		
		}

		if($acao == "DOWNLOAD"){


			try    {

				header('Content-Type: application/pdf');
	            header('Content-disposition: attachment; filename='.$query->nome);
	            
			    $blob = $blobRestProxy->getBlob("arquivos", $query->nome);
			    fpassthru($blob->getContentStream());

			   
			}
			catch(ServiceException $e){
			  
			    $code = $e->getCode();
			    $error_message = $e->getMessage();
			    echo $code.": ".$error_message."<br />";
			}
		}
		
	}


	function converte($str) 
    {
       $bin = "";
       $i = 0;
       do {
        $bin .= chr(hexdec($str{$i}.$str{($i + 1)}));
        $i += 2;
       } while ($i < strlen($str));
       return $bin;
    }
?>
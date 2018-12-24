<?php
	$conn = new mysqli("localhost", "root", "","documentos");
	mysqli_set_charset($conn,"utf8");

	$id_arquivo = $_GET["id_arquivo"];
	$acao 		= $_GET["acao"];

	$result = $conn->query("SELECT conteudo, nome FROM arquivos WHERE id_arquivo = $id_arquivo");

	$query = mysqli_fetch_object($result);

	$pasta = "ARQUIVOS/".$query->nome;
	$dados = converte($query->conteudo);

	if(mysqli_num_rows($result) > 0){

		if($acao == "VISUALIZAR"){

			if (file_exists($pasta)) {

	            header('Content-Type: application/pdf');
	            header('Content-disposition: inline; filename='.$query->nome);
	            readfile($pasta);
	                               
	        }else{

				header('Pragma: public');
		        header('Expires: 0');
		        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		        header('Content-Type: application/pdf');
		        header('Content-disposition: inline; filename='.$query->nome);
		        header('Content-Transfer-Encoding: binary');
		        header('Content-Length: '.strlen($dados));

		        print $dados;
	        }
		}

		if($acao == "DOWNLOAD"){

			if (file_exists($pasta)) {

	            header('Content-Type: application/pdf');
	            header('Content-Disposition: attachment; filename='.$query->nome);
	            readfile($pasta);
	                               
	        }else{

				header('Pragma: public');
		        header('Expires: 0');
		        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		        header('Content-Type: application/pdf');
		        header('Content-Disposition: attachment; filename='.$query->nome);
		        header('Content-Transfer-Encoding: binary');
		        header('Content-Length: '.strlen($dados));

		        print $dados;
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
<?php
	include("conexao.php")

	error_reporting(0);
	ini_set("display_errors", 0 );
	
	$metodo 	= $_POST["metodo"];
	$id_arquivo = $_POST["id_arquivo"];


	switch ($metodo) {
		case 'LISTAR_ARQUIVOS':
			
			$result = $conn->query("SELECT id_arquivo, nome, tamanho, data FROM arquivos");

			while ($arquivo = mysqli_fetch_object($result)) {
				echo "<tr>
						<td>".$arquivo->id_arquivo."</td>
						<td>".$arquivo->nome."</td>
						<td>".$arquivo->tamanho."</td>
						<td>".$arquivo->data."</td>
						<td>
							<a href='visualizar_arquivo.php?acao=VISUALIZAR&id_arquivo=".$arquivo->id_arquivo."' target='_blank'><img src='IMG/pdf.png' style='width:30px; height:30px;cursor:pointer;'></a>
							<a href='visualizar_arquivo.php?acao=DOWNLOAD&id_arquivo=".$arquivo->id_arquivo."' target='_blank'><img src='IMG/download.png' style='width:30px; height:30px;cursor:pointer;'></a>
							<a href='#' onclick='excluir_arquivo(".$arquivo->id_arquivo.");'><img src='IMG/delete.png' style='width:30px; height:30px;cursor:pointer;'></a>
						</td>


					</tr>";
			}

		break;

		case 'EXCLUIR_ARQUIVO':
			
			$result = $conn->query("DELETE FROM arquivos WHERE id_arquivo = $id_arquivo");

			if(mysqli_affected_rows($conn) > 0){
				echo 1;
			}else{
				echo 0;
			}

		break;
	
	}


?>
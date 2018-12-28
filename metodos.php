<?php
	include("conexao.php")

	error_reporting(0);
	ini_set("display_errors", 0 );
	
	$metodo 	= $_POST["metodo"];
	$id_arquivo = $_POST["id_arquivo"];


	switch ($metodo) {
		case 'LISTAR_ARQUIVOS':
				$sql = "Select 
						T1.CODIGO,
						ISNULL(T1.NUM_LICENCA, T1.NUM_PROTOCOLO) as LICENCA,
						T2.NomeAbreviado,
						T3.PLCA_VEICULO AS PLCA_CAVALO,
						T4.PLCA_VEICULO AS PLACA_REBOQUE,
						T5.SIGLA_REGIAO
						From
						dbo.TBSolicitacaoes T1
						LEFT JOIN dbo.TBCliente T2 ON T2.CODIGO = T1.COD_CLIENTE
						LEFT JOIN dbo.TBVeiculos T3 ON T3.CODIGO = T1.COD_CAVALO
						LEFT JOIN dbo.TBVeiculos T4 ON T4.CODIGO = T1.COD_REBOQUE
						LEFT JOIN dbo.TBRegiao T5 ON T5.CODIGO = T1.COD_REGIAO
						WHERE T5.SIGLA_REGIAO <> 'NULL'"
				$result = sqlsrv_query($conn, $sql);

			while ($arquivo =  sqlsrv_fetch_object($result)) {
				echo "<tr>
						<td>".$arquivo->LICENCA."</td>
						<td>".$arquivo->NomeAbreviado."</td>
						<td>".$arquivo->PLCA_CAVALO."</td>
						<td>".$arquivo->PLACA_REBOQUE."</td>
						<td>".$arquivo->SIGLA_REGIAO."</td>
						<td>
							<a href='visualizar_arquivo.php?acao=VISUALIZAR&id_arquivo=".$arquivo->CODIGO."' target='_blank'><img src='IMG/pdf.png' style='width:30px; height:30px;cursor:pointer;'></a>
							<a href='visualizar_arquivo.php?acao=DOWNLOAD&id_arquivo=".$arquivo->CODIGO."' target='_blank'><img src='IMG/download.png' style='width:30px; height:30px;cursor:pointer;'></a>
							<a href='#' onclick='excluir_arquivo(".$arquivo->CODIGO.");'><img src='IMG/delete.png' style='width:30px; height:30px;cursor:pointer;'></a>
						</td>


					</tr>";
			}

		break;

		case 'EXCLUIR_ARQUIVO':
			
			$result = $conn->query("DELETE FROM arquivos WHERE id_arquivo = $id_arquivo");

			if(sqlsrv_affected_rows($conn) > 0){
				echo 1;
			}else{
				echo 0;
			}

		break;
	
	}


?>
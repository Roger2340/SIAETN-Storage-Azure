<?php
	
  include("conexao_azure.php");

  try {
        $blob_list = $blobRestProxy->listblobs("documents");
        $blobs = $blob_list->getBlobs();

        foreach($blobs as $blob)
        {
		echo "<tr>
			<td>".$arquivo->id_arquivo."</td>
			<td>".$blob->getName()->nome."</td>
			<td>".$blob->getUrl()->tamanho."</td>
			<td>".$arquivo->data."</td>
			<td>
				<a href='visualizar_arquivo.php?acao=VISUALIZAR&id_arquivo=".$arquivo->id_arquivo."' target='_blank'><img src='IMG/pdf.png' style='width:30px; height:30px;cursor:pointer;'></a>
				<a href='visualizar_arquivo.php?acao=DOWNLOAD&id_arquivo=".$arquivo->id_arquivo."' target='_blank'><img src='IMG/download.png' style='width:30px; height:30px;cursor:pointer;'></a>
				<a href='#' onclick='excluir_arquivo(".$arquivo->id_arquivo.");'><img src='IMG/delete.png' style='width:30px; height:30px;cursor:pointer;'></a>
			</td>
		</tr>";
            //echo $blob->getName().": ".$blob->getUrl()."<br />";
        }
    }
    catch (ServiceException $e){
        $code = $e->getCode();
        $error_message = $e->getMessage();
        echo $code.": ".$error_mensage."<br />";
    }

?>

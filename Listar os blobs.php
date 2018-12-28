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

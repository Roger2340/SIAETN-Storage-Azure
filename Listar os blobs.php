<?php
	
  include("conexao_azure.php");

  try {
        $blob_list = $blobRestProxy->listblobs("documents");
        $blobs = $blob_list->getBlobs();

        foreach($blobs as $blob)
        {
            echo $blob->getName().": ".$blob->getUrl()."<br />";
        }
    }
    catch (ServiceException $e){
        $code = $e->getCode();
        $error_message = $e->getMessage();
        echo $code.": ".$error_mensage."<br />";
    }

?>

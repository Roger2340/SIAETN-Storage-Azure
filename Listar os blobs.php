<?php

  include("conexao_azure.php");

  $listBlobsOptions = new ListBlobsOptions();
  $listBlobsOptions->setPrefix("HelloWorld");

    echo "These are the blobs present in the container: ";

    do{
        $result = $blobClient->listBlobs($containerName, $listBlobsOptions);
        foreach ($result->getBlobs() as $blob)
        {
            echo $blob->getName().": ".$blob->getUrl()."<br />";
        }

        $listBlobsOptions->setContinuationToken($result->getContinuationToken());
    } while($result->getContinuationToken());
    
<?

<?php

	require_once 'AZURE/vendor/autoload.php';
	use WindowsAzure\Common\ServicesBuilder;
	use MicrosoftAzure\Storage\Common\ServiceException;

	$chave_conexao = 'DefaultEndpointsProtocol=https;AccountName=siaetndisco1;AccountKey=EhKiews27NDLTXvfkHnOEfwUG91AFzPYpQevRxoJ5nCXywEBKEsGuEKbAlwPHd/aWaLY6yq1ZcplIdXV+A7yyw==';
	$blobRestProxy = ServicesBuilder::getInstance()->createBlobService($chave_conexao);



?>

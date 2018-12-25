<?php

	require_once 'AZURE/vendor/autoload.php';
	use WindowsAzure\Common\ServicesBuilder;
	use MicrosoftAzure\Storage\Common\ServiceException;

	$chave_conexao = 'DefaultEndpointsProtocol=https;AccountName=hightechdocs;AccountKey=1TsDbaZ812xJTLebtct8SVcMjva7kL7JchxTyKEYIXhT0nftwhEFb6XJsfGx+hYw7aYwD2XVF1wTr67mc+KBaQ==';
	$blobRestProxy = ServicesBuilder::getInstance()->createBlobService($chave_conexao);



?>
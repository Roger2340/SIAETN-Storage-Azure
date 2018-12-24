
<?php
        include("conexao.php");
        include("conexao_azure.php");

	$arquivo 	= fopen($_FILES['file']['tmp_name'].'', "r");
        $nome 		= $_FILES["file"]["name"];
        $tamanho 	= $_FILES["file"]["size"];


        try    {
            $blobRestProxy->createBlockBlob("documents", $nome, $arquivo);
        }
        catch(ServiceException $e){
            $code = $e->getCode();
            $error_message = $e->getMessage();
            echo $code.": ".$error_message."<br />";
        }


	//$sql = "INSERT INTO arquivos (nome, tamanho, data) VALUES ('$nome','$tamanho',now())";

     	//$result = $conn->query($sql)or die(mysqli_errno());

?>

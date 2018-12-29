<?php

$connectionInfo = array("UID" => "ra805847@databasesiaetn", "pwd" => "ra3025@7610", "Database" => "sql_SIAETN", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:databasesiaetn.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);

if($conn){
    echo 'Conexao estabelecida';
} else {
    echo 'Conexao Falhou <br />';
    die(print_r(sqlsrv_erros(),TRUE));
}

$sql = 'Select * from TBSolicitacaoes';
$stmt = sqlsrv_query($conn,$sql);
if($stmt==false){
    echo 'Error to retrieve info!!<br />';
    die(print_r(sqlsrv_erros(),TRUE));
}
$row = sqlsrv_fetch_array($stmt);
echo 'The requited quantity is: '.$row['qty'];
/*$stmt->execute();
$arquivo = $stmt->fetchAll(PDO::FETCH_OBJ);*/

?>
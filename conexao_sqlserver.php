<?php

$connectionInfo = array("UID" => "ra805847@databasesiaetn", "pwd" => "ra3025@7610", "Database" => "sql_SIAETN", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:databasesiaetn.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);

if($conn){
    echo 'Conexao estabelecida<br />';
} else {
    echo 'Conexao Falhou <br />';
    die(print_r(sqlsrv_erros(),TRUE));
}

$sql = 'Select * from TBSolicitacaoes';
$stmt = sqlsrv_query($conn,$sql);
$arquivo = $stmt->fetchAll();

foreach($arquivos as $arquivo){
    print '<tr>
    <td>'.$arquivo['CODIGO'].'</td>
    <td>'.$arquivo['COD_CLIENTE'].'</td>
    <td>'.$arquivo['COD_REGIAO'].'</td>
    <td>'.$arquivo['COD_CAVALO'].'</td>
    <td>'.$arquivo['COD_REBOQUE'].'</td>';
}
?>
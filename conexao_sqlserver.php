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
try{
    $sql = 'Select * from TBSolicitacaoes';
    $stmt = $conn->query($sql);
    $arquivo = $stmt->fetchAll();
    print_r ($arquivo);
}
catch(Exception $e){
    echo $e->getMessage();
    exit;
}

?>
    <table border=1>
        <tr>
            <th>Licença</th>
            <th>Cliente</th>
            <th>Placa Cavalo</th>
            <th>Placa Reboque</th>
            <th>Região</th>
            <th>Ações</th>
        </tr>

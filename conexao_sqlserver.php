<?php

$conn = new PDO("sqlsrv:server = tcp:databasesiaetn.database.windows.net,1433; Database = sql_SIAETN", "ra805847", "ra3025@7610");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if($conn){
    echo 'Conexao estabelecida<br />';
} else {
    echo 'Conexao Falhou <br />';
    die(print_r(sqlsrv_erros(),TRUE));
}
try{
    $stmt = $conn->sqlsrv_query("Select * from TBSolicitacaoes");
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

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
    $stmt = $conn->prepare("Select * from TBSolicitacaoes");
        $stmt->execute();
        $arquivo = $stmt->fetchAll(PDO::FETCH_OBJ);

    /*$stmt = $conn->sqlsrv_query("Select * from TBSolicitacaoes");
    $arquivo = $stmt->fetchAll();*/
    //print_r ($arquivo);
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
<?php
    foreach($arquivos as $arquivo){
?>
    <tr>
        <td><?php $arquivo[$arquivos]->CODIGO?></td>
        <td><?php $arquivo[$arquivos]->COD_CLIENTE?></td>
        <td><?php $arquivo[$arquivos]->COD_REGIAO?></td>
        <td><?php $arquivo[$arquivos]->COD_CAVALO?></td>
        <td><?php $arquivo[$arquivos]->COD_REBOQUE?></td>
    </tr>
<?php
    }
?>

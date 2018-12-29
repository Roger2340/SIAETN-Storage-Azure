<?php

$conn = new PDO("sqlsrv:server = tcp:databasesiaetn.database.windows.net,1433; Database = sql_SIAETN", "ra805847", "ra3025@7610");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if($conn){
    echo 'Conexao estabelecida<br />';
} else {
    echo 'Conexao Falhou <br />';
    die(print_r(sqlsrv_erros(),TRUE));
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
    $sql = 'Select * from TBSolicitacaoes'
    foreach($conn->sqlsrv_query($sql) as $row){
?>
    <tr>
        <td><?php print $row['CODIGO']; ?></td>
        <td><?php print $row['COD_CLIENTE']; ?></td>
        <td><?php print $row['COD_REGIAO']; ?></td>
        <td><?php print $row['COD_CAVALO']; ?></td>
        <td><?php print $row['COD_REBOQUE']; ?></td>
    </tr>
<?php
    }
    
?>

<?php

    //include("conexao.php")
    try {
        $db = new PDO("sqlsrv:server = tcp:databasesiaetn.database.windows.net,1433; Database = sql_SIAETN", "ra805847", "ra3025@7610");	
        
        
        $stmt = $db->prepare("Select * From TBSolicitacaoes");
        
        
        $stmt->execute();
        $clientes  = $stmt->fetchAll(PDO::FETCH_OBJ);
        
        echo '<pre>';
            print_r($clientes);
        echo '</pre>';
    
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }

    /*$sql = "Select * From TBSolicitacaoes";
    $result = sqlsrv_query($conn, $sql);

    print "<table>
                <tr>
                <th>Licença</th>
                <th>Cliente</th>
                <th>Placa Cavalo</th>
                <th>Placa Reboque</th>
                <th>Região</th>
                <th>Ações</th>
            </tr>";
    while ($arquivo =  sqlsrv_fetch_object($result)) {
        print "<tr>
                <td>".$arquivo->CODIGO."</td>
                <td>".$arquivo->COD_CLIENTE."</td>
                <td>".$arquivo->COD_CAVALO."</td>
                <td>".$arquivo->COD_REBOQUE."</td>
                <td>".$arquivo->COD_REGIAO."</td>
                <td>
                    <a href='visualizar_arquivo.php?acao=VISUALIZAR&id_arquivo=".$arquivo->CODIGO."' target='_blank'><img src='IMG/pdf.png' style='width:30px; height:30px;cursor:pointer;'></a>
                    <a href='visualizar_arquivo.php?acao=DOWNLOAD&id_arquivo=".$arquivo->CODIGO."' target='_blank'><img src='IMG/download.png' style='width:30px; height:30px;cursor:pointer;'></a>
                    <a href='#' onclick='excluir_arquivo(".$arquivo->CODIGO.");'><img src='IMG/delete.png' style='width:30px; height:30px;cursor:pointer;'></a>
                </td>


            </tr>";
    }
    print "</table>";*/

?>

<?php

    include("conexao.php")
    $sql = "Select 
            T1.CODIGO,
            ISNULL(T1.NUM_LICENCA, T1.NUM_PROTOCOLO) as LICENCA,
            T2.NomeAbreviado,
            T3.PLCA_VEICULO AS PLCA_CAVALO,
            T4.PLCA_VEICULO AS PLACA_REBOQUE,
            T5.SIGLA_REGIAO
            From
            dbo.TBSolicitacaoes T1
            LEFT JOIN dbo.TBCliente T2 ON T2.CODIGO = T1.COD_CLIENTE
            LEFT JOIN dbo.TBVeiculos T3 ON T3.CODIGO = T1.COD_CAVALO
            LEFT JOIN dbo.TBVeiculos T4 ON T4.CODIGO = T1.COD_REBOQUE
            LEFT JOIN dbo.TBRegiao T5 ON T5.CODIGO = T1.COD_REGIAO
            WHERE T5.SIGLA_REGIAO <> 'NULL'";

        $stmt = $conn->prepare($sql);
        
        
        $stmt->execute();
        while ($arquivo = $stmt->fetchAll(PDO::FETCH_OBJ)) {
            print_r($arquivo);
        
            echo $arquivo['LICENCA'];
            echo $arquivo['NomeAbreviado'];
        }
        
    /*print_r "<table>
                <tr>
                <th>Licença</th>
                <th>Cliente</th>
                <th>Placa Cavalo</th>
                <th>Placa Reboque</th>
                <th>Região</th>
                <th>Ações</th>
            </tr>";
    while ($arquivo  = $stmt->fetchAll(PDO::FETCH_OBJ)) {
        print_r "<tr>
                <td>".$arquivo->LICENCA."</td>
                <td>".$arquivo->NomeAbreviado."</td>
                <td>".$arquivo->PLCA_CAVALO."</td>
                <td>".$arquivo->PLACA_REBOQUE."</td>
                <td>".$arquivo->SIGLA_REGIAO."</td>
                <td>
                    <a href='visualizar_arquivo.php?acao=VISUALIZAR&id_arquivo=".$arquivo->CODIGO."' target='_blank'><img src='IMG/pdf.png' style='width:30px; height:30px;cursor:pointer;'></a>
                    <a href='visualizar_arquivo.php?acao=DOWNLOAD&id_arquivo=".$arquivo->CODIGO."' target='_blank'><img src='IMG/download.png' style='width:30px; height:30px;cursor:pointer;'></a>
                    <a href='#' onclick='excluir_arquivo(".$arquivo->CODIGO.");'><img src='IMG/delete.png' style='width:30px; height:30px;cursor:pointer;'></a>
                </td>


            </tr>";
    }
    print_r "</table>";*/

?>

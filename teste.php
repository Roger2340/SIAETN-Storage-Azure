<?php

    include("conexao.php")
    $sql = "Select * From TBSolicitacaoes";
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
    print "</table>";
?>
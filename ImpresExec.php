﻿
<!doctype html>
<html lang="pt-BR">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="css/main.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/jsbarcode/3.6.0/JsBarcode.all.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <script>
            function GerarCódigoDeBarras(elementoInput){
                if(!elementoInput.value){
                    elementoInput.value = 0;
                }
                JsBarcode('#codBarras', elementoInput.value);
            }

            window.onload = function () {
            JsBarcode(".barcode").init();
          }


        </script>

    <title>APNET</title>
  </head>
    <?php
    $cod = $_GET['cod'];
    include_once("conexaoSQL.php");
        $sql = "
        /* SELECT TOP 1
          ImgEmp
        FROM 
          GS_ROMANEIO
        WHERE 
            Pedido = '$cod' */
          
        ";
      $stmt = sqlsrv_query($conn, $sql);
        
        if($stmt === false)
        {
          die (print_r(sqlsrv_errors(), true));
        }
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
          $img .= $row['ImgEmp'];
        } 
    ?>
<body>
  
  <div class="nome-doc">
    <div class='titulo-cab'><b>TERMO DE INSTALAÇÃO DE EQUIPAMENTO</b></div>
 </div>

<div class="cabeçalho">

    <?php
        $sql = "
              SELECT 
                  --EMPRESA
                  TB02021_CODIGO Venda,
                  TB01007_NOME NomeEmp,
                  TB01007_CNPJ CNPJEmp,
                  TB01008_INSCEST InscricaoEstEmp,
                  EMP.TB00012_END RuaEmp,
                  CAST(EMP.TB00012_NUM AS VARCHAR) NumEmp,
                  EMP.TB00012_COMP ComplementoEmp,
                  EMP.TB00012_BAIRRO BairroEmp,
                  EMP.TB00012_CEP CEPEmp,
                  CONCAT(EMP.TB00012_CIDADE,'/',EMP.TB00012_ESTADO) CidadeUFEmp,
                  TB02111_CODIGO Contrato,
                
                  --CLIENTE
                  TB01008_NOME NomeCli,
                  TB01008_CNPJ CNPJCli,
                  TB01008_INSCEST InscricaoEstCli,
                  CLI.TB00012_END RuaCli,
                  CAST(CLI.TB00012_NUM AS VARCHAR) NumCli,
                  CLI.TB00012_COMP ComplCli,
                  CLI.TB00012_BAIRRO BairroCli,
                  CLI.TB00012_CEP CEPCli,
                  CONCAT(CLI.TB00012_CIDADE,'/',CLI.TB00012_ESTADO) CidadeUFCli
              
              
              FROM TB02021
              LEFT JOIN TB01007 ON TB01007_CODIGO = TB02021_CODEMP
              LEFT JOIN TB01008 ON TB01008_CODIGO = TB02021_CODCLI
              LEFT JOIN TB00012 EMP ON EMP.TB00012_CODIGO = TB02021_CODEMP AND EMP.TB00012_TABELA = 'TB01007' AND EMP.TB00012_TIPO = '01'
              LEFT JOIN TB00012 CLI ON CLI.TB00012_CODIGO = TB02021_CODCLI AND CLI.TB00012_TABELA = 'TB01008' AND CLI.TB00012_TIPO = '01'
              LEFT JOIN TB02111 ON TB02111_CODIGO = TB02021_CONTRATO
              LEFT JOIN TB02176 ON TB02176_CODIGO = TB02021_CODSITE 
              LEFT JOIN TB02185 ON TB02185_CONTRATO = TB02111_CODIGO
              WHERE 
                --TB02021_OPERACAO = '02'
                TB02021_CODIGO = '$cod'
          
        ";
      $stmt = sqlsrv_query($conn, $sql);
        
        if($stmt === false)
        {
          die (print_r(sqlsrv_errors(), true));
        }
      ?>            
      <table class="table table-borderless table-sm" style="font-size: 11px;">
                  
      <?php
      $tabela = "";

      while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC))
      {
            $tabela .= "<tr>";
            $tabela .= "<td width = '60%;'>
                            $row[NomeCli], com inscrição no CNPJ nº $row[CNPJCli], IE nº $row[InscricaoEstCli],
                            localizado na $row[RuaCli], $row[NumCli], bairro $row[BairroCli], CEP $row[CEPCli], na cidade de
                            $row[CidadeUFCli], declara ter recebido o Equipamento Enviado, denominado Impressora, em perfeito
                            estado de conservação e funcionamento, conforme teste realizado, e que haverá zelo pela integridade física
                            do equipamento de propriedade de $row[NomeEmp], equipamento este que
                            será destinado ao atendimento do Contrato de Locação de Bens Móveis número: $row[Contrato].
                        </td>";
            $tabela .= "</tr>";

            $cidade = $row['CidadeUFCli'];
      }
        $tabela .= "</table>";
        
      print($tabela);
      ?>  
</div>                                                     
<div class="meio">
  <div class="dadosprod">
   <?php
        $sql = " 
            SELECT DISTINCT
              TB02055_NUMSERIE NumSerie,
              TB02021_CODIGO Venda,
              TB01010_NOME Equipamento,
              TB02054_PAT Patrimonio,
              TB02176_END EndEquip,
              TB02022_PRODUTO Produto
            
            
            FROM TB02021
            LEFT JOIN TB02022 ON TB02022_CODIGO = TB02021_CODIGO 
            LEFT JOIN TB01007 ON TB01007_CODIGO = TB02021_CODEMP
            LEFT JOIN TB01008 ON TB01008_CODIGO = TB02021_CODCLI
            LEFT JOIN TB00012 EMP ON EMP.TB00012_CODIGO = TB02021_CODEMP AND EMP.TB00012_TABELA = 'TB01007' AND EMP.TB00012_TIPO = '01'
            LEFT JOIN TB00012 CLI ON CLI.TB00012_CODIGO = TB02021_CODCLI AND CLI.TB00012_TABELA = 'TB01008' AND CLI.TB00012_TIPO = '01'
            LEFT JOIN TB02111 ON TB02111_CODIGO = TB02021_CONTRATO
            LEFT JOIN TB01010 ON TB01010_CODIGO = TB02022_PRODUTO
            LEFT JOIN TB02055 ON TB02055_PRODUTO = TB02022_PRODUTO AND TB02022_CODIGO = TB02055_CODIGO AND TB02055_OPERACAO = 'S' --AND TB02055_NUMSERIE = TB02112_NUMSERIE
            LEFT JOIN TB02176 ON TB02176_CODIGO = TB02021_CODSITE 
            LEFT JOIN TB02054 ON TB02054_PRODUTO = TB02022_PRODUTO AND TB02054_NUMSERIE = TB02022_NUMSERIE
            WHERE 
            --TB02021_OPERACAO = '02'
            TB02021_CODIGO = '$cod' 
        ";
      $stmt = sqlsrv_query($conn, $sql);
        
        if($stmt === false)
        {
          die (print_r(sqlsrv_errors(), true));
        }
      ?>

    <table class="table table-borderless table-sm" style="font-size: 11px;">
      <?php
      $tabela = "";

      while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC))
      {
            $tabela .= "<tr>";
            $tabela .= "<td width = '60%;'><b>Equipamento: </b>&nbsp;".$row['Equipamento']."</td>";
            $tabela .= "</tr>";
            $tabela .= "<tr>";
            $tabela .= "<td width = '60%;'><b>Patrimônio: </b>&nbsp;".$row['Patrimonio']."</td>";
            $tabela .= "</tr>";
            $tabela .= "<tr>";
            $tabela .= "<td width = '60%;'><b>Nº de Série: </b>&nbsp;".$row['NumSerie']."</td>";
            $tabela .= "</tr>";
            $tabela .= "<tr>";
            $tabela .= "<td width = '60%;'><b>Local de Instalação: </b>&nbsp;".$row['EndEquip']."</td>";
            $tabela .= "</tr>";
            
            ?>

    <table class="table table-borderless table-sm" style="font-size: 11px;">
      <?php

            
                          $sql1 = " 
                          
                                  ";
                              $stmt1 = sqlsrv_query($conn, $sql1);
                                
                              while ($row1 = sqlsrv_fetch_array($stmt1, SQLSRV_FETCH_ASSOC))
                              {
                                    $tabela1 .= "<tr>";
                                    $tabela1 .= "<td><b>Leitura Inicia:</b>&nbsp;00000</td>";
                                    $tabela1 .= "</tr>";
                              }
              $tabela1 .= "</table>";
            print($tabela1);
                                
                  
      }
        $tabela .= "</table>";
        
      print($tabela);
    ?> 
  </div>
  
  <div class="info-central">
    <div class='info'><?php echo $cidade;?>, <?php echo date('d/m/Y H:i:s'); ?></div>
  </div>

<hr> <!-- LINHA CENTRAL -->
<?php
        $sql = " 
        SELECT TOP 1
          Observacao,
        CASE
          WHEN Tipo = 'VENDA' THEN 'ENTREGUES'
          WHEN Tipo = 'COMPRA' THEN 'RETIRADOS'
          END TipoFrase,
          CASE
          WHEN Tipo = 'VENDA' THEN 'Entregador'
          WHEN Tipo = 'COMPRA' THEN 'Conferente'
          END QuemAssin
        FROM 
          GS_ROMANEIO
        WHERE 
            Pedido = '$cod'
            --AND Observacao IS NOT NULL
			      --AND Observacao != ''
        
        ";
      $stmt = sqlsrv_query($conn, $sql);
        
        if($stmt === false)
        {
          die (print_r(sqlsrv_errors(), true));
        }
      ?>

   <div class="table-assin">                            
      <table>
        <thead>
          <tr>
            <th>Contratante</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Nome: _______________________________</td>
          </tr>
          <tr>
            <td>CPF: ________________________________</td>
          </tr>
          
        </tbody>
      </table>

      <table>
        <thead>
          <tr>
            <th>Contratada</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Nome: _______________________________</td>
          </tr>
          <tr>
            <td>CPF: ________________________________</td>
          </tr>
          
        </tbody>
      </table>
  </div> 

   <table class="table table-border table-sm" style="font-size: 11px;">

   </table>
   <div class="partedebaixo">
        <div class="dizeres-finais">
          <p>
            Observações:
            Se houver necessidade do técnico imprimir páginas de teste no equipamento enviado, ele poderá fazê-lo.
            Em caso de solicitação de dedução das páginas teste impressas pelo técnico, estas serão descontadas.
            Solicito o desconto de ________ página(s) impressa(s) utilizadas para teste.
          </p>
        </div>
          <div class="table-assin">                            
              <div>_________________________________________</br><b class="assin">Cliente</b></div>
                &nbsp;
              <div>_________________________________________</br><b class="assin">Técnico Responsável</b></div>
                &nbsp;
          </div> 
  </div> 
</div>
</body>
</html>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="refresh" content="90" />
    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="css/main.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/jsbarcode/3.6.0/JsBarcode.all.min.js"></script>
    <script>
            function GerarCódigoDeBarras(elementoInput){
                /*A função JsBarcode não aceita string vazia*/
                if(!elementoInput.value){
                    elementoInput.value = 0;
                }
                JsBarcode('#codBarras', elementoInput.value);
            }
        </script>

    <title>APNET</title>
  </head>

<style>

body{
  overflow: hidden; 
  display: flex;
  background-size: cover;
  flex-direction: column;
  justify-content: space-between;
}
header{
  display: flex;
  justify-content: space-between;
}
.nome-doc{
  text-align: center;
  margin-bottom: 3%;
}
 td{
  font-family: Verdana;
  font-size: 15px;
  page-break-inside: auto;
} 
.imgcodbarras { 
  page-break-before: auto; 
}
.container {
    height: 490px;
    word-break: normal;
 }
 .assin{
  display: flex;
  justify-content: center;
  align-items: center;
 }
 .table-assin {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-right: ;
 }
 .obs{
    border: 1px solid;
    border-color: black;
    height: 90px;
    width: 100%;
    margin-left: 0%;

 }
 .data-hora .data{
    margin-right: 20%;
 }
 .dizeres-finais{
    
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 15px;
    width: 100%;
    margin-top: 3%;
    /* position: fixed;  */
 }
 .rodape{
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 3%;
    margin-bottom: 0%;
    width: 100%; 
    margin-left: auto;
    margin-right: auto; 
 }
 .inputcodbar{
    opacity: 0;
 }
 svg{
   display: flex;
   margin-left: auto;
   margin-right: auto;
 }
 .partedebaixo{
    width: 100%;
    margin-top: 50px;
    margin-bottom: 0%;
    width: 100%;
    margin: auto auto;
    padding: 10px 5px;
/*     page-break-before: always; */
    position: fixed;
 }
 .meio{
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  margin-bottom: 50%;
  /* .break { page-break-before: always; } */
 }
 .formmacaocodbarras{
    bottom: 10%;
 }
 .texto_obs{
    overflow: hidden; /* Removendo barra de rolagem */
    text-overflow: ellipsis; /* Adicionando "..." ao final */
    -webkit-line-clamp: 3; /* Quantidade de linhas */
    -webkit-box-orient: vertical; 
    font-size: 15px;
    display: -webkit-box;
 }

 footer {
  border-top: 1px solid #333;
  left: 0;
  position: relative;

  display: inline;
  width: 100%;
  height: 100px;
  bottom: 0;
  left: 0;
}

</style>

  <header>
      <a href="http://localhost:8090/phpprod/apnet/impres.php"><img src='media/logoAPNET.png' width='115' height='34' style='margin-left: 15px;'  class='d-inline-block align-top'></a>
          <!-- http://localhost:8090/phpprod/apnet/ 
               http://localhost:8090/phpprod/apnet/-->
      <p>Apnetworks</p>
      <p>www.apnetworks.com.br</p>
      <p>(21)3624-4925</p>
  </header>
  <body>
  <div class="nome-doc">
    <?php 
        
        header('Content-type: text/html; charset=ISO-8895-1');
        $cod = $_GET['cod'];
        include_once("conexaoSQL.php");
        $sql = "
        SELECT TOP 1
          CASE
            WHEN Tipo = 'COMPRA' THEN 'RELATÓRIO DE DEVOLUÇÕES DE LOCAÇÃO'
            WHEN Tipo = 'VENDA'  THEN 'RELATÓRIO DE ENTREGAS DE LOCAÇÃO'
          END Tipo
          FROM 
            GS_ROMANEIO
          WHERE 
              Pedido = '$cod'
          
        ";
      $stmt = sqlsrv_query($conn, $sql);
        
        if($stmt === false)
        {
          die (print_r(sqlsrv_errors(), true));
        }
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
          $tipo .= "<div class='titulo-cab'><b>$row[Tipo]</b></div>";
        }
        print($tipo);  
    ?>           
 </div>

<div class="cabeçalho">

    <?php
        $cod = $_GET['cod'];
        include_once("conexaoSQL.php");
        $sql = "
              SELECT TOP 1
              NomeCli,
              Endereco,
              Complemento,
              Bairro,
              Telefone,
              Cidade,
              Estado,
              Nota,
              Pedido
          FROM 
            GS_ROMANEIO
          WHERE 
              Pedido = '$cod'
          
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
            $tabela .= "<td width = '60%;'><b>NOME CLIENTE:</b>&nbsp;".$row['NomeCli']."</td>";
            $tabela .= "<td><b>MUNICIPIO:</b>&nbsp;".$row['Cidade']."</td>";
            $tabela .= "</tr>";
            $tabela .= "<tr>";
            $tabela .= "<td width = '60%;'><b>ENDEREÇO:</b>&nbsp;".$row['Endereco']."</td>";
            $tabela .= "<td><b>ESTADO:</b>&nbsp:".$row['Estado']."</td>";
            $tabela .= "</tr>";
            $tabela .= "<tr>";
            $tabela .= "<td width = '60%;'><b>COMPLEMENTO:</b>&nbsp;".$row['Complemento']."</td>";
            $tabela .= "<td><b>NF:</b>&nbsp;".$row['Nota']."</td>";
            $tabela .= "</tr>";
            $tabela .= "<tr>";
            $tabela .= "<td width = '60%;'><b>BAIRRO:</b>&nbsp;".$row['Bairro']."</td>";
            $tabela .= "<td width = ''><b>PEDIDO:</b>&nbsp;".$row['Pedido']."</td>";
            $tabela .= "</tr>";
            $tabela .= "<tr>";
            $tabela .= "<td><b>TELEFONE:</b>&nbsp;".$row['Telefone']."</td>";
            $tabela .= "</tr>";

            
      }
        $tabela .= "</table>";
        
      print($tabela);
      ?>  
</div>
<div class="formmacaocodbarras">
     <?php 
        $cod = $_GET['cod'];
        include_once("conexaoSQL.php");
        $sql = "
        SELECT TOP 1
            CONCAT(FORMAT(DataPedido, 'ddMMyyyy'),'*',CAST(cnpj AS VARCHAR(15)),'*',CAST(Nota AS VARCHAR (15))) Cod
        FROM 
          GS_ROMANEIO
        WHERE 
            Pedido = '$cod'
          
        ";
       $stmt = sqlsrv_query($conn, $sql);
        
        if($stmt === false)
        {
          die (print_r(sqlsrv_errors(), true));
        }
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
          $codigo = $row['Cod'];
        }
       echo "<input class='inputcodbar' type='text' incremental value='$codigo' onblur='GerarCódigoDeBarras(this)' autofocus/>";
    ?> 
      <div class="imgcodbarras">          
          <svg id="codBarras"></svg>
       </div>
</div>                                                                        
<div class="meio">
  <div class="dadosprod">
   <?php
        include_once("conexaoSQL.php");

        $sql = " 
                SELECT
                CodProduto,
                NomeProduto,
                Patrimonio,
                Serie,
                Contrato
            FROM 
              GS_ROMANEIO
            WHERE 
                Pedido = '$cod'
        ";
      $stmt = sqlsrv_query($conn, $sql);
        
        if($stmt === false)
        {
          die (print_r(sqlsrv_errors(), true));
        }
      ?>

          <table class="table table-border table-sm" style="font-size: 11px;">
               <thead>              
                <tr>
                  <th scope="col">COD PRODUTO</th>
                  <th scope="col">PRODUTO</th>
                  <th scope="col">PATRIMÔNIO</th>
                  <th scope="col">N° SERIE</th>
                  <th scope="col">CONTRATO</th>
                </tr>
              </thead>                         
      <?php
      $tabela = "";

      while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC))
      {
        $tabela .= "<tr>";
        $tabela .= "<td width='30'>".$row['CodProduto']."</td>";
        $tabela .= "<td width='40%'>".$row['NomeProduto']."</td><p>";
        $tabela .= "<td width='40'>".$row['Patrimonio']."</td>";
        $tabela .= "<td width='40'>".$row['Serie']."</td>";
        $tabela .= "<td width='40'>".$row['Contrato']."</td>";
        $tabela .= "</tr>";
      }
        $tabela .= "</table>";
        
      print($tabela);
    ?> 
  </div>

<hr>
<?php
        include_once("conexaoSQL.php");

        $sql = " 
        SELECT TOP 1
          Observacao,
        CASE
          WHEN Tipo = 'VENDA' THEN 'ENTREGUES'
          WHEN Tipo = 'COMPRA' THEN 'RETIRADOS'
          END Tipo
        FROM 
          GS_ROMANEIO
        WHERE 
            Pedido = '$cod'
        
        ";
      $stmt = sqlsrv_query($conn, $sql);
        
        if($stmt === false)
        {
          die (print_r(sqlsrv_errors(), true));
        }
      ?>

    <table class="table table-border table-sm" style="font-size: 11px;">
                          
      <?php

      while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC))
      {   
    
    ?> 
    <footer> 
   <div class="partedebaixo">
    <?php 
      $obs .= "<div class='obs'>";
      $obs .= "<b>&nbsp;OBSERVAÇÕES:</b><div class='texto_obs'>&nbsp;$row[Observacao]</div>";
      $obs .= "</div>";

      $tipo = $row['Tipo'];
    }
    
    print($obs);
    ?>
    <div class="data-hora">
      <b class="data">DATA:</b>
      <b class="hora">HORA:</b>
    </div>
    
        <div class="dizeres-finais">
          <?php echo "<p>RECONHEÇO QUE OS EQUIPAMENTOS FORAM $tipo PELA APNETWORKS CONFORME A DESCRIÇÂO ACIMA</p>";?>
        </div>
          <div class="table-assin">                            
              <div>_________________________________________</br><b class="assin">Nome/Assinatura Cliente</b></div>
                &nbsp;
              <div>_________________________________________</br><b class="assin">Documento/Cliente</b></div>
                &nbsp;
              <div>_________________________________________</br><b class="assin">Nome/Assinatura Entregador</b></div>
          </div> 
          
            <div class="rodape">
            <p><a href="http://localhost:8090/phpprod/apnet/impres.php"><img src='media/logoAPNET.png' width='115' height='34' style='margin-left: 15px;'  class='d-inline-block align-top'></a><p>
                  <!-- http://localhost:8090/phpprod/apnet/ 
                      http://localhost:8090/phpprod/apnet/-->
              <p>Apnetworks</p>
              <p>www.apnetworks.com.br</p>
              <p>(21)3624-4925</p>
            </div>
        </footer>    
    </div>
  </div> 
</div>
</body>
</html>

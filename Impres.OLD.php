<?php
    /* session_start();
    header('Content-type: text/html; charset=ISO-8895-1');
    include_once("conexaoSQL.php");
    $sql = "SELECT COUNT(OS) OS FROM MC_STRIAG WHERE AlertaSLA > 0";
    $stmt = sqlsrv_query($conn, $sql);
    if($stmt === false)
    {
      die (print_r(sqlsrv_errors(), true));
    }
      $sla = "";
      while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC))
      {
        $sla .= $row['OS'];
      }

      if($sla > 0){ */
        //toca o som de alerta
       /*  echo "<embed src='media/toque.mp3'width='1' height='1'>"; */
    
     //tprint($sla);
?> 

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

    <title>APNET</title>
  </head>

<style>

body{
  height: 150px;
  overflow: hidden; /* Hide scrollbars */
  background-image: url(https://apnetworks.com.br/wp-content/uploads/2022/06/ap_networks-destaque-ged_2.jpg);
  background-size: cover;
}
.container {
    height: 490px;
    overflow-y: scroll;
 }

</style>
</body>


<!-- example 2 - using auto margins -->
  <nav class="navbar navbar-expand-md navbar-LIGHT bg-light">
          <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
              <ul class="navbar-nav mr-auto">
                  <li class="nav-item active">
                  <img src="media/logoAPNET.png" width="115" height="34" style="margin-left: 8px;"  class="d-inline-block align-top" alt="">
                  </li>
              </ul>
          </div>
          <div class="mx-auto order-0">
              <a class="navbar-brand mx-auto" href="#"> <b>IMPRESSÃO DE ROMANEIO - 


              <?php
                    session_start();
                    header('Content-type: text/html; charset=ISO-8895-1');
                    include_once("conexaoSQL.php");
                    $sql = "SELECT FORMAT(getdate(), 'dd/MM/yyyy') + ' ' + LEFT(CONVERT(VARCHAR(8), getdate(), 108), 5) SLA";
                    $stmt = sqlsrv_query($conn, $sql);
                    if($stmt === false)
                    {
                      die (print_r(sqlsrv_errors(), true));
                    }
                      $sla = "";
                      while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC))
                      {
                        $sla .= $row['SLA'];
                      }
                    print($sla);
                    ?> 
                    
                    </b>
                    
                    <div>
                    <form method="get" action="http://apnetworks.brazilsouth.cloudapp.azure.com:8090/APNET/ImpresExec.php">
                            <!-- http://databitbh.com:51151/TINSEI/ImpresExec.php -->
                            <!--  http://localhost:8090/phpProd/ImpresExec.php -->
            
                         CÓDIGO: <input type="text" name="cod" autofocus="true">
                        <input type="submit">
                        <!-- <button id="btn">Imprimir</button> -->
                      </form>
                    </div>  
              </a>
        
          </div>
          <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
        
</div>

</div>

</div>
</body>
</html>

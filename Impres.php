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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="css/main.css" rel="stylesheet">

    <title>APNET</title>
  </head>

<style>

body{
  height: 150px;
  overflow: hidden; /* Hide scrollbars */
  background-image: url(https://apnetworks.com.br/wp-content/uploads/2023/05/usiness-people-meeting-discuss-situation-marketing.jpg);
  background-size: cover;
}
.container {
    height: 490px;
    overflow-y: scroll;
 }
.divcentral{
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: honeydew;
  margin-top: 20%;
  margin-bottom: 10px;
  margin-left: auto;
  margin-right: auto;
  border-radius: 20px;
  width: 60%;
  height: 60%;
}
.inputcod{
  border-radius: 20px;
  margin-bottom: 5px;
}

</style>
</body>


<!-- example 2 - using auto margins -->
  <nav class="divcentral">
          <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
              <ul class="navbar-nav mr-auto">
                  <li class="nav-item active">
                  </li>
              </ul>
          </div>
          <img src="media/logoAPNET.png" width="115" height="34" style="margin-left: 10px; border-radius: 20px;"  class="d-inline-block align-top" alt="">
          <!-- <img src="media/logoALTA.jpg" width="115" height="34" style="margin-left: 10px; border-radius: 20px;"  class="d-inline-block align-top" alt=""> -->
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
                    <form method="get" action="http://localhost:8090/phpprod/apnet/coletorcompras/ImpresExec.php">
                            <!-- http://databitbh.com:51151/TINSEI/ImpresExec.php -->
                            <!--  http://localhost:8090/phpprod/apnet/coletorcompras/ImpresExec.php -->

                         CÓDIGO: <input class="inputcod" type="text" name="cod" autofocus="true">
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

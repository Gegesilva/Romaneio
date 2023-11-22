<?php
  $serverName = 'localhost';
  $connectionInfo = array("Database"=>"repromaq", "UID"=>"sa", "PWD"=>"databit@2022", "CharacterSet"=>"UTF-8");
  $conn = sqlsrv_connect($serverName, $connectionInfo);
  if($conn){
    echo "";
  }else{
    echo "falha na conex�o";
    die( print_r(sqlsrv_errors(), true));
  }

?> 
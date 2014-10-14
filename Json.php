<?php
  // header("Content-Type: application/json");
   
   // echo  getenv("REMOTE_ADDR");
   $ip =  $_SERVER['SERVER_ADDR'] . ":3306";
   $port = "3306";
   $user = "cristopher2529";
   $db = "ESTUDIANTE";
   
   $conn = mysql_connect($ip, $user, '', $db)or die(mysql_error());
   mysql_select_db($db,$conn)or die(mysql_error());
   $result = mysql_query("select * from ROLES",$conn)or die(mysql_error());
   
   $json = [];
   while ($fila = mysql_fetch_assoc($result)) {
      echo $fila['NOMBRES'];
      

      $row = [];
      foreach ($fila as $key => $valor) {
          echo "$key: $valor  |  ";
          $row[$key] =  $valor ;
      }echo "<br>$";
      var_dump($row);
      // array_push($json, $row);
      
      
   }echo "<br><br><br>";
   var_dump($json);

   // echo json_encode(array(array( "Name" => "Alfreds Futterkiste", "City" => "Berlin", "Country" => "Germany" )
   // ,array( "Name" => "Berglunds snabbköp", "City" => "Luleå", "Country" => "Sweden")
   // ,array( "Name" => "dsaBerglunds snabbköp", "City" => "dsaLuleå", "Country" => "daSweden")));

?>
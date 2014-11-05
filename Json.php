<?php
  // header("Content-Type: application/json");
   
   // echo  getenv("REMOTE_ADDR");
   $ip =  $_SERVER['SERVER_ADDR'] . ":3306";
   $port = "3306";
   $user = "cristopher2529";
   $db = "ESTUDIANTE";
   
   $conn = mysql_connect($ip, $user, '', $db) or die(mysql_error());
   mysql_select_db($db,$conn)or die(mysql_error());
   $result = mysql_query("select * from ROLES",$conn) or die(mysql_error());
   
   $json = array();
   while ($fila = mysql_fetch_assoc($result)) {
      $json["Result"] = "SUCCESS";
      $json["Records"][] = $fila;
   }
   echo json_encode($json);


   //consiguiendo todos los parametros que me envien
   // $arg_list = func_get_args();
   // for ($i = 0; $i < $númargs; $i++) {
   //    echo "El argumento $i es: " . $arg_list[$i] . "<br />\n";
   // }
   echo "<br>";
   foreach ($_GET as $key=>$value) {
     echo "$key = " . urldecode($value) . "<br />\n";
   }

   //lEER QUERY
   $query = file_get_contents("sql/getRoles.sql");
   echo $query;
   

?>
<?php

   //leo parametros
   $parameters = array();
   foreach ($_GET as $key=>$value) {
   //  echo "$key = " . urldecode($value) . "<br />\n";
      if($key!="query")//valido que el parametro no sea el nombre del query
         array_push($parameters, urldecode($value));
   }
   
   //VALIDO QUE SE HAYA ESPECIFICADO EL QUERY A EJECUTAR
   if(!isset($_GET["query"])){
      echo json_encode(array('Result' => "Error", 'Records' => array(),'Mensaje' => "No se especifico el query a ejecutar"));
   }else{
      // echo $_GET["query"];

      //lEER QUERY
      $query = file_get_contents("sql/".$_GET["query"].".sql");
      $resultSet = getResults($query, $parameters);
   
      // var_dump($parameters);
      $resultSet['Result'] = "OK";
      echo json_encode($resultSet);
      
      //PARA VER LOS REGISTROS SEPARADOS POR LINEA
      /*foreach($resultSet['Records'] as $key=>$value){
         // echo $key.": ".$value."<br>";
         // var_dump($value);
         echo "<br><br>".json_encode($value)."<br><br>";
         foreach($value as $key2=>$value2){
            echo $key2.": ".$value2."<br>";
         }echo "-------------------------------------------------------------------------<br>";
      }*/
      
   }
   
      //esta funcion hace la conexion, la consulta y le pasa los parametros
      function getResults($query, $parameters){
         // echo $query."<br>";
         // foreach($parameters as $key){
         //    echo $key;
         // }
         // echo "<br><br>";
         
         
         $ip =  $_SERVER['SERVER_ADDR'] . "";
         $port = "3306";
         $user = "cristopher2529";
         $db = "ESTUDIANTE";
         
         $mysqli = new mysqli($ip, $user, '', $db);
         /* verificar conexión */
         if (mysqli_connect_errno()) {
             printf("Connect failed: %s\n", mysqli_connect_error());
             exit();
         }
         
           /* crear una sentencia preparada */
         if ($stmt = $mysqli->prepare($query)){
      
      
            foreach($parameters as $key){
               $stmt->bind_param('s', $key);
            }
            
             /* ligar parámetros para marcadores */
            //  $stmt->bind_param("s", $city);
         
             /* ejecutar la consulta */
             $stmt->execute();
      
             /* ligar variables de resultado */
            //  $stmt->bind_result($rol,$DESCRIPCION);
            //  while ($stmt->fetch()) {
            //     echo $rol . " - ";
            //     echo $DESCRIPCION ."<br/>";
            //  }
            
            $row = bind_result_array($stmt);
            if(!$stmt->error)
             {
                while($stmt->fetch()){
                   foreach($row as $key=>$value){
                     $results['Records'][] = getCopy($row);
                      break;
                   }
                }
             }
            // var_dump($results);
      
             /* cerrar sentencia */
              $stmt->close();
             return $results;
         }
         
         $mysqli->close();
         return null;
         
      }
      
      //esta funcion me devuelve un array con todas las columans que retorna el query
      function bind_result_array($stmt){
          $meta = $stmt->result_metadata();
          $result = array();
          while ($field = $meta->fetch_field())
          {
              $result[$field->name] = NULL;
              $params[] = &$result[$field->name];
          }
       
          call_user_func_array(array($stmt, 'bind_result'), $params);
          return $result;
      }
       
      // Returns a copy of an array of references
      function getCopy($row){
          return array_map(create_function('$a', 'return $a;'), $row);
      }
 
?>
<?php
   header("Content-Type: application/json");

   echo json_encode(array(array( "Name" => "Alfreds Futterkiste", "City" => "Berlin", "Country" => "Germany" )
   ,array( "Name" => "Berglunds snabbköp", "City" => "Luleå", "Country" => "Sweden")
   ,array( "Name" => "dsaBerglunds snabbköp", "City" => "dsaLuleå", "Country" => "daSweden")));

?>
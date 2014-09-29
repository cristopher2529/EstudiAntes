<!DOCTYPE html>
<html ng-app="">
   <head>
      <title>EstudiAntes</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
      <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
      <link rel="stylesheet" href="./headerCSS.css" type="text/css" />
      
      <style type="text/css">
         .header{
            margin-bottom:1em;
            background-color: #428BCA;
            height:10em;
            box-shadow: 0px 3px 15px #999;
         }
         .body{
            width:100%;
            height:70%;
         }
         
         
         
         .menuVertical{
            height:45em;
            width:20%;
            margin-left:5%;
            border-right:2px solid #CFCFCF;
            corlor:gray;
            box-shadow: 10px 10px 5px #888888;
         }
         .optionVertical:{
            corlor:gray;
         }
         .optionVertical:hover{
            border-right:5px solid white;
            width:25%;
            margin-right:-0.8em;
         }
      </style>
   </head>
   
   <body>

      <section class="header">
         <div class="menu">
            <ul>
               <li><i class="fa fa-users"></i> Estudiantes</li>
               <li><i class="fa fa-graduation-cap"></i> Profesores</li>
               <li><i class="fa fa-mobile fa-lg"></i> Contactos</li>
               <li><i class="fa fa-cube fa-lg"></i> Nosotros</li>
               <li><i class="fa fa-male fa-lg"></i> User
                  <ul>
                     <li><i class="fa fa-user fa-lg"></i> My Profile</li>
                     <li><i class="fa fa-cogs fa-lg"></i> Configuration</li>
                     <li><i class="fa fa-power-off fa-lg"></i> Logout</li>
                  </ul>
               </li>
            </ul>
         </div>
         
         <div>
            <img src="./LogoPequenio.png" style="margin-left:7em; margin-top:-2em;">
         </div>
         
      </section>
      <div class="body">
         
         <!--Hago el menu vertical con AngularJs-->
         <div class="menuVertical menu" ng-controller="menuVertical">
            <ul ng-repeat="op in options">
               <li class="optionVertical">
                  {{op.name +" "+ op.show}}
               </li>
            </ul>
         </div>
         <script type="text/javascript">
            function menuVertical($scope){
               $scope.options = [
                  {id:1 , name : "Option1", show: "VentanaOpcion1", subOption:[]}
                  ,{id:2 ,name : "Option2", show: "VentanaOpcion2", subOption:[]}
                  ,{id:3 ,name : "Option3", show: "VentanaOpcion3", subOption:[]}
                  ,{id:4 ,name : "Option4", show: "VentanaOpcion4", subOption:[]}
               ];
            }
         </script>
         
         
      </div>
      
      
      <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.15/angular.min.js"></script>
   </body>
</html>
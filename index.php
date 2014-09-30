<!DOCTYPE html>
<html ng-app="">
   <head>
      <title>EstudiAntes</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
      <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
      <link rel="stylesheet" href="./menuCSS.css" type="text/css" />
      
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
            <img src="./LogoPequenio.png" style="margin-left:11em; margin-top:-3em;width:22%; z-index:1000;">
         </div>
         
      </section>
      <div class="body">
         
         <!--Hago el menu vertical con AngularJs-->
         <div class="menuVertical" ng-controller="menuVertical">
            <ul >
               <li class="optionVertical" ng-repeat="op in options">
                  {{op.name +" "+ op.show+" - "+existSubOption(op)}}
                     <ul ng-show="existSubOption(op)" >
                        <li class="optionVertical" ng-repeat="subOp in op.subOption">
                           {{subOp.name +" "+ subOp.show}}
                           <ul ng-show="existSubOption(subOp)" >
                              <li class="optionVertical" ng-repeat="subOp2 in subOp.subOption">
                                 {{subOp2.name +" "+ subOp2.show}}
                              </li>
                           </ul>
                        </li>
                     </ul>
               </li>
            </ul>
         </div>
         <script type="text/javascript">
            function menuVertical($scope){
               $scope.options = [
                  {id:1 , name : "Option1", show: "VentanaOpcion1", subOption:[
                     {id:5 , name : "Option1.1", show: "VentanaOpcion1.1", subOption:[]}
                     ,{id:6 , name : "Option1.2", show: "VentanaOpcion1.2", subOption:[]}
                     ,{id:7 , name : "Option1.3", show: "VentanaOpcion1.3", subOption:[
                        {id:8 , name : "Option1.3.1", show: "VentanaOpcion1.3.1", subOption:[]}
                        ,{id:9 , name : "Option1.3.2", show: "VentanaOpcion1.3.2", subOption:[]}
                        ,{id:10 , name : "Option1.3.2", show: "VentanaOpcion1.3.3", subOption:[]}
                     ]}
                  ]}
                  ,{id:2 ,name : "Option2", show: "VentanaOpcion2", subOption:[]}
                  ,{id:3 ,name : "Option3", show: "VentanaOpcion3", subOption:[]}
                  ,{id:4 ,name : "Option4", show: "VentanaOpcion4", subOption:[]}
               ];
               $scope.existSubOption = function(op){
                  return (op.subOption.length > 0)? true: false;
               }
            }
         </script>
         
         
      </div>
      
      
      <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.15/angular.min.js"></script>
   </body>
</html>
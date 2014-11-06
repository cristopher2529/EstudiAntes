<!DOCTYPE html>
<html ng-app="myApps">
   <head>
      <title>EstudiAntes</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
      <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
      <link rel="stylesheet" href="./menuCSS.css" type="text/css" />


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
            <img src="./LogoPequenio.png" style="margin-left:11%; margin-top:-4%;width:22%;">
         </div>
         
      </section>
      <div class="body">
         
         <!--Hago el menu vertical con AngularJs-->
         <div class="menuVertical" ng-controller="ControllerMenu">
            <ul >
               <li  class="optionVertical" ng-repeat="op in options" ng-click="changeFrame(op); $event.stopPropagation()";>
                  {{op.name +" - "+ op.show}}<i style="margin-right:5px;float:right;" ng-show="existSubOption(op)" class="fa fa-angle-double-down fa-lg"></i>
                     <ul ng-show="existSubOption(op)" >
                        <li class="optionVertical" ng-repeat="subOp in op.subOption" ng-click="changeFrame(subOp); $event.stopPropagation()";>
                           {{subOp.name +" - "+ subOp.show}}<i style="margin-right:5px;float:right;" ng-show="existSubOption(subOp)" class="fa fa-angle-double-down fa"></i>
                           <ul ng-show="existSubOption(subOp)" >
                              <li class="optionVertical" ng-repeat="subOp2 in subOp.subOption" ng-click="changeFrame(subOp2); $event.stopPropagation()";>
                                 {{subOp2.name +" - "+ subOp2.show}}
                              </li>
                           </ul>
                        </li>
                     </ul>
               </li>
            </ul>
         </div>
         
         <div class="frame" ng-controller="ControllerFrame">
            <input type="button" value="Inicio" ng-click="showDialog()"/>
            <h1>{{name}} <small>{{"  "+show}}</small></h1>
            <hr />
            <div ng-if="show.length > 0">
               <div ng-include src="show"></div>
            </div>
            <div ng-if="show.length == 0">
               <h1>Bienvenidos!</h1>
            </div>

         </div>
      </div>
      
      
      <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.15/angular.min.js"></script>
      <script type="text/javascript" src="./myApps.js"></script>
      <script type="text/javascript" src="./vendors/ngDialog.js"></script>
   </body>
</html>
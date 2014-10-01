var app = angular.module('myApps', []);

app.controller("menuVertical",function($scope){
   $scope.options = [
      {id:1 , name : "Tareas", show: "VentanaOpcion1", subOption:[
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
      ,{id:4 ,name : "Option4", show: "VentanaOpcion4", subOption:[
         {id:8 , name : "Option1.3.1", show: "VentanaOpcion1.3.1", subOption:[]}
         ,{id:9 , name : "Option1.3.2", show: "VentanaOpcion1.3.2", subOption:[]}
         ,{id:10 , name : "Option1.3.2", show: "VentanaOpcion1.3.3", subOption:[]}
      ]}
   ];
               
   $scope.existSubOption = function(op){
      return (op.subOption.length > 0)? true: false;
   }
            
});

app.controller("frame",function($scope){
   
});
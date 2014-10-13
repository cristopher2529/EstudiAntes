//Togaf,   ATAM,  Graddy Brust Grust,   karman y melon
//Modulo del Menu vertical
var menuModelo = angular.module("ModuleMenu",[]);

menuModelo.service("ServicioMenu",["$rootScope","$http",function($rootScope,$http){
   
   // var bvpromo = angular.module("promociones", []);
   // bvpromo.controller("listaCampaign", function($scope, $http) {
   //     var response = $http.get("../getPromo.jsp");
   
   //     response.success(function(data, status) {
   //        console.log("promo succsess");
   //        $scope.campaigns = data.Records;
   //        console.log(data.Records);
   //     });
   // });
   $http.get('Json.php')
   .success(function(data, status, headers, config){
      console.log("Success",data, status, headers, config);
   }).error(function(data, status, headers, config){
      console.log("Error",data, status, headers, config);
   });
      
   this. options = [
      {id:1 , name : "Profesores", show: "informacionProfesor", subOption:[
         {id:5 , name : "Registrar Profesor", show: 'registrar.html', subOption:[]}
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
   
   this.name = "Cristopher";
   this.show = "registrar.html";
   this.setName = function(op){
      this.name = op.name;
      this.show = op.show;
      $rootScope.$broadcast('changeServiceFrame');
   }
}]);

menuModelo.controller("ControllerMenu",function($scope, ServicioMenu){
   $scope.options = ServicioMenu.options;
   $scope.name = ServicioMenu.name;     
               
   $scope.existSubOption = function(op){
      return (op.subOption.length > 0)? true: false;
   }

   $scope.changeFrame = function(op){
      if(op.length > 1)
         op = op[0];
         
      ServicioMenu.setName(op); 
   }
});


//Modulo de los frames que se mostraran al interactuar con el menu vertical
var frameModule = angular.module("ModuleFrame",["ModuleMenu"]);

frameModule.controller("ControllerFrame",function($scope, ServicioMenu){
   $scope.show = 'registrar.html';
   $scope.name = ServicioMenu.name;
   
   $scope.controller = "frameChild"

   
   $scope.$on("changeServiceFrame", function(){
      $scope.name = ServicioMenu.name;
      $scope.show = ServicioMenu.show;
   })
});


//registro el 
var registreUserModule = angular.module("ModuleregistreUser",["ModuleFrame"]);
registreUserModule.controller("ControllerRegistreUser",["$scope",function($scope){
   
}]);


var app = angular.module("myApps",["ModuleMenu","ModuleFrame","ModuleregistreUser"]);




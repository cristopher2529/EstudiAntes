var app = angular.module('myApps', []);


//Factory
app.factory('frameControlShare',function($rootScope){
   
   var showFrame = {
      show:null,
      preForBroadcast: function(show){
         this.show = show;
         this.broadcastItem();
      },
      broadcastItem: function(){
         $rootScope.$broadcast('changeFrame');
      }
   }
   
   return showFrame;
});



//Servicios
function ServicioMenu($rootScope, $http){
   this. options = [
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
   
   this.name = "Cristopher";
   this.setName = function(txt){
      this.name = txt;
      $rootScope.$broadcast('changeServiceFrame');
   }
   
   this.result;
   this.getJson = function(){
      var responsePromise = $http.get({method:"get", url:"./Json.php"});

      return (responsePromise.then(handleSuccess, handleError));
   }
}
app.service("ServicioMenu",ServicioMenu);

app.service("friendService",function( $http, $q ) {
 
                // I get all of the friends in the remote collection.
                function getFriends() {
 
                    var request = $http({
                        method: "get",
                        url: "Json.php"
                    });
 
                    return( request.then( handleSuccess, handleError ) );
 
                }
                
                function handleError( response ) {
                    if (
                        ! (typeof response.data === "object") ||
                        ! response.data.message
                        ) {
 
                        return( $q.reject( "An unknown error occurred." ) );
 
                    }
 
                    // Otherwise, use expected error message.
                    return( $q.reject( response.data.message ) );
 
                }
 
                function handleSuccess( response ) {
 
                    return( response.data );
 
                }
 
            }
        );

app.controller("menuVertical",function($scope,frameControlShare, ServicioMenu){
   $scope.options = ServicioMenu.options;
   $scope.name = ServicioMenu.name;     
               
   $scope.existSubOption = function(op){
      return (op.subOption.length > 0)? true: false;
   }

   $scope.changeFrame = function(op){
      if(op.length > 1)
         op = op[0];
         
      // console.log(op)
      ServicioMenu.setName(op.show); 
      frameControlShare.preForBroadcast(op.show);
   }            
});

app.controller("showFrame",function($scope, frameControlShare, ServicioMenu, friendService){
   $scope.show = "Me";
   $scope.name = ServicioMenu.name;
   
   $scope.controller = "frameChild"
   
   $scope.controller = "frameChild"
   
   
   $scope.$on("changeFrame", function(){
      $scope.show = frameControlShare.show;
   })
   
   $scope.$on("changeServiceFrame", function(){
      // console.log("<- "+ServicioMenu.name)
      $scope.name = ServicioMenu.name;
      // ServicioMenu.getJson();
      // $scope.name = ServicioMenu.result;
      console.log(friendService.getFriends())
   })
});
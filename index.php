<!DOCTYPE html>
<html>
   <head>
      <title>EstudiAntes</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
      <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
      
      <style type="text/css">
         .menu{
            border-bottom:1px solid #3283C9;
            height:3.5em;
         }
         .menu>ul{
            margin-top:1em;
            float:right;
         }
         .menu>ul>li{
            list-style-type: none;
            margin: 0;
            padding:1em 0.5em;
            border:1px solid black;
            width:20%;
            display:inline;
            text-decoration: none;
            border: 0px;
            text-align: center;
            color: #DCDDF2;
            font-size:12pt;
         }
         .menu>ul>li:hover{
            border-left: 3px solid #3283C9;
            color:#FAFBFD;
            background-color:#5793C8;
            cursor:pointer;
            font-weight:bold;
            position:relative;
         }
         .menu>ul>li>ul{
            visibility:hidden;
         }
         .menu>ul>li:hover>ul{
            visibility:visible;
         }
         .menu>ul>li>ul{
            position:absolute;
            padding-top:1em;
            left:-7em;
            width:10em;
         }
         .menu>ul>li>ul>li{
            border: 0px;
            list-style-type: none;
            width:10em;
            height:2em;
            padding-left:0.5em;
            display:inline block;
            text-align: left;
            color: #DCDDF2;
            font-size:10pt;
         }
         
         .menu>ul>li:hover>ul>li:hover{
            border-left: 3px solid #3283C9;
            color:#FAFBFD;
            background-color:#5793C8;
            cursor:pointer;
            font-weight:bold;
            position:relative;
         }
         
         
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
            <h1 style="margin-left:5em;">Working On It.</h1>
         </div>
         
      </section>
      <div class="body">
      </div>
      
      
            <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.15/angular.min.js"></script>
   </body>
</html>
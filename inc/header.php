
<?php include(__DIR__ . '/../config/auth_check.php'); ?>

<html>
   <head>
      <title>Sanabil - Employee attendance</title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- Tell the browser to be responsive to screen width -->
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <!--script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script-->
      <script src="/att/assets/plugins/jquery/jquery.min.js"></script>
      <!--link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"-->
      <link rel="stylesheet" href="/att/assets/plugins/bootstrap-4.3.1-dist/css/bootstrap.min.css">
      <!--link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"-->
      <link rel="stylesheet" type="text/css" href="/att/assets/css/jquery.dataTables.min.css">
      <!--Start-->
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="/att/assets/plugins/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
      <!--link rel="stylesheet" type="text/css" href="/att/assets/css/jquery.dataTables.min.css">
         <link rel="stylesheet" type="text/css" href="/att/assets/css/bootstrap.min.css">
         
         <link rel="stylesheet" type="text/css" href="/att/assets/css/dataTables.bootstrap.min.css"-->
      <link rel="stylesheet" type="text/css" href="/att/assets/css/buttons.dataTables.min.css">
      <link rel="stylesheet" type="text/css" href="/att/assets/css/style.css">
      <script type="text/javascript" src="/att/assets/js/jquery-2.2.4.min.js"></script>
      <script type="text/javascript" src="/att/assets/js/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="/att/assets/js/dataTables.buttons.min.js"></script>
      <script type="text/javascript" src="/att/assets/js/jszip.min.js"></script>
      <script type="text/javascript" src="/att/assets/js/pdfmake.min.js"></script>
      <script type="text/javascript" src="/att/assets/js/vfs_fonts.js"></script>
      <script type="text/javascript" src="/att/assets/js/buttons.html5.min.js"></script>
      <script type="text/javascript" src="/att/assets/js/buttons.print.min.js"></script>
      <script type="text/javascript" src="/att/assets/js/jquery.mark.min.js"></script>
      <script type="text/javascript" src="/att/assets/js/datatables.mark.js"></script>
      <script type="text/javascript" src="/att/assets/js/buttons.colVis.min.js"></script>
      <!--End-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.0/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.0/css/fontawesome.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/fontawesome.min.css">
    
      <style type="text/css">
         @page {
         size: auto;
         }
      </style>
      <link rel="stylesheet" href="/att/assets/css/select2.min.css">
      <script src="/att/assets/js/select2.min.js"></script>

      <!--Page style-->
      <link rel="stylesheet" type="text/css" href="/att/assets/inc/css/style.css">


      
   </head>
   <body>
      <!-- <style>
         .dropdown:hover>.dropdown-menu {
            display: block;
         }
         </style>-->
      <style type="text/css">  
         .dropdown .dropdown-menu a:focus {background: #ff8a46;
         color: white;}
      </style>
      <style>
         [aria-expanded="false"] > .expanded_header,
         [aria-expanded="true"] > .collapsed_header {
         display: none;
         }
      </style>
      <!-- NAV-->
    

      <!--  <div class="overlay"><div class="loader"></div></div> -->
      <nav class="navbar navbar-expand-md navbar-dark bg-dark">
         <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
            <ul class="navbar-nav mr-auto">
                
                   <li class="nav-item">
                  <a href="/att/" class="nav-link active  notification">
                     <span><i class="fas fa-home"></i></span>
                   </a>
               </li>
               <li class="nav-item active">
                  <a   href="/att" style="color: white;" class="btn btn-dark" type="submit" >  
               <span class="collapsed_header">   Employees  </span>
               </a>
               </li>
                
 


 

 

<li class="nav-item active">
                  <a class="nav-link" href=""> <i>  </i> Attend <span class="sr-only">(current)</span></a>
               </li>
 
<!--li class="nav-item active">
                  <a class="nav-link" href="#"  href=""> <i>  </i> Departments <span class="sr-only">(current)</span></a>
               </li-->
             
       <li class="nav-item active">
                  <a class="nav-link"  href=""> <i>  </i> attendacne <span class="sr-only">(current)</span></a>
               </li>       


            </ul>
         </div>
          

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
                <span class="navbar-toggler-icon"></span> </button>

<?php include("menu.php") ?>
      </nav>

     
 
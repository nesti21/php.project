<? include './core/logout.php';?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>DedSec</title>
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
         <body>
             <video autoplay="" loop="" class="hooli-video" poster="/assets/footer-poster.jpg" style="position:fixed; min-width: 100%;z-index:-100 ">
             <source src="http://www.hooli.xyz/assets/videos/stars.mp4" type="video/mp4">
            </video>
      
            <nav class="navbar navbar-default navbar-fixed-top">
                
   <div class="navbar-header">
       <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
       
       
 <a class="navbar-brand" href="#">
     <p>
     <img alt="Brand" src="http://vignette3.wikia.nocookie.net/silicon-valley/images/f/f0/Hooli.png/revision/latest?cb=20160811201728" style="width:35px; height:25px">
     <? echo $_SESSION['user_name']?>
      <? echo $_SESSION['admin']?>
     </p>
   </a>
     </div>
                   
                
                 <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                     
                   <form method="POST">
                    <p  class="text-right" style="margin-top:10px">
                    <button type="submit" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-folder-open"></i> Post-Maneger</button>
                    <button type="submit" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-user"></i>Users</button>
                    <button type="submit" name="logout" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-log-in"></i> Logout</button>
                     </p>
                    </form>
                   </div>
                     
         
            </nav> 
             <p style="color:white" class="text-center">MAKING THE WORLD A BETTER PLACE</p>
        
        
        
      
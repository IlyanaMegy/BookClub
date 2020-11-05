<?php 
session_start();
include_once('bdd.php');
?>

<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>BookClub - A propos</title>

      <!-- css -->
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

      <link rel="stylesheet" href="../css/bootstrap.min.css">
      <link rel="stylesheet" href="../css/style.css">

   </head>
   
   <body>
      <!-- la barre de navigation responsive avec Bootstrap -->
      <?php include_once('navbar.php') ?>
      
      <div class='body_box'>
         <div class="container content"> 
         </div>

         <!--footer-->
         <?php include_once('footer.php') ?>   
      </div>  
   </body>
</html>
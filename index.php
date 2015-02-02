<!DOCTYPE html>
<html>
  <?php
    require('basepage.php');
  ?>
  <head>
   
    <title>首页-欢迎登录文理好买手</title>
  	<script src="dist\js\bootstrap.js"></script>
  	<link rel="stylesheet" type="text/css" href="dist\css\bootstrap.css">
  	<link rel="stylesheet" type="text/css" href="css\indexstyle.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   
     <!--=====================================================================>
    <?php
          /*
          $indexPage=new PageBase();
          $indexPage->$title="首页-欢迎登录文理好买手";
          $indexPage->PrintBaseHeader(); 
          */  
    ?>
     ======================================================================-->
  </head>
  <body>
    <?php
      $indexPage=new PageBase();
      $indexPage->PrintBaseBody();

    ?>
  </body>
</html>
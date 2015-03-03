<!DOCTYPE>
<html>
<head>
  <title>Category Manager</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <script src="../dist/js/bootstrap.js"></script>
  <link rel="stylesheet" type="text/css" href="../dist/css/bootstrap.css">
  <style>
    .warning{
     color:#cc0033;
     float:left;
    }
  </style>
</head>
<body>
<?php
  $nameErr="";
  if($_SERVER["REQUEST_METHOD"]=="POST"){
    $err=1;
    if(empty($_POST["categoryname"])){
        $nameErr="<span class=\"warning\">the name if necessary</span>";
    }else{
       $name=$_POST["categoryname"];
       $err--;
    }
    if($err<=0){
      $con=mysql_connect("localhost","root","root");
      $decript=$_POST["categorydec"];
      $cid=md5(time().mt_rand(1,1000));
      if(!$con){
          die('Could not connect:'.mysql_error());
      }
      $add="insert into category(cid,cname,cdescript) values('";
      $add.=$cid."','";
      $add.=$name."','";
      $add.=$decript."')";
      mysql_select_db("wlsale",$con);
      if(mysql_query($add,$con)){
          $success="<script>alert(\"Add Success\")</script>";
      }else{
          $success="<script>alert(\"Add Success\")</script>";
      }
      mysql_close($con);
    }
  }
?>
  <div style="margin-left:400px;">
    <h1>Add Category</h1>
  </div>
  <hr/>
  <form class="form-horizontal" style="margin-left:200px;" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">
    <div class="form-group">
     <label class="col-sm-2 control-label">name:</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" placeholder="please input name" name="categoryname">
      <?php echo $nameErr?>
      </div>
    </div>
    <div class="form-group">
     <label class="col-sm-2 control-label">descript</label>
     <div class="col-sm-5">
       <textarea class="form-control" rows="3" placeholder="please input the descript" name="categorydec"></textarea>
    </div>
    </div>
     <input type="submit" style="margin-left:280px;" class="col-sm-2 btn btn-success" name="submit" value="add"/>
    <?php echo $success?>
  </form>
</body>
</html>
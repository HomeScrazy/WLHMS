<!DOCTYPE>
<html>
<head>
  <title>category manager</title>
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
?>
<div style="margin-left:400px;">
  <h1>Add children category</h1>
</div>
<form class="form-horizontal" style="margin-left:200px;" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">
  <div class="form-group">
    <label class="col-sm-2 control-label">name:</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" placeholder="please input name" name="categoryname">
     <?php echo $nameErr?>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">descript:</label>
    <div class="col-sm-5">
      <textarea class="form-control" rows="3" placeholder="please input the descript" name="categorydec"></textarea>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Parent Category:</label>
    <div class="col-sm-5">
    <select class="form-control col-sm-4">
    <?php
      $con=mysql_connect("localhost","root","root");
      $query="select * from category";
      mysql_select_db("wlsale",$con);
      $result=mysql_query($query,$con);
      while($row=mysql_fetch_array($result)){
        echo "<option value=".$row['cid'].">".$row['cname']."</option>";
      }
    ?>
    </select>
    </div>
  </div>
</form>
</body>

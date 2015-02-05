<!DOCTYPE>
<html>
<head>
  <title>后台-管理员登录</title>
  <script src="..\dist\js\bootstrap.js"></script>
  <link rel="stylesheet" type="text/css" href="..\dist\css\bootstrap.css">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <style type="text/css">
    .warning{
      color: #CC0033;
      float: left;
    }
    </style>
</head>
<body>
<?php
  session_start();
  $accountErr=$passwordErr=$checkcodeErr="";
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    /*用一个计数器进行判定
    **只有在所有可能的错误都没有发生时才能进行后续操作
    */
    $errNum=3;
    if(empty($_POST["account"])){
      $accountErr="<span class=\"warning\">请输入管理员帐号</span>";
    }else{
      $account=$_POST["account"];
      $errNum--;
    }
    if(empty($_POST["password"])){
      $passwordErr="<span class=\"warning\">请输入密码</span>";
    }else{
      $password=$_POST["password"];
      $errNum--;
    }
    if(empty($_POST["checkcode"])||$_POST["checkcode"]!=$_SESSION['authnum_session']){
      $checkcodeErr="<span class=\"warning\">请重新输入验证码</span>";
    }else{
      $checkcode=$_POST["checkcode"];
      $errNum--;
    }
    if($errNum<=0){
      //对密码进行加密处理
     
      $con=mysql_connect("localhost","root","root");
      if(!$con){
        die('Could not connect:'.mysql_error());
      }
      $query="select * from admin where aid='".$account."'and apwd='".$password."'";
      mysql_select_db("wlsale",$con);
      $result=mysql_query($query);
      if(mysql_num_rows($result)){
        echo "<script>alert(\"登录成功\")</script>";
      }else{
        echo "<script>alert(\"帐号或密码不正确\")</script>";
      }

    }
  }
?>
  <div style="width:1100px; text-align: center; ">
  <h1>管理员登录</h1>
  <hr/>
  <form class="form-horizontal" style="margin-left:300px;" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">Account:</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" placeholder="Account" name="account"/>
         <?php echo $accountErr;?>
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">Password:</label>
      <div class="col-sm-5">
        <input type="password" class="form-control" placeholder="Password" name="password"/>
        <?php echo $passwordErr;?>
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">Check Code:</label>
      <div class="col-sm-3">
        <input type="text" class="form-control" placeholder="CheckCode" name="checkcode"/>
        <?php echo $checkcodeErr;?>
      </div>
      <img  style="margin-left:-370px;" title="点击刷新" src="../plugin/captcha.php" align="absbottom" onclick="this.src='../plugin/captcha.php?'+Math.random();"></img>
    </div>
    <div class="form-group" style="margin-left:-480px;">
      <input type="submit" value="Login" class="btn btn-success" >
    </div>
  </div>
 </body>
</html>
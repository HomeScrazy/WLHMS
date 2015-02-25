<!DOCTYPE>
<html>
<head>
    <title>文理好买手-用户登录</title>
    <script src="../dist/js/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="../dist/css/bootstrap.css">
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
  $emailErr=$passwordErr=$checkcodeErr="";
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    /*用一个计数器进行判定
    **只有在所有可能的错误都没有发生时才能进行后续操作
    */
    $errNum=3;
    if(empty($_POST["email"])){
      $emailErr="<span class=\"warning\">请输入注册时的邮箱</span>";
    }else{
      $email=$_POST["email"];
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
      $pwd=md5($password);
      $pwd=substr($pwd,3,18);
      $con=mysql_connect("localhost","root","root");
      if(!$con){
        die('Could not connect:'.mysql_error());
      }
      $query="select * from members where memail='".$email."'and password='".$pwd."'";
      mysql_select_db("wlsale",$con);
      $result=mysql_query($query);
      if(mysql_num_rows($result)){
        $_SESSION['user_email']=$email;
        $url="../index.php";
        Header("Location: $url");
      }else{
        echo "<script>alert(\"帐号或用户名不正确\")</script>";
      }

    }
  }
?>
<div style="width:1100px;background-image:url('../images/body.jpg'); text-align: center; height: 404px;">
  <h1>会员登录</h1>
  <hr/>

  <form class="form-horizontal" role="form" method="post" style="margin-left:230px;" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
      <div class="col-sm-5">
        <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email">
        <?php echo $emailErr;?>
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
      <div class="col-sm-5">
        <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password">
        <?php echo $passwordErr;?>
      </div>
    </div>
    <div class="form-group">
      <label for="inputCheckCode" class="col-sm-2 control-label">CheckCode</label>
      <div class="col-sm-3">
        <input type="text" class="form-control" id="inputPassword3" placeholder="CheckCode" name="checkcode">
        <?php echo $checkcodeErr;?>
      </div>
      <img  style="margin-left:-390px;" title="点击刷新" src="../plugin/captcha.php" align="absbottom" onclick="this.src='../plugin/captcha.php?'+Math.random();"></img>
    </div>
    <input type="submit" class="btn btn-success" style="margin-left:-500px;" name="submit" value="Login"/>
  </form>
</div>
  </body>
</html>

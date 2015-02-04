<!DOCTYPE html>

<html>
  <head>
    <title>文理好买手-用户注册</title>
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
  $emailErr=$nicknameErr=$passwordErr=$repeatErr=$success="";
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $errNum=4;
    /*对所有可能出现的输入错误进行验证，
    **每次验证正确$errNum计数器就减1，
    **为0表示输入没问题可以插入
    */
    if(empty($_POST["email"])){
      $emailErr="<span class=\"warning\">请输入邮箱地址</span>";
    }else{
      $email=$_POST["email"];
      $errNum--;
    }
    if(empty($_POST["nickname"])){
      $nicknameErr="<span class=\"warning\">请输入昵称</span>";
    }else{
      $nickname=$_POST["nickname"];
      $errNum--;
    }
    if(empty($_POST["password"])){
      $passwordErr="<span class=\"warning\">密码</span>";
    }else{
      $password=$_POST["password"];
      $errNum--;
    }
    if(!empty($_POST["password"])&&$_POST["repeat"]==$password){
      $errNum--;
    }else{
      $repeatErr="<span class=\"warning\">两次密码不一致</span>";
    }
    if($errNum<=0){
      //对密码进行加密处理
      $pwd=md5($password);
      $pwd=substr($pwd,3,18);
      //利用时间和md5生成用户id
      $id=md5(time().mt_rand(1,1000));
      $con=mysql_connect("localhost","root","root");
      if(!$con){
        die('Could not connect:'.mysql_error());
      }
      $insert="";
      $insert.="insert into member values";
      $insert.="('".$id."','".$nickname."','".$email."','".$pwd."')";
      mysql_select_db("wlsale",$con);
      mysql_select_db("wlsale",$con);
      mysql_close($con);
      $success="<script>alert(\"注册成功\")</script>";

    }
  }
?>
    <div style="width:1100px;background-image:url('../images/body.jpg'); text-align: center; height: 404px;">
      <div style ="text-align:center; ">
          <h2 >会员注册</h2>
          <hr width="85%" align="right" style="color:#5C3B1A;" />
      </div>
      <form class="form-horizontal" role="form" method="post" style="margin-left:230px;" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label" >Email</label>
          <div class="col-sm-5">
          <input type="email" class="form-control " id="inputEmail3" placeholder="Email" name="email">
          <?php echo $emailErr;?>
          </div>

        </div>
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label" >NickName</label>
          <div class="col-sm-5">
          <input type="text" class="form-control" id="inputEmail3" placeholder="NickName" name="nickname">
          <?php echo $nicknameErr;?>
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label" >Password</label>
          <div class="col-sm-5">
          <input type="password" class="form-control" id="inputEmail3" placeholder="Password" name="password">
          <?php echo $passwordErr;?>
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label" >Repeat</label>
          <div class="col-sm-5">
          <input type="password" class="form-control" id="inputEmail3" placeholder="Repeat" name="repeat">
          <?php echo $repeatErr;?>
        </div>
        <br/><br/><br/>
        <input type="submit" class="btn btn-success" style="margin-left:-500px;" name="submit" value="Register"/>
        <?php echo $success;?>
      </form>
    </div>
  </body>
  </html>
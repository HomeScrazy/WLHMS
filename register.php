<!DOCTYPE html>
<?php

?>
<html>
  <head>
    <title>文理好买手-用户注册</title>
    <script src="dist\js\bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="dist\css\bootstrap.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  </head>
  <body>
    <div style="width:1100px;background-image:url('images/body.jpg'); text-align: center; height: 404px;">
      <div style ="text-align:center; ">
          <h2 >会员注册</h2>
          <hr width="85%" align="right" style="color:#5C3B1A;" />
      </div>
      <form class="form-horizontal" role="form" style="margin-left:230px;" method="post">
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label" name="email">Email</label>
          <div class="col-sm-5">
          <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label" name="nickname">NickName</label>
          <div class="col-sm-5">
          <input type="text" class="form-control" id="inputEmail3" placeholder="NickName">
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label" name="password">Password</label>
          <div class="col-sm-5">
          <input type="text" class="form-control" id="inputEmail3" placeholder="Password">
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label" name="repeat">Repeat</label>
          <div class="col-sm-5">
          <input type="text" class="form-control" id="inputEmail3" placeholder="Repeat">
        </div>
        <br/><br/><br/>
        <button class="btn btn-success" style="margin-left:-500px;" name="register">Register</button>
      </form>
    </div>
  </body>
  </html>
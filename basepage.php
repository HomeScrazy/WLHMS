<?php
  /**
  * 
  */
  //根目录存放于BASE_PATH中
  define('BASE_PATH','');
  class PageBase
  {
  	private $title;
  	private  $htmlHeaderStr;
  	private  $htmlBodyStr;

  	function __set($name,$value){
  		$this->$name=$value;
  	}
  	function __construct()
  	{
  		# code...
  	}

  	function PrintBaseHeader(){
  		$htmlHeaderStr="";
  		$htmlHeaderStr.="<title>";
  		$htmlHeaderStr.=$this->title;
  		$htmlHeaderStr.="</title>";
  		$htmlHeaderStr.="<script src=";
  		$htmlHeaderStr.="dist/js/bootstrap.js\"></script>";
  		$htmlHeaderStr.="<link rel=\"stylesheet\" type=\"text/css\" href=";
  		$htmlHeaderStr.="css/indexstyle.css\">";
  		$htmlHeaderStr.="<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">";
		echo "$htmlHeaderStr";

  	}
  	function PrintBaseBody(){
      //logo以及部分通用功能的动态输出
  		$htmlBodyStr="";
      /*根据根据session分析时候处于登录状态
      **如果是未登录状态显示登录或注册连接
      **如果是已经登录状态显示欢迎界面
      */
     
  		$htmlBodyStr.="<div class=\"container\">";
  		$htmlBodyStr.="<div id=\"title_logo\">";
      session_start();
      if(!isset($_SESSION['userid'])){
        $htmlBodyStr.="<div id=\"need_login\">
        <a href=\"\">登录</a> /
        <a href=\"register.php\">注册</a>
        </div>";
      }
      else{
        $htmlBodyStr.="<div id=\"welcome\">
        <span>欢迎：</span>";
        $htmlBodyStr.=$_SESSION['userid'];
      }
      $htmlBodyStr.="</div>";
  		$htmlBodyStr.="<div id=\"title_left\"></div>";
  		$htmlBodyStr.="<div id=\"title_right\"></div>";
  		$htmlBodyStr.="<div id=\"from_search\">";
  		$htmlBodyStr.="<form class=\"form-horizontal\" role=\"form\">";
  		$htmlBodyStr.="<div class=\"form-group\">";
  		$htmlBodyStr.="<div class=\"col-sm-4\">";
  		$htmlBodyStr.=" <input class=\"form-control\" type=\"text\" id=\"formGroupInputLarge\" placeholder=\"请输入类别名称或关键字\">";
  		$htmlBodyStr.="</div>";
  		$htmlBodyStr.="<button type=\"button\" class=\"btn btn-default\">搜索一下</button>";
  		$htmlBodyStr.="</form>";
  		$htmlBodyStr.="</div>";
      $htmlBodyStr.="</div>";
  		$htmlBodyStr.="</div>";
  		echo $htmlBodyStr;
  	}
  }

  /**
  * 
  */
  class Category 
  {
    private $categoryId;
    private $categoryName;
    function __construct($argument)
    {
      # code...
    }
    function __set($name,$value)
    {
      $this->$name=$value;
    }
  }
?>
<?php
  /**
  * 
  */
  class MemberSql
  {
  	
  	function __construct(argument)
  	{
  		# code...
  	}

    function Query($whereStr){
      $con=mysql_connect("localhost","root","root");
      if(!$con){
        die('Could not connect:'.mysql_error());
      }
      $query="select * from member ".$whereStr;
      mysql_select_db("wlsale",$con);
      $result=mysql_query($query);
      return $result
    }
  }
?>
<?php
 	/*
		this file is to create the database wlsale.
		we need to create a database called "wlsale" and create the table 
		we need.
    tablelist:
    member(store the base information of member)
    field          type        isnull        explain
     mid        varchar(100)     no        member's id
     mnickname  nvarchar(50)     yes       nickname of member
     memail     varchar(100)     no        emali for login
     password   varchar(100)     no        password for login
     
	*/
  echo "Create the DataBase 'wlSale',please wait!<br/>";
  $mysql_sever_name="localhost";
	$mysql_username="root";
	$mysql_password="root";
  $my_database="wlsale";
	//connect to mysql
 	$con=mysql_connect($mysql_sever_name,$mysql_username,$mysql_password);
  if(!$con){
	  die('Could not connect'.mysql_error());
	}
 	/*ensure the database is not exist.
		if it exist,delete it.
	*/
  if(mysql_select_db("wlsale",$con)){
      mysql_query("drop database wlsale",$con)
  }
 	if(!mysql_query("create database wlsale",$con)){
	  die("Error creating database".mysql_error());
	}
  //select the database we hava just create
  mysql_select_db("wlsale",$con);
  //create the table called "members"
  $memberCreate="
  use wlsale
  create table members
  (
    mid varchar(100) not null primary key, 
    mnickname nvarchar(50),
    memail varchar(100),
    password varchar(100),
  )";
  mysql_query($memberCreate,$con);
  if(mysql_query) echo "create success!";
  mysql_close($con);
?>
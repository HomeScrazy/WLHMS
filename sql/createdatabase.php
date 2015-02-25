<?php
 	/*
		this file is to create the database wlsale.
		we need to create a database called "wlsale" and create the table
		we need.
        tablelist:
        member(store the base information of member)
        field          type        isnull        explain
        mid        varchar(100)     no        member's id primary key
        mnickname  varchar(50)     yes        nickname of member
        memail     varchar(100)     no        emali for login
        password   varchar(100)     no        password for login

        admin(store the information of admin)
        field          type         isnull        explain
        aid        varchar(100)      no          admin's id primary key
        apassword  varchar(50)       yes         password for admin login

        category(store the information of category)
        field          type         isnull        explain
        cid        varchar(100)      no        category's id primary key
        cname      varchar(50)       yes       name of the category
        cdescript  varchar(200)      yes       the descript of the category
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
 	if(!mysql_query("create database wlsale",$con)){
	  die("Error creating database".mysql_error());
	}
  //select the database we hava just create
  $result=mysql_select_db("wlsale",$con);
  //create the table called "members"
  if($result){
      $memberCreate="
      create table members
      (
        mid varchar(100) not null primary key,
        mnickname varchar(50),
        memail varchar(100),
        password varchar(100)
      )";
      $adminCreate="
      create table admin
      (
        aid varchar(100) not null primary key,
        apassword varchar(50)
      )
      ";
      $categoryCreate="
      create table category
      (
        cid varchar(100) not null primary key,
        cname varchar(50),
        cdescript varchar(200)
      )
      ";
      mysql_query($memberCreate,$con);
      if(mysql_query) echo "create success!";
  }else{
      echo "Error:could select database wlsale";
  }

  mysql_close($con);
?>
<?php
/*
  the class for build the admin page.
  erery admin page use it to bulid the title and the navigation bar.
 */
class AdminPageBase{
    //create the header
    function PrintBaseHeader(){
        $htmlHeader="";
        $htmlHeader.="<!DOCTYPE>";
        $htmlHeader.="<head>";
        $htmlHeader.="<title>"."Wlsale Manage"."</title>";
        $htmlHeader.="<script src=\"../dist/js/bootstrap.js\"></script>";
        $htmlHeader.="<link rel=\"stylesheet\" type=\"text/css\" href=\"../dist/css/bootstrap.css\">";
        $htmlHeader."<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">";
        //style setting
        $htmlHeader.="<link rel=\"stylesheet\" type=\"text/css\" href=\"adminstyle.css\">";
        $htmlHeader.="</head>";

        echo $htmlHeader;
    }

    //create the body
    function PrintBaseBody(){
        $htmlBody="";
        $htmlBody.="<body>";
        $htmlBody.="<div class=\"bgi_white\" id=\"title_top\">";
        $htmlBody.="<img src=\"\"/>";
        $htmlBody.="</div>";
        $htmlBody.="</body>";
        echo $htmlBody;
    }

}
$page=new AdminPageBase();
$page->PrintBaseHeader();
$page->PrintBaseBody();

?>
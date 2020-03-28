<?php
$host = "localhost";
$user = "domaindi_maida";
$pwd = "bing2k";
$db = "domaindi_sites";

$sitename = $_SERVER["HTTP_HOST"];//input sitename without www
$sitename = str_replace("http://","",$sitename);
$sitename = str_replace("www.","",$sitename);
$domain = ucfirst($sitename);


//$logo = "http://d2qcctj8epnr7y.cloudfront.net/images/marvinpogi/logo-codechallenge.png";
//$title = "CodeChallenge.com";
//$domain = "CodeChallenge.com";
$description = $small_description;
$account_ga = "";
$codes_adnetwork_footer = '<script type="text/javascript" src="http://domaindirectory.com/adnetwork/ac/?ci=4&amp;code_type=text&amp;w=468&amp;h=60"></script>';
$codes_adnetwork_header = '<script type="text/javascript" src="http://domaindirectory.com/adnetwork/ac/?ci=10&amp;code_type=image&amp;w=728&amp;h=90"></script>';

/*$host = "main.domaindirectory.com";

$user = "domaindi_maida";

$pwd = "bing2k";

$db = "domaindi_sites";

*/

/*

$host = "mpnetmaida.db.6177736.hostedresource.com";

$user = "mpnetmaida";

$pwd = "Mypage3030";

$db = "mpnetmaida";

*/

$link = mysql_connect($host, $user,$pwd);



if (!$link) {



				 echo "Error establishing connection.";

                                 //die(mysql_error());



}



$db_selected = mysql_select_db($db, $link);



?>
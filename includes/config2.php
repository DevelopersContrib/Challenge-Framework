<?
$host = "mychallenge.com";
$user = "mychalle_maida";
$pwd = "bing2k";
$db = "mychalle_challenge";
$api_url = "http://my.mychannel.com/api/";


$sitename = $_SERVER["HTTP_HOST"];//input sitename without www
$sitename = str_replace("http://","",$sitename);
$sitename = str_replace("www.","",$sitename);
$domain = ucfirst($sitename);
$domainUrl = "http://mychannel.com/framework/challenge";
include "api_function.php";
$domain_info = api_getdomaininfo($domain);

$logo = $domain_info[0]->{Logo};
$domain_title = $domain_info[0]->{Title};
$domainid = $domain_info[0]->{DomainId};
$domainname = $domain_title; 
$challenge_info = api_getchallengeinfo($domainid);

$domain_id = $challenge_info[0]->{ChallengeKey};
$earthchaId = $domain_id;

$small_description =  $challenge_info[0]->{Introduction};
$desc_graphic =  $challenge_info[0]->{Desc_Graphics};
$categoryid = $challenge_info[0]->{CategoryId};
$color = $challenge_info[0]->{TemplateColor};

$link = mysql_connect($host, $user,$pwd);
if (!$link) {
	echo "Error establishing connection.";
}
$db_selected = mysql_select_db($db, $link);
?>
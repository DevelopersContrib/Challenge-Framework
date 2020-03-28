<?
if(!isset($_SESSION['userid'])){ ?>
	<script>window.location="http://earthchallenge.com/login.php";</script>	<?
}
?>

<!--todo : mmb show users latest applications if the user has one, if not show this next steps instead-->
<? 
include ($_SERVER['DOCUMENT_ROOT']).'/modules/user-howto.php';
?> 
<?php
require_once("config.php");
$action = $_REQUEST["action"];
if($action == "login")
{
	$user = $sql->real_escape_string($_POST["user"]);
	$pass = $sql->real_escape_string($_POST["pass"]);
	$pass = hash("SHA256", $pass);
	$remember = $sql->real_escape_string($_POST["remember"]);
	$sqldo = $sql->query("select * from `user` where `user`='$user' and `pass`='$pass'");
	if($sqldo->num_rows == 1)
	{
		setcookie("user", $user, time() + (86400 * 99), "/");
		if($remember == true)
			setcookie("auth", true, time() + (86400 * 7), "/");
		else
			setcookie("auth", true, time() + (86400 * 1), "/");
		$sql->query("UPDATE `user` SET `ip`='".$_SERVER['REMOTE_ADDR']."'");
		header("Location: index.php?status=welcome&user=$user");
		exit();
	}
	else
		header("Location: index.php?status=lfailed&user=$user");
}
if($action == "logout")
{
	setcookie("user", false, time() - (86400 * 99), "/");
	setcookie("auth", false, time() - (86400 * 7), "/");
	header("Location: index.php?status=logout");
}
?>
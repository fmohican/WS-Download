<?php
require_once("config.php");
require_once("function.php");
$action = $_POST["action"];
if($action == "adduser")
{
	if(getaccess($_COOKIE["user"]) > 2)
	{
		$user = $sql->real_escape_string($_POST["user"]);
		$pass = $sql->real_escape_string($_POST["pass"]);
		$mail = $sql->real_escape_string($_POST["email"]);
		$check = $sql->query("SELECT * FROM `user` WHERE `user`='$user'");
			if($check->num_rows == 0)
			{
				$dbpas = hash("SHA256", $pass);
				$result = $sql->query("INSERT INTO `user` (`user`, `pass`, `mail`, `access`) VALUES ('$user', '$dbpas', '$mail', '1')");
				welcomemail($mail, $user, $pass);
				header("Location: admin.php?status=added&user=$user");
			}
			else
				header("Location: admin.php?status=already&user=$user");
	}
	else
		header("Location: index.php?status=Denied");
}
if($action == "delete")
{
	if($_COOKIE['auth'] == true)
	{
		if(getaccess($_COOKIE['user']) > 3)
		{
			$id = $sql->real_escape_string($_POST["id"]);
			$nume = $sql->real_escape_string($_POST["nume"]);
			$sqldo = $sql->query("DELETE FROM `download` WHERE id='$id' limit 1");
			header("Location: index.php?status=Deleted&name=$nume");
			exit("ERROR EDIT");
		}
		else
			header("Location: index.php?status=Denied");
	}
	else
		header("Location: index.php?status=Editfailed");
}

if($action == "update")
{
	if(getaccess($_COOKIE['user']) > 0)
	{
		if($_COOKIE['auth'] == true)
		{
			$id = $sql->real_escape_string($_POST["id"]);
			$nume = $sql->real_escape_string($_POST["nume"]);
			$img = $sql->real_escape_string($_POST["img"]);
			$mal = $sql->real_escape_string($_POST["mal"]);
			$ws = $sql->real_escape_string($_POST["ws"]);
			$alias = $sql->real_escape_string($_POST["alias"]);
			$ws = $sql->real_escape_string($_POST["ws"]);
			$eps = $sql->real_escape_string($_POST["eps"]);
			$size = $sql->real_escape_string($_POST["size"]);
			$lang = $sql->real_escape_string($_POST["lang"]);
			$data = $sql->real_escape_string($_POST["data"]);
			$tip = $sql->real_escape_string($_POST["tip"]);
			$sqldo = $sql->query("UPDATE `download` SET nume='$nume', img='$img', tag='$alias', type='$tip', linkdl='$data', linkmal='$mal', linkws='$ws', size='$size', eps='$eps', lan='$lang' WHERE id='$id' limit 1");
			header("Location: index.php?status=EditSuccess&name=$nume");
			exit("ERROR EDIT");
		}
		else
			header("Location: index.php?status=Editfailed");
	}
	else
		header("Location: index.php?status=Denied");
}

if($action == "add")
{
	if($_COOKIE['auth'] == true)
	{
		$nume = $sql->real_escape_string($_POST["nume"]);
		$img = $sql->real_escape_string($_POST["img"]);
		$mal = $sql->real_escape_string($_POST["mal"]);
		$ws = $sql->real_escape_string($_POST["ws"]);
		$alias = $sql->real_escape_string($_POST["alias"]);
		$ws = $sql->real_escape_string($_POST["ws"]);
		$eps = $sql->real_escape_string($_POST["eps"]);
		$size = $sql->real_escape_string($_POST["size"]);
		$lang = $sql->real_escape_string($_POST["lang"]);
		$data = $sql->real_escape_string($_POST["data"]);
		$tip = $sql->real_escape_string($_POST["tip"]);
		$sqldo = $sql->query("INSERT INTO `download` (nume, img, tag, type, linkdl, linkmal, linkws, size, eps, lan) VALUES('$nume', '$img', '$alias', '$tip', '$data', '$mal', '$ws', '$size', '$eps', '$lang')");
		header("Location: index.php?status=AddSuccess&name=$nume");
		exit("ADD");
	}
	else
		header("Location: index.php?status=AddFailed");
}
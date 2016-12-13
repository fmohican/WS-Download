<?php
require_once("config.php");
require_once("function.php");
include("header.php");
$data = $_GET["data"];
search($data);
include("footer.php");
?>
<?php
	unset($_SESSION['login'],$_SESSION['username']);
	header("location:index.php");
?>
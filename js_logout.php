<?php 

session_start();
unset($_SESSION["card_id"]);
unset($_SESSION["student_id"]);
unset($_SESSION["name"]);
session_destroy();

header("Location: index.php");



?>
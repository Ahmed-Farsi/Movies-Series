<?php
session_start();
unset($_SESSION["gebruikersnaam"]);
unset($_SESSION["wachtwoord"]);
header("Location:login.php");
?>
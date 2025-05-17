<?php
// Mark Iya 219600000
//COSC4806 Assignment 2
session_start();
session_unset();
session_destroy();
header("Location: login.php");
exit();

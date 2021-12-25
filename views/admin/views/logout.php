<?php 

//Start session for edit variables.
session_start();

//Remove all variables session.
session_unset();

//Destroy the current session.
session_destroy();

//Redirect to login page.
header("Location: login.php");
<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION["id"])) {
    header("Location: views/dashboard.php");
} else {
    header("Location: views/login.php");
}
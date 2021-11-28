<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['cus_id']);
header("Location: http://localhost/Nhom03/login.php");
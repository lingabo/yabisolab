<?php
session_start();
require_once 'includes/function.php';
clear_session();
redirect('login.php'); 
?>
<?php

if (!isset($_SESSION)) 
    session_start(); 

if ($_GET['year']) $_SESSION['academicYear'] = $_GET['year'];
else $_SESSION['academicYear'] = date ('Y');

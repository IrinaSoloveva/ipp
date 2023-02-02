<?php

if (!isset($_SESSION)) 
    session_start(); 

if (isset($_SESSION['academicYear'])) echo $_SESSION['academicYear'];
else echo date ('Y');

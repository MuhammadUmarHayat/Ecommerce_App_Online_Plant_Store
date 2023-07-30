<?php
//close all the running sessions 
session_start();
session_unset();
session_destroy();

include("header.php");?>
<h1>
        Session Expired!
    </h1>
    You are successfully logged out.  
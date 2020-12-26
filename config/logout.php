<?php
@session_start();
session_destroy();
header("location: /inventaris/login.php");

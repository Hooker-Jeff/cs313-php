<?php
/**********************************************************
* File: signOut.php
* Author: Br. Burton
* 
* Description: Clears the username from the session if there.
*
***********************************************************/
require("team_activity07_password.php"); // used for password hashing.
session_start();
unset($_SESSION['username']);
header("Location: team_activity07_signIn.php");
die(); // we always include a die after redirects.
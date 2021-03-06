<?php
/**********************************************************
* File: signIn.php
* Author: Br. Burton
* 
* Description: This page has a form for the user to sign in.
*
* In this case, to show another approach, we will have this
* page have two purposes, it will have the form for signing
* in, but it will also have the logic to check a username
* and password and redirect the user to the home page if
* everything checks out. Thus it will post to itself.
***********************************************************/
// If you have an earlier version of PHP (earlier than 5.5)
// You need to download and include password.php.
//require("password.php"); // used for password hashing.
session_start();
$badLogin = false;
// First check to see if we have post variables, if not, just
// continue on as always.
if (isset($_POST['employee_id']) && isset($_POST['employee_password']))
{
	// they have submitted a username and password for us to check
	$username = $_POST['employee_id'];
	$password = $_POST['employee_password'];
	// Connect to the DB
	require("dbConnect.php");
	$db = get_db();
	$query = 'SELECT employee_password FROM naf_employee WHERE username=:username';
	$statement = $db->prepare($query);
	$statement->bindValue(':username', $username);
	$result = $statement->execute();
	if ($result)
	{
		$row = $statement->fetch();
		$hashedPasswordFromDB = $row['password'];
		// now check to see if the hashed password matches
		if (password_verify($password, $hashedPasswordFromDB))
		{
			// password was correct, put the user on the session, and redirect to home
			$_SESSION['username'] = $username;
			header("Location: team_activity07_homepage.php");
			die(); // we always include a die after redirects.
		}
		else
		{
			$badLogin = true;
		}
	}
	else
	{
		$badLogin = true;
	}
}
// If we get to this point without having redirected, then it means they
// should just see the login form.
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign In</title>
</head>

<body>
<div>

<?php
if ($badLogin)
{
	echo "Incorrect username or password!<br /><br />\n";
}
?>

<h1>Please sign in below:</h1>

<form id="mainForm" action="team_activity07_signIn.php" method="POST">

	<input type="text" id="employee_id" name="employee_id" placeholder="Employee ID">
	<label for="employee_id">Employee ID</label>
	<br /><br />

	<input type="password" id="employee_password" name="employee_password" placeholder="Password">
	<label for="employee_password">Password</label>
	<br /><br />

	<input type="submit" value="Sign In" />

</form>

<br /><br />

Or <a href="team_activity07_signUp.php">Sign up</a> for a new account.

</div>

</body>
</html>
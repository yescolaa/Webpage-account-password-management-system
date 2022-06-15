<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Settings</title>
</head>
<body>

	<style type="text/css">
	#text{
		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}
	#box{
		background-color: lightgrey;
		margin: auto;
		width: 400px;
		height: 400px;
		padding: 20px;
	}
	</style>

	<div id="box">	
		<form method="post">
			<div style="font-size: 50px;margin: 5px;color: black;">Settings </div><br>
			<input type="button" value="Change password" onClick="this.form.action='resetPassword.php';this.form.submit();" style="font-size: 20px;width:200px;height:40px;color:green;"><br><br>
			<input type="button" value="Change Email" onClick="this.form.action='resetEmail.php';this.form.submit();" style="font-size: 20px;width:200px;height:40px;color:green;"><br><br>
			<input type="button" value="Change Username" onClick="this.form.action='resetName.php';this.form.submit();" style="font-size: 20px;width:200px;height:40px;color:green;"><br><br>
			<a href="index.php">Back to menu</a><br><br>
		</form>
	</div>
</body>
</html>
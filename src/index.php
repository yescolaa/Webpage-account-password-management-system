<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
<head>
	<title>WELCOME</title>
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
	#button{
		padding: 0px;
		height: 25px;
		width: 200px;
		color: black;
		background-color: blue;
		border: ;
	}
	#box{
		background-color: lightgrey;
		margin: auto;
		width: 400px;
		height: 200px;
		padding: 20px;
	}
	</style>

	<div id="box">	
		<form method="post">
			<div style="font-size: 40px;margin: 5px;color: black;">Welcome back <?php echo $user_data['user_name']; ?></div><br>
			<input type="button" value="User Settings" onClick="this.form.action='settings.php';this.form.submit();" style="width:130px;height:30px;"><br><br><br>
			<a href="logout.php">Log out</a><br><br>
		</form>
	</div>
</body>
</html>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=Edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Change profile</title>
		<link rel="stylesheet" href="login.css" />
		<link rel="stylesheet" href="header.css" />
	</head>

	<header>
	<?php
		session_start();
		$connect = mysqli_connect('localhost', 'root', '', 'mainDB');
		$query = "select * from board order by number desc";
		$result = mysqli_query($connect, $query);
		$total = mysqli_num_rows($result);
		?>
		<a href="./profile.php"><b id="header"><?php echo $_SESSION['userName']; ?></b></a>
	</header>
	<body>
		<div class="login-wrapper">
			<h2>Change profile:<?php echo $_SESSION["userName"]?></h2>
			<form method="post" action="profile_change.php" id="login-form">
				<input type="text" name="userName" placeholder="Name">
				<input type="password" name="userPassword" placeholder="Password">
				<input type="submit" value="Change profile">
			</form>
			<a href="./main.php" name="backtologin">Back to main</a>
		</div>
	</body>
</html>
<?php

session_start();

if (empty($_SESSION['id']))
{
	header('Location: login.php');
	exit;
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>会員制掲示板</title>
	</head>
	<body>
		<h1>Xさん 会員制掲示板へようこそ!</h1>
		<p><a href="logout.php">ログアウト</a></p>
		<p>一言どうぞ!</p>
		<form action="" method="post">
			<textarea name="message" cols="30" rows="5"></textarea>
			<input type="submit" value="投稿する">
		</form>
		<hr>
		<h1>投稿されたメッセージ</h1>
	</body>
</html>

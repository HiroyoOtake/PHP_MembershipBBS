<?php

session_start();

if (!empty($_SESSION['id']))
{
		header('Location: index.php');
		exit;
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>ログイン画面</title>
	</head>
	<body>
		<h1>ログイン</h1>
		<form action="" method="post">
			<p>ユーザーネーム:<input type="text" name="name"></p>
			<p>メールアドレス:<input type="text" name="email"></p>
			<input type="submit" value="ログイン">
		</form>
	</body>
</html>

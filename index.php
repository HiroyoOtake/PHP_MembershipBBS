<?php

require_once('config.php');
require_once('functions.php');

session_start();

if (empty($_SESSION['id']))
{
	header('Location: login.php');
	exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$name = $_SESSION['name'];
	$message = $_POST['message'];
	$errors = array();

	// バリデーション
	if ($message == '')
	{
		$errors['message'] = 'メッセージが未入力です。';
	}

	//バリデーション突破後
	if (empty($errors))
	{
	$dbh = connectDatabase();
	$sql = "insert into posts (name, message, created_at, updated_at) values (:name, :message, now(), now())";
	$stmt = $dbh->prepare($sql);
	$stmt->bindParam(":name", $name);
	$stmt->bindParam(":message", $message);
	$stmt->execute();

	// ログイン画面へとばす
	header('Location: login.php');
	exit();
	}
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>会員制掲示板</title>
	</head>
	<body>
	<h1><?php echo h($_SESSION['name']) ?>さん 会員制掲示板へようこそ!</h1>
		<p><a href="logout.php">ログアウト</a></p>
		<p>一言どうぞ!</p>
		<form action="" method="post">
			<textarea name="message" cols="30" rows="5"></textarea>
			<?php if ($errors['message']) : ?>
				<?php echo h($errors['message']) ?>
			<?php endif ?>
			<input type="submit" value="投稿する">
		</form>
		<hr>
		<h1>投稿されたメッセージ</h1>
	</body>
</html>

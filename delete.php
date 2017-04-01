<?php

require_once('config.php');
require_once('functions.php');

$id = $_GET['id'];

$dbh = connectDatabase();
$sql = "select * from posts where id = :id";
$stmt = $dbh->prepare($sql);
$stmt->bindParam(":id", $id);
$stmt->execute();

$row = $stmt->fetch();

// var_dump($row);

if (!$row)
{
	header('Location: index.php');
	exit;
}

echo 'delete.php';

?>

<?php
	$host = '127.0.0.1';
	$db = 'SysOps';
	$user = 'root';
	$pass = 'hakunabata';
	$charset = 'utf8mb4';

	$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

	try{
       $pdo = new PDO($dsn, $user, $pass);
       $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       // echo 'Connection to database successfull!';
	}catch(PDOException $e){
		throw new PDOException($e->getMessage());
	}
		require_once 'crud.php';
		$crud = new crud($pdo);
?>
<!DOCTYPE html>
<HTML lang="fr">
	<HEAD>
		<meta charset="utf-8" />
		<TITLE>All_users.php</TITLE>
		<META NAME="All users">
		
		<!-- Bootstrap CSS -->
		<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
		<link href="font-awesome/css/font-awesome.css" rel="stylesheet">
	</HEAD>
	
	<body>
	
		<?php

		$host = 'localhost';
		$port = '8080';
		$db   = 'my-activities';
		$user = 'root';
		$pass = 'root';
		$charset = 'utf8mb4';
		$dsn = "mysql:host=$host;port=$port;dbname=$db;charset=$charset";
		$options = [
			PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
			PDO::ATTR_EMULATE_PREPARES   => false,
		];
		
		try {
			$pdo = new PDO($dsn, $user, $pass, $options);
		} catch (PDOException $e) {
			echo $e->getMessage();
			throw new PDOException($e->getMessage(), (int)$e->getCode());
		}

		$stmt = $pdo->query('SELECT * FROM users JOIN status ON users.status_id = status.id ORDER BY username');
		var_dump($stmt);
		echo '<table>';
		while ($row = $stmt->fetch()) {
			var_dump($row);
			echo '<tr>';
			echo '<td>'.$row['user_id'].'</td>';
			echo '<td>'.$row['username'].'</td>';
			echo '<td>'.$row['email'].'</td>';
			echo '<td>'.$row['name'].'</td>';
			echo '</tr>';
		}
		echo '</table>';
		?>

	</body>
</HTML>
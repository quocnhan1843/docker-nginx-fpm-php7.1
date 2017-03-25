<!DOCTYPE html>
<html>
	<head>
		<title>Book-O-Rama Book Entry Results</title>
	</head>
	<body>
		<h1>Book-O-Rama Book Entry Results</h1>
		<?php
			$dsn = 'mysql:dbname=books;host=10.0.2.2';
			$user = 'root';
			$password = '';
			if (!isset($_POST['ISBN']) || !isset($_POST['Author']) || !isset($_POST['Title']) || !isset($_POST['Price'])) {
				echo "<p>You have not entered all the required details.<br />
			Please go back and try again.</p>";
			exit;
			}
			// create short variable names
			$isbn=$_POST['ISBN'];
			$author=$_POST['Author'];
			$title=$_POST['Title'];
			$price=$_POST['Price'];
			$price = doubleval($price);
			try {
			    $dbh = new PDO($dsn, $user, $password);
			    echo "Success";
			} catch (PDOException $e) {
			    echo 'Connection failed: ' . $e->getMessage();
			}
		 	$query = "INSERT INTO books(isbn, author, title, price) VALUES (:isbn, :author, :title, :price)";
			$stmt = $dbh->prepare($query);
			$stmt->execute(array(':isbn' => $isbn, ':author' => $author, ':title' => $title, ':price' => $price));
		 	$db->close();
	 ?>
	</body>
</html>
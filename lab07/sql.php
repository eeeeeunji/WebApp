<!DOCTYPE html>
<html>
<head>
	<title>hyu</title>
</head>
<body>
	<form action="sql.php" method="post">
		DB name: <input type="text" name="db_name">
		DB query: <input type="text" name="db_query">
		<input type="submit" name="submit" value="submit"> <br>
	</form>
	<ul>
		<?php 
			$DBname = $_POST["db_name"];
			$db = new PDO("mysql:dbname=".$DBname.";host=localhost","root","8169");

			$rows = $db->query($_POST["db_query"], PDO::FETCH_ASSOC);
			foreach ($rows as $row) {
				?>
				<li>
					<?php foreach ($row as $val){
						print_r($val." ");
					} ?>
				</li>
				<?php
			}
		 ?>
	</ul>
</body>
</html>
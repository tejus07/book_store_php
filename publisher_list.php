<!DOCTYPE html>
<html>
<head>

	
	<title></title>
	<style type="text/css">
		#ty{
			font-size: 50px;
			text-shadow: 2px black;
			text-align: center;	
		}

		a{
			
			font-size: 20px;
		}
		a:link {
  color: white;
  background-color: #8E524F;
}

/* visited link */
a:visited {
  color: white;
  background-color: #8E524F;
}

/* mouse over link */
a:hover {
  color: #E69A4C;
  background-color: #8E524F;
}

/* selected link */
a:active {
  color: white;
  background-color: #8E524F;
}
	</style>

</head>
<body background="1.jpeg">


<?php

	require_once "./config/connect.php";


	$query = "SELECT * FROM publisher ORDER BY publisherid";
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Can't retrieve data " . mysqli_error($conn);
		exit;
	}
	if(mysqli_num_rows($result) == 0){
		echo "Empty publisher ! Something wrong! check again";
		exit;
	}

	$title = "List Of Publishers";

?>
	<p id="ty" style="color: white">List of Publisher</p>
	<ul style="color: white">
	<?php 
		while($row = mysqli_fetch_assoc($result)){
			$count = 0; 
			$query = "SELECT publisherid FROM books";
			$result2 = mysqli_query($conn, $query);
			if(!$result2){
				echo "Can't retrieve data " . mysqli_error($conn);
				exit;
			}
			while ($pubInBook = mysqli_fetch_assoc($result2)){
				if($pubInBook['publisherid'] == $row['publisherid']){
					$count++;
				}
			}
	?>
		<li>
			<span class="badge"><?php echo $count; ?></span>
		    <a href="bookPerPub.php?pubid=<?php echo $row['publisherid']; ?>"><?php echo $row['publisher_name']; ?></a>
		</li>
	<?php } ?>
		<li>
			<a href="books.php">List full of books</a>
		</li>
	</ul>
</body>
</html>	
<?php include "config/connect.php" ?>
<?php
$sql ="SELECT book_isbn, book_title, book_author, book_image FROM books ORDER BY book_isbn ASC";
$result = mysqli_query($conn , $sql);
$books = mysqli_fetch_all($result , MYSQLI_ASSOC);
// not imp 
mysqli_free_result($result);
// not imp
mysqli_close($conn);

//print_r($books);
//<a href="Cart.php "id="we" class="btn btn-primary">Add to MY  CART</a>
explode(',', $books[0]['book_author'])
?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php include "hdrnftr/interfacetry.php" ?>
<h4 class="center red-text "></h4>
<div class="container ">
	<div class="row ">
		<?php foreach( $books as $book){ ?>
			<div class="col s6 md3 ">
				<div class="card z-depth-0 "  id="qw">
					<a href="book.php?bookisbn=<?php echo $book['book_isbn']; ?>">
					<img class="img-responsive img-thumbnail" src="./bootstrap/img/<?php echo $book['book_image']; ?>">
				</a>
					<div class="card-content center " id="we">
					<h4> TITLE : <?php echo htmlspecialchars($book['book_title']); ?> </h4>
					<ul>Author : <br>
						<?php foreach(explode(',', $book['book_author']) as $easy){ ?>
							<li><?php echo htmlspecialchars($easy) ?></li>
						<?php } ?>
					</ul>	
					</div>

					<div class="card-action right-align">
						<a class="btn btn-primary" id="we" href="book.php?bookisbn=<?php echo $book['book_isbn']?>">more info</a>

					</div>
			</div>
		</div>

		<?php } ?>
	</div>
</div>
<?php include "hdrnftr/footer.php" ?>
</body>
</html>




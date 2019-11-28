<?php
  session_start();
  ?>
<!DOCTYPE html>
<html>
<head>
	<title>Homepage	</title>
</head>
<body>
	<?php include 'hdrnftr/header.php';
	include 'config/connect.php'; 
    $row = select4LatestBook($conn);
  ?>
  <font size="10"><p style="opacity: 0.9">&nbsp&nbsp&nbsp<mark style="background-color: white";> Latest books</mark></p></font>
  <div class="container" align="center"></div>
  <div class="row">
        <?php foreach($row as $book) { ?>
      	<div class="col s3 md3" >
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
      </div>
      	</div>
        <?php } ?>
      </div>
  </div>


</body>
</html>
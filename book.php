<!DOCTYPE html>
<html>
<head>
  <title></title>
  <style>
#white {
  border: 1px solid black;
  table-layout: auto;
}

</style>
</head>
<body>

<?php
require_once 'config/connect.php';
require 'hdrnftr/interface.php';
  $book_isbn = $_GET['bookisbn'];


  $query = "SELECT * FROM books WHERE book_isbn = '$book_isbn'";
  $result = mysqli_query($conn, $query);
  if(!$result){
    echo "Can't retrieve data " . mysqli_error($conn);
    exit;
  }

  $row = mysqli_fetch_assoc($result);
  if(!$row){
    echo "Empty book";
    exit;
  }

  $title = $row['book_title'];
?>

      <!-- Example row of columns -->
      <h3 class="intro-text text-center " style="color: white" style="margin: 25px 0" align="center"><?php echo $row['book_title']; ?></h3>
      <div class="row" style="color: white" align="center">
        <div class="col-md-3 text-center">
          <img class="img-responsive img-thumbnail" src="./bootstrap/img/<?php echo $row['book_image']; ?>">
        </div>
        <div class="col-md-6" style="color: white" align="center">
          <h4>Book Description</h4>
          <p class="white" style="color: black"><?php echo $row['book_descr']; ?></p>
          <h4>Book Details</h4>
          <table class="white" style="color: black">
            <?php foreach($row as $key => $value){
              if($key == "book_descr" || $key == "book_image" || $key == "publisherid" || $key == "book_title"){
                continue;
              }
              switch($key){
                case "book_isbn":
                  $key = "ISBN";
                  break;
                case "book_title":
                  $key = "Title";
                  break;
                case "book_author":
                  $key = "Author";
                  break;
                case "book_price":
                  $key = "Price";
                  break;
              }
            ?>
            <tr>
              <td ><?php echo $key; ?></td>
              <td><?php echo $value; ?></td>
            </tr>
            <?php 
              } 
              if(isset($conn)) {mysqli_close($conn); }
            ?>
          </table>
          <form method="post" action="cart.php" >
            <input type="hidden" name="bookisbn" value="<?php echo $book_isbn;?>">
            <input type="submit" id="qw" value="Purchase / Add to cart" name="cart" class="btn btn-primary">
          </form>
        </div>
      </div>
</body>
</html>
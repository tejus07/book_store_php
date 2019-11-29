<!DOCTYPE html>
<html>
<head>
	<title>Cart</title>
	<style type="text/css">
		table,th,tr{
			border: 1px solid white;
		}
		th, td {
  padding: 15px;
  text-align: left;
}
		table{
			float: center;
		}	

	</style>
</head>
<body>

<?php
	// the shopping cart needs sessions, to start one
	/*
		Array of session(
			cart => array (
				book_isbn (get from $_POST['book_isbn']) => number of books
			),
			items => 0,
			total_price => '0.00'
		)
	*/
	session_start();
	require_once "./config/connect.php";
	require_once "./config/cart_functions.php";
	require_once 'hdrnftr/interfacetry.php';
	// book_isbn got from form post method, change this place later.
	if(isset($_POST['bookisbn'])){
		$book_isbn = $_POST['bookisbn'];
	}

	if(isset($book_isbn)){
		// new iem selected
		if(!isset($_SESSION['cart'])){
			// $_SESSION['cart'] is associative array that bookisbn => qty
			$_SESSION['cart'] = array();

			$_SESSION['total_items'] = 0;
			$_SESSION['total_price'] = '0.00';
		}

		if(!isset($_SESSION['cart'][$book_isbn])){
			$_SESSION['cart'][$book_isbn] = 1;
		} elseif(isset($_POST['cart'])){
			$_SESSION['cart'][$book_isbn]++;
			unset($_POST);
		}
	}

	// if save change button is clicked , change the qty of each bookisbn
	if(isset($_POST['save_change'])){
		foreach($_SESSION['cart'] as $isbn =>$qty){
			if($_POST[$isbn] == '0'){
				unset($_SESSION['cart']["$isbn"]);
			} else {
				$_SESSION['cart']["$isbn"] = $_POST["$isbn"];
			}
		}
	}

	// print out header here
	$title = "Your shopping cart";

	if(isset($_SESSION['cart']) && (array_count_values($_SESSION['cart']))){
		$_SESSION['total_price'] = total_price($_SESSION['cart']);
		$_SESSION['total_items'] = total_items($_SESSION['cart']);
?>
   	<form action="cart.php" method="post" >
   		</form>
	   	<table class="table" style="color:white"  >
	   		<tr style="background-color: #8E524F">
	   			<th >Item</th>
	   			<th>Price</th>
	  			<th>Quantity</th>
	   			<th>Total</th>
	   		</tr>
	   		<?php
		    	foreach($_SESSION['cart'] as $isbn => $qty){
					$conn = db_connect();
					$book = mysqli_fetch_assoc(getBookByIsbn($conn, $isbn));
			?>
			<tr style="background-color: #E69A4C">
				<td><?php echo $book['book_title'] . " by " . $book['book_author']; ?></td>
				<td><?php echo "$" . $book['book_price']; ?></td>
				<td><input type="text" style="color: white" value="<?php echo $qty; ?>" size="2" name="<?php echo $isbn; ?>"></td>
				<td><?php echo "$" . $qty * $book['book_price']; ?></td>
			</tr>
			<?php } ?>
		    <tr style="background-color: #E69A4C">
		    	<th>&nbsp;</th>
		    	<th>&nbsp;</th>
		    	<th><?php echo $_SESSION['total_items']; ?></th>
		    	<th><?php echo "$" . $_SESSION['total_price']; ?></th>
		    </tr>
	   	</table>
	   	<div class="center">
	   	<input type="submit" class="btn brand z-depth-50" name="save_change" value="Save Changes"><br><br>
	

	<a href="checkout.php" class="btn brand z-depth-50">Go To Checkout</a> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	<a href="books.php" class="btn brand z-depth-50">Continue Shopping</a>
</div>
<?php
	} else {
		echo "<h3><b><p class=\"text-warning\">Your cart is empty! Please make sure you add some books in it!</p></b></h3>";
	}
	if(isset($conn)){ mysqli_close($conn); }
?>
</body>
</html>
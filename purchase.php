<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="./bootstrap/css/jumbotron.css" rel="stylesheet">
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
		#qw {
			box-shadow: 50px 100px ;
			background-color: #8E524F;
		}
	 	#we{
	 		background-color:	#E69A4C;
	
	</style>
</head>
<body background="1.jpeg">

<?php
	session_start();
	$_SESSION['err'] = 1;
	foreach($_POST as $key => $value){
		if(trim($value) == ''){
			$_SESSION['err'] = 0;
		}
		break;
	}

	if($_SESSION['err'] == 0){
		header("Location: checkout.php");
	} else {
		unset($_SESSION['err']);
	}


	$_SESSION['ship'] = array();
	foreach($_POST as $key => $value){
		if($key != "submit"){
			$_SESSION['ship'][$key] = $value;
		}
	}
	require_once "config/connect.php";
	// print out header here
	$title = "Purchase";

	// connect database
	if(isset($_SESSION['cart']) && (array_count_values($_SESSION['cart']))){
?>
	<div class="container">
	<table class="table" style="color: white">
		<tr style="background-color: #8E524F">
			<th>Item</th>
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
			<td><?php echo $qty; ?></td>
			<td><?php echo "$" . $qty * $book['book_price']; ?></td>
		</tr>
		<?php } ?>
		<tr style="background-color: #E69A4C">
			<th>&nbsp;</th>
			<th>&nbsp;</th>
			<th><?php echo $_SESSION['total_items']; ?></th>
			<th><?php echo "$" . $_SESSION['total_price']; ?></th>
		</tr>
		<tr style="background-color: #E69A4C">
			<td>Shipping</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>20.00</td>
		</tr>
		<tr style="background-color: #E69A4C">
			<th>Total Including Shipping</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
			<th><?php echo "$" . ($_SESSION['total_price'] + 20); ?></th>
		</tr>
	</table>
	
	<form method="post" action="process.php" class="form-horizontal">
		<?php if(isset($_SESSION['err']) && $_SESSION['err'] == 1){ ?>
		<p class="text-danger">All fields have to be filled</p>
		<?php } ?>
        <div class="form-group">
            <label for="card_type" class="col-lg-2 control-label" style="color: white">Type</label>
            <div class="col-lg-10">
              	<select class="form-control" name="card_type" id="VISA">
                  	<option value="VISA">VISA</option>
                  	<option value="MasterCard">MasterCard</option>
                  	<option value="American Express">American Express</option>
              	</select>
            </div>
        </div>
        <div class="form-group">
            <label for="card_number" class="col-lg-2 control-label" style="color: white">Number</label>
            <div class="col-lg-10">
              	<input type="text" class="form-control" name="card_number">
            </div>
        </div>
        <div class="form-group">
            <label for="card_PID" class="col-lg-2 control-label" style="color: white">CVV</label>
            <div class="col-lg-10">
              	<input type="text" class="form-control" name="card_PID">
            </div>
        </div>
        <div class="form-group">
            <label for="card_expire" class="col-lg-2 control-label" style="color: white">Expiry Date</label>
            <div class="col-lg-10">
              	<input type="date" name="card_expire" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="card_owner" class="col-lg-2 control-label" style="color: white">Name</label>
            <div class="col-lg-10">
              	<input type="text" class="form-control" name="card_owner">
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
              	<button   type="button" class="btn btn-default"><a href="cart.php">Cancel</a></button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
              	<button type="submit" class="btn btn-default">Purchase</button>
            </div>
        </div>
    </form>
</div>
	<p class="lead" style="color: white">Please press Purchase to confirm your purchase, or Continue Shopping to add or remove items.</p>
<?php
	} else {
		echo "<p class=\"text-warning\">Your cart is empty! Please make sure you add some books in it!</p>";
		
	}
	if(isset($conn)){ mysqli_close($conn); }
	
?>
</body>
</html>

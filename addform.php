<!-- add.php -->
<?php include "hdrnftr/interface.php" ?>
<?php include "config/connect.php" ?>
<?php 

$email = $title = $authors =''; 
$errors = array ('email' => '' , 'title' =>'' , 'authors' => '');
if(isset($_POST['submit'])) {
	//echo htmlspecialchars($_POST['email']);
	//echo htmlspecialchars($_POST['title']);
	//echo htmlspecialchars($_POST['authors']);
	if(empty($_POST['email']))
	{
		$errors['email'] = 'email is required <br />';
	} else{
			//echo 'Email : '; 
			//echo htmlspecialchars( $_POST['email']);
			//echo '<br/>';
		 $email = $_POST['email'];
		 if(!filter_var($email , FILTER_VALIDATE_EMAIL)){
		 	$errors['email'] = 'email must be a valid email address';
		 }
		  }
	if(empty($_POST['title']))
	{
		$errors['title'] = 'title is required <br />';
	} else{
			//echo 'Title : ';
			//echo htmlspecialchars($_POST['title']);
			//echo '<br/>';
		// ^ -> fromstart , $ -> toend , \s-> spaces , + ->any length(atleast 1 char) , ffull expression should be inside /
		 $title =$_POST['title'];
		 if(!preg_match('/^[a-zA-Z\s]+$/' ,$title)){
		 	$errors['title'] = 'title must be letter and spaces only';
		 }
		  }
		  // add image
		if(isset($_FILES['image']) && $_FILES['image']['name'] != ""){
			$image = $_FILES['image']['name'];
			$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
			$uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . "bootstrap/img/";
			$uploadDirectory .= $image;
			move_uploaded_file($_FILES['image']['tmp_name'], $uploadDirectory);
		}
	if(empty($_POST['authors']))
	{
		$errors['authors'] = 'authors is required <br />';
	} else{
			//echo 'authors : ';
			//echo htmlspecialchars($_POST['authors']);
			//echo '<br/>';
		 $authors =$_POST['authors'];
		 if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/' ,$authors)){
		 	$errors['authors'] = 'author must be comma seperated';
		 }
	}

	//checking error and redirecting
	if(array_filter($errors))
	 {  
	 } else { //overriding email,title,authors 

	 	$email =  mysqli_real_escape_string($conn , $_POST['email']);
	 	$title =  mysqli_real_escape_string($conn , $_POST['title']);
	 	$authors =  mysqli_real_escape_string($conn , $_POST['authors']);

	 	//create sql
	 	$sql = "INSERT INTO books(email,title,authors) VALUES ('$email' ,'$title' ,'$authors')" ;
	 //	print_r($email);
	 	//print_r($title);
	 	//print_r($authors);
	 	//save to db n check
	 	$result = mysqli_query($conn , $sql);
	 	if($result){

	 		header('Location: index.php');

	 	} else {

	 		echo 'query error :' . mysqli_error($conn) ;
	 	}
		
	   	 }
} 
?>


<html>
<head>
	<style type="text/css">
		#c{
		margin: 0 auto;
		}
		
	</style>
</head>
<section class="container grey-text" >
	<h2 style="color: white" class="center"> ADMIN</h2>
	<h4 class="center " style="color: white">ADD BOOK DETAILS</h4>
	<div style="width:400px;" ></div>
	<form id="c" class="white"  method="POST" >
		<label>Your Email : </label>
		<input type ="text" name="email" value="<?php echo htmlspecialchars($email) ?>">
		<div class="red-text"><?php echo $errors['email'] ?></div>
		<label> Title </label>
		<input type ="text" name="title" value="<?php echo htmlspecialchars($title) ?>">
		<div class="red-text"><?php echo $errors['title'] ?></div>
		<label>Author </label>
		<input type ="text" name="authors" value="<?php echo htmlspecialchars($authors) ?>">
		<tr>
				<th>Image</th>
				<td><input type="file" name="image"></td>
			</tr>
		<div class="red-text"><?php echo $errors['authors'] ?></div>
		<div class="center">

			<input type="submit" name="submit" value="submit" class="btn btn-brand z-depth-0">
		</div>
	</form></section>

	<?php include "hdrnftr/footer.php" ?>
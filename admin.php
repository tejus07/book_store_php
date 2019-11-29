<?php
	$title = "Administration section";
	require_once "./hdrnftr/interfacetry.php";
?>
<div class="container">
<div class="row">
            <div class="box">
                <div class="col-lg-12">
                	 <h2 class="intro-text text-center "  style="color: white" align="left">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                	 	Admin Login
                    </h2>
                    	<div class="center" >
                   		<section class="container grey-text ">
    
							<form class="white" method="post" action="admin_verify.php">
								<div class="form-group">
								<label for="name" class="control-label col-md-4">Name</label>
								<div class="col-md-4">
								<input type="text" name="name" class="form-control">
			</div>
		</div>
		<div class="form-group" align="center">
			<label for="pass" class="control-label col-md-4">Pass</label>
			<div class="col-md-4">
				<input type="password" name="pass" class="form-control">
			</div>
		</div>
		<input type="submit" name="submit" class="btn btn-primary">
	</form>
</section>
</div>
	</div>
</div>
</div>
</div>
<?php
	require_once "./hdrnftr/footer.php";
?>
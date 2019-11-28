<?php include "navtry.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>About</title>
    <script src="js/jquery.js"></script>
	
		<script type="text/javascript">
        $(document).ready(function () {

            $("#contact").click(function () {

                fname = $("#fname").val();
                email = $("#email").val();
                message = $("#message").val();

                $.ajax({
                    type: "POST",
                    url: "sendmsg.php",
                    data: "fname=" + fname + "&email=" + email + "&message=" + message,
                    success: function (html) {
                        if (html == 'true') {

                            $("#add_err2").html('<div class="alert alert-success"> \
                                                 <strong>Message Sent!</strong> \ \
                                                 </div>');

                        } else if (html == 'fname_long') {
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>First Name</strong> must cannot exceed 50 characters. \ \
                                                 </div>');
						
						} else if (html == 'fname_short') {
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>First Name</strong> must exceed 2 characters. \ \
                                                 </div>');
												 
						} else if (html == 'email_long') {
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>Email</strong> must cannot exceed 50 characters. \ \
                                                 </div>');
						
						} else if (html == 'email_short') {
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>Email</strong> must exceed 2 characters. \ \
                                                 </div>');
												 
						} else if (html == 'eformat') {
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>Email</strong> format incorrect. \ \
                                                 </div>');
												 
						} else if (html == 'message_long') {
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>Message</strong> must cannot exceed 50 characters. \ \
                                                 </div>');
						
						} else if (html == 'message_short') {
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>Message</strong> must exceed 2 characters. \ \
                                                 </div>');


                        } else {
                            $("#add_err2").html('<div class="alert alert-danger"> \
                                                 <strong>Error</strong> processing request. Please try again. \ \
                                                 </div>');
                        }
                    },
                    beforeSend: function () {
                        $("#add_err2").html("loading...");
                    }
                });
                return false;
            });
        });
    </script>

</head>

<body>


    <!-- Navigation -->
 

    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h3 class="intro-text text-center " align="center" style="color: white">
                        <strong>ABOUT</strong>
                    </h3>
                    <h5 align="center" style="color: white">
                        This Website is developed by Kartik Gambhir And Tejus Sahi.<br> Website is made using PHP and MySQL.
                    </h5>
                    <hr>
                </div>
                <div class="col-md-8" align="center">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d875.009757955646!2d77.134488!3d28.688479!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x8e5be1770384217a!2sManorama%20Book%20Store!5e0!3m2!1sen!2sin!4v1571042880220!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                </div>
                <div class="col-md-4">
                    <p style="color: white">Phone:
                        <strong>9876543210</strong>
                    </p>
                    <p style="color: white">Email:
                        <strong>info@thebookstore.com</a></strong>
                    </p>
                    <p style="color: white">Address:
                        <strong>LG-7 ,Vardhaman plaza, Rani Bagh Road, Pitampura ,
                            <br> Delhi-110034</strong>
                    </p>
                </div>
                <div class="clearfix" style="color: white"></div>
            </div>
        </div>

      
        </div>

    </div>
    <!-- /.container -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p style="color: white">Copyright &copy; The BookStore</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
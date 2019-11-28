<?php include "contactnav.php" ?>
<?php include "contacttry.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style type="text/css">
        #c{
        margin: 0 auto;
        }     
    </style>
</head>
<body>

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    
                    <h2 class="intro-text text-center "  style="color: white" align="center"><u>Contact
                        Form</u>
                    </h2>
                    <h5 class="intro-text text-center "  style="color: white" align="center"><p>I’d love to hear from you! <br>Complete the form to send me an email.</p>
                    </h5>
                     
                    <div class="center" >
                    <section class="container grey-text ">
                    <form id="c" class="white"  method="POST" >
                        <div class="row">
                            <div class="form-group col-lg-4">
                                <label>Name</label>
                                <input type="text" id="fname" name="fname" maxlength="25" class="form-control">
                            </div><br>
                            <div class="form-group col-lg-4">
                                <label>Email Address</label>
                                <input type="email" id="email" name="email" maxlength="25" class="form-control">
                            </div><br>
                            <div class="clearfix"></div>
                            <div class="form-group col-lg-12">
                                <label>Message</label>
                                <textarea class="form-control" id="message" name="message" maxlength="100" rows="6"></textarea>
                            </div><br>
                            <div class="form-group col-lg-12" align="center">                           
                                <button type="submit"  id="contact"  class="btn btn-default center">Submit</button>
                            </div>
                        </div>
                    </form></section>
                </div>
            </div>
        </div></div>
    </div></body>
    >
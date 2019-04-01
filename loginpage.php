<?php

	require "include/connection.php";

	session_start();

	if(isset($_SESSION['logged'])) {
        header("location: admin/index.php");
  	}

?>


<!DOCTYPE html>
<html>
<head>

	<title>LOGIN</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/all.min.css">
	<link rel="stylesheet" type="text/css" href="css/logincss.css">
	<script type="text/javascript" src="js/all.min.js"></script>

</head>
<body class="bg-img">

	<div class="container-fluid">

		<!-- <nav class="navbar fixed-top navbar-expand-lg bg-info p-3">
			<img src="images/logo.png" height="50px" width="50px" alt="NHA logo">
	        <h4 class="text-white ml-4">NHA IT Helpdesk System</h4>
	    </nav> -->

		<div class="row mt-4">
            <div class="col-xs col-md-4">

            </div>

            <div class="col-xs col-md-4 text-center mt-5">
            	<!-- <img src="images/logo.png" alt="nha-logo" class="w-25">
                <p class="text-primary">Please enter your user information.</p> -->

                <?php

					if(isset($_POST['submit'])) {

						$usertype= $_GET['usertype'];
				        $username= $connection->real_escape_string($_POST['username']);
				        $password= $connection->real_escape_string($_POST['password']);

				        $sql = "SELECT * 
				            FROM userlogin 
				            WHERE 
				                username = '$username' AND
				                password = '$password' AND
				                usertype = '$usertype' ";

				        $res = $connection->query($sql);

				        if ($res->num_rows == 1) {
				            $row = $res->fetch_assoc();
				            $_SESSION['logged'] = true;
				            // $_SESSION['user_fullname'] = $row['User_FullName'];
				            header("location: admin/index.php");

				        }

				        else {

				        	echo "
				        		<div class='alert alert-danger alert-dismissible fade show' role='alert'>
								  <strong>username or password is incorrect!</strong>
								  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
								    <span aria-hidden='true'>&times;</span>
								  </button>
								</div>
				        	"; 

				        }

			   		}

                ?>
                
            </div>
        </div>

		<div class="row">
            <div class="col-xs col-md-4">
                
            </div>

            <div class="col-xs col-md-4 jumbotron j-bg pt-5 pb-5 text-center mt-5">

            	<img src="images/logo.png" alt="nha-logo" class="w-25">
                <p class="text-secondary">Please enter your user information.</p>

                <form action="" method="POST" class="form">
                    <div class="form-group">
                    	<span class="fa fa-user"></span>
                        <input type="text" name="username" class="w-75 rounded p-2" placeholder="username" required>
                    </div>

                    <div class="form-group">
                    	<span class="fa fa-lock"></span>
                        <input type="password" name="password" class="w-75 rounded p-2" placeholder="password" required> 
                    </div>

                    <div class="form-group pt-3 text-center">
                        <input type="submit" name="submit" class="btn btn-dark pl-5 pr-5" value="LOGIN">
                    </div>

                    <a href="index.php" class="text-dark">cancel</a>
                </form>

            </div>
        </div>
		
	</div>

	<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Launch demo modal
</button> -->

<!-- Modal -->
<!-- <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="fa fa-times"></span>
        </button>
      </div>
      <div class="modal-body text-center">
      	<span class="fa fa-exclamation-triangle fa-5x" style="color:red;"></span><br><br>
        <b>username or password is incorrect</b>
      </div>
    </div>
  </div>
</div> -->

</body>
</html>
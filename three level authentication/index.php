<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sign Up</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<style>
		body{
        background-image:url("./assets/bg1.jpg");
        background-position: center; /* Center the image */
  background-repeat: no-repeat; /* Do not repeat the image */
  background-size: cover; /* Resize the background image to cover the entire container */
    }
.sign-up-container{
  background-image: linear-gradient(to right, #790975,#ff0030);
}
.form-label{
color:white !important;
}
#signup-btn{
	color:white;
	font-weight:bold;
	background: #343a40;
}
</style>
<body>
    <div class="d-flex justify-content-center align-items-center vh-100">
    	
    	<form class="shadow w-450 p-3" 
    	      action="php/signup.php" 
    	      method="post">

    		<h4 class="display-4  fs-1">Create Account</h4><br>
    		<?php if(isset($_GET['error'])){ ?>
    		<div class="alert alert-danger" role="alert">
			  <?php echo $_GET['error']; ?>
			</div>
		    <?php } ?>

		    <?php if(isset($_GET['success'])){ ?>
    		<div class="alert alert-success" role="alert">
			  <?php echo $_GET['success']; ?>
			</div>
		    <?php } ?>
		  <div class="mb-3">
		    <label class="form-label">Full Name</label>
		    <input type="text" 
		           class="form-control"
		           name="fname"
		           value="<?php echo (isset($_GET['fname']))?$_GET['fname']:"" ?>">
		  </div>

		  <div class="mb-3">
		    <label class="form-label">Mobile Number</label>
		    <input type="number" 
		           class="form-control"
		           name="mob"
		           value="<?php echo (isset($_GET['mob']))?$_GET['mob']:"" ?>">
		  </div>

		  <div class="mb-3">
		    <label class="form-label">User name</label>
		    <input type="text" 
		           class="form-control"
		           name="uname"
		           value="<?php echo (isset($_GET['uname']))?$_GET['uname']:"" ?>">
		  </div>

		  <div class="mb-3">
		    <label class="form-label">Password</label>
		    <input type="text" 
		           class="form-control"
		           name="pass">
		  </div>

		  <div class="mb-3">
		    <label class="form-label">Your favorite person</label>
		    <input type="text" 
		           class="form-control"
		           name="per">
		  </div>

		  <div class="mb-3">
		    <label class="form-label">What is the name of your first pet</label>
		    <input type="text" 
		           class="form-control"
		           name="pe">
		  </div>

		  <div class="mb-3">
		    <label class="form-label">Enter any 3 image codes</label>
		    <input type="text" 
		           class="form-control"
		           name="cod">
		  </div>
		  
		  <button type="submit" class="btn btn-primary">Sign up</button>
		  
		</form>
    </div>
</body>
</html>
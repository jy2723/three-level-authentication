<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Picture verification</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<style>
      
		body{
        background-image:url("./assets/thirdstep.jpg");
        background-position: center; /* Center the image */
        margin-top: 1000px; 
  background-repeat: no-repeat; /* Do not repeat the image */
  background-size: "width:500px;height:600px;"; /* Resize the background image to cover the entire container */
    }

</style>
<body>
    <div class="d-flex justify-content-center align-items-center vh-100">
    	
    	<form class="shadow w-450 p-3" 
    	      action="php/signup.php" 
    	      method="post">

    		<h4 class="display-4  fs-1">Choose any 3 image codes and fill in the form</h4><br>
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
		    <label class="form-label"style="color:black">Secret code</label>
		    <input type="text" 
		           class="form-control"
		           name="pict"
		           value="<?php echo (isset($_GET['pict']))?$_GET['pict']:"" ?>">
		  </div>
		  <button type="submit" class="btn btn-primary">Sign Up</button>
		  <a href="login.php" class="link-secondary">Login</a>
		</form>
    </div>
</body>
</html>
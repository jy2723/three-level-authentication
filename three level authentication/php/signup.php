<?php 

if(isset($_POST['fname']) && 
   isset($_POST['mob'])&&
   isset($_POST['uname']) && 
   isset($_POST['pass']) &&
   isset($_POST['per']) &&
   isset($_POST['pe']) &&
   isset($_POST['cod'])
   ){

    include "../db_conn.php";

    $fname = $_POST['fname'];
	$mob=$_POST['mob'];
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];
	$per=$_POST['per'];
	$pe=$_POST['pe'];
	$cod=$_POST['cod'];

    $data = "fname=".$fname."&uname=".$uname;
    
    if (empty($fname)) {
    	$em = "Full name is required";
    	header("Location: ../index.php?error=$em&$data");
	    exit;
    }
	else if(empty($mob)){
    	$em = "Mobile Number is required";
    	header("Location: ../index.php?error=$em&$data");
	    exit;
	}
	else if(empty($uname)){
    	$em = "User name is required";
    	header("Location: ../index.php?error=$em&$data");
	    exit;
    }else if(empty($pass)){
    	$em = "Password is required";
    	header("Location: ../index.php?error=$em&$data");
	    exit;
    }
	else if(empty($per)){
    	$em = "Answer is required for security question";
    	header("Location: ../index.php?error=$em&$data");
	    exit;
	}
	else if(empty($pe)){
    	$em = "Answer is required for security question";
    	header("Location: ../index.php?error=$em&$data");
	    exit;
	}
	else if(empty($cod)){
    	$em = "Pictures code is required";
    	header("Location: ../index.php?error=$em&$data");
	    exit;
	}
	else {

    	// hashing the password
    	$pass = password_hash($pass, PASSWORD_DEFAULT);
		$per=password_hash($per,PASSWORD_DEFAULT);
		$pe=password_hash($pe,PASSWORD_DEFAULT);
		$cod=password_hash($cod,PASSWORD_DEFAULT);
    	$sql = "INSERT INTO users(fname,mobile, username, password,person,pet,code) 
    	        VALUES(?,?,?,?,?,?,?)";
    	$stmt = $conn->prepare($sql);
    	$stmt->execute([$fname,$mob, $uname, $pass,$per,$pe,$cod]);

    	header("Location: ../index.php?success=Your account has been created successfully");
	    exit;
    }


}else {
	header("Location: ../index.php?error=error");
	exit;
}

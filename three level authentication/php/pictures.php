<?php 
session_start();

if(isset($_POST['uname']) && 
   isset($_POST['cod'])){

    include "../db_conn.php";

    $uname = $_POST['uname'];
    $cod = $_POST['cod'];

    $data = "uname=".$uname;
    
    if(empty($uname)){
    	$em = "User name is required";
    	header("Location: ../pictures.php?error=$em&$data");
	    exit;
    }else if(empty($cod)){
    	$em = "Picture code is required";
    	header("Location: ../pictures.php?error=$em&$data");
	    exit;
    }else {

    	$sql = "SELECT * FROM users WHERE username = ?";
    	$stmt = $conn->prepare($sql);
    	$stmt->execute([$uname]);

      if($stmt->rowCount() == 1){
          $user = $stmt->fetch();

          $username =  $user['username'];
          $password =  $user['password'];
          $fname =  $user['fname'];
          $id =  $user['id'];
          $cod=$user['cod'];
          if($username === $uname){
             if(password_verify($cod, $code)){
                 $_SESSION['id'] = $id;
                 $_SESSION['fname'] = $fname;

                 header("Location: ../home.php");
                 exit;
             }else {
               $em = "Incorrect User name or password";
               header("Location: ../home.php?error=$em&$data");
               exit;
            }

          }else {
            $em = "Incorrect User name or password";
            header("Location: ../home.php?error=$em&$data");
            exit;
         }

      }else {
         $em = "Incorrect User name or password";
         header("Location: ../home.php?error=$em&$data");
         exit;
      }
    }


}else {
	header("Location: ../home.php?error=error");
	exit;
}

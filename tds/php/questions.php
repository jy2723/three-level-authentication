<?php 
session_start();

if(isset($_POST['uname']) && 
   isset($_POST['per'])&&
   isset($_POST['pe'])){

    include "../db_conn.php";

    $uname = $_POST['uname'];
    $per = $_POST['per'];
    $pe=$_POST['pe'];

    $data = "uname=".$uname;
    
    if(empty($uname)){
    	$em = "User name is required";
    	header("Location: ../questions.php?error=$em&$data");
	    exit;
    }else if(empty($per)){
    	$em = "Answer for security question is required";
    	header("Location: ../questions.php?error=$em&$data");
	    exit;
    }
    else if(empty($pe)){
    	$em = "Answer for security question is required";
    	header("Location: ../questions.php?error=$em&$data");
	    exit;
    }
    else {

    	$sql = "SELECT * FROM users WHERE username = ?";
    	$stmt = $conn->prepare($sql);
    	$stmt->execute([$uname]);

      if($stmt->rowCount() == 1){
          $user = $stmt->fetch();

          $username =  $user['username'];
          $fname =  $user['fname'];
          $id =  $user['id'];
          $person=$user['person'];
          $pet=$user['pet'];
          if($username === $uname){
             if(password_verify($per, $person)&&password_verify($pe, $pet)){
                 $_SESSION['id'] = $id;
                 $_SESSION['fname'] = $fname;

                 header("Location: ../pictures.php");
                 exit;
             }else {
               $em = "Incorrect User name or password";
               header("Location: ../questions.php?error=$em&$data");
               exit;
            }

          }else {
            $em = "Incorrect User name or password";
            header("Location: ../questions.php?error=$em&$data");
            exit;
         }

      }else {
         $em = "Incorrect User name or password";
         header("Location: ../questions.php?error=$em&$data");
         exit;
      }
    }


}else {
	header("Location: ../questions.php?error=error");
	exit;
}

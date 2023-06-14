<?php
session_start();
include "connexion.php";

if (isset($_POST['email']) && isset($_POST['password'])){

    function validate($data){
        $data = trim($data);
        $data = stripslashes( $data);
        $data = htmlspecialchars( $data);
        return  $data;
    }
    $email = validate($_POST['email']);
    $pass = validate($_POST['password']);
    $pass = MD5($pass);

    if(empty($email)) {
        header("Location: inscription.php?error=User Name is required");
        exit();
    }else if(empty($pass)) {
        header("Location: inscription.php?error=password is required");
        exit();
        
        // $hashed_password = password_hash ($pass , PASSWORD_DEFAULT);
        
    }else{
    $sql = "SELECT * FROM administrateur WHERE email='$email' AND password='$pass' ";

    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) === 1)  {
       $row = mysqli_fetch_assoc($result);
       if ($row['email'] === $email && $row['password'] === $pass) {
          $_SESSION['email'] = $row['email'];
          $_SESSION['name'] = $row['name'];
          $_SESSION['id'] = $row['id'];
          header("Location: ../index.php");
          exit();
       }else{
       header("Location: inscription.php?error=Incorect User name or password");
       exit();
    }
    }else{
       header("Location: inscription.php?error=Incorect User name or password");
       exit();
   }
   
   print_r($row);
  }
    // var_dump($pass);
   
    
}else{
    header("Location: inscription.php");
    exit();
}
?>
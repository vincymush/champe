<?php

include 'connect.php';
if(isset($_POST['signUp'])){
    $firstname=$_POST['fname'];
    $lastname=$_POST['lname'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $password=md5($password);


    $checkemail="SELECT * FROM users WHERE email='$email='";
    $result=$conn->query ($checkemail);
    if($result->num_rows>0){
      echo "Email already exists";
     }  else{
            $insertquery="INSERT INTO users (firstname,lastname,email,password) VALUES (firstname,lastname,email,password)
            VALUES ('$firstname','$lastname','$email','$password')";

            if($conn-> query($insertquery)===TRUE){
                header('location:index.php');

            }
            else{
                echo "Error:".$conn->error;
            }
    }
}

if(isset($_POST['signIn'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $password=md5($password);

    $sql="SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result=$conn-> query($sql);
    if($result->num_rows>0){
        session_start();
        $row=$result->fetch_assoc();
        $_SESSION['email']=$row['email'];
        header('location:home.php');
        exit();
}
else{
    echo "invalid email or password";
}
}
?>
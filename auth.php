<?php
    session_start();
    $username="";
    $email="";
    $auth_error=array();
    //connect to database
    $db= mysqli_connect('localhost','root','','pharmacy_inventory');

    //coding for register
    if(isset($_POST['register'])){
        //sanitize user input
        $username=$_POST['username'];
        $email=$_POST['email'];
        $password_1=$_POST['password_1'];
        $password_2=$_POST['password_2'];

        //check user input is valid or not
        if(empty($username)){
            array_push($auth_error,"Username is required");
        }
        if(empty($email)){
            array_push($auth_error,"Email is required");
        }
        if(empty($password_1)){
            array_push($auth_error,"Password is required");
        }
        if(empty($password_2)){
            array_push($auth_error,"Re-enter your password");
        }
        if($password_1 != $password_2){
            array_push($auth_error,"Password do not match,please enter again");
        }

        //if no error, store into database
        if(count($auth_error)==0){
            $password=md5($password_1); //encrypt password before insert into database because why not?
            $sql="INSERT INTO auth (username,email,password) VALUES ('$username','$email','$password')";
            mysqli_query($db, $sql);
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            // go to main page
            header('location: main.html');
        }

    }

    //coding for login
    if(isset($_POST['login'])){
        //check for errors
        $username=$_POST['username'];
        $password=$_POST['password'];
        if(empty($username)){
            array_push($auth_error,"Username is required");
        }
        if(empty($password)){
            array_push($auth_error,"Password is required");
        }
        //log user in if no error
        if(count($auth_error)==0){
            $password= md5($password);
            $query="SELECT * FROM auth WHERE username='$username' AND password='$password'";
            $result= mysqli_query($db, $query);
            if(mysqli_num_rows($result)==1){
                $_SESSION['username'] = $username;
                $_SESSION['success'] = "You are now logged in";
                // go to main page
                header('location: main.html');

            }else{
                array_push($auth_error,"Wrong username/password, please enter again");
            }
        }
    }

<?php 
    $err='';
    $status='';
    $results='';

    // --------------------------------Connecting to MySQL database---------------------------- //

    $conn=mysqli_connect('localhost','Terminator','Vaibhav@0306',"resume-details");
    if(!$conn){
        $err='Connection Error : '. mysqli_connect_error();
    }
    else{

      // --------------------------------Logout & removing cookie---------------------------- //

      if(isset($_POST['submit'])){
        setcookie("user", "", time() - 36000000,'/');
        setcookie("pass", "", time() - 36000000,'/');
        $status="admin";
      }

      // --------------------------------Updating Login Credentials---------------------------- //

      if(isset($_POST['save'])){
        $username=mysqli_real_escape_string($conn,htmlspecialchars($_POST['newUsername']));
        $password=hash("sha256",mysqli_real_escape_string($conn,htmlspecialchars($_POST['newPassword'])));
        $olduser=mysqli_real_escape_string($conn,$_COOKIE['user']);
        $sql="UPDATE adminrecords SET user='$username',pass='$password' WHERE user='$olduser'";
        if(mysqli_query($conn,$sql)){
            $err="Credentials Updated";

            // --------------------------------Changing value of Cookie ------------------------- //

            setcookie("user", htmlspecialchars($_POST['newUsername']), time() + 1800,'/');
            setcookie("pass", hash("sha256",htmlspecialchars($_POST['newPassword'])), time() + 1800,'/');
            $_COOKIE['user']=htmlspecialchars($_POST['newUsername']);
            $_COOKIE['pass']=hash("sha256",htmlspecialchars($_POST['newPassword']));
        } else {
            $err="Query Error ".mysqli_error($conn);
        }
      }

      // --------------------------------Authentication---------------------------- //

      if(isset($_COOKIE['user']) && isset($_COOKIE['pass'])){
        $user=$_COOKIE['user'];
        $pass=$_COOKIE['pass'];
        $sql="SELECT user,pass FROM adminrecords WHERE user='$user' AND pass='$pass'";
        if(mysqli_query($conn,$sql)){
            $results = $conn->query($sql)->fetch_assoc();
            if($user==$results['user'] && $pass==$results['pass']){
              $sql="SELECT info1,info2,info3,info4,info5,info6,id FROM resume";
              if(mysqli_query($conn,$sql)){
                  $results = $conn->query($sql)->fetch_all();
              } else {
                  $err="Query Error ".mysqli_error($conn);
              }
            } 
            else {
                $status="admin";
              }
        }
        else {
          $err="Query Error ".mysqli_error($conn);
        }
        }else{
          $status="admin";
      }
    }
    mysqli_close($conn);
    echo json_encode(array('err'=>$err,'status'=>$status,'result'=>$results));
?>
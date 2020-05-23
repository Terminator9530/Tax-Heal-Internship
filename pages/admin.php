<?php 
  $err='';
  $status='';
  // echo json_encode($_POST);

  // -----------------------Connecting to MYSQL----------------------------- //

  $conn=mysqli_connect('localhost','Terminator','Vaibhav@0306',"resume-details");
  if(!$conn){
      $err='Connection Error : '. mysqli_connect_error();
  } 
  else{
    if(isset($_COOKIE['user']) && isset($_COOKIE['pass'])){
      $user=$_COOKIE['user'];
      $pass=$_COOKIE['pass'];
      $sql="SELECT user,pass FROM adminrecords WHERE user='$user' AND pass='$pass'";
      if(mysqli_query($conn,$sql)){
          $results = $conn->query($sql)->fetch_assoc();
          if($user==$results['user'] && $pass==$results['pass']){
            $status='hrpage';
          }
      }
      else {
        $err="Query Error ".mysqli_error($conn);
      }
      }

    // ------------------------Authentication------------------------------ //

    if(isset($_POST['submit'])){
      $sql="SELECT user,pass FROM adminrecords";
      if(mysqli_query($conn,$sql)){
          $results = $conn->query($sql)->fetch_assoc();
      } else {
         $err="Query Error ".mysqli_error($conn);
      }
      if($_POST['username']==$results['user'] && hash("sha256",$_POST['password'])==$results['pass']){
        setcookie('user',$results['user'],time()+1800,'/');
        setcookie('pass',$results['pass'],time()+1800,'/');
        $status='hrpage';
      }
      else
      $err="Wrong Credentials";
    }
  }
  mysqli_close($conn);
  $obj=array('err'=>$err,'status'=>$status);
  echo json_encode($obj);
?>
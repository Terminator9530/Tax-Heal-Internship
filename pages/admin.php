<?php 
      $err='';
      if(isset($_COOKIE['user'])){
        header("Location:./hrpage.php");
      }
      if(isset($_POST['submit'])){
        $conn=mysqli_connect('localhost','Terminator','Vaibhav@0306',"resume-details");
        if(!$conn){
            echo 'Connection Error : '. mysqli_connect_error();
        } else {
            $sql="SELECT user,pass FROM adminrecords";
            if(mysqli_query($conn,$sql)){
                $results = $conn->query($sql)->fetch_assoc();
            } else {
                echo "Query Error ".mysqli_error($conn);
            }
            mysqli_close($conn);
        }
        if($_POST['username']==$results['user'] && hash("sha256",$_POST['password'])==$results['pass']){
          setcookie('user',$results['user'],time()+1800,'/');
          setcookie('pass',$results['pass'],time()+1800,'/');
          header('Location:./hrpage.php');
        }
        else
        $err="Wrong Credentials";
      }
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css2?family=Girassol&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Mali&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Aladin&display=swap" rel="stylesheet">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

  <title>Admin Panel</title>
  <link rel="stylesheet" type="text/css" href="../styles/admin.css">
</head>

<body>
  <?php include "./navbar.php"; ?>
  <?php if($err!=''){ ?>
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <?php echo $err; ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <?php } ?>
  <div class="resume-form">
    <h1>Admin Panel</h1>
    <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" style="font-family: 'Mali', cursive;">
      <input type="text" name="username" placeholder="Enter The Username" class="form-control my-3" required
        autocomplete="off">
      <input type="password" name="password" placeholder="Enter The Password" class="form-control" required>
      <input type="submit" name="submit" value="Login" class="btn btn-primary"
        style="font-family: 'Aladin', cursive;font-size:20px">
    </form>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
  </script>
</body>

</html>
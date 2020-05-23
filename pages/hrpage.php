<?php 
    $err='';

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
        header("Location:./admin.php");
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
                  echo "Query Error ".mysqli_error($conn);
              }
            } 
            else {
                header("Location:./admin.php");
              }
        }
        else {
          echo "Query Error ".mysqli_error($conn);
        }
        }else{
          header("Location:./admin.php");
      }
    }
    mysqli_close($conn);
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

  <title>Resumes</title>
  <link rel="stylesheet" type="text/css" href="../styles/hrpage.css">
</head>

<body>

  <!-------------------------------Navbar------------------------------------>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="./index.php">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
      aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="./form.php">Application Form</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./opportunities.php">Opportunities</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./contact.php">Contact</a>
        </li>
      </ul>
    </div>
  </nav>

  <!-------------------------------Alerts & Warnings------------------------------------>

  <?php if($err!=''){ ?>
  <div class="alert alert-<?php echo $err=="Credentials Updated"?"success":"danger"; ?> alert-dismissible fade show"
    role="alert">
    <?php echo $err; ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <?php } ?>


  <!-----------------------------Credentials Updating Form---------------------------------->

  <div style="color:black;" class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false"
    tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Change Credentials</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
            <input type="text" class="form-control mb-3" name="newUsername" placeholder="New Username" required
              autocomplete="off">
            <input type="password" class="form-control mb-3" name="newPassword" placeholder="New Password" required
              autocomplete="off">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="save">Save</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-------------------------------All Submitted Applications------------------------------------>

  <div class="resume-form">
    <h1 style="display:inline-block;width:80%;">Resumes</h1>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" style="display:inline;">
      <input type="submit" value="LogOut" name="submit" class="btn btn-primary"
        style="font-family: 'Aladin', cursive;font-size:20px">
    </form>
    <button style="font-family: 'Aladin', cursive;font-size:20px" class="btn btn-primary" id="changePassword">Change
      Credentials</button>
    <div class="row">
      <?php foreach($results as $intern){ ?>
      <div class="col-4">
        <a href="./resume.php?id=<?php echo $intern[6]; ?>" class="card text-black bg-light mb-3 mr-5"
          style="max-width: 18rem;">
          <div class="card-header"><?php echo $intern[0]; ?></div>
          <div class="card-body">
            <h5 class="card-title">Skills</h5>
            <p class="card-text"><?php echo $intern[1]; ?></p>
          </div>
        </a>
      </div>
      <?php } ?>
    </div>
  </div>
  <script>
    document.getElementById("changePassword").onclick = function () {
      $('#staticBackdrop').modal(true);
    }
  </script>

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
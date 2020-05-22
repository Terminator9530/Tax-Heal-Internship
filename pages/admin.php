<?php 
      $err='';
      if(isset($_POST['submit'])){
        if($_POST['username']=="admin" && $_POST['password']=="test"){
          setcookie('user','admin',time()+1800,'/');
          header('Location:./pages/hrpage.php');
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Admin Panel</title>
    <style>
      body{
            background-color: rgb(68, 66, 66);
            color:white;
        }
        *{
            box-sizing: border-box;
            margin:0;
            padding:0;
        }
        .resume-form{
            padding:10px;
            width:50%;
            margin:auto;
        }
        .resume-form input[type='submit']{
            margin:15px;
            margin-left: 0;
        }
        form{
            margin:0!important;
        }
        h1{
          font-family: 'Girassol', cursive;
        }
    </style>
  </head>
  <body>
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
        <input type="text" name="username" placeholder="Enter The Username" class="form-control my-3" required autocomplete="off">
        <input type="text" name="password" placeholder="Enter The Password" class="form-control" required autocomplete="off">
        <input type="submit" name="submit" value="Login" class="btn btn-primary" style="font-family: 'Aladin', cursive;font-size:20px">
    </form>
  </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>
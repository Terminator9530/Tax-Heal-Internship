<?php 
      if(isset($_POST['admin'])){
        header("Location:./admin.php");
      }
      if(isset($_POST['user'])){
        header("Location:./form.php");
      }
      if(isset($_POST['contact'])){
        header("Location:./contact.php");
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
  <link rel="stylesheet" type="text/css" href="../styles/index.css">
</head>

<body>
  <?php include "./navbar.php"; ?>
  <div class="resume-form">
    <h1>Landing Page</h1>
    <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
      <input type="submit" name="admin" value="Admin Login" class="btn btn-primary"
        style="font-family: 'Mali', cursive;">
      <input type="submit" name="user" value="Application Form" class="btn btn-primary"
        style="font-family: 'Mali', cursive;">
      <input type="submit" name="contact" value="Contact" class="btn btn-primary" style="font-family: 'Mali', cursive;"">
    </form>
  </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src=" https://code.jquery.com/jquery-3.5.1.slim.min.js"
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
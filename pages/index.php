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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

  <!-------------------------------Navbar------------------------------------>

  <?php include "./navbar.php"; ?>

  <!-------------------------------Home Page------------------------------------>

  <div class="home-page">
    <h1>Landing Page</h1>
    <div class="row" style="margin:auto;">
      <div class="card text-white bg-dark mb-3 col-12 col-md-6 col-xl-4 mr-1 ml-1" style="max-width: 18rem;">
        <div class="card-header">Admin Login</div>
        <div class="card-body">
          <p class="card-text">Login system only for admins.</p>
          <a href="./admin.php" class="btn btn-primary">Login</a>
        </div>
      </div>
      <div class="card text-white bg-dark mb-3 col-12 col-md-6 col-xl-4 mr-1 ml-1" style="max-width: 18rem;">
        <div class="card-header">Application Form</div>
        <div class="card-body">
          <p class="card-text">For Applicants who want to apply for Internship.</p>
          <a href="./form.php" class="btn btn-primary">Application Form</a>
        </div>
      </div>
      <div class="card text-white bg-dark mb-3 col-12 col-md-6 col-xl-4 mr-1 ml-1" style="max-width: 18rem;">
        <div class="card-header">Contact</div>
        <div class="card-body">
          <p class="card-text">In case of any problems contact us.</p>
          <a href="./contact.php" class="btn btn-primary">Contact</a>
        </div>
      </div>
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
    <script src="../js/index.js"></script>
</body>

</html>
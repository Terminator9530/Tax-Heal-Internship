<?php 
    if(isset($_POST['submit'])){
      setcookie("user", "", time() - 36000000,'/');
      header("Location:./admin.php");
    }
    if($_COOKIE['user']){
      $results=[];
      $conn=mysqli_connect('localhost','Terminator','Vaibhav@0306',"resume-details");
      if(!$conn){
          echo 'Connection Error : '. mysqli_connect_error();
      } else {
          $sql="SELECT info1,info2,info3,info4,info5,info6 FROM resume";
          if(mysqli_query($conn,$sql)){
              $results = $conn->query($sql)->fetch_all();
          } else {
              echo "Query Error ".mysqli_error($conn);
          }
          mysqli_close($conn);
      }
    } else {
      header("Location:./admin.php");
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

    <title>Resumes</title>
    <style>
      input[type='submit']{
        margin:20px;
      }
      .intern{
        height:auto;
        padding:15px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        width:100%;
        font-family: 'Mali', cursive;
      }
      .intern ul{
        margin:20px;
      }
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
            width:90%;
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
    <div class="resume-form">
      <h1>Resumes</h1>
      <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
        <input type="submit" value="LogOut" name="submit" class="btn btn-primary" style="font-family: 'Aladin', cursive;font-size:20px">
      </form>
      <?php foreach($results as $intern){ ?>
          <div class="intern">
              <ul>
              <?php for($i=0;$i<6;$i++){ ?>
                  <li><?php echo $intern[$i]; ?></li>
              <?php } ?>
              </ul>
          </div>
      <?php } ?>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>
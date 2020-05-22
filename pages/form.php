<?php
    if(isset($_POST["submit"])){
        echo "Done";
        for($i=0;$i<6;$i++){
            echo $_POST['info'.($i+1)];
        }

        $conn=mysqli_connect('localhost','Terminator','Vaibhav@0306',"resume-details");
        if(!$conn){
            echo 'Connection Error : '. mysqli_connect_error();
        } else {
            $info1=mysqli_real_escape_string($conn,$_POST['info1']);
            $info2=mysqli_real_escape_string($conn,$_POST['info2']);
            $info3=mysqli_real_escape_string($conn,$_POST['info3']);
            $info4=mysqli_real_escape_string($conn,$_POST['info4']);
            $info5=mysqli_real_escape_string($conn,$_POST['info5']);
            $info6=mysqli_real_escape_string($conn,$_POST['info6']);
            $sql="INSERT INTO resume(info1,info2,info3,info4,info5,info6) VALUES('$info1','$info2','$info3','$info4','$info5','$info6')";
            if(mysqli_query($conn,$sql)){
                 header('Location:../index.php');
            } else {
                echo "Query Error ".mysqli_error($conn);
            }
            mysqli_close($conn);
        }
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

    <title>Resume Form</title>
    <style>
        *{
            box-sizing: border-box;
            margin:0;
            padding:0;
        }
        .resume-form{
            padding:10px;
        }
        .resume-form input[type='submit']{
            margin:15px;
        }
        form{
            margin:0!important;
        }
        h3{
            margin-bottom:20px;
            font-family: 'Girassol', cursive;
        }
        body{
            background-color: rgb(68, 66, 66);
            color:white;
        }
    </style>
  </head>
  <body>
    <div class="resume-form">
        <h3>Enter The Resume Details : </h3>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="row" style="font-family: 'Mali', cursive;">
            <?php for($i=0;$i<6;$i++){ ?>
                <div class="col-6">
                    <label><?php echo "info".($i+1) ?></label><input type="text" class="form-control" name="<?php echo "info".($i+1) ?>" required>
                </div>
            <?php } ?>
            <input type="submit" class="btn btn-primary" name="submit" value="Submit" style="font-family: 'Aladin', cursive;font-size:20px">
        </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>
<?php 
    if($_COOKIE['user']){
        if(isset($_GET['id'])){
            $results=[];
            $conn=mysqli_connect('localhost','Terminator','Vaibhav@0306',"resume-details");
            $id=mysqli_real_escape_string($conn,$_GET['id']);
            if(!$conn){
                echo 'Connection Error : '. mysqli_connect_error();
            } else {
                $sql="SELECT info1,info2,info3,info4,info5,info6,id FROM resume WHERE id=$id";
                if(mysqli_query($conn,$sql)){
                    $results = $conn->query($sql)->fetch_assoc();
                } else {
                    echo "Query Error ".mysqli_error($conn);
                }
                mysqli_close($conn);
        }
    }
}
    else{
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Resume</title>
    <link rel="stylesheet" type="text/css" href="../styles/resume.css">
  </head>
  <body>
        <nav class="navbar navbar-dark bg-dark">
            <a class="navbar-brand" href="./hrpage.php"><i class="fa fa-arrow-left"></i></a>
        </nav>
      <div class="resume-form">
      <h1>Resume</h1>
        <?php for($i=0;$i<6;$i++){ ?>
            <p><?php echo $results["info".($i+1)]; ?></p>
        <?php } ?>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>
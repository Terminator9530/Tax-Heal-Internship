<?php 
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
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Resumes</title>
    <style>
      input[type='submit']{
        margin:20px;
      }
    </style>
  </head>
  <body>
    <h1>Resumes</h1>
    <?php foreach($results as $intern){ ?>
        <div>
            <ul>
            <?php for($i=0;$i<6;$i++){ ?>
                <li><?php echo $intern[$i]; ?></li>
            <?php } ?>
            </ul>
        </div>
    <?php } ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>
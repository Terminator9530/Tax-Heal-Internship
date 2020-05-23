<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css2?family=Girassol&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mali&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Aladin&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Simple Markers</title>
    <link rel="stylesheet" type="text/css" href="../styles/contact.css">
</head>

<body>

    <!--------------------------Nav Bar-------------------------------->

    <?php include "./navbar.php"; ?>

    <!---------------------Map & Contact Address------------------------>

    <div class="address">
        <center>
            <h1>Contact</h1>
        </center>
        <div class="container">
            <img src="../map.png"
                style="border-radius:10px;box-shadow: 0 4px 8px 0 rgba(255, 255, 255, 0.2), 0 6px 20px 0 rgba(255, 255, 255, 0.19);">
            <p class="title">Open in Google Map</p>
            <div class="overlay"></div>
            <div class="button"><a
                    href="https://www.google.com/maps/place/Z+Square+Mall/@26.4733213,80.350577,17z/data=!3m1!4b1!4m5!3m4!1s0x399c38a645603a8b:0x6f19ae5f63ac4fd5!8m2!3d26.4733213!4d80.3527657">
                    Click Here </a></div>
        </div>
        <center>
            <p style="margin-top:5px;padding:10px;padding-bottom:0;margin-bottom:0 !important;">16, 113, Mall Rd, Bada
                Chauraha, Downtown, Kanpur, Uttar Pradesh 208001</p>
        </center>
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
    <script src="../js/contact.js"></script>
</body>

</html>
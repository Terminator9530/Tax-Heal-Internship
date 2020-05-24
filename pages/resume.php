<?php 

    $err='';
    $results='';
    $status='';
    // echo json_encode($_GET);
    // ------------------------------Connecting to MySQL database------------------------------ //

    $conn=mysqli_connect('localhost','Terminator','Vaibhav@0306',"resume-details");
    if(!$conn){
        $err='Connection Error : '. mysqli_connect_error();
    } 
    else{

        // ------------------------------Authentication------------------------------ //

        if(isset($_COOKIE['user']) && isset($_COOKIE['pass'])){
            $user=$_COOKIE['user'];
            $pass=$_COOKIE['pass'];
            $sql="SELECT user,pass FROM adminrecords WHERE user='$user' AND pass='$pass'";
            if(mysqli_query($conn,$sql)){
                $results = $conn->query($sql)->fetch_assoc();
                if($user==$results['user'] && $pass==$results['pass']){
                    // echo json_encode($results);

                    // ------------------------------Fetching id from GET superglobals------------------------------ //

                    if(isset($_GET['id'])){
                        // echo $_GET['id'];

                        // ------------------------------Find record for that id------------------------------ //

                        $id=mysqli_real_escape_string($conn,$_GET['id']);
                        $sql="SELECT intern_name,email,phone_no,city,graduation_per,graduation_ins,senior_per,senior_ins,senior_board,secondary_per,secondary_ins,secondary_board,skills,github,id FROM resume WHERE id=$id";
                        if(mysqli_query($conn,$sql)){
                            $results = $conn->query($sql)->fetch_assoc();
                            // echo json_encode($results);
                        } else {
                            $err="Query Error ".mysqli_error($conn);
                        }
                    }
                }
                else{
                    $status='admin';
                }
            } else {
                $err="Query Error ".mysqli_error($conn);
            }
        } 
        else{
            $status='admin';
        }
    }
    mysqli_close($conn);

    echo json_encode(array('err'=>$err,'status'=>$status,'intern'=>$results));
?>
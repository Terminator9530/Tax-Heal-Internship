<?php
    $err="";


    //---------------------------Submitting Application Form------------------------------ //

    if(isset($_POST["submit"])){
        $conn=mysqli_connect('localhost','Terminator','Vaibhav@0306',"resume-details");
        if(!$conn){
            $err=mysqli_connect_error();
        } else {
            $info1=mysqli_real_escape_string($conn,$_POST['info1']);
            $info2=mysqli_real_escape_string($conn,$_POST['info2']);
            $info3=mysqli_real_escape_string($conn,$_POST['info3']);
            $info4=mysqli_real_escape_string($conn,$_POST['info4']);
            $info5=mysqli_real_escape_string($conn,$_POST['info5']);
            $info6=mysqli_real_escape_string($conn,$_POST['info6']);
            $sql="INSERT INTO resume(info1,info2,info3,info4,info5,info6) VALUES('$info1','$info2','$info3','$info4','$info5','$info6')";
            if(mysqli_query($conn,$sql)){
                $err="Form Submitted";
            } else {
                $err="Query Error ".mysqli_error($conn);
            }
            mysqli_close($conn);
        }
    }
    echo json_encode(array('err'=>$err));
?>
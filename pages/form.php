<?php
    $err="";
    // echo json_encode($_POST);
    // ---------------------------Submitting Application Form------------------------------ //

    if(isset($_POST["submit"])){
        $conn=mysqli_connect('localhost','Terminator','Vaibhav@0306',"resume-details");
        if(!$conn){
            $err=mysqli_connect_error();
        } else {
            $name=mysqli_real_escape_string($conn,$_POST["name"]);
            $email=mysqli_real_escape_string($conn,$_POST["email"]);
            $phone_no=mysqli_real_escape_string($conn,$_POST["phone_no"]);
            $city=mysqli_real_escape_string($conn,$_POST["city"]);
            $grad_per=mysqli_real_escape_string($conn,$_POST["grad_per"]);
            $grad_ins=mysqli_real_escape_string($conn,$_POST["grad_ins"]);
            $senior_per=mysqli_real_escape_string($conn,$_POST["senior_per"]);
            $senior_ins=mysqli_real_escape_string($conn,$_POST["senior_ins"]);
            $senior_board=mysqli_real_escape_string($conn,$_POST["senior_board"]);
            $secon_per=mysqli_real_escape_string($conn,$_POST["secon_per"]);
            $secon_ins=mysqli_real_escape_string($conn,$_POST["secon_ins"]);
            $secon_board=mysqli_real_escape_string($conn,$_POST["secon_board"]);
            $skills=mysqli_real_escape_string($conn,$_POST["skills"]);
            $github=mysqli_real_escape_string($conn,$_POST["github"]);
            $submit=mysqli_real_escape_string($conn,$_POST["submit"]);
            $sql="SELECT * FROM resume WHERE email='$email'";
            if(mysqli_query($conn,$sql)){
                $result=$conn->query($sql)->fetch_assoc();
                $data=$result;
                if(!$data){
                    $sql="INSERT INTO resume(intern_name,email,phone_no,city,graduation_per,graduation_ins,senior_per,senior_ins,senior_board,secondary_per,secondary_ins,secondary_board,skills,github) VALUES('$name','$email',$phone_no,'$city',$grad_per,'$grad_ins',$senior_per,'$senior_ins','$senior_board',$secon_per,'$secon_ins','$secon_board','$skills','$github')";
                    if(mysqli_query($conn,$sql)){
                        $err="Form Submitted";
                    } else {
                        $err="Query Error ".mysqli_error($conn);
                    }
                }
                else{
                    $err="Already Submitted";
                }
            }
            else{
                $err="Query Error ".mysqli_error($conn);
            }
            mysqli_close($conn);
        }
    }
    echo json_encode(array('err'=>$err));
?>
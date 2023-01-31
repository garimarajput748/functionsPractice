<?php
class FormValidation {

    private $data;  
    private static $fields= ['fname', 'lname', 'email','number','gender', 'dob'];

    
    
}
    if(isset($_POST["submit"])){

            $validation = new FormValidation($_POST);

        /*if(empty($_POST["fname"]) && empty($_POST["lname"]) && empty($_POST["email"]) && empty($_POST["number"]) && empty($_POST["gender"]) && empty($_POST["dob"])){
            $err = "Please fill all fields";
        }
        else{

            if(isset($_POST["fname"])) $fname = $_POST["fname"];

            if(isset($_POST["lname"])) $lname = $_POST["lname"];

            if(isset($_POST["email"])) $email = $_POST["email"];

            if(isset($_POST["number"])) $number = $_POST["number"];

            if(isset($_POST["gender"])) $gender = $_POST["gender"];

            if(isset($_POST["dob"])) $dob = $_POST["dob"];
        }*/
    } 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <title>Oops Exercise</title>
    <style>
        /* Chrome, Safari, Edge, Opera */
            input::-webkit-outer-spin-button,
            input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            }

            /* Firefox */
            input[type=number] {
            -moz-appearance: textfield;
            }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h4>Example Form</h4>
        <div class="row">
            <div class="col-6">
                <form method="POST">
                    <div class="row">
                        <div class="col-6">
                            <label for="fName">FirstName::</label>
                            <input type="text" name="fname" class="form-control mb-2" placeholder="Enter Your First Name" required>
                            <label for="email">Email::</label>
                            <input type="email" name="email" class="form-control mb-2" placeholder="Enter Your @email" required>
                            <label for="gender" class="form-check-label">Gender::</label>
                            <input type="radio" class="form-check-input" name="gender" class="form-control" value="female" required>Female
                            <input type="radio" class="form-check-input" name="gender" class="form-control" value="male" required>Male
                            <input type="radio" class="form-check-input" name="gender" class="form-control" value="other" required>Other
                        </div>
                        <div class="col-6">
                            <label for="LName">LastName::</label>
                            <input type="text" name="lname" class="form-control mb-2" placeholder="Enter Your Last Name" required>
                            <label for="number">Number::</label>
                            <input type="number" name="number" class="form-control mb-2" placeholder="Enter Your Contact Number" required>
                            <label for="dob">DOB::</label>
                            <input type="date" name="dob" class="form-control" required>
                        </div>
                        <span class="text-danger text-center mt-2"><?php //echo isset($err)?$err:'';?></span>
                    </div>
                    <input type="submit" name="submit" class="btn btn-success mt-4">
                    <input type="reset" class="btn btn-danger mt-4 ms-5" value="RESET">
                </form>
            </div>
            <div class="col-6">

            </div>
        </div>
    </div>
</body>
</html>
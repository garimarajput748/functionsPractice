<?php
require_once("./classes/employee.php");

if (isset($_POST["submit"])) {
    $fname = $lname = $email = $number = $gender = $dob = '';

    if (isset($_POST['fname']) && !empty($_POST['fname'])) {
        $fname = $_POST['fname'];
    }
    else $fnameErr = "please enter first name";

    if (isset($_POST['lname']) && !empty($_POST['lname'])) {
        $lname = $_POST['lname'];
    }
    else $lnameErr =  "please enter last name";

    if (isset($_POST['email']) && !empty($_POST['email'])) {
        $email = $_POST['email'];
    }
    else $emailErr =  "please enter email";

    if (isset($_POST['number']) && !empty($_POST['number'])) {
        $number = $_POST['number'];
    }
    else $numberErr =  "please enter number";

    if (isset($_POST['gender']) && !empty($_POST['gender'])) {
        $gender = $_POST['gender'];
    }
    else $genderErr =  "please enter gender";

    if (isset($_POST['dob']) && !empty($_POST['dob'])) {
        $dob = $_POST['dob'];
    }
    else $dobErr =  "please enter dob";

    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($number) && !empty($gender) && !empty($dob)){
        $emp = new Employee();
        $emp->setfName($fname);
        $emp->setlname($lname);
        $emp->setemail($email);
        $emp->setnumber($number);
        $emp->setgender($gender);
        $emp->setdob($dob);
    
        $result = $emp->getemployeedetails();
    }

    // header("Location: #");
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
                            <input type="text" name="fname" class="form-control mb-2" placeholder="Enter Your First Name" value="<?php isset($_POST['fname']) ? $_POST['fname'] : ''; ?>" required>
                            <p class="text-danger"><?php echo (isset($fnameErr))?$fnameErr : ''; ?></p>
                            <label for="email">Email::</label>
                            <input type="email" name="email" class="form-control mb-2" placeholder="Enter Your @email" value="<?php isset($_POST['email']) ? $_POST['email'] : ''; ?>" required>
                            <p class="text-danger"><?php echo (isset($emailErr))?$emailErr : ''; ?></p>
                            <label for="gender" class="form-check-label">Gender::</label>
                            <input type="radio" class="form-check-input form-control" name="gender" value="female" <?php if (isset($_POST['gender']) && $_POST['gender'] == "female") echo "checked"; ?> required>Female
                            <input type="radio" class="form-check-input form-control" name="gender" value="male" <?php if (isset($_POST['gender']) && $_POST['gender'] == "male") echo "checked"; ?> required>Male
                            <input type="radio" class="form-check-input form-control" name="gender" value="other" <?php if (isset($_POST['gender']) && $_POST['gender'] == "other") echo "checked"; ?> required>Other
                            <p class="text-danger"><?php echo (isset($genderErr))?$genderErr : ''; ?></p>
                        </div>
                        <div class="col-6">
                            <label for="LName">LastName::</label>
                            <input type="text" name="lname" class="form-control mb-2" placeholder="Enter Your Last Name" value="<?php isset($_POST['lname']) ? $_POST['lname'] : ''; ?>" required>
                            <p class="text-danger"><?php echo (isset($lnameErr))?$lnameErr : ''; ?></p>
                            <label for="number">Number::</label>
                            <input type="number" name="number" class="form-control mb-2" placeholder="Enter Your Contact Number" value="<?php isset($_POST['number']) ? $_POST['number'] : ''; ?>" required>
                            <p class="text-danger"><?php echo (isset($numberErr))?$numberErr : ''; ?></p>
                            <label for="dob">DOB::</label>
                            <input type="date" name="dob" class="form-control" value="<?php isset($_POST['dob']) ? $_POST['dob'] : ''; ?>" required>
                            <p class="text-danger"><?php echo (isset($dobErr))?$dobErr : ''; ?></p>
                        </div>
                        <span class="text-danger text-center mt-2"><?php echo (isset($result) && !is_array($result)) ? $result  : ''; ?></span>
                    </div>
                    <input type="submit" name="submit" class="btn btn-success mt-4">
                    <input type="reset" class="btn btn-danger mt-4 ms-5" value="RESET">
                </form>
            </div>
            <div class="col-6">
                <?php
                if (!empty($result) && is_array($result)) {
                    foreach ($result as $key => $value) {
                        echo <<<HTML
                                <p>$key : $value</p>
HTML;
                    }
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>
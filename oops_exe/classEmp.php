<?php
class Employee {
    
    private $fname;
    private $lname;
    private $email;
    private $number;
    private $gender;
    private $dob;
    private $error = "Please fill all fields";
    // private  $fields= ['fname', 'lname', 'email','number','gender', 'dob'];

    public function setfName($fname){
        $this->fname = $fname;
    }
    
    public function setlname($lname){
        $this->lname = $lname;
    }
    public function setemail($email){
        $this->email = $email;
    }
    public function setnumber($number){
        $this->number = $number;
    }
    public function setgender($gender){
        $this->gender = $gender;
    }
    public function setdob($dob){
        $this->dob = $dob;
    }
    public function err(){
        return $this->error;
    }
    
    public function getemployeedetails(){
        
        if(isset($this->fname) && isset($this->lname) && isset($this->email) && isset($this->number) && isset($this->gender) && isset($this->dob))
        
        return $this->fname."<br>".$this->lname."<br>".$this->email."<br>".$this->number."<br>".$this->gender."<br>".$this->dob;

        else return; //$this->err();

    }
    
}
    if(isset($_POST["submit"])){

            $emp = new Employee();
            $emp->setfName($_POST['fname']);
            $emp->setlname($_POST['lname']);
            $emp->setemail($_POST['email']);
            $emp->setnumber($_POST['number']);
            $emp->setgender($_POST['gender']);
            $emp->setdob($_POST['dob']);

            $data = explode("<br>",$emp->getemployeedetails());
            global $err;
            $err = $emp->err();

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
                            <input type="text" name="fname" class="form-control mb-2" placeholder="Enter Your First Name" value="<?php isset($_POST['fname'])?$_POST['fname']:''; ?>" required>
                            <label for="email">Email::</label>
                            <input type="email" name="email" class="form-control mb-2" placeholder="Enter Your @email" value="<?php isset($_POST['email'])?$_POST['email']:''; ?>" required>
                            <label for="gender" class="form-check-label">Gender::</label>
                            <input type="radio" class="form-check-input" name="gender" class="form-control" value="female" <?php if (isset($_POST['gender']) && $_POST['gender']=="female") echo "checked";?> required>Female
                            <input type="radio" class="form-check-input" name="gender" class="form-control" value="male" <?php if (isset($_POST['gender']) && $_POST['gender']=="male") echo "checked";?> required>Male
                            <input type="radio" class="form-check-input" name="gender" class="form-control" value="other" <?php if (isset($_POST['gender']) && $_POST['gender']=="other") echo "checked";?> required>Other
                        </div>
                        <div class="col-6">
                            <label for="LName">LastName::</label>
                            <input type="text" name="lname" class="form-control mb-2" placeholder="Enter Your Last Name" value="<?php isset($_POST['lname'])?$_POST['lname']:''; ?>" required>
                            <label for="number">Number::</label>
                            <input type="number" name="number" class="form-control mb-2" placeholder="Enter Your Contact Number" value="<?php isset($_POST['number'])?$_POST['number']:''; ?>" required>
                            <label for="dob">DOB::</label>
                            <input type="date" name="dob" class="form-control" value="<?php isset($_POST['dob'])?$_POST['dob']:''; ?>" required>
                        </div>
                        <span class="text-danger text-center mt-2"><?php echo null !== $err ? $err:''; ?></span>
                    </div>
                    <input type="submit" name="submit" class="btn btn-success mt-4">
                    <input type="reset" class="btn btn-danger mt-4 ms-5" value="RESET">
                </form>
            </div>
            <div class="col-6">
                    <p> FullName: <?php echo (isset($data[0])?$data[0]:'').' '. (isset($data[1])?$data[1]:''); ?></p>
                    <p> Email: <?php echo (isset($data[2])?$data[2]:''); ?></p>
                    <p> Mobile Number: <?php echo (isset($data[3])?$data[3]:''); ?></p>
                    <p> Gender: <?php echo (isset($data[4])?$data[4]:''); ?></p>
                    <p> DOB: <?php echo (isset($data[5])?$data[5]:''); ?></p>
            </div>
        </div>
    </div>
</body>
</html>
<?php 
session_start();
if(isset($_POST['submit'])){

    if(!empty($_POST['username']) && isset($_POST['username']))  $userName = $_POST['username'];
    else  $nameErr = 'Please Fill Your Name';

    if(!empty($_POST['hobby']) && isset($_POST['hobby']))   $hobbies = $_POST['hobby'];
    else $hobbyErr = 'Please Fill Minimum 1 of Your Hobby';
     
       if(!empty($hobbies) && !empty($userName)) $result = 'Your Survey Completed';
       else $err = 'Please Fill the Form';
    
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
    <title>Web Survey PHP</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <form method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Your Name:</label>
                        <input type="text" class="form-control" id="name" name="username" placeholder="Enter Your Name" aria-describedby="name">
                        <span class="text-danger"><?php if(isset($nameErr)) echo $nameErr;?></span>
                    </div>
                    <div class="mb-3">Your Hobby:
                        <div class="form-check">
                            <label class="form-check-label" for="music">
                                Music
                            </label>
                            <input class="form-check-input" type="checkbox" name="hobby[]" value="music" id="music">
                        </div>
                        <div class="form-check">
                            <label class="form-check-label" for="dance">
                                Dancing 
                            </label>
                            <input class="form-check-input" type="checkbox" name="hobby[]" value="dance" id="dance">
                        </div>
                        <div class="form-check">
                            <label class="form-check-label" for="cooking">
                                Cooking
                            </label>
                            <input class="form-check-input" type="checkbox" name="hobby[]" value="cooking" id="cooking">
                        </div>
                        <div class="form-check">
                            <label class="form-check-label" for="programming">
                                Programming
                            </label>
                            <input class="form-check-input" type="checkbox" name="hobby[]" value="programming" id="programming">
                        </div>
                        <div class="form-check">
                            <label class="form-check-label" for="cricket">
                                Cricket
                            </label>
                            <input class="form-check-input" type="checkbox" name="hobby[]" value="cricket" id="cricket">
                        </div>
                        <span class="text-danger"><?php if(isset($hobbyErr)) echo $hobbyErr;?></span>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Check Here</button>
                </form>
            </div>
            <div class="col-md-6">
                <h2 id="result"></h2>
                    <?php 
                     $oldName =  $_SESSION['username'];
                     $_SESSION['username'] = $userName;
                     $_SESSION['data'] =  ($hobbies);
                     $newName = $_SESSION['username'];
                     $count = 1;

                    if (isset($result) && ($oldName == $newName)) {
                        
                        echo 'You have already submited this survey. <br><hr>';
                        echo 'Your Name is: '.$oldName.'<hr>';
                        echo 'Your Hobby is: <br>';
                        foreach($hobbies  as $val){

                           echo $count.']'.$val.'<br>';
                           $count++;
                        }
                    }
                    
                    elseif(isset($result)) echo $result; 
                   

                    else echo $err;
                    ?>
                
            </div>

        </div>
    </div>
</body>
</html>
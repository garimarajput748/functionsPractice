<?php 

session_start();
    //  session_destroy(); 
if(isset($_POST['submit'])){

    if(isset($_POST['username']) && !empty($_POST['username']))  $userName = $_POST['username'];
    else  $nameErr = 'Please Fill Your Name';

    if(isset($_POST['hobby']) && !empty($_POST['hobby']))   $hobbies = $_POST['hobby'];
    else $hobbyErr = 'Please Fill Minimum 1 of Your Hobby';
     
    if(!empty($hobbies) && !empty($userName)) $result = 'Your Survey Completed';
    else $err = 'Please Fill the Form';
    
    $sessionArr = array();
    if(!empty($userName) && !empty($hobbies)) $sessionArr[] = array($userName => $hobbies);
   
   
    if(isset($_SESSION['web_survey'])) {
        $data = $_SESSION['web_survey'];
        $sessionArr = array_merge($sessionArr,$data);
    }

    $_SESSION['web_survey'] = $sessionArr; 
    
    header('Location: '.$_SERVER['PHP_SELF']);
}

 $webSurveyHobby = [
    'music',
	'dancing',
	'cooking',
	'programming',
	'cricket'
 ];
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
                    <?php foreach ($webSurveyHobby as $hobby) : ?>
                        <div class="form-check">
                            <label class="form-check-label" for="<?php echo $hobby ?>">
                            <?php echo ucfirst($hobby); ?>
                            </label>
                            <input class="form-check-input" type="checkbox" name="hobby[]" value="<?php echo $hobby ?>" id="<?php echo $hobby ?>">
                        </div>
                    <?php endforeach ?>
                        <span class="text-danger"><?php if(isset($hobbyErr)) echo $hobbyErr;?></span>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Check Here</button>
                </form>
            </div>
            <div class="col-md-6">
                <h2 id="result"></h2>
                    <?php 

                   
                     $count = 1;
                            
                    if(isset($_SESSION['web_survey'])) {
                        $data = $_SESSION['web_survey'];
                        foreach($data as $survey){
                            // foreach($survey as $key => $hobby){
                        //         if(array_key_exists($key,$survey)) {
                        //             // var_dump($hobby);
                        //             echo 'You have already submited this survey. <br><hr>';
                        //             echo 'Your Name is: '.$key.'<hr>';
                        //             foreach($hobby as $val){
                        //                 echo 'Your Hobby is: '.$val.'<br>';
                        //             }
                        //             return;
                        //         }
                            // }
                        //     $count++;
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
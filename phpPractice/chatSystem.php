<?php
if(isset($_POST['name']) && isset($_POST['message'])){
    $name = $_POST['name'];
    $mesg = $_POST['message'];
    $data = [];
    $data[$name] = $mesg;
    foreach($data as $key => $val){
        echo 'Name: '.($key).'<br>';
        echo 'Message: '.($val).'<br><hr>';
    }
    
exit;    
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
    <title>chating system</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
             <h4>Chating System</h4>
                <form id="chatSystem">
                    <div class="mb-3">
                        <label for="fileName" class="form-label">Full Name::</label>
                        <input id="name" class="form-control" type="text" name="name" placeholder="Enter Your Name">
                        <span class="text-danger" id="nameErr"></span>
                    </div>
                    <div class="mb-3">
                        <label for="mesg" class="form-label">Message::</label>
                        <textarea class="form-control" id="mesg" rows="4"></textarea>
                        <span class="text-danger" id="mesgErr"></span>
                    </div>
                    <div class="mb-3">
                        <button type="submit" id="sendMesg" class="btn btn-primary">Send Message</button>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <div class="container">
                    <p id="result"></p>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById("sendMesg").addEventListener("click", validateForm);

        function validateForm(event) {
        event.preventDefault();

        var name = document.getElementById("name").value;
        var mesg = document.getElementById("mesg").value;

        if (name == "") {
            document.getElementById("nameErr").innerHTML = "Please Enter Your Name";
            return;
        }
        else document.getElementById("nameErr").innerHTML = '';

        if (mesg == ""){
            document.getElementById("mesgErr").innerHTML = "Please Enter Your Message";
            return;
        } 
        else document.getElementById("mesgErr").innerHTML = '';

        $(document).ready(function(){
                
                $.ajax({
                    url: "chatSystem.php",
                    type: "POST",
                    data:{name:name,message:mesg},
                    success: function(result) 
                    {
                        $("#result").html(result);
                        $('#name').val("");
                        $('#mesg').val("");
                    }
                });
            });
      }
      
      
    </script>
</body>
</html>
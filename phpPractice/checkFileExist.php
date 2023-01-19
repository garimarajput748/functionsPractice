<?php 
    
    if(isset($_GET['filename'])){

        if(preg_match('/\.(php|txt|html|css)$/i', $_GET['filename'])) {

        $cwdFiles = (glob('*.*'));

            if(in_array($_GET['filename'],$cwdFiles)){
                $status = 'file exists';
            }
            else $status = 'file not exists';
        } 
    else {
        $status = 'Please enter Valid File Name';
    }
    
    echo $status;
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
    <title>check file exists</title>
</head>
<body>
    <div class="container mt-5">
        <h4>Check File is Available or Not</h4>
        <form class="w-50">
            <label for="fileName">FileName::</label>
            <input id="fileExists" class="form-control" type="text" name="filename" placeholder="Enter FileName">
        </form>
        <p class="mt-4">Your FileName::
            <span id="filename"></span>
        </p>
        <p>File Status::
            <span id="status"><?php if(isset($status)) echo $status;?></span>
        </p>
    </div>

    <script>
        $(document).ready(function(){

            $('#fileExists').on('input', function(e) {
                var filename = $('#fileExists').val();
                        $("#filename").text(filename);
                if (filename != "") {
                    $.ajax({
                        url: "checkFileExist.php",
                        data:{filename:filename},
                        success: function(result) 
                        {
                            $("#status").text(result);
                        }
                    });
                } 
                else {
                    $("#status").text("Please enter Valid File Name");
                }
            });
        });
    </script>
</body>
</html>
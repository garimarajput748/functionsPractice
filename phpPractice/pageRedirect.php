<?php 
if(isset($_POST["submit"])){

// Redirect browser
if(isset($_POST["url"]) && !empty($_POST["url"])){
    $url = $_POST["url"];
    header("Location: ".$url);
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
    <title>Redirect Page</title>
</head>
<body>
    <div class="container mt-5">
        <h4>Redirect Page </h4>
        <form class="w-50" method="POST">
            <input  type="url" id="url" name="url" class="form-control" required>
            <input type="submit" name="submit" class="btn btn-success mt-4" value="Redirect Page">
            <input type="reset" class="btn btn-danger mt-4 ms-5" value="RESET">
        </form>
    </div>
</body>
</html>
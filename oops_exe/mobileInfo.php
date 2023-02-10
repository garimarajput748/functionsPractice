<?php
require_once("./classes/mobile.php");

if(isset($_POST['submit'])){

    $brandErr = $sizeErr = $ramErr = $processorErr = "";

    if(isset($_POST['brand']) && !empty($_POST['brand']))
    $brand = $_POST['brand'];

    else $brandErr = "please select company";

    if(isset($_POST['screensize']) && !empty($_POST['screensize']))
    $size = $_POST['screensize'];

    else $sizeErr = "Please enter screen size";

    if(isset($_POST['ram']) && !empty($_POST['ram']))
    $ram = $_POST['ram'];

    else $ramErr = "Please select ram";

    if(isset($_POST['processor']) && !empty($_POST['processor']))
    $processor = $_POST['processor'];

    else $processorErr = "Please select processor";

    if(empty($brandErr) && empty($sizeErr) && empty($ramErr) && empty($processorErr)){
        $mobile = new Mobile($brand,$size,$ram,$processor);
        $mobile->setprice();
        $result = $mobile->getprice();
    }

    unset($_POST['ram']);
    unset($_POST['processor']);
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
</head>

<body>
    <div class="container mt-5">
        <h4>Example Form</h4>
        <div class="row">
            <div class="col-6">
                <form method="POST">
                    <div class="row">
                        <div class="col-12">
                            <label for="company" class="form-check-label">Choose Company::</label>
                            <input type="radio" class="form-check-input ms-1" name="brand" value="Vivo" <?php if (isset($_POST['brand']) && $_POST['brand'] == "vivo") echo "checked"; ?> required>
                            <label class="form-check-label" for="vivo">Vivo</label>
                            <input type="radio" class="form-check-input ms-1" name="brand" value="Samsung" <?php if (isset($_POST['brand']) && $_POST['brand'] == "samsung") echo "checked"; ?> required>
                            <label class="form-check-label" for="Samsung">Samsung</label>
                            <input type="radio" class="form-check-input ms-1" name="brand" value="One+" <?php if (isset($_POST['brand']) && $_POST['brand'] == "one+") echo "checked"; ?> required>
                            <label class="form-check-label" for="One+">One+</label>
                            <input type="radio" class="form-check-input ms-1" name="brand" value="Oppo" <?php if (isset($_POST['brand']) && $_POST['brand'] == "oppo") echo "checked"; ?> required>
                            <label class="form-check-label" for="Oppo">Oppo</label>
                            <p class="text-danger"><?php echo isset($brandErr)?$brandErr:''; ?></p>
                            <label for="Screen-Size">Enter Screen Size::</label>
                            <input type="text" name="screensize" class="form-control mb-2" placeholder="Enter Screen Size" value="<?php isset($_POST['screensize']) ? $_POST['screensize'] : ''; ?>" required>
                            <p class="text-danger"><?php echo isset($sizeErr)?$sizeErr:''; ?></p>
                            <select class="form-select" name="ram" aria-label="Select Ram" required>
                                <option value>Select Ram</option>
                                <option value="1" <?php echo (isset($_POST['ram']) && $_POST['ram'] == "1") ? 'selected' : ''; ?>>1</option>
                                <option value="2" <?php echo (isset($_POST['ram']) && $_POST['ram'] == "2") ? 'selected' : ''; ?>>2</option>
                                <option value="3" <?php echo (isset($_POST['ram']) && $_POST['ram'] == "3") ? 'selected' : ''; ?>>3</option>
                                <option value="4" <?php echo (isset($_POST['ram']) && $_POST['ram'] == "4") ? 'selected' : ''; ?>>4</option>
                            </select>
                            <p class="text-danger"><?php echo (isset($ramErr)) ? $ramErr : ''; ?></p>
                            <select class="form-select mt-2" name="processor" aria-label="Select Processor" required>
                                <option value>Select Processor</option>
                                <option value="1" <?php echo (isset($_POST['processor']) && $_POST['processor'] == "1") ? 'selected' : ''; ?>>1</option>
                                <option value="2" <?php echo (isset($_POST['processor']) && $_POST['processor'] == "2") ? 'selected' : ''; ?>>2</option>
                                <option value="5" <?php echo (isset($_POST['processor']) && $_POST['processor'] == "5") ? 'selected' : ''; ?>>5</option>
                                <option value="7" <?php echo (isset($_POST['processor']) && $_POST['processor'] == "7") ? 'selected' : ''; ?>>7</option>
                            </select>
                            <p class="text-danger"><?php echo (isset($processorErr)) ? $processorErr : ''; ?></p>
                        </div>
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
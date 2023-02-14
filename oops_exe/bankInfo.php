<?php
require_once("./classes/bank.php");

if(isset($_POST['submit'])){

    $accNumErr = $accBalErr = $accTypeErr = $interestErr = "";

    if(isset($_POST['accnumber']) && !empty($_POST['accnumber']))
    $accNumber = $_POST['accnumber'];

    else $accNumErr = "Please enter valid number";

    if(isset($_POST['accbalance']) && !empty($_POST['accbalance']))
    $accBalance = $_POST['accbalance'];
    
    else $accBalErr = "Please enter valid amount";

    if(isset($_POST['accType']) && !empty($_POST['accType']))
    $accType = $_POST['accType'];
    
    else $accTypeErr = "Please enter valid type";

    if(isset($_POST['interest']) && !empty($_POST['interest']))
    $accInterest = $_POST['interest'];
    
    else $interestErr = "Please enter valid interest rate";

    if(empty($accNumErr) && empty($accBalErr) && empty($accTypeErr) && empty($interestErr)){

        if($accType==='Saving Account'){

        $savingAccount = new SavingAccount();
        $savingAccount->setDetails($accNumber,$accBalance);
        $savingAccountDetails = $savingAccount->getDetails();
        $savingAccountInterest = $savingAccount->addInterest($accType,$accInterest);
            $result = array_merge($savingAccountDetails,$savingAccountInterest);
        }
         
        else if($accType==='Current Account'){

            $currentAccount = new CurrentAccount();
            $currentAccount->setDetails($accNumber,$accBalance);
            $currentAccountDetails = $currentAccount->getDetails();
            $currentAccountInterest = $currentAccount->addInterest($accType,$accInterest);
                $result = array_merge($currentAccountDetails,$currentAccountInterest);
        }

        else return "please provide valid information";
    }
    // unset($_POST['accType']);
    
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
                            <label for="Account Number">Account Number::</label>
                            <input type="number" class="form-control" name="accnumber" required>
                            <p class="text-danger"><?php echo isset($accNumErr)?$accNumErr:''; ?></p>

                            <label for="Account Balance">Account Balance::</label>
                            <input type="number" class="form-control" name="accbalance" required>
                            <p class="text-danger"><?php echo isset($accBalErr)?$accBalErr:''; ?></p>

                            <select class="form-select" name="accType" aria-label="Select Account Type" required>
                                <option value>Account Type</option>
                                <option value="Current Account" <?php echo (isset($_POST['accType']) && $_POST['accType'] == "Current Account") ? 'selected' : ''; ?>>Current Account</option>
                                <option value="Saving Account" <?php echo (isset($_POST['accType']) && $_POST['accType'] == "Saving Account") ? 'selected' : ''; ?>>Saving Account</option>
                            </select>
                            <p class="text-danger"><?php echo isset($accTypeErr)?$accTypeErr:''; ?></p>

                            <label for="Account Number">Enter Interest::</label>
                            <input type="number" class="form-control" name="interest" required>
                            <p class="text-danger"><?php echo isset($interestErr)?$interestErr:''; ?></p>
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
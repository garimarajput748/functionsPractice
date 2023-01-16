<?php 
    require_once('productDetails.php');

    if(isset($_POST['action']) && ($_POST['action'] === 'delete')){
        $productId = $_POST['id'];
        if (isset($_COOKIE['cartDetails'])) {
            $cartArr = json_decode($_COOKIE['cartDetails'], true);
            unset($cartArr[$productId]);
        }
        setcookie("cartDetails", json_encode($cartArr));

        $result_arr['items'] = count($cartArr);
        $result_arr['status'] = "pass";
        $result_arr['message'] = "Item Deleted Successfully!";

        echo json_encode($result_arr);
        exit;
    }

    if(isset($_COOKIE['cartDetails'])) {
        $Productval = json_decode($_COOKIE['cartDetails'],true);
        $count = 1;
        $qty = 0;
        $price = 0;
    } 
    else $emptyMesg =  "Your Cart is Empty.";
   
?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Exercise PHP</title>
</head>
<body>
    <div class="container mt-5 text-center" id="itemsContainer">
        <?php if(isset($emptyMesg)) echo $emptyMesg;?>
        <table class="table table-bordered border-muted text-center">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Product Name</th>
                    <th>Product Image</th>
                    <th>Quantity</th>
                    <th>Price (Rs.)</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                <?php if(isset($Productval)){
                foreach ($Productval as $key => $val){ 
                    if (is_numeric($val)){
                     $keys = array_keys($productArr);
                     $items = $productArr[$keys[$key]]; 
                     ?>
                <tr>
                    <td><?php echo $count;?></td>
                    <td><?php echo $items['title']; ?></td>
                    <td><?php echo '<img src='.$items['image'].' class="img-fluid" width="80px" height="50px">' ?></td>
                    <td><?php echo $val; ?></td>
                    <td><?php echo $items['price']; ?></td>
                    <td><button class="btn btn-danger del" title="<?php echo $items['title']; ?>" id="<?php echo $items['id'] ?>">
                    <i class="fa fa-trash" aria-hidden="true"></i>
                        </button></td>
                </tr>
                <?php   $qty += $val; 
                        $price += $items['price'] * $val; 
                        $count++; 
                    } 
                    else continue;
                    } } ?>
            </tbody>
            <tfoot>
                <tr>
                    <td>Total</td>
                    <td colspan="3" class="text-end" id="qty"><?php echo (isset($qty)?$qty:0); ?></td>
                    <td><?php echo (isset($price)?$price:0); ?></td>
                    <td><button class="btn btn-success" id="checkout">Checkout</button></td>
                </tr>
            </tfoot>
        </table>
    </div>
    <script>
        function deleteItem(){
            var deleteId = document.querySelectorAll('.del');
            deleteId.forEach(function(btn) {
                btn.addEventListener('click', function() {
                this.closest('tr').remove();
                var mesg = confirm("Do You Really Want to Delete?");
                if(mesg == true){
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            response = this.responseText;
                            location.reload();
                        }
                    };
                    xhttp.open("POST", "viewCart.php", true);
                    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xhttp.send('id='+ this.id +'&action=delete');
                }
            });
        });
    }
        deleteItem();  
        let qty = document.getElementById('qty');
        if(qty.innerHTML == 0){
            let table = document.getElementsByTagName('table');
            table[0].innerHTML = 'Your Cart is Empty.';
        }
        
    </script>
</body>
</html>
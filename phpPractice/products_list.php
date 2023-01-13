<?php 
    require_once('productDetails.php');
      if(isset($_POST['action']) && ($_POST['action'] === 'addToCart'))
      {
          $productId = $_POST['key'];
          $qty = $_POST['qty'];

        $cookieArr = array($productId => $qty);

        if(isset($_COOKIE['cartDetails'])) {
            static $cartArr=array();
            $cartArr = json_decode($_COOKIE['cartDetails'],true);
            $cartArr[$productId] = $qty;
            $cookieArr  = $cartArr;
        }



        
        setcookie("cartDetails", json_encode($cookieArr));
      
        $result_arr['items'] = count($cookieArr);
        $result_arr['status'] = "pass";
        $result_arr['message'] = "Add to cart Successfully!";
      
        echo json_encode($result_arr);
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
    <title>Exercise PHP</title>
</head>
<body>
    <div class="container mt-5">
        <p id="products" class="float-end"></p>
        <?php if(isset($_COOKIE['cartDetails'])) $cartItems = count(json_decode($_COOKIE['cartDetails'],true));?>
        <a href="viewCart.php" class="float-end text-decoration-none">&#128722; Cart
            <span id="cart"><?php echo (isset($cartItems)?$cartItems:0); ?></span>
        </a>
    
        <div class="row gap-5" >
            <?php
            $qty_val = '';
            foreach ($productArr as $productDetails) {
                if(isset($_COOKIE['cartDetails'])) $cartArr = json_decode($_COOKIE['cartDetails'],true);
                if(isset($cartArr)){
                $qty_val='';
                if (array_key_exists($productDetails['id'], $cartArr)) $qty_val = ($cartArr[$productDetails['id']]);
                }
                echo '<div class="card" style="width: 18rem;">
                    <h5 class="card-title mt-1">'.$productDetails['title'].'</h5>
                    <img src="'.$productDetails['image'].'" class="card-img-top">
                    <div class="card-body">
                        <p class="card-text text-info text-center">Price: &#x20B9; '.$productDetails['price'].'</p>
                        <div class="row">
                                <input type="number" name="quantity" value="'.$qty_val.'" placeholder="Quantity" class="form-control w-50" min="1">
                                <button class="btn btn-primary w-50" id="'.$productDetails['id'].'">Add To Cart</button>
                                <span class="text-danger d-none">No. of quantity</span>
                        </div>
                    </div>
                </div>';
            }
            ?>
        </div>
    </div>
    <script>
        var AddToCart = document.querySelectorAll('.btn');

        AddToCart.forEach(function(btn) {
            btn.addEventListener('click', function() {

                var qty = this.previousElementSibling.value;

               if(qty <= 0) this.nextElementSibling.classList.remove("d-none");

               else {
                if(!qty.match(/^(?:[1-9]\d*|\d)$/)) return;
                   var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            var cart = document.getElementById('cart');
                            response = this.responseText;
                            var result = JSON.parse(response);
                            if (result['status'] == "pass") {
                                alert(result['message']);
                                cart.textContent  =  result['items'];
                            }
                        }
                    };
                    xhttp.open("POST", "products_list.php", true);
                    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xhttp.send('key='+ this.id + '&qty='+ qty +'&action=addToCart');
                }
                
            });
        });
        
        </script>
</body>
</html>
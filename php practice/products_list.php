<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Exercise PHP</title>
</head>
<body>
    <div class="container mt-5">
        <p id="products" class="float-end"></p>
        <a href="viewCart.php" class="float-end">&#128722; Cart</a>
    
        <div class="row gap-5" >
            <div class="card" style="width: 18rem;">
                <h5 class="card-title mt-1">FinePix Pro2 3D Camera</h5>
                <img src="productImages/camera.jpg" class="card-img-top" alt="camera">
                <div class="card-body">
                    <p class="card-text text-info text-center">Price: &#x20B9; 25000</p>
                    <div class="row">
                            <input type="number" name="quantity" placeholder="Quantity" class="form-control w-50" min="1">
                            <button class="btn btn-primary w-50" id="0">Add To Cart</button>
                            <span class="text-danger d-none">No. of quantity</span>
                    </div>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <h5 class="card-title mt-1">EXP Portable Hard Drive</h5>
                <img src="productImages/external-hard-drive.jpg" class="card-img-top" alt="external-hard-drive">
                <div class="card-body">
                    <p class="card-text text-info text-center">Price: &#x20B9; 1199</p>
                    <div class="row">
                            <input type="number" name="quantity" placeholder="Quantity" class="form-control w-50" min="1">
                            <button class="btn btn-primary w-50" id="1">Add To Cart</button>
                            <span class="text-danger d-none">No. of quantity</span>
                    </div>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <h5 class="card-title mt-1">XP 1155 Gaming Headphone</h5>
                <img src="productImages/headphones.jpg" class="card-img-top" alt="headphones">
                <div class="card-body">
                    <p class="card-text text-info text-center">Price: &#x20B9; 5000</p>
                    <div class="row">
                            <input type="number" name="quantity" placeholder="Quantity" class="form-control w-50" min="1">
                            <button class="btn btn-primary w-50" id="2">Add To Cart</button>
                            <span class="text-danger d-none">No. of quantity</span>
                    </div>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <h5 class="card-title mt-1">Luxury Ultra thin Wrist Watch</h5>
                <img src="productImages/watch.jpg" class="card-img-top" alt="watch">
                <div class="card-body">
                    <p class="card-text text-info text-center">Price: &#x20B9; 2500</p>
                    <div class="row">
                            <input type="number" name="quantity" placeholder="Quantity" class="form-control w-50" min="1">
                            <button class="btn btn-primary w-50" id="3">Add To Cart</button>
                            <span class="text-danger d-none">No. of quantity</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var AddToCart = document.querySelectorAll('.btn');

        AddToCart.forEach(function(btn) {
            btn.addEventListener('click', function() {

                var qty = this.previousElementSibling.value;

               if(qty <= 0) this.nextElementSibling.classList.remove("d-none");

               else {
                   var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            var products =  document.getElementById('products');
                            products = this.responseText;
                        }
                    };
                    xhttp.open("POST", "products_list.php", true);
                    xhttp.send(JSON.stringify({
                        key:this.id,
                        qty: qty
                    }));
                }

            });
        });

    </script>
</body>
</html>
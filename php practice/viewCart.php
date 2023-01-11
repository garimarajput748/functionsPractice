<?php 
    require_once('productDetails.php');
    if(isset($_COOKIE['cartDetails'])) {
        $Productval = json_decode($_COOKIE['cartDetails'],true);
        $count = 1;
        $qty = 0;
        $price = 0;
    } 
    else echo "Something went wrong";
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <title>Exercise PHP</title>
</head>
<body>
    <div class="container mt-5">
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
                <?php foreach ($Productval as $key => $val){ 
                     $keys = array_keys($productArr);
                     $items = $productArr[$keys[$key]]; 
                     ?>
                <tr>
                    <td><?php echo $count;?></td>
                    <td><?php echo $items['title']; ?></td>
                    <td><?php echo '<img src='.$items['image'].' class="img-fluid" width="80px" height="50px">' ?></td>
                    <td><?php echo $val; ?></td>
                    <td><?php echo $items['price']; ?></td>
                    <td><button class="btn btn-danger del" title="<?php echo $items['title']; ?>" data-id="<?php echo $items['id'] ?>">
                    <i class="fa fa-trash" aria-hidden="true"></i>
                        </button></td>
                </tr>
                <?php   $qty += $val; 
                        $price += $items['price'] * $val; 
                        $count++; 
                    } ?>
            </tbody>
            <tfoot>
                <tr>
                    <td>Total</td>
                    <td colspan="3" class="text-end"><?php echo $qty; ?></td>
                    <td><?php echo $price; ?></td>
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
            });
        });
    }
        deleteItem();
        
// $(document).ready(function(){
// $(".del").click(function(item){
//        var id = $(this).attr('data-id'); 
//        $(this).closest("tr").remove();

//        var mesg = confirm("Are you sure!");
       
//        if (mesg == true) {

//               $.ajax({
//                       url: "viewCart.php", 
//                       type:"POST",
//                       data:{key:id},
//                       success: function(result){
//                           alert("Deleted successfully...");
//                           window.location.reload(true);
                          
//                 }});
           
//        } else {
//               alert("Delete process terminate...");
//               window.location.reload(true);

//        }
// }); 
// });
    </script>
</body>
</html>
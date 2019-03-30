<?php
$title = 'Home';
require_once 'partial/_header.php';

 $query = 'SELECT id, name, slug, image, price FROM product';
 $stmt =$connect->query($query);
 $stmt->execute();

 $products = $stmt->fetchAll();




?>


<section class="jumbotron text-center py-5">
    <div class="container">
        <h1 class="display-5 my-3">Thanks For Visit My Website</h1>
        <p class="lead text-multed">Our plans include unlimited texting and data, starting as low as
            $9.99 per month  with no contracts. We even
            have a free, Wi-Fi only version of TextNow, available for download on your existing
            device.</p>
        <a class="btn btn-primary my-2" href="#">Explasation</a>
        <a class="btn btn-secondary my-2" href="#">Gullary</a>
    </div>
</section>

<div class="album py-5 bg-light">
    <div class="container">
        <div class="row">

          <?php foreach($products as $product):  ?>

            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">

                  <img class="bd-placeholder-img  card-img-top" width="100%" height="300"
                       src="<?php echo $product['image']; ?>"  alt="">

                </div>
                 <div class="card-body">
                    <div class=" card-text">
                        <p><?php echo $product['name']; ?></p>

                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group my-3">
                            <form action="cart.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                                <button class=" btn btn-success btn-block" name="add">
                                    Add to cart
                                </button>
                            </form>


                        </div>
                        <span class="text-multed">BDT: <?php echo $product['price'] ?></span>
                    </div>
                </div>
            </div>
           <?php endforeach; ?>

        </div>


    </div>




<?php require_once 'partial/_footer.php'; ?>

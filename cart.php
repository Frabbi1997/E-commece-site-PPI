<?php $title = 'Carts';

 require_once 'partial/_header.php';

   if(isset($_POST['clear'])){
       unset($_SESSION['cart']);
       $_SESSION['cart']=[];
   }

   if(isset($_POST['delete'])){
       $key= (string)($_POST['id']);
       unset($_SESSION['cart'][$key]);
   }


    $cart = $_SESSION['cart']? $_SESSION['cart']:[];

if (isset($_POST['add'])) {
    $id = (int)$_POST['id'];

    try {

        $query = 'SELECT  name, price FROM product WHERE id=:id';
        $stmt = $connect->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $product = $stmt->fetch();
        $key = (string)$id;

        if (array_key_exists($key, $cart)) {
            $cart[$key]['quantity']++;
            $cart[$key]['total_price'] += $cart[$key]['price'];
//            $cart[$key]['total_price'] =(float) $cart[$key]['total_price'];
        } else {
            $cart[$key] = [
                'name' => $product['name'],
                'price' => (float) $product['price'],
                'quantity' => (int) 1,
                'total_price' => (float) $product['price']
            ];
        }

        $_SESSION['cart'] = $cart;

    } catch (Exception $e) {
        die($e->getMessage());
    }

}



$total_price = !empty($cart) ? array_sum(array_column($cart, 'total_price')) : 0;


?>

<div class="container">
    <main role="main">
        <div class="contaener">
            <br/>
            <P class="text-center">Carts</P>
            <hr>

            <div class="row">
                <table class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <td>Sl</td>
                        <td>Name</td>
                        <td>Quantity</td>
                        <td>Price</td>
                        <td>Total_price</td>
                        <td>Action</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=1; foreach($cart as $key=> $product): ?>
                    <tr>
                        <td><?php echo $i++ ;?></td>
                        <td><?php echo $product['name']; ?></td>
                        <td><?php echo $product['quantity']; ?></td>
                        <td>BDT <?php echo number_format($product['price'], 2); ?></td>
                        <td>BDT <?php echo number_format($product['total_price'] ,2); ?></td>
                        <td>
                            <form action="cart.php"  method="post">
                                <input type="hidden" name="id" value="<?php echo $key; ?>">
                                <button type="submit" name="delete" class="btn btn-sm btn-danger">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                    <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Total</td>
                        <td>BDT <?php echo number_format($total_price, 2); ?></td>
                        <td><a href="chackout.php" class="btn btn-success">
                                checkout
                            </a>
                            <form action="cart.php"  method="post">
                                <button type="submit" name="clear" class="btn btn-sm btn-danger">
                                    clear
                                </button>
                            </form>
                        </td>

                    </tr>
                    </tbody>
                </table>
            </div>


        </div>


    </main>

</div>


<?php require_once 'partial/_footer.php'; ?>


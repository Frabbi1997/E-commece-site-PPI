<?php $title='Carts'; ?>

    <?php require_once'partial/_header.php'; ?>
<?php
  $cart = $_SESSION['cart'] ?? [];

  if (isset($_POST['add'])){
        $id = (int)$_POST['id'];

try {

        $query = 'SELECT  name, price FROM product WHERE id=:id';
        $stmt = $connect->prepare($query);
        $stmt->bindParam(':id',$id);
        $stmt->execute();

        $product = $stmt->fetch();
        $key = (string) $id;

        if(array_key_exists($key, $cart)){
            $cart[$key]['quantity']++;
            $cart[$key]['toral_price'] += $cart[$key]['price'];
        }
        else{
            $cart[$key] = [
                'name'=>$product['name'],
                'price'=>$product['price'],
                'quantity'=>1,
                'total_price'=>$product['price']
            ];
        }

    $_SESSION['cart'] = $cart;

}


  catch(Exception $e){
          die($e->getMessage());
      }

 }

 header('Content-Type: application/json');
  echo json_encode($_SESSION['cart']);
  die();

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
                           <td>pro_qua</td>
                           <td>pro_title</td>
                           <td>unit_price</td>
                           <td>Total_price</td>
                           <td>Action</td>
                       </tr>
                       </thead>
                       <tbody>
                       <tr>
                           <td>1</td>
                           <td>2</td>
                           <td>simpale_pro</td>
                           <td>1000</td>
                           <td>1500</td>
                           <td>
                               <a href="#" class="btn btn-sm btn-danger"> Detete</a>
                           </td>

                       </tr>
                        </tbody>
                       <tbody>
                       <tr>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td>Total</td>
                           <td>2500</td>
                           <td><a href="chackout.php" class="btn btn-success"> checkout</a>

                           </td>

                       </tr>
                       </tbody>
                   </table>
               </div>


           </div>


       </main>

   </div>




<?php require_once'partial/_footer.php'; ?>


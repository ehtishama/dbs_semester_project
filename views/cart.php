<?php
  require("views/libs/header.php");
  $total = 0;
 ?>
 <?php if(!isset($data['submitOrder'])) { ?>
   <div class="cart_page">

     <div class="cart">
       <div class="update_cart">
         <a href="#">Update Cart</a>
       </div>


       <table id = "cart_table">
         <tr>
           <th></th>
           <th>Image</th>
           <th>Id</th>
           <th>Title</th>
           <th>Quantity</th>
           <th>Price</th>
         </tr>

         <?php if (isset($data['products'])) ?>
         <?php foreach ($data['products'] as $product){ ?>
           <tr class="product_row">
              <td class="cross" onclick="removeProduct(<?php echo $product['id'] ?>, this, <?php echo $product['price']?>);">
                x
              </td>
             <td>
                <img src="<?php echo $product['image'] ?>" alt="">  
              </td>
              <td>
                <?php  echo $product['id'] ?>
              </td>
              <td>
                <?php  echo $product['title'] ?>
              </td>
              <td id="quantitiy_cell">
                <input id="quantitiy" type="number" name="quantity" value="<?php echo $product['quantity']?>" min="1" max="10">
              </td>
              <td id="price_cell">
                PKR 
                <span id="price">
                  <?php  echo $product['price']; $total += $product['price']; ?>    
                </span>
              </td>
           </tr>
         <?php } ?>


       </table>




       <div class="checkout">
         <div class="total" >
          Grand Total:  <span id="gTotal"> <?php echo $total; ?> </span>
         </div>

         <a href="<?php echo APPROOT ?>/cart/ordersummary">Checkout</a>
       </div>
     </div>


  </div>
<?php } else { ?>

  <div class="order_process">

      <div class="card invoice_card">
          <div class="card-header">
              Order summary
          </div>

            <div class="card-body">


                <table class="invoice_table table">
                <thead class="thead noline">
                    <td>Title</td>
                    <td>Quantity</td>
                    <td>Price</td>
                    <td>Totals</td>
                </thead>
                <?php foreach ($data['cart']['products']  as $item): ?>

                    <tr>
                        <td><?php echo $item['title'] ?></td>
                        <td><?php echo $item['quantity'] ?></td>
                        <td>PKR <?php echo $item['price'] ?></td>
                        <td>PKR <?php echo ($item['price'] * $item['quantity']) ?></td>
                    </tr>
                <?php endforeach; ?>

                    <tr class="imp_row imp_row_one noline">
                        <td></td>
                        <td></td>
                        <td><strong>Sub Total</strong></td>
                        <td><?php echo $data['cart']['total'] ?></td>
                    </tr>
                    <tr class="imp_row noline">
                        <td></td>
                        <td></td>
                        <td><strong>shipping</strong> </td>
                        <td>PKR 0.0</td>
                    </tr>
                    <tr class="imp_row noline">
                        <td></td>
                        <td></td>
                        <td><strong>Total</strong> </td>
                        <td>PKR <?php echo $data['cart']['total'] ?></td>
                    </tr>
                </table>
            </div>
            <a href="<?php echo APPROOT ?>/cart/placeorder" class="btn btn-lg btn-success">Confirm Order</a>
        </div>
    <?php } ?>
  </div>
  <?php
  	require_once("views/libs/footer.php");

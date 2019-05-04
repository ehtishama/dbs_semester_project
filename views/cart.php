<?php
  require("views/libs/header.php");
  $total = 0;
 ?>

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

         <?php foreach ($data as $product){ $product = $product['product'];?>
           <tr class="product_row">
             <td class="cross" onclick="removeProduct(<?php echo $product['id'] ?>, this, <?php echo $product['price']?>);">x</td>
             <td><img src="<?php echo $product['image'] ?>" alt="">  </td>
              <td><?php  echo $product['id'] ?></td>
              <td><?php  echo $product['title'] ?></td>
              <td id="quantitiy_cell"><input id="quantitiy" type="number" name="quantity" value="<?php echo $product['quantity']?>"></td>
              <td id="price_cell">PKR <span id="price"><?php  echo $product['price']; $total += $product['price']; ?></span></td>
           </tr>
         <?php } ?>


       </table>




       <div class="checkout">
         <div class="total" >
          Grand Total:  <span id="gTotal"> <?php echo $total; ?> </span>
         </div>

         <a href="#">Checkout</a>
       </div>
     </div>


  </div>
  <?php
  	require_once("views/libs/footer.php");

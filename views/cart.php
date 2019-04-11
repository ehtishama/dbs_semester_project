<?php
  require("views/libs/header.php");
  $total = 0;
 ?>

 <body>
   <div class="cart_page">
     <div class="cart">
       <table>
         <tr>
           <th>Id</th>
           <th>Title</th>
           <th>Quantity</th>
           <th>Price</th>
         </tr>

         <?php foreach ($data as $product){ ?>
           <tr>
              <td><?php  echo $product['id'] ?></td>
              <td><?php  echo $product['title'] ?></td>
              <td>10</td>
              <td><?php  echo $product['price']; $total += $product['price']; ?></td>
           </tr>
         <?php } ?>


       </table>
       <div class="checkout">
         <div class="total">
          Grand Total:  <?php echo $total; ?>
         </div>

         <a href="#">Checkout</a>
       </div>
     </div>
  </div>
 </body>

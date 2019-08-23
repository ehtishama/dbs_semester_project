<?php require("views/libs/header.php"); ?>

<div class="cart_page">
  <div class="cart">
    <table id = "cart_table" class="">
      <tr>
         <th></th>
         <th>Image</th>
         <th>Id</th>
         <th>Title</th>
         <th>Quantity</th>
         <th>Unit Price</th>
         <th>Total Price</th>
      </tr>
      <?php if (isset($data['products'])): ?>
         <?php foreach ($data['products'] as $product): ?>
           <tr class="product_row">
              <td class="cross" onclick="removeProduct(<?php echo $product['id'] ?>, this, <?php echo $product['price']?>);">
                x
              </td>
             <td>
                <img src="<?php echo $product['image'] ?>" alt="">
              </td>
              <td class="product-id">
                <?php  echo $product['id'] ?>
              </td>
              <td>
                <?php  echo $product['title'] ?>
              </td>
              <td class="quantitiy_cell">
                <input class="quantity" type="number" name="quantity" value="<?php echo $product['quantity']?>" min="1" max="10">
                <span class="update-cart inline-block px-3 py-2 bg-gray-300 cursor-pointer hover:bg-gray-400"> update </span> 
              </td>
              <td id="price_cell">
                $ 
                <span id="price">
                  <?php  echo $product['price']; ?>
                </span>
              </td>
              
              <td>
                <span>
                  <?php echo "$" . $product['quantity'] * $product['price'] ?>
                </span>
              </td>      
           </tr>
         <?php endforeach; ?>
      <?php endif; ?>
    </table>

    <?php if (isset($data['total'])): ?>
     <div class="checkout">
       <div class="total" >
          Grand Total:  <span id="gTotal">$ <?php echo $data['total']; ?> </span>
        </div>

       <a href="<?php echo APPROOT ?>/cart/checkout"
            class="block w-full px-8 py-2 text-lg font-bold text-center rounded shadow-lg m-2"
            >
            Proceed to Checkout
        </a>
     </div>
    <?php endif; ?>
 
    </div>
</div>


<script type="text/javascript">

  window.onload = function(){

   document.querySelectorAll(".update-cart")
   .forEach(function(elem){
      elem.addEventListener("click", function(event){
        let cartRow = event.target.parentNode.parentNode
        let quantityNode = cartRow.querySelector(".quantity")
        let idNode = cartRow.querySelector(".product-id")
        if(!quantityNode || !idNode)
          return;

        let id = idNode.innerText
        let quantity = quantityNode.value

        updateProductQuantity(id, quantity)
      })
    })

  }
</script>

<?php 
require_once("views/libs/footer.php");

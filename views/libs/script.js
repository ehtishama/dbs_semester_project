var APPROOT = "http://localhost/ecom";



function addToCart(prodId) {
  // make a call to /cart/add/id


  var url = APPROOT + "/cart/add_cart/" + prodId;
  var request = new XMLHttpRequest();
  request.open("GET", url);
  request.send();

  request.onreadystatechange = function() {
    if (request.readyState == 4 && request.status == 200) {
      notify({"head": "Notification", "body": "The product has been added to the cart, Keep Shopping"});

    }

  }




}

function removeProduct(prodId, row, price) {
  showAlert("Removing");

  var gTotal = document.getElementById("gTotal");
  var request = new XMLHttpRequest();
  var url = APPROOT + "/cart/remove_cart/" + prodId;

  request.open("GET", url);
  request.send();

  request.onreadystatechange = function() {
    if (request.readyState == 4 && request.status == 200) {

      showAlert(request.responseText);
      row.parentNode.remove();
      gTotal.innerText = grandTotal();
    }

  }
}

function showAlert(msg) {
    console.log("showing alert");
  var alertDiv = document.createElement("div");
  alertDiv.className += "alert";
  alertDiv.className += " alert-success";
  alertDiv.innerText = msg;
  document.body.append(alertDiv);

  setTimeout(function() {
    alertDiv.classList.toggle("fade");
  }, 2000);
  // alertDiv.classList.toggle("fade");
}

function grandTotal() {

  var total = 0;
  // get cart
  var cart = document.getElementById("cart_table");

  // get quantity and price of each item
  var products = cart.getElementsByClassName("product_row");

  // calc grandTotal
  for (i = 0; i < products.length; i++) {
    var product = products[i].children['price_cell'].firstElementChild;
    var quantity = products[i].children['quantitiy_cell'].firstElementChild.value;


    var price = parseFloat(product.innerText);
    quantity = parseFloat(quantity);


    total += price * quantity;


  }

  return total;
}


function profilePageMenu(tabClicked, divId) {
    // hide previous section
    var tabs = document.getElementsByClassName("tab");
    for(i = 0; i<tabs.length; i++)
    {
        tabs[i].style.display = "none";
    }

    // load new one
    document.getElementById(divId).style.display = "block";

    // update the sidebar
    console.log(tabClicked);
    tabClicked.parentNode.getElementsByClassName("selected")[0].classList.remove("selected");
    tabClicked.classList.add("selected");


}




function notify(notification) {
	console.log("Appending");
	var element = $("#notification_test").clone();
	element.css({
		"display": "block"	
	});
	element.find(".body").html(notification.body); 
	element.find(".head").html(notification.head);
	element.click(function(){
    $(this).fadeOut(500, function(){
      element.remove();
    });
  });
	
	$("#notification_container").append(element);
}

$(document).ready(function(){
  $("#next_product").click(function(){
    $(".updated_products")[0].style.left -= -265;  
  })


  var next_product = $("#next_product")
  var prev_product = $("#prev_product")

  var products = $(".products")[0]

  next_product.click(function(){
    products.scrollBy(264, 0)
  })
  
  prev_product.click(function(){
    products.scrollBy(-264, 0)
  })

})








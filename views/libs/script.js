var APPROOT = "http://localhost/ecom";

var slider = document.getElementById('home_slider');
var slides = document.getElementsByClassName('slide');
var totalSlides = slides.length

var currentIndex = 0
var prevIndex = 0

function nextSlide() {
  prevIndex = currentIndex;
  currentIndex++;

  currentIndex = currentIndex % totalSlides;

  showSlide();
}

function prevSlide() {
  prevIndex = currentIndex;
  currentIndex--;
  currentIndex < 0 ? currentIndex = totalSlides : currentIndex;

  currentIndex = currentIndex % totalSlides;

  showSlide();
}

function showSlide() {
  slides[prevIndex].style.display = 'none';
  slides[currentIndex].style.display = 'block';
}
showSlide();

setInterval(nextSlide, 2000);

function addToCart(prodId) {
  // make a call to /cart/add/id


  var url = APPROOT + "/cart/add_cart/" + prodId;
  var request = new XMLHttpRequest();
  request.open("GET", url);
  request.send();

  request.onreadystatechange = function() {
    if (request.readyState == 4 && request.status == 200) {
      showAlert(request.responseText);

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

//=================START OF NAV BAR=============
const toggleButton = document.getElementsByClassName("toggle-button")[0];
const navbarLinks = document.getElementsByClassName("nav-bar-links")[0];

toggleButton.addEventListener("click", () => {
  navbarLinks.classList.toggle("active");
});

//==================START OF CAROUSEL BANNER===============
var banner = 0;
showbanner();
var bannerslides, bannerdots;

function showbanner() {
  var i;
  bannerslides = document.getElementsByClassName("navbanner");
  bannerdots = document.getElementsByClassName("navdot");
  for (i = 0; i < bannerslides.length; i++) {
    bannerslides[i].style.display = "none";
  }
  banner++;
  if (banner > bannerslides.length) {
    banner = 1;
  }
  for (i = 0; i < bannerdots.length; i++) {
    bannerdots[i].className = bannerdots[i].className.replace(" active", "");
  }
  bannerslides[banner - 1].style.display = "block";
  bannerdots[banner - 1].className += " active";
  setTimeout(showbanner, 8000); // Change image every 8 seconds
}

// function arrow(position) {
//   banner += position;
//   if (banner > bannerslides.length) {
//     banner = 1;
//   } else if (banner < 1) {
//     banner = bannerslides.length;
//   }
//   for (i = 0; i < bannerslides.length; i++) {
//     bannerslides[i].style.display = "none";
//   }
//   for (i = 0; i < dots.length; i++) {
//     bannerdots[i].className = bannerdots[i].className.replace(" active", "");
//   }
//   bannerslides[banner - 1].style.display = "block";
//   bannerdots[banner - 1].className += " active";
// }

function currentImg(index) {
  if (index > bannerslides.length) {
    index = 1;
  } else if (index < 1) {
    index = bannerslides.length;
  }
  for (i = 0; i < bannerslides.length; i++) {
    bannerslides[i].style.display = "none";
  }
  for (i = 0; i < bannerdots.length; i++) {
    bannerdots[i].className = bannerdots[i].className.replace(" active", "");
  }
  bannerslides[index - 1].style.display = "block";
  bannerdots[index - 1].className += " active";
}
//==================END OF CAROUSEL============

//==================START OF LOGIN===========
var log = document.getElementById("login");
window.onclick = function (event) {
  if (event.target == log) {
    log.style.display = "none";
  }
};
var reg = document.getElementById("register");
window.onclick = function (event) {
  if (event.target == log) {
    log.style.display = "none";
  }
};
//===================END OF LOGIN===========

//===================START OF CART=================

//check ready state
if (document.readyState == "loading") {
  document.addEventListener("DOMContentLoaded", ready);
} else {
  ready();
}

function ready() {
  //removing elements from the cart vvvvvv
  var removeCartItemButtons = document.getElementsByClassName("btn-danger");
  console.log(removeCartItemButtons);
  for (var i = 0; i < removeCartItemButtons.length; i++) {
    var button = removeCartItemButtons[i];
    button.addEventListener("click", removeCartItem);
  }

  var quantityInputs = document.getElementsByClassName("cart-quantity-input");
  for (var i = 0; i < quantityInputs.length; i++) {
    var input = quantityInputs[i];
    input.addEventListener("change", quantityChanged);
  }

  var addToCartButtons = document.getElementsByClassName("shop-item-button");
  for (var i = 0; i < addToCartButtons.length; i++) {
    var button = addToCartButtons[i];
    button.addEventListener("click", addToCartClicked);
  }

  document
    .getElementsByClassName("btn-purchase")[0]
    .addEventListener("click", purchaseClicked);
}

function purchaseClicked() {
  alert("Thank you for purchasing");
  var cartItems = document.getElementsByClassName("cart-items")[0];
  //needed. para di madelete lahat ng input bago masend data
  setTimeout(function () {
    while (cartItems.hasChildNodes()) {
      cartItems.removeChild(cartItems.firstChild);
    }
    updateCartTotal();
  }, 10000);
}

function removeCartItem(event) {
  var buttonClicked = event.target;
  buttonClicked.parentElement.parentElement.remove();
  updateCartTotal();
}

function quantityChanged(event) {
  var input = event.target;
  if (isNaN(input.value) || input.value <= 0) {
    input.value = 1;
  }
  updateCartTotal();
}

function addToCartClicked(event) {
  var button = event.target;
  var shopItem = button.parentElement.parentElement;
  var title = shopItem.getElementsByClassName("shop-item-title")[0].innerText;
  var price = shopItem.getElementsByClassName("shop-item-price")[0].innerText;
  var imageSrc = shopItem.getElementsByClassName("shop-item-image")[0].src;
  console.log(title, price, imageSrc);
  addItemToCart(title, price, imageSrc);
  updateCartTotal();
}

function addItemToCart(title, price, imageSrc) {
  var cartRow = document.createElement("div");
  cartRow.classList.add("cart-row");
  cartRow.innerText = title;
  var cartItems = document.getElementsByClassName("cart-items")[0];
  var cartItemNames = cartItems.getElementsByClassName("cart-item-title");
  for (var i = 0; i < cartItemNames.length; i++) {
    if (cartItemNames[i].value == title) {
      alert("You've already added this item to the cart");
      return;
    }
  }
  var cartRowContents = `
      <div class="cart-item cart-column">
          <img class="cart-item-image" src="${imageSrc}" alt="" width="100" height="100">
          <input class="cart-item-title" name="ordplant[]" value="${title}" readonly/>
      </div>
      <span class="cart-price cart-column">${price}</span>
      <div class="cart-quantity cart-column">
          <input class="cart-quantity-input" type="number" name="ordquant[]" value="1">
          <button class="btn btn-danger" role="button">REMOVE</button>
      </div>`;
  cartRow.innerHTML = cartRowContents;
  cartItems.append(cartRow);
  cartRow
    .getElementsByClassName("btn-danger")[0]
    .addEventListener("click", removeCartItem);
  cartRow
    .getElementsByClassName("cart-quantity-input")[0]
    .addEventListener("change", quantityChanged);
}

//update the total vvvv
function updateCartTotal() {
  var cartItemContainer = document.getElementsByClassName("cart-items")[0];
  var cartRows = cartItemContainer.getElementsByClassName("cart-row");
  var total = 0;
  for (var i = 0; i < cartRows.length; i++) {
    var cartRow = cartRows[i];
    var priceElemnet = cartRow.getElementsByClassName("cart-price")[0];
    var quantityElement = cartRow.getElementsByClassName(
      "cart-quantity-input"
    )[0];
    var price = parseFloat(priceElemnet.innerText.replace("₱", ""));
    var quantity = quantityElement.value;
    total = total + price * quantity;
  }
  document.getElementsByClassName("cart-total-price")[0].value = total;
}

//if user is not logged in and pressed "add to cart", send to logreg
function sendTologreg() {
  document.location.href = "LogReg.php";
  alert("Please login first before purchasing!");
}

//================START OF ADMIN===============

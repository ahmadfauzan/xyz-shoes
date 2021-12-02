var value, quantity = document.getElementsByClassName ('qty');

function createBindings (quantityContainer) {
  var quantityAmount = quantityContainer.getElementsByClassName ('quantity')[0];
  var increase = quantityContainer.getElementsByClassName ('add')[0];
  var decrease = quantityContainer.getElementsByClassName ('remove')[0];
  increase.addEventListener ('click', function () {
    increaseValue (quantityAmount);
  });
  decrease.addEventListener ('click', function () {
    decreaseValue (quantityAmount);
  });
}

function init () {
  for (var i = 0; i < quantity.length; i++) {
    createBindings (quantity[i]);
  }
}

function increaseValue (quantityAmount) {
  var price = document.getElementById ('price');
  var normalPrice = 320;
  var totalPrice;

  value = parseInt (quantityAmount.value, 10);

  //   console.log (quantityAmount, quantityAmount.value);

  value = isNaN (value) ? 0 : value;
  value++;
  quantityAmount.value = value;
  //   quantity.textContent = quantityAmount.value;
  totalPrice = normalPrice * value;
  price.innerHTML = '$' + totalPrice;
  console.log (normalPrice);
}

function decreaseValue (quantityAmount) {
  var price = document.getElementById ('price');
  var normalPrice = 320;
  var totalPrice;

  value = parseInt (quantityAmount.value, 10);

  value = isNaN (value) ? 0 : value;
  if (value > 1) value--;

  quantityAmount.value = value;
  totalPrice = normalPrice * value;
  price.innerHTML = '$' + totalPrice;
}

init ();

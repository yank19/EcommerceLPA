
document.addEventListener('DOMContentLoaded', () => {
    loadCheckout();
    const checkoutForm = document.getElementById('checkout-form');
    checkoutForm.addEventListener('submit', handleCheckout);
  });
  
  function loadCheckout() {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    const checkoutTableBody = document.querySelector('.checkout-table tbody');
    checkoutTableBody.innerHTML = '';
  
    cart.forEach((product, index) => {
      const row = document.createElement('tr');
      row.classList.add('checkout-item');
      row.innerHTML = `
        <td class="item-name">${product.name}</td>
        <td class="item-price">${product.price}</td>
        <td class="item-quantity">${product.quantity}</td>
      `;
      checkoutTableBody.appendChild(row);
    });
  
    updateCheckoutTotal();
  }
  
  function updateCheckoutTotal() {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    const totalPrice = cart.reduce((acc, product) => acc + parseFloat(product.price.replace('$', '')) * product.quantity, 0);
    const tax = totalPrice * 0.15;
    const totalWithTax = totalPrice + tax;
  
    document.getElementById('total-price').textContent = `${totalPrice.toFixed(2)}Aud`;
    document.getElementById('tax').textContent = `${tax.toFixed(2)}Aud`;
    document.getElementById('total').textContent = `${totalWithTax.toFixed(2)}Aud`;
  }
  
  function handleCheckout(event) {
    event.preventDefault();
  
    const name = document.getElementById('name').value;
    const address = document.getElementById('address').value;
    const email = document.getElementById('email').value;
    const phone = document.getElementById('phone').value;
    const cardNumber = document.getElementById('card-number').value;
    const cardExpiry = document.getElementById('card-expiry').value;
    const cardCVC = document.getElementById('card-cvc').value;
  
    const orderDetails = {
      name,
      address,
      email,
      phone,
      payment: {
        cardNumber,
        cardExpiry,
        cardCVC
      },
      cart: JSON.parse(localStorage.getItem('cart')) || []
    };
  
    // Aquí puedes enviar los datos del pedido al servidor usando fetch() o AJAX.
    console.log(orderDetails);
  
    alert('successful payment, thank you for your purchase!');
  
    // Limpiar carrito y formulario
    localStorage.removeItem('cart');
    document.getElementById('checkout-form').reset();
    loadCheckout();
  }
  
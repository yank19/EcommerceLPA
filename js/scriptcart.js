document.addEventListener('DOMContentLoaded', () => {
  // Obtener elementos de "Add to Cart"
  const addToCartButtons = document.querySelectorAll('.add-to-cart');

  addToCartButtons.forEach(button => {
    button.addEventListener('click', addToCart);
  });
  
  function addToCart(event) {
    event.preventDefault();
    
    // Obtener datos del producto
    const productElement = event.target.closest('.product');
    const productName = productElement.querySelector('.product-name').textContent.trim();
    const productPrice = productElement.querySelector('.product-price').textContent.trim();
    
    // Crear objeto del producto
    const product = {
      name: productName,
      price: productPrice,
      quantity: 1
    };

    // Guardar en localStorage
    saveToLocalStorage(product);
  }

  function saveToLocalStorage(product) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];

    // Verificar si el producto ya está en el carrito
    const existingProductIndex = cart.findIndex(item => item.name === product.name);
    if (existingProductIndex !== -1) {
      cart[existingProductIndex].quantity += 1;
    } else {
      cart.push(product);
    }

    localStorage.setItem('cart', JSON.stringify(cart));
  }

  // Cargar los productos en el carrito al cargar la página
  loadCart();
});

function loadCart() {
  const cart = JSON.parse(localStorage.getItem('cart')) || [];
  const cartTableBody = document.querySelector('.cart-table tbody');
  cartTableBody.innerHTML = '';

  cart.forEach((product, index) => {
    const row = document.createElement('tr');
    row.classList.add('cart-item');
    row.setAttribute('id', `item${index + 1}`);
    row.innerHTML = `
      <td class="item-name">${product.name}</td>
      <td class="item-price">${product.price}</td>
      <td class="item-quantity">
        <button class="decrease-btn" onclick="updateQuantity(${index}, -1)">-</button>
        <input type="number" value="${product.quantity}" min="1" readonly>
        <button class="increase-btn" onclick="updateQuantity(${index}, 1)">+</button>
      </td>
      <td>
        <button class="remove-btn" onclick="removeItem(${index})">Eliminar</button>
      </td>
    `;
    cartTableBody.appendChild(row);
  });

  updateTotalPrice();
}

function updateQuantity(index, change) {
  let cart = JSON.parse(localStorage.getItem('cart')) || [];
  if (cart[index].quantity + change > 0) {
    cart[index].quantity += change;
    localStorage.setItem('cart', JSON.stringify(cart));
    loadCart();
  }
}

function removeItem(index) {
  let cart = JSON.parse(localStorage.getItem('cart')) || [];
  cart.splice(index, 1);
  localStorage.setItem('cart', JSON.stringify(cart));
  loadCart();
}

function updateTotalPrice() {
  const cart = JSON.parse(localStorage.getItem('cart')) || [];
  const totalPrice = cart.reduce((acc, product) => acc + parseFloat(product.price.replace('$', '')) * product.quantity, 0);
  const tax = totalPrice * 0.15;
  const totalWithTax = totalPrice + tax;

  document.getElementById('total-price').textContent = `${totalPrice.toFixed(2)}Aud`;
  document.getElementById('tax').textContent = `${tax.toFixed(2)}Aud`;
  document.getElementById('total').textContent = `${totalWithTax.toFixed(2)}Aud`;
}

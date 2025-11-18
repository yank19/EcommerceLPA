document.addEventListener('DOMContentLoaded', function() {
    console.log("El script se ha cargado correctamente");
  
    const addToCartButtons = document.querySelectorAll('.add-to-cart');
    if (addToCartButtons.length > 0) {
      addToCartButtons.forEach(button => {
        button.addEventListener('click', event => {
          event.preventDefault();
          const product = event.target.closest('.product');
          if (product) {
            const nameElement = product.querySelector('h2');
            const priceElement = product.querySelector('.text-primary');
            if (nameElement && priceElement) {
              const name = nameElement.textContent;
              const price = priceElement.textContent.replace('$', '').trim();
              addToCart(name, price);
            }
          }
        });
      });
    } else {
      console.error('No se encontraron botones de agregar al carrito.');
    }
  
    function addToCart(name, price) {
      let cart = JSON.parse(localStorage.getItem('cart')) || [];
      const existingItem = cart.find(item => item.name === name);
  
      if (existingItem) {
        existingItem.quantity += 1;
      } else {
        cart.push({ name, price, quantity: 1 });
      }
  
      localStorage.setItem('cart', JSON.stringify(cart));
      console.log(`${name} ha sido añadido al carrito. Contenido del carrito:`, cart);
      updateCartCount();
    }
  
    // Obtener los elementos del contador
    const cartCount = document.getElementById("cart-count");
    const mobileCartCount = document.getElementById("mobile-cart-count");
  
    // Comprobar si los elementos existen antes de intentar actualizar
    if (cartCount || mobileCartCount) {
      updateCartCount();
    } else {
      console.error('No se encontró el elemento cart-count.');
    }
  
    // Función para actualizar el contador
    function updateCount(element, count) {
      if (element) {
        element.textContent = count;
        console.log(`El contador ${element.id} se actualizó a ${count}`);
      } else {
        console.error('No se encontró el elemento: ', element);
      }
    }
  
    // Función para obtener el conteo del carrito desde el localStorage
    function getCartCount() {
      let cart = JSON.parse(localStorage.getItem('cart')) || [];
      console.log("Contenido del carrito desde getCartCount:", cart);
      return cart.reduce((total, item) => total + item.quantity, 0);
    }
  
    // Función para actualizar el contador del carrito
    function updateCartCount() {
      const count = getCartCount();
      console.log("Cantidad de elementos en el carrito:", count);
      if (cartCount) {
        updateCount(cartCount, count);
      }
      if (mobileCartCount) {
        updateCount(mobileCartCount, count);
      }
    }
  });
  
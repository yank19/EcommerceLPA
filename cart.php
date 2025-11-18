<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="./image/Logo.png" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="./font/css/all.css" />
    <link rel="stylesheet" href="./dist/output.css" />
    <script src="./js/script.js" async defer></script>
    <title>shop</title>
  </head>
  <body class="font-roboto">
    <!---------------- HEADER START -------------------->
  <?php
    session_start();
    require_once 'config.php'; // if that page also needs DB
  ?>
    <?php include 'header.php'; ?>

<!---------------- HEADER END -------------------->

    <!---------------- MAIN SECTION START ------------------------------>

    <div class="cart-container">
      <h1>Carrito de Compras</h1>
        <div class="cart-content">
          <table class="cart-table">
              <thead>
                  <tr>
                      <th>Name</th>
                      <th>Price</th>
                      <th>N items</th>
                      <th>Delete</th>
                  </tr>
              </thead>
              <tbody>
                  
              </tbody>
          </table>
          <div class="cart-summary">
              <p>Total productos: <span id="total-price">249.70Aud</span></p>
              <p>Tax: <span id="tax">0.00Aud</span></p>
              <p class="total">Total: <span id="total">249.70Aud</span></p>
              <button class="checkout-btn" onclick="window.location.href='checkout.php'">PAGAR</button>
          </div>
        </div>
    </div>

    

  
    <!---------------- MAIN SECTION END ------------------------------>


         <!---------------- FOOTER END --------------------------->
         <?php include 'footer.php'; ?>
      <!---------------- FOOTER END --------------------------->


      <script src="./js/scriptshop.js"></script>
    <script src="./js/scriptcart.js"></script>
 
  </body>
</html>

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


  <div class="checkout-container">
    <h1>Checkout</h1>
    <div class="checkout-content">
      <div class="checkout-left">
        <table class="checkout-table">
          <thead>
            <tr>
              <th>Name</th>
              <th>Price</th>
              <th>Quantity</th>
            </tr>
          </thead>
          <tbody>
            <!-- cart's Items  -->
          </tbody>
        </table>
      </div>
      <div class="checkout-right">
        <div class="checkout-summary">
          <p>Total productos: <span id="total-price">0.00Aud</span></p>
          <p>Tax: <span id="tax">0.00Aud</span></p>
          <p class="total">Total: <span id="total">0.00Aud</span></p>
        </div>
        <form id="checkout-form">
          <h2>Delivery Details</h2>
          <label for="name">Full Name:</label>
          <input type="text" id="name" name="name" required>
          <label for="address">Adress:</label>
          <input type="text" id="address" name="address" required>
          <label for="email">Email:</label>
          <input type="email" id="email" name="email" required>
          <label for="phone">Phone:</label>
          <input type="tel" id="phone" name="phone" required>

          <h2>Payment</h2>
          <label for="card-number">Card Number:</label>
          <input type="text" id="card-number" name="card-number" required>
          <label for="card-expiry">Expire Day (MM/AA):</label>
          <input type="text" id="card-expiry" name="card-expiry" required>
          <label for="card-cvc">CVC:</label>
          <input type="text" id="card-cvc" name="card-cvc" required>

          <button type="submit" class="checkout-btn">Pay</button>
        </form>
      </div>
    </div>
  </div>


    

  
    <!---------------- MAIN SECTION END ------------------------------>


         <!---------------- FOOTER END --------------------------->
         <?php include 'footer.php'; ?>
      <!---------------- FOOTER END --------------------------->


      <script src="./js/scriptshop.js"></script>
    <script src="./js/checkout.js"></script>
 
  </body>
</html>

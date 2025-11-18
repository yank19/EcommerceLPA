<?php
session_start();
require_once 'config.php';

// 1. Consultar productos desde lpa_stock
$products = [];
$sql = "SELECT lpa_stock_ID, lpa_stock_name, lpa_stock_desc, lpa_stock_onhand, lpa_stock_price, lpa_stock_status, lpa_stock_image 
        FROM lpa_stock
        WHERE lpa_stock_status = 'active'"; // ajusta el filtro si usas otro valor

$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}
?>
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
    <title>Shop</title>
  </head>
  <body class="font-roboto">
    <!---- HEADER START ---->
    <?php include 'header.php'; ?>
    <!---- HEADER END ---->

    <!---- BREADCRUMB START ---->
    <div class="container p-4">
      <div class="flex gap-x-3 items-center">
        <a href="index.php" class="text-primary text-lg font-bold">
          <i class="fa-regular fa-house"></i>
        </a>
        <span class="text-gray-500 text-sm font-bold">
          <i class="fa-regular fa-chevron-right"></i>
        </span>
        <span class="capitalize text-gray-500">shop</span>
      </div>
    </div>
    <!---- BREADCRUMB END ---->

    <!---- MAIN SECTION START ---->
    <div class="container my-3">
      <div class="flex flex-col md:flex-row gap-x-5">
        <!-- sidebar start -->
        <div class="w-full md:w-3/12">
          <div
            class="w-full bg-white shadow-sm shadow-gray-400 rounded-sm divide-gray-200 divide-y space-y-2 px-3 py-3 my-3 md:my-0"
          >
            <!-- category filter start -->
            <div class="pt-4 pb-2 px-2">
              <h3 class="uppercase text-lg font-semibold mb-2 tracking-widest">
                category
              </h3>
              <div class="space-y-3 text-sm text-gray-600">
                <!-- Aquí luego podemos conectar filtros reales por categoría -->
                <p class="text-xs text-gray-400">
                  (Filtros de ejemplo, aún sin lógica real)
                </p>
                <div class="flex items-center">
                  <input
                    type="checkbox"
                    id="keyboards"
                    class="text-primary focus:ring-primary checked:ring-primary"
                  />
                  <label for="keyboards" class="capitalize cursor-pointer ml-2"
                    >keyboards</label
                  >
                  <span class="ml-auto">(<?php echo count($products); ?>)</span>
                </div>
              </div>
            </div>
            <!-- category filter end -->
          </div>
        </div>
        <!-- sidebar end -->

        <!-- products start -->
        <div class="w-full md:w-9/12 my-3">
          <?php if (!empty($products)): ?>
            <!-- Grid: 1 columna en móvil, 3 columnas desde md -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
              <?php foreach ($products as $product): ?>
                <?php
                  $inStock = (int)$product['lpa_stock_onhand'] > 0;
                ?>
                <div class="shadow-lg shadow-gray-200 group/newarrival flex flex-col w-full product bg-white rounded-sm">
                  <div class="relative cursor-pointer">
                    <img
                      src="<?php echo htmlspecialchars($product['lpa_stock_image']); ?>"
                      alt="<?php echo htmlspecialchars($product['lpa_stock_name']); ?>"
                      class="rounded-t-sm w-full h-64 object-cover"
                    />
                    <div
                      class="absolute bg-gray-400 inset-0 flex flex-col justify-between transition-all duration-500 bg-opacity-0 group-hover/newarrival:bg-opacity-30 rounded-t-sm"
                    >
                      <!-- product icon start -->
                      <div class="w-full flex items-center justify-between px-2 pt-2">
                        <div class="bg-primary rounded-sm px-3 py-1 text-white text-xs uppercase">
                          <?php echo $inStock ? 'In stock' : 'Out of stock'; ?>
                        </div>
                        <i
                          class="fa-light fa-heart w-8 h-8 bg-primary rounded-full flex items-center justify-center text-white text-lg"
                        ></i>
                      </div>
                      <!-- product icon end -->

                      <!-- product btn start -->
                      <a
                        href="#"
                        class="capitalize text-white bg-black text-center px-3 py-2 invisible opacity-0 group-hover/newarrival:opacity-100 group-hover/newarrival:visible transition-all duration-500 text-sm"
                      >
                        <span class="mx-1"><i class="fa-light fa-eye"></i></span>
                        <span>quick view</span>
                      </a>
                      <!-- product btn end -->
                    </div>
                  </div>
                  <!-- product details start -->
                  <div class="py-4 px-3">
                    <h2 class="text-lg font-bold uppercase truncate">
                      <?php echo htmlspecialchars($product['lpa_stock_name']); ?>
                    </h2>
                    <p class="text-gray-500 text-sm my-2 line-clamp-2">
                      <?php echo htmlspecialchars($product['lpa_stock_desc']); ?>
                    </p>
                    <p class="text-primary font-extrabold text-xl mb-2">
                      $ <?php echo number_format($product['lpa_stock_price'], 2); ?>
                    </p>
                    <div class="flex items-center gap-2 mt-1 text-xs text-gray-500">
                      <span class="<?php echo $inStock ? 'text-green-600' : 'text-red-600'; ?>">
                        <?php echo $inStock ? 'Available' : 'Out of stock'; ?>
                      </span>
                      <span class="text-gray-400">·</span>
                      <span><?php echo (int)$product['lpa_stock_onhand']; ?> units</span>
                    </div>

                    <!-- product buttons -->
                    <div class="flex flex-col gap-2 my-4">
                      <button
                        <?php echo $inStock ? '' : 'disabled'; ?>
                        class="bg-primary px-5 py-2 block rounded-sm text-center border border-primary hover:bg-transparent group/productbtn transition add-to-cart disabled:opacity-50 disabled:cursor-not-allowed"
                      >
                        <span>
                          <i class="fa-regular fa-cart-shopping text-white mx-1 text-sm group-hover/productbtn:text-primary"></i>
                        </span>
                        <span class="text-white group-hover/productbtn:text-primary capitalize font-bold text-sm">
                          add to cart
                        </span>
                      </button>
                      <button
                        class="bg-transparent px-5 py-2 block rounded-sm text-center border border-primary hover:bg-primary group/productbtn transition"
                      >
                        <span>
                          <i class="fa-regular fa-heart text-primary mx-1 text-sm group-hover/productbtn:text-white"></i>
                        </span>
                        <span class="text-primary group-hover/productbtn:text-white capitalize font-bold text-sm">
                          add to wishlist
                        </span>
                      </button>
                    </div>
                  </div>
                  <!-- product details end -->
                </div>
              <?php endforeach; ?>
            </div>
          <?php else: ?>
            <div class="bg-white shadow-sm rounded-md p-6 text-center text-gray-500">
              No products available at the moment.
            </div>
          <?php endif; ?>
        </div>
        <!-- products end-->
      </div>
    </div>
    <!---- MAIN SECTION END ---->

    <!---- FOOTER START ---->
    <?php include 'footer.php'; ?>
    <!---- FOOTER END ---->

    <script src="./js/scriptshop.js"></script>
  </body>
</html>
<?php
session_start();
require_once 'config.php'; // si necesitas DB
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
    <title>LPA Eccomerce</title>
  </head>
  <body class="font-roboto">
  <!---------------- HEADER START -------------------->
  
  <?php include 'header.php'; ?>

  <!---------------- HEADER END -------------------->

    <!---------------- BANNER START -------------------->
    <div
    class="w-full min-h-[500px] xl:bg-fixed bg-cover bg-center bg-no-repeat relative bg-primary-background "
    >
      <div class="absolute md:w-6/12 w-full mt-32 md:pl-10 px-2">
        <h2
          class="capitalize xl:text-5xl lg:text-4xl md:text-4xl text-2xl text-gray-900 font-semibold leading-none xl:leading-[60px] select-none"
        >
        Best peripherals in Australia
        </h2>
        <p class="text-base text-gray-900 select-none md:mt-2 mb-10 mt-4">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt
          dolores corporis debitis rerum in totam temporibus voluptates soluta
          necesitatibus officia
        </p>
        <a
          href="shop.html"
          class="bg-primary px-4 py-2 text-white border border-primary rounded-md uppercase hover:bg-transparent hover:text-primary transition duration-300 font-semibold"
        >
          shop now
        </a>
      </div>
    </div>
    <!---------------- BANNER END ---------------------->

    <!---------------- FEATURES START ------------------->
    <div class="container py-16">
      <div
        class="w-12/12 grid md:grid-cols-3 grid-cols-1 lg:gap-6 gap-3 px-10 lg-px-0 mx-auto"
      >
        <!-- feature item start-->
        <div
          class="border border-primary flex items-center justify-center md:px-10 py-4 gap-5 cursor-pointer hover:bg-gray-300 hover:border-gray-400 transition duration-500 rounded-md"
        >
          <img
            src="./image/svg/delivery-van.svg"
            alt="delivery-van"
            class="w-10 h-10 object-contain"
          /> 
          <div>
            <h2 class="capitalize font-semibold lg:text-lg text-sm">
              Free Shipping
            </h2>
            <p class="capitalize text-gray-400 mt-1 text-xs text-lg-sm">
              Free shipping on all order
            </p>
          </div>
        </div>

        <div
          class="border border-primary flex items-center justify-center px-10 py-4 space-x-5 cursor-pointer hover:bg-gray-300 hover:border-gray-400 transition duration-500 rounded-md"
        >
          <img
            src="./image/svg/money-back.svg"
            alt="delivery-van"
            class="w-10 h-10 object-contain"
          />
          <div>
            <h2 class="capitalize font-semibold lg:text-lg text-sm">
              Money Returns
            </h2>
            <p class="capitalize text-gray-400 mt-1 text-xs text-lg-sm">
              30 Days money return
            </p>
          </div>
        </div>

        <div
          class="border border-primary flex items-center justify-center px-10 py-4 gap-5 cursor-pointer hover:bg-gray-300 hover:border-gray-400 transition duration-500 rounded-md"
        >
          <img
            src="./image/svg/service-hours.svg"
            alt="delivery-van"
            class="w-10 h-10 object-contain"
          />
          <div>
            <h2 class="capitalize font-semibold lg:text-lg text-sm">
              24/7 Support
            </h2>
            <p class="capitalize text-gray-400 mt-1 text-xs text-lg-sm">
              Customer support
            </p>
          </div>
        </div>
        <!-- feature item end -->
      </div>
    </div>
    <!---------------- FEATURES END ---------------------->

    <!---------------- OFFER START ---------------------->
    <div
      class="grid grid-cols-1 sm:grid-cols-2 gap-4 px-3 sm:px-12 justify-center md:pb-16 pb-10"
    >
      <!-- offer item start -->
      <div
        class="bg-red-100 px-5 xl:px-8 py-4 lg:py-0 flex lg:flex-row flex-col-reverse items-center justify-between group/offer rounded-sm"
      >
        <div class="w-full xl:w-auto space-y-1 py-10 text-center lg:text-left">
          <h2 class="font-semibold text-xl text-primary">30% offer</h2>
          <h3 class="font-bold text-xl">Free Shipping</h3>
          <p class="text-gray-700">Ultimate technology</p>
          <a
            href="shop.html"
            class="bg-primary inline-block px-4 py-2 text-white border border-primary rounded-md uppercase hover:bg-transparent hover:text-primary transition duration-300 font-semibold"
            style="margin-top: 20px"
          >
            shop now</a
          >
        </div>
        <img
          src="./image/drone.png"
          alt="sofa-1"
          class="h-40 cursor-pointer group-hover/offer:scale-110 transition-all duration-500"
        />
      </div>
      <!-- offer item end -->

      <!-- offer item start -->
      <div
        class="bg-gray-200 px-5 xl:px-8 py-4 lg:py-0 flex lg:flex-row flex-col-reverse items-center justify-between group/offer rounded-sm"
      >
        <div class="w-full xl:w-auto space-y-1 py-10 text-center lg:text-left">
          <h2 class="font-semibold text-xl text-primary">50% offer</h2>
          <h3 class="font-bold text-xl">Flash Sale</h3>
          <p class="text-gray-700">Ultimate technology</p>
          <a
            href="shop.html"
            class="bg-primary inline-block px-4 py-2 text-white border border-primary rounded-md uppercase hover:bg-transparent hover:text-primary transition duration-300 font-semibold"
            style="margin-top: 20px"
          >
            shop now</a
          >
        </div>
        <img
          src="./image/combo.png"
          alt="sofa-1"
          class="h-40 cursor-pointer group-hover/offer:scale-110 transition-all duration-500"
        />
      </div>
      <!-- offer item end -->
    </div>
    <!---------------- OFFER END ----------------------->

    

    <!---------------- NEW ARRIVAL START ------------------------->
    <div class="container md:pb-16 pb-10">
      <h2 class="md:text-3xl text-lg font-extrabold uppercase lg:pb-6 pb-4">
        top new arrival
      </h2>
      <div class="grid xl:grid-cols-4 md:grid-cols-2 grid-cols-1 gap-6">
        <!-- product item start -->
<div class="shadow-lg shadow-gray-200 group/newarrival product">
  <div class="relative cursor-pointer">
    <img
      src="./image/produc1.png"
      alt="product9"
      class="rounded-t-sm"
    />
    <div
      class="absolute bg-gray-400 inset-0 flex flex-col justify-between transition-all duration-500 bg-opacity-0 group-hover/newarrival:bg-opacity-30 rounded-t-sm"
    >
      <!-- product icon start -->
      <div class="w-full flex items-center justify-between px-2 pt-2">
        <div class="bg-green-600 rounded-sm px-3 py-1 text-white">
          50%
        </div>
        <i
          class="fa-light fa-heart w-8 h-8 bg-primary rounded-full flex items-center justify-center text-white text-lg"
        ></i>
      </div>
      <!-- product icon end -->

      <!-- product btn start -->
      <a
        href="#"
        class="capitalize text-white bg-black text-center px-3 py-2 invisible opacity-0 group-hover/newarrival:opacity-100 group-hover/newarrival:visible transition-all duration-500"
      >
        <span class="mx-1"><i class="fa-light fa-eye"></i></span>
        <span>quick view</span>
      </a>
      <!-- product btn end -->
    </div>
  </div>
  <!-- product details start -->
  <div class="py-4 px-3">
    <h2 class="text-lg font-bold uppercase">guyer chair</h2>
    <p class="capitalize text-gray-500 text-sm font-semibold my-2">
      queen headboard
    </p>
    <p class="text-primary font-extrabold text-xl">$ 45.00</p>
    <div class="flex gap-2 mt-3">
      <i class="fa-solid fa-star text-yellow-400 text-sm"></i>
      <i class="fa-solid fa-star text-yellow-400 text-sm"></i>
      <i class="fa-solid fa-star text-yellow-400 text-sm"></i>
      <i class="fa-solid fa-star text-yellow-400 text-sm"></i>
      <i class="fa-solid fa-star text-yellow-400 text-sm"></i>
      <p class="font-bold text-gray-600 text-sm ml-1">(150)</p>
    </div>
  </div>
  <!-- product details start -->
  <!-- product btn start -->
  <a
    href="#"
    class="bg-primary px-5 py-2 block rounded-b-sm text-center border border-primary hover:bg-transparent group/productbtn transition add-to-cart"
  >
    <span><i class="fa-regular fa-cart-shopping text-white mx-1 text-sm group-hover/productbtn:text-primary"></i></span>
    <span class="text-white group-hover/productbtn:text-primary capitalize font-bold">add to cart</span>
  </a>
  <!-- product btn end -->
</div>
<!-- product item end -->


        <!-- product item start -->
        <div class="shadow-lg shadow-gray-200 group/newarrival">
          <div class="relative cursor-pointer">
            <img
              src="./image/produc2.png"
              alt="product1"
              class="rounded-t-sm"
            />
            <div
              class="absolute bg-gray-400 inset-0 flex flex-col justify-between transition-all duration-500 bg-opacity-0 group-hover/newarrival:bg-opacity-30 rounded-t-sm"
            >
              <!-- product icon start -->
              <div class="w-full flex items-center justify-between px-2 pt-2">
                <div class="bg-yellow-500 rounded-sm px-3 py-1 text-white">
                  10%
                </div>
                <i
                  class="fa-light fa-heart w-8 h-8 bg-primary rounded-full flex items-center justify-center text-white text-lg"
                ></i>
              </div>
              <!-- product icon end -->

              <!-- product btn start -->
              <a
                href="#"
                class="capitalize text-white bg-black text-center px-3 py-2 invisible opacity-0 group-hover/newarrival:opacity-100 group-hover/newarrival:visible transition-all duration-500"
              >
                <span class="mx-1"><i class="fa-light fa-eye"></i></span>
                <span>quick view</span>
              </a>
              <!-- product btn end -->
            </div>
          </div>
          <!-- product detailes start -->
          <div class="py-4 px-3">
            <h2 class="text-lg font-bold uppercase">madeline sofa</h2>
            <p class="capitalize text-gray-500 text-sm font-semibold my-2">
              fabric sofa bed
            </p>
            <p class="text-primary font-extrabold text-xl">$ 120.00</p>
            <div class="flex gap-2 mt-3">
              <i class="fa-solid fa-star text-yellow-400 text-sm"></i>
              <i class="fa-solid fa-star text-yellow-400 text-sm"></i>
              <i class="fa-solid fa-star text-yellow-400 text-sm"></i>
              <i class="fa-solid fa-star text-yellow-400 text-sm"></i>
              <i class="fa-solid fa-star text-yellow-400 text-sm"></i>
              <p class="font-bold text-gray-600 text-sm ml-1">(150)</p>
            </div>
          </div>
          <!-- product detailes start -->
          <!-- product btn start -->
          <a
            href="#"
            class="bg-primary px-5 py-2 block rounded-b-sm text-center border border-primary hover:bg-transparent group/productbtn transition"
          >
            <span
              ><i
                class="fa-regular fa-cart-shopping text-white mx-1 text-sm group-hover/productbtn:text-primary"
              ></i
            ></span>
            <span
              class="text-white group-hover/productbtn:text-primary capitalize font-bold"
              >add to cart</span
            >
          </a>
          <!-- product btn end -->
        </div>
        <!-- product item end -->

        <!-- product item start -->
        <div class="shadow-lg shadow-gray-200 group/newarrival">
          <div class="relative cursor-pointer">
            <img
              src="./image/produc1.png"
              alt="product8"
              class="rounded-t-sm"
            />
            <div
              class="absolute bg-gray-400 inset-0 flex flex-col justify-between transition-all duration-500 bg-opacity-0 group-hover/newarrival:bg-opacity-30 rounded-t-sm"
            >
              <!-- product icon start -->
              <div class="w-full flex items-center justify-between px-2 pt-2">
                <div
                  class="bg-red-600 rounded-sm px-3 py-1 text-white uppercase"
                >
                  hot
                </div>
                <i
                  class="fa-light fa-heart w-8 h-8 bg-primary rounded-full flex items-center justify-center text-white text-lg"
                ></i>
              </div>
              <!-- product icon end -->

              <!-- product btn start -->
              <a
                href="#"
                class="capitalize text-white bg-black text-center px-3 py-2 invisible opacity-0 group-hover/newarrival:opacity-100 group-hover/newarrival:visible transition-all duration-500"
              >
                <span class="mx-1"><i class="fa-light fa-eye"></i></span>
                <span>quick view</span>
              </a>
              <!-- product btn end -->
            </div>
          </div>
          <!-- product detailes start -->
          <div class="py-4 px-3">
            <h2 class="text-lg font-bold uppercase">bianco chair</h2>
            <p class="capitalize text-gray-500 text-sm font-semibold my-2">
              fabric accent chair
            </p>
            <p class="text-primary font-extrabold text-xl">$ 45.00</p>
            <div class="flex gap-2 mt-3">
              <i class="fa-solid fa-star text-yellow-400 text-sm"></i>
              <i class="fa-solid fa-star text-yellow-400 text-sm"></i>
              <i class="fa-solid fa-star text-yellow-400 text-sm"></i>
              <i class="fa-solid fa-star text-yellow-400 text-sm"></i>
              <i class="fa-solid fa-star text-yellow-400 text-sm"></i>
              <p class="font-bold text-gray-600 text-sm ml-1">(150)</p>
            </div>
          </div>
          <!-- product detailes start -->
          <!-- product btn start -->
          <a
            href="#"
            class="bg-primary px-5 py-2 block rounded-b-sm text-center border border-primary hover:bg-transparent group/productbtn transition"
          >
            <span
              ><i
                class="fa-regular fa-cart-shopping text-white mx-1 text-sm group-hover/productbtn:text-primary"
              ></i
            ></span>
            <span
              class="text-white group-hover/productbtn:text-primary capitalize font-bold"
              >add to cart</span
            >
          </a>
          <!-- product btn end -->
        </div>
        <!-- product item end -->

        <!-- product item start -->
        <div class="shadow-lg shadow-gray-200 group/newarrival">
          <div class="relative cursor-pointer">
            <img
              src="./image/produc2.png"
              alt="product10"
              class="rounded-t-sm"
            />
            <div
              class="absolute bg-gray-400 inset-0 flex flex-col justify-between transition-all duration-500 bg-opacity-0 group-hover/newarrival:bg-opacity-30 rounded-t-sm"
            >
              <!-- product icon start -->
              <div class="w-full flex items-center justify-between px-2 pt-2">
                <div class="bg-yellow-500 rounded-sm px-3 py-1 text-white">
                  15%
                </div>
                <i
                  class="fa-light fa-heart w-8 h-8 bg-primary rounded-full flex items-center justify-center text-white text-lg"
                ></i>
              </div>
              <!-- product icon end -->

              <!-- product btn start -->
              <a
                href="#"
                class="capitalize text-white bg-black text-center px-3 py-2 invisible opacity-0 group-hover/newarrival:opacity-100 group-hover/newarrival:visible transition-all duration-500"
              >
                <span class="mx-1"><i class="fa-light fa-eye"></i></span>
                <span>quick view</span>
              </a>
              <!-- product btn end -->
            </div>
          </div>
          <!-- product detailes start -->
          <div class="py-4 px-3">
            <h2 class="text-lg font-bold uppercase">pelagia lounge</h2>
            <p class="capitalize text-gray-500 text-sm font-semibold my-2">
              outdoor modular
            </p>
            <p class="text-primary font-extrabold text-xl">$ 45.00</p>
            <div class="flex gap-2 mt-3">
              <i class="fa-solid fa-star text-yellow-400 text-sm"></i>
              <i class="fa-solid fa-star text-yellow-400 text-sm"></i>
              <i class="fa-solid fa-star text-yellow-400 text-sm"></i>
              <i class="fa-solid fa-star text-yellow-400 text-sm"></i>
              <i class="fa-solid fa-star text-yellow-400 text-sm"></i>
              <p class="font-bold text-gray-600 text-sm ml-1">(150)</p>
            </div>
          </div>
          <!-- product detailes start -->
          <!-- product btn start -->
          <a
            href="#"
            class="bg-primary px-5 py-2 block rounded-b-sm text-center border border-primary hover:bg-transparent group/productbtn transition"
          >
            <span
              ><i
                class="fa-regular fa-cart-shopping text-white mx-1 text-sm group-hover/productbtn:text-primary"
              ></i
            ></span>
            <span
              class="text-white group-hover/productbtn:text-primary capitalize font-bold"
              >add to cart</span
            >
          </a>
          <!-- product btn end -->
        </div>
        <!-- product item end -->
      </div>
    </div>
    <!---------------- NEW ARRIVAL END --------------------------->

    <!---------------- OFFER START --------------------------->
    <div class="container md:pb-16 pb-10">
      <img src="./image/bannerlpa.jpg" alt="" />
    </div>
    <!---------------- OFFER START --------------------------->


      <!---------------- FOOTER END --------------------------->
    <?php include 'footer.php'; ?>
      <!---------------- FOOTER END --------------------------->

    <script src="./js/script.js"></script>
    <script src="./js/scriptshop.js"></script>
    
  </body>
</html>

<!---- HEADER START ---->
<header class="w-full bg-primary lg:bg-primary shadow-sm">
    <div class="w-full container py-3 px-5 flex items-center justify-between">
        <!-- logo start -->
        <a class="px-5 flex-shrink-0 block w-36" href="index.php">
            <img src="./image/logowhite.png" alt="" />
        </a>
        <!-- logo end -->

        <!-- search start -->
        <div class="w-full xl:max-w-xl lg:max-w-lg justify-center hidden lg:flex group">
            <div class="w-72 border border-primary rounded-md rounded-r-none transition cursor-pointer relative">
                <!-- category start -->
                <div
                    class="w-full px-5 py-2 h-full flex items-center justify-between "
                    id="categories"
                >
                    <p class="text-sm">All cetegory</p>
                    <span class="text-xs text-gray-400 transition group-hover:text-gray-600">
                        <i class="fa fa-chevron-up rotate-180 transition" id="category_icon"></i>
                    </span>
                </div>
                <!-- category start -->

                <!-- category list start -->
                <div
                    class="absolute top-full left-0 z-50 w-full shadow-sm shadow-gray-100 bg-white rounded-lg mt-[2px] border border-gray-100 opacity-0 invisible transform scale-y-0 transition-all ease-in-out duration-200 origin-top text-sm"
                    id="category_list"
                >
                    <div class="group/categories">
                        <a
                            class="block capitalize font-semibold group-hover/categories:bg-transparent bg-gray-100 w-full px-5 py-2 rounded-t-lg"
                        >
                            all Category
                        </a>
                        <a
                            href="#"
                            class="block capitalize hover:bg-gray-100 transition duration-500 w-full px-5 py-2"
                        >keyborats</a>
                        <a
                            href="#"
                            class="block capitalize hover:bg-gray-100 transition duration-500 w-full px-5 py-2"
                        >earphones</a>
                        <a
                            href="#"
                            class="block capitalize hover:bg-gray-100 transition duration-500 w-full px-5 py-2"
                        >microphones</a>
                    </div>
                </div>
                <!-- category list start -->
            </div>

            <!-- search input start -->
            <div class="relative w-full ">
                <span class="absolute top-[10px] left-3 text-gray-400">
                    <i class="fa fa-search"></i>
                </span>
                <input
                    type="text"
                    class="w-full px-3 py-2 pl-10 rounded-md rounded-r-none rounded-l-none focus:outline-none focus:ring-0"
                    placeholder="Search"
                />
            </div>
            <!-- search input end-->

            <!-- search button start -->
            <button
                type="submit"
                class="capitalize px-3 py-2 rounded-r-md border border-primary text-white bg-primary hover:text-primary hover:bg-transparent transition duration-500 font-medium"
            >
                search
            </button>
            <!-- search button end -->
        </div>
        <!-- search end -->

        <!-- navbar icon start ---->
        <div class="space-x-5 flex items-center">

            <!-- Cart icon -->
            <a href="cart.php" class="relative text-center group lg:block">
                <span
                    id="cart-count"
                    class="flex justify-center items-center text-white text-xs bg-lpa-blue rounded-full w-5 h-5 absolute -top-2 -right-4"
                >0</span>
                <div class="text-2xl text-black group-hover:text-primary transition">
                    <i class="fa-thin fa-cart-shopping"></i>
                </div>
                <div class="text-xs capitalize group-hover:text-primary transition">
                    cart
                </div>
            </a>

            <?php
            // If user is logged in, show "Hello, name" and logout icon.
            // Otherwise, show account (login/register).
            if (isset($_SESSION['user_id'])):
                $displayName = !empty($_SESSION['username'])
                    ? $_SESSION['username']
                    : (!empty($_SESSION['user_firstname']) ? $_SESSION['user_firstname'] : 'User');
            ?>
                <!-- Link to user profile -->
                <a href="user_profile.php" class="relative block text-center group">
                    <div class="text-2xl text-black group-hover:text-primary transition">
                        <i class="fa-thin fa-user"></i>
                    </div>
                    <div class="text-xs capitalize group-hover:text-primary transition">
                        Hello, <?php echo htmlspecialchars($displayName); ?>
                    </div>
                </a>

                <!-- Logout icon -->
                <a href="logout.php" class="relative flex flex-col items-center text-center group">
                    <div class="text-2xl text-black group-hover:text-red-500 transition">
                        <i class="fa-thin fa-right-from-bracket"></i>
                    </div>
                    <div class="text-xs capitalize group-hover:text-red-500 transition">
                        logout
                    </div>
                </a>
            <?php else: ?>
                <!-- If user is NOT logged in, show account / login link -->
                <a href="LoginRegister.php" class="relative block text-center group">
                    <div class="text-2xl text-black group-hover:text-primary transition">
                        <i class="fa-thin fa-user"></i>
                    </div>
                    <div class="text-xs capitalize group-hover:text-primary transition">
                        account
                    </div>
                </a>
            <?php endif; ?>

        </div>
        <!-- navbar icon end  ---->
    </div>
</header>
<!---- HEADER END ---->

<!---- NAVBAR START ---->
<nav class="w-full lg:block bg-lpa-blue">
    <div class="container flex text-white">

        <div class="relative flex items-center px-3 py-4 ml-1 group/subhome">
            <a
                href="index.php"
                class="text-[16px] text-gray-200 hover:text-white transition"
            >
                <span class="capitalize">home</span>
            </a>
        </div>

        <div class="flex items-center px-3 py-4">
            <a
                href="shop.php"
                target="_blank"
                class="text-[16px] text-gray-200 hover:text-white transition"
            >
                <span class="capitalize">shop</span>
            </a>
        </div>

        <div class="flex items-center px-3 py-4">
            <a
                href="aboud-us.php"
                class="text-[16px] text-gray-200 hover:text-white transition"
            >
                <span class="capitalize">contact</span>
            </a>
        </div>

        <div class="flex items-center px-3 py-4 ml-auto">
            <a
                href="LoginRegister.php"
                class="text-[16px] text-gray-200 hover:text-white transition"
            >
                <span class="capitalize">login/register</span>
            </a>
        </div>
    </div>
</nav>
<!---- NAVBAR END ---->

<!---- NAVBAR MOBILE START ---->
<div
    class="w-full bg-white flex items-center justify-around fixed bottom-0 left-0 z-50 px-8 py-3 shadow-lg shadow-gray-700 lg:hidden cursor-pointer"
>
    <a
        class="flex flex-col items-center hover:text-primary transition duration-500"
        id="menubar_icon"
    >
        <span class="text-lg"><i class="fa-regular fa-bars"></i></span>
        <span class="capitalize text-xs">menu</span>
    </a>

    <a
        href="#"
        class="flex flex-col items-center hover:text-primary transition duration-500"
        id="mobileSearchIcon"
    >
        <span class="text-lg"><i class="fa-regular fa-magnifying-glass"></i></span>
        <span class="capitalize text-xs">search</span>
    </a>

    <a
        href="cart.php"
        class="relative flex flex-col items-center hover:text-primary transition duration-500 group"
    >
        <span
            class="flex justify-center items-center text-white text-xs bg-primary rounded-full w-5 h-5 absolute -top-2 -right-4"
            id="mobile-cart-count"
        >0</span>
        <span class="text-xl text-black group-hover:text-primary transition">
            <i class="fa-light fa-cart-shopping"></i>
        </span>
        <span class="text-xs capitalize group-hover:text-primary transition">
            cart
        </span>
    </a>
</div>
<!---- NAVBAR MOBILE END ---->

<!---- MENU MOBILE START ---->
<!-- backdrop start -->
<div
    class="w-full h-full top-0 left-0 bg-black bg-opacity-40 fixed opacity-0 invisible transition-all duration-500 z-50 backdrop"
></div>
<!-- backdrop end -->

<div
    class="w-72 h-full fixed top-0 bg-white -left-full z-50 transition-all duration-500 shadow-lg shadow-gray-300"
    id="mobileMenu"
>
    <!-- sidebar header start -->
    <div class="flex items-center justify-between px-5 py-3 bg-primary">
        <h2 class="capitalize text-xl text-white mx-auto font-semibold">
            menu
        </h2>
        <span class="cursor-pointer text-xl text-white" id="closeMenu">
            <i class="fa-light fa-xmark"></i>
        </span>
    </div>
    <!-- sidebar header end -->

    <!-- sidebar body start -->
    <div>
        <ul class="pt-3">
            <li class="border-b border-dashed border-gray-300 px-5 py-3 hasSubMenu">
                <a href="index.php" class="capitalize flex items-center justify-between">
                    <span>home</span>
                </a>
            </li>

            <li class="border-b border-dashed border-gray-300 px-5 py-3 hasSubMenu">
                <a href="shop.php" class="capitalize flex items-center justify-between">
                    <span>shop</span>
                </a>
            </li>

            <li class="border-b border-dashed border-gray-300 px-5 py-3 hasSubMenu">
                <a href="LoginRegister.php" class="capitalize flex items-center justify-between">
                    <span>my account</span>
                    <span>
                        <i class="fa-light fa-chevron-up rotate-180 transition sidebarIcon"></i>
                    </span>
                </a>

                <ul
                    class="mt-2 h-0 opacity-0 scale-y-0 transition-all duration-200 origin-top ease-linear subMenu"
                >
                    <li class="px-5 py-2">
                        <a href="#" class="capitalize">my account</a>
                    </li>
                    <li class="px-5 py-2">
                        <a href="#" class="capitalize">login</a>
                    </li>
                    <li class="px-5 py-2">
                        <a href="#" class="capitalize">register</a>
                    </li>
                    <li class="px-5 py-2">
                        <a href="#" class="capitalize">forget password</a>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
    <!-- sidebar body end -->
</div>
<!---- MENU MOBILE END ---->

<!---- SEARCH MOBILE START ---->
<div
    class="w-full h-full fixed left-0 bg-white p-4 -top-full opacity-0 invisible transition-all duration-300 z-50"
    id="mobileSearch"
>
    <div class="flex items-center justify-between mt-5 mb-8">
        <span class="text-xs text-gray-400 uppercase">
            what are you looking for?
        </span>
        <span class="cursor-pointer" id="closeSearch">
            <i class="fa-light fa-xmark"></i>
        </span>
    </div>
    <div class="relative w-full border-b pb-1 px-1">
        <input
            type="text"
            placeholder="search products..."
            class="focus:outline-none focus:ring-0 focus:border-transparent focus:shadow-transparent w-full border-transparent"
        />
        <span class="text-sm text-gray-800 absolute right-0">
            <i class="fa-light fa-magnifying-glass text-lg mr-5"></i>
        </span>
    </div>
</div>
<!---- SEARCH MOBILE END ---->
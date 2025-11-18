<?php
session_start();
require_once 'config.php';

// Redirect to login if user is not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: LoginRegister.php");
    exit;
}

$userId = $_SESSION['user_id'];

// Fetch user data from DB
$stmt = $conn->prepare("SELECT lpa_user_username, lpa_user_firstname, lpa_user_lastname, lpa_users_email, lpa_inv_status, lpa_user_role FROM lpa_users WHERE lpa_user_ID = ?");
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();

if (!$user) {
    // If user not found, force logout
    session_destroy();
    header("Location: LoginRegister.php");
    exit;
}

// Helpers para UI
$fullName = trim(($user['lpa_user_firstname'] ?? '') . ' ' . ($user['lpa_user_lastname'] ?? ''));
if ($fullName === '') {
    $fullName = $user['lpa_user_username'] ?? 'User';
}
$email     = $user['lpa_users_email'] ?? '';
$role      = $user['lpa_user_role'] ?? 'customer';
$status    = $user['lpa_inv_status'] ? 'Active' : 'Inactive';

// Avatar iniciales
$initials  = strtoupper(substr($user['lpa_user_firstname'] ?? $fullName, 0, 1) . substr($user['lpa_user_lastname'] ?? '', 0, 1));
$initials  = trim($initials) === '' ? strtoupper(substr($fullName, 0, 2)) : $initials;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Profile - LPA</title>
    <link rel="icon" href="./image/Logo.png" />
   <link rel="stylesheet" href="./font/css/all.css" />
    <link rel="stylesheet" href="./dist/output.css" />
</head>
<body class="font-roboto bg-gray-50 min-h-screen">

<?php include 'header.php'; ?>

<div class="container mx-auto px-4 py-8 lg:py-10">
    <!-- GRID PRINCIPAL: 1 columna en móvil, 4 desde md (sidebar 1 + contenido 3) -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <!-- SIDEBAR IZQUIERDA -->
        <aside class="md:col-span-1 space-y-4">
            <!-- Tarjeta Perfil (Primer elemento de la barra lateral) -->
            <div class="bg-white shadow-md rounded-xl p-5 border border-gray-100">
                <div class="flex items-center gap-4 mb-4">
                    <!-- Avatar -->
                    <div class="w-14 h-14 rounded-full bg-gradient-to-br from-primary to-lpa-blue flex items-center justify-center text-white text-lg font-semibold shadow">
                        <?php echo htmlspecialchars($initials); ?>
                    </div>
                    <!-- Info básica -->
                    <div>
                        <h1 class="text-base font-semibold text-gray-900 leading-tight">
                            <?php echo htmlspecialchars($fullName); ?>
                        </h1>
                        <p class="text-xs text-gray-500 truncate max-w-[160px]">
                            <?php echo htmlspecialchars($email); ?>
                        </p>
                    </div>
                </div>
                <div class="flex items-center gap-2 mb-4">
                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[11px] font-medium bg-blue-50 text-blue-700">
                        <i class="fa-solid fa-user-tag text-[9px]"></i>
                        <?php echo htmlspecialchars(ucfirst($role)); ?>
                    </span>
                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[11px] font-medium 
                        <?php echo $status === 'Active' ? 'bg-green-50 text-green-700' : 'bg-gray-100 text-gray-600'; ?>">
                        <span class="w-1.5 h-1.5 rounded-full <?php echo $status === 'Active' ? 'bg-green-500' : 'bg-gray-400'; ?>"></span>
                        <?php echo htmlspecialchars($status); ?>
                    </span>
                </div>
                <div class="flex flex-col gap-2">
                    <button
                        type="button"
                        class="w-full inline-flex items-center justify-center px-3 py-2 text-xs font-medium rounded-lg border border-gray-200 text-gray-700 hover:bg-gray-50 transition"
                    >
                        <i class="fa-regular fa-pen-to-square mr-1"></i>
                        Edit profile
                    </button>
                    <form action="logout.php" method="post">
                        <button
                            type="submit"
                            class="w-full inline-flex items-center justify-center px-3 py-2 text-xs font-medium rounded-lg bg-red-500 text-white hover:bg-red-600 transition"
                        >
                            <i class="fa-regular fa-arrow-right-from-bracket mr-1"></i>
                            Log out
                        </button>
                    </form>
                </div>
            </div>

            <!-- Menú lateral -->
            <nav class="bg-white shadow-md rounded-xl p-3 border border-gray-100">
                <h2 class="text-[11px] font-semibold text-gray-500 uppercase mb-2 tracking-wide px-2">My account</h2>
                <div id="profileTabs" class="space-y-1">
                    <button
                        data-tab="overview"
                        class="tab-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-lg text-xs font-medium text-left bg-blue-50 text-blue-700 border border-blue-100"
                    >
                        <i class="fa-regular fa-gauge-high text-sm"></i>
                        Overview
                    </button>
                    <button
                        data-tab="orders"
                        class="tab-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-lg text-xs font-medium text-gray-700 hover:bg-gray-50"
                    >
                        <i class="fa-regular fa-bag-shopping text-sm"></i>
                        My Orders
                    </button>
                    <button
                        data-tab="wishlist"
                        class="tab-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-lg text-xs font-medium text-gray-700 hover:bg-gray-50"
                    >
                        <i class="fa-regular fa-heart text-sm"></i>
                        Wishlist
                    </button>
                    <button
                        data-tab="personal-info"
                        class="tab-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-lg text-xs font-medium text-gray-700 hover:bg-gray-50"
                    >
                        <i class="fa-regular fa-user text-sm"></i>
                        Personal information
                    </button>
                    <button
                        data-tab="shipping-info"
                        class="tab-btn w-full flex items-center gap-3 px-3 py-2.5 rounded-lg text-xs font-medium text-gray-700 hover:bg-gray-50"
                    >
                        <i class="fa-regular fa-location-dot text-sm"></i>
                        Shipping information
                    </button>
                </div>
            </nav>
        </aside>

        <!-- CONTENIDO DERECHA -->
        <main class="md:col-span-3 space-y-6">
            <!-- OVERVIEW -->
            <section id="tab-overview" class="tab-panel">
                <div class="bg-white rounded-xl shadow-md border border-gray-100 p-5 mb-4">
                    <h2 class="text-lg font-semibold text-gray-900 mb-1">Overview</h2>
                    <p class="text-xs text-gray-500">Quick summary of your account.</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="bg-white rounded-xl shadow-sm p-4 border border-gray-100">
                        <p class="text-[11px] font-medium text-gray-500 uppercase tracking-wide mb-1">Orders</p>
                        <p class="text-2xl font-semibold text-gray-900">0</p>
                        <p class="text-xs text-gray-500 mt-1">Orders placed in your account.</p>
                    </div>
                    <div class="bg-white rounded-xl shadow-sm p-4 border border-gray-100">
                        <p class="text-[11px] font-medium text-gray-500 uppercase tracking-wide mb-1">Wishlist</p>
                        <p class="text-2xl font-semibold text-gray-900">0</p>
                        <p class="text-xs text-gray-500 mt-1">Items saved for later.</p>
                    </div>
                    <div class="bg-white rounded-xl shadow-sm p-4 border border-gray-100">
                        <p class="text-[11px] font-medium text-gray-500 uppercase tracking-wide mb-1">Account status</p>
                        <p class="text-base font-semibold text-gray-900"><?php echo htmlspecialchars($status); ?></p>
                        <p class="text-xs text-gray-500 mt-1">
                            Your account is currently <?php echo strtolower($status) === 'active' ? 'in good standing.' : 'inactive.'; ?>
                        </p>
                    </div>
                </div>
            </section>

            <!-- ORDERS -->
            <section id="tab-orders" class="tab-panel hidden">
                <div class="bg-white rounded-xl shadow-md border border-gray-100 p-5 mb-4">
                    <h2 class="text-lg font-semibold text-gray-900 mb-1">My Orders</h2>
                    <p class="text-xs text-gray-500">Summary of your recent purchases.</p>
                </div>
                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                    <p class="text-gray-600 text-sm">
                        Here you will see a list of your orders.
                    </p>
                    <p class="text-gray-500 text-xs mt-2">
                        (Next step: connect this section with the <code>lpa_invoices</code> and <code>lpa_invoice_items</code> tables.)
                    </p>
                </div>
            </section>

            <!-- WISHLIST -->
            <section id="tab-wishlist" class="tab-panel hidden">
                <div class="bg-white rounded-xl shadow-md border border-gray-100 p-5 mb-4">
                    <h2 class="text-lg font-semibold text-gray-900 mb-1">Wishlist</h2>
                    <p class="text-xs text-gray-500">Products you’ve saved for later.</p>
                </div>
                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                    <p class="text-gray-600 text-sm">
                        Wishlist functionality will be implemented here.
                    </p>
                </div>
            </section>

            <!-- PERSONAL INFO -->
            <section id="tab-personal-info" class="tab-panel hidden">
                <div class="bg-white rounded-xl shadow-md border border-gray-100 p-5 mb-4">
                    <h2 class="text-lg font-semibold text-gray-900 mb-1">Personal Information</h2>
                    <p class="text-xs text-gray-500">Update your basic account details.</p>
                </div>
                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                    <form action="update_personal_info.php" method="post" class="space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium mb-1" for="firstname">First Name</label>
                                <input
                                    type="text"
                                    id="firstname"
                                    name="firstname"
                                    value="<?php echo htmlspecialchars($user['lpa_user_firstname']); ?>"
                                    class="w-full border border-gray-300 px-3 py-2 rounded-md focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary"
                                >
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1" for="lastname">Last Name</label>
                                <input
                                    type="text"
                                    id="lastname"
                                    name="lastname"
                                    value="<?php echo htmlspecialchars($user['lpa_user_lastname']); ?>"
                                    class="w-full border border-gray-300 px-3 py-2 rounded-md focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary"
                                >
                            </div>
                        </div>

                        <div class="md:w-2/3">
                            <label class="block text-sm font-medium mb-1" for="email">Email</label>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                value="<?php echo htmlspecialchars($user['lpa_users_email']); ?>"
                                class="w-full border border-gray-300 px-3 py-2 rounded-md focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary"
                            >
                        </div>

                        <div class="pt-2">
                            <button
                                type="submit"
                                class="inline-flex items-center px-4 py-2.5 bg-primary text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition"
                            >
                                <i class="fa-regular fa-floppy-disk mr-2"></i>
                                Save changes
                            </button>
                        </div>
                    </form>
                </div>
            </section>

            <!-- SHIPPING INFO -->
            <section id="tab-shipping-info" class="tab-panel hidden">
                <div class="bg-white rounded-xl shadow-md border border-gray-100 p-5 mb-4">
                    <h2 class="text-lg font-semibold text-gray-900 mb-1">Shipping Information</h2>
                    <p class="text-xs text-gray-500">Manage your default shipping address.</p>
                </div>
                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                    <p class="text-gray-600 text-sm mb-4">
                        Here you can store your shipping address (we will decide the table and fields).
                    </p>
                    <form action="update_shipping_info.php" method="post" class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium mb-1" for="address_line1">Address line 1</label>
                            <input
                                type="text"
                                id="address_line1"
                                name="address_line1"
                                class="w-full border border-gray-300 px-3 py-2 rounded-md focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary"
                            >
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1" for="address_line2">Address line 2</label>
                            <input
                                type="text"
                                id="address_line2"
                                name="address_line2"
                                class="w-full border border-gray-300 px-3 py-2 rounded-md focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary"
                            >
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label class="block text-sm font-medium mb-1" for="city">City</label>
                                <input
                                    type="text"
                                    id="city"
                                    name="city"
                                    class="w-full border border-gray-300 px-3 py-2 rounded-md focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary"
                                >
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1" for="state">State</label>
                                <input
                                    type="text"
                                    id="state"
                                    name="state"
                                    class="w-full border border-gray-300 px-3 py-2 rounded-md focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary"
                                >
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1" for="zip">ZIP / Postal code</label>
                                <input
                                    type="text"
                                    id="zip"
                                    name="zip"
                                    class="w-full border border-gray-300 px-3 py-2 rounded-md focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary"
                                >
                            </div>
                        </div>

                        <div class="pt-2">
                            <button
                                type="submit"
                                class="inline-flex items-center px-4 py-2.5 bg-primary text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition"
                            >
                                <i class="fa-regular fa-floppy-disk mr-2"></i>
                                Save shipping info
                            </button>
                        </div>
                    </form>
                </div>
            </section>
        </main>
    </div>
</div>

<!-- JS simple para tabs -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const tabButtons = document.querySelectorAll('.tab-btn');
        const tabPanels  = document.querySelectorAll('.tab-panel');

        tabButtons.forEach(btn => {
            btn.addEventListener('click', () => {
                const target = btn.getAttribute('data-tab');

                // reset botones
                tabButtons.forEach(b => {
                    b.classList.remove('bg-blue-50', 'text-blue-700', 'border', 'border-blue-100');
                    b.classList.add('text-gray-700');
                });

                // activar botón actual
                btn.classList.remove('text-gray-700');
                btn.classList.add('bg-blue-50', 'text-blue-700', 'border', 'border-blue-100');

                // ocultar/mostrar paneles
                tabPanels.forEach(panel => {
                    if (panel.id === 'tab-' + target) {
                        panel.classList.remove('hidden');
                    } else {
                        panel.classList.add('hidden');
                    }
                });
            });
        });
    });
</script>

</body>
</html>
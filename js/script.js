document.addEventListener('DOMContentLoaded', function() {
    console.log("El script se ha cargado correctamente");
  
    // mobile menu variables
    let menuBar = document.getElementById("menubar_icon");
    let backdrop = document.querySelector(".backdrop");
    let mobileMenu = document.getElementById("mobileMenu");
    let closeMenu = document.getElementById("closeMenu");
  
    // mobile search variables
    let searchBar = document.getElementById("mobileSearchIcon");
    let mobileSearch = document.getElementById("mobileSearch");
    let closeSearch = document.getElementById("closeSearch");
  
    // submenu variables
    let hasSubMenu = document.querySelectorAll(".hasSubMenu");
    let subMenus = document.querySelectorAll(".subMenu");
    let sidebarIcons = document.querySelectorAll(".sidebarIcon");
  
    // megamenu variables
    let hasMegaMenu = document.querySelectorAll(".hasMegaMenu");
    let megaMenus = document.querySelectorAll(".megaMenu");
    let megaIcons = document.querySelectorAll(".megaIcon");
  
    // Verificar existencia de elementos
    const elementsToVerify = [
        { element: menuBar, name: "menuBar" },
        { element: backdrop, name: "backdrop" },
        { element: mobileMenu, name: "mobileMenu" },
        { element: closeMenu, name: "closeMenu" },
        { element: searchBar, name: "searchBar" },
        { element: mobileSearch, name: "mobileSearch" },
        { element: closeSearch, name: "closeSearch" }
    ];
  
    elementsToVerify.forEach(item => {
        if (!item.element) {
            console.error(`Elemento no encontrado: ${item.name}`);
        }
    });
  
    // submenu
    const toggleSubMenu = (event) => {
        let subMenu = event.currentTarget.querySelector(".subMenu");
        let sidebarIcon = event.currentTarget.querySelector(".sidebarIcon");
        let isOpen = subMenu.classList.contains("activeSubMenu");
        subMenus.forEach((sub) => {
            sub.addEventListener("click", (e) => e.stopPropagation());
            sub.classList.remove("activeSubMenu");
        });
        sidebarIcons.forEach((icon) => icon.classList.add("rotate-180"));
  
        if (!isOpen) {
            subMenu.classList.add("activeSubMenu");
            sidebarIcon.classList.remove("rotate-180");
        } else {
            subMenu.classList.remove("activeSubMenu");
            sidebarIcon.classList.add("rotate-180");
        }
    };
  
    hasSubMenu.forEach((item) => {
        item.addEventListener("click", toggleSubMenu);
    });
  
    hasMegaMenu.forEach((item) => {
        item.addEventListener("click", (e) => {
            let megaMenu = item.querySelector(".megaMenu");
            let megaIcon = item.querySelector(".megaIcon");
            let isOpen = megaMenu.classList.contains("activeSubMenu");
  
            megaMenus.forEach((mega) => {
                mega.addEventListener("click", (e) => e.stopPropagation());
                mega.classList.remove("activeSubMenu");
            });
            megaIcons.forEach((icon) => icon.classList.add("fa-plus"));
  
            if (!isOpen) {
                megaMenu.classList.add("activeSubMenu");
                megaIcon.classList.remove("fa-plus");
                megaIcon.classList.add("fa-minus");
            } else {
                megaMenu.classList.remove("activeSubMenu");
                megaIcon.classList.add("fa-plus");
                megaIcon.classList.remove("fa-minus");
            }
        });
    });
  
    const openSidebar = (sidebar, backdrop) => {
        backdrop.classList.add("activeBackdrop");
        sidebar.classList.add("activeSideBar");
    };
  
    const closeSidebar = (sidebar, backdrop) => {
        if (sidebar && sidebar.classList) {
            backdrop.classList.remove("activeBackdrop");
            sidebar.classList.remove("activeSideBar");
        } else {
            console.error("Elemento sidebar o su propiedad classList no encontrada");
        }
    };
  
    // mobile menu
    if (backdrop) {
        backdrop.addEventListener("click", () => {
            if (mobileMenu) closeSidebar(mobileMenu, backdrop);
        });
    }
  
    if (closeMenu) {
        closeMenu.addEventListener("click", () => closeSidebar(mobileMenu, backdrop));
    }
  
    if (menuBar) {
        menuBar.addEventListener("click", () => openSidebar(mobileMenu, backdrop));
    }
  
    // open Search
    const OpenSearch = () => {
        if (mobileSearch) {
            mobileSearch.classList.remove("-top-full", "invisible", "opacity-0");
            mobileSearch.classList.add("top-0");
        }
    };
    
    if (searchBar) {
        searchBar.addEventListener("click", OpenSearch);
    }
  
    //close Search
    const CloseSearch = () => {
        if (mobileSearch) {
            mobileSearch.classList.add("-top-full", "invisible", "opacity-0");
            mobileSearch.classList.remove("top-0");
        }
    };
  
    if (closeSearch) {
        closeSearch.addEventListener("click", CloseSearch);
    }
  });
  
     // form login and register

     const toggleBtn = document.getElementById("toggle-form");
  const formTitle = document.getElementById("form-title");
  const registerFields = document.getElementById("register-fields");
  const actionInput = document.getElementById("action");
  const submitBtn = document.getElementById("submit-btn");

  let isRegister = false;

  toggleBtn.addEventListener("click", () => {
    isRegister = !isRegister;

    if (isRegister) {
      formTitle.textContent = "Register";
      registerFields.style.display = "block";
      actionInput.value = "register";
      submitBtn.textContent = "Register";
      toggleBtn.textContent = "Ir a Login";
    } else {
      formTitle.textContent = "Login";
      registerFields.style.display = "none";
      actionInput.value = "login";
      submitBtn.textContent = "Login";
      toggleBtn.textContent = "Register";
    }
  });

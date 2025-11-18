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


    <div class="containeraboud"> 

        <div class="columnAB"> 
          <div class="mision">
            <h2>Our mision</h2> <br>
            <p>Nunc dictum pulvinar porta. Interdum et malesuada fames ac ante ipsum primis in faucibus. Curabitur tortor lorem, lacinia in nunc eget, tristique volutpat urna. Pellentesque suscipit dolor metus, eu cursus sapien molestie non. Sed viverra mauris molestie purus hendrerit, vel laoreet ipsum viverra. Nullam sagittis ex nisi, iaculis dignissim odio tincidunt sed.</p> 
          </div>
        </div> 

        <div class="columnAB"> 
            <img class="imageaboud" src="./image/meetaboud.jpg" alt="Aboud Us">  
        </div>
       
    </div> 


    <div class="containermap">
      <span>Visit our instalationes</span>
      <iframe class="mapaboud" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.835434509619!2d144.95373631590423!3d-37.8162799797517!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f11fd81%3A0xf577846de1d63559!2sFederation%20Square!5e0!3m2!1ses!2sau!4v1580801234567!5m2!1ses!2sau"  style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>

    <div class="containeraboud"> 

      
      <div class="columnAB"> 
        <h2>See our tecnology</h2> 
          <br>
        <iframe class="videoyou" src="https://www.youtube.com/embed/itpcsQQvgAQ" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> 
      </div> 
      <div class="columnAB"> 
        <div>
          
        <iframe class="facebook" src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FMSIGaming&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
        </div>
      </div>
  </div> 

    

  
    <!---------------- MAIN SECTION END ------------------------------>


         <!---------------- FOOTER END --------------------------->
         <?php include 'footer.php'; ?>
      <!---------------- FOOTER END --------------------------->

    <script src="./js/scriptshop.js"></script>
    <script src="./js/scriptnew.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?callback=initMap"></script> </body>
  </body>
</html>

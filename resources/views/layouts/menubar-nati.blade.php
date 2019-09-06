<?php

$page = substr($_SERVER['PHP_SELF'], 12);
//require_once("php/controllers/userController.php");

switch($page){
  case "index.php":
      echo'
      <header class="masthead mb-auto">
        <div class="inner">
          <nav class="nav nav-masthead justify-content-left" >
            <a class="nav-link-active navBajar" href="index.php"><h1 class="masthead -brand"> <ion-icon name="beer"></ion-icon> BeerShop</h1></a>
            <a class="nav-link" href="login.php"><ion-icon name="contact"></ion-icon> <br>Login</a>
            <a class="nav-link" href="faq.php"> <ion-icon name="help"></ion-icon> <br> F.A.Q.</a>
            <a class="nav-link" href="contact.php"><ion-icon name="clipboard"></ion-icon> <br>Contacto</a>
          </nav>
        </div>
      </header>';
      break;
  case  "login.php" :
  case  "register.php" :
        echo'
        <header class="masthead mb-auto">
          <div class="inner">
            <nav class="nav nav-masthead justify-content-left" >
              <a class="nav-link-active navBajar" href="index.php"><h1 class="masthead -brand"> <ion-icon name="beer"></ion-icon> BeerShop</h1></a>
              <a class="nav-link" href="faq.php"> <ion-icon name="help"></ion-icon> <br> F.A.Q.</a>
              <a class="nav-link" href="contact.php"><ion-icon name="clipboard"></ion-icon> <br>Contacto</a>
              <a class="nav-link" href="index.php"> <ion-icon name="arrow-round-back"></ion-icon><br> Volver</a>
            </nav>
          </div>
        </header>';
        break;
  case  "contact.php":
        echo'
        <header class="masthead mb-auto">
          <div class="inner">
            <nav class="nav nav-masthead justify-content-left" >
              <a class="nav-link-active navBajar" href="index.php"><h1 class="masthead -brand"> <ion-icon name="beer"></ion-icon> BeerShop</h1></a>
              <a class="nav-link" href="faq.php"> <ion-icon name="help"></ion-icon> <br> F.A.Q.</a>
              <a class="nav-link" href="index.php"> <ion-icon name="arrow-round-back"></ion-icon><br> Volver</a>
            </nav>
          </div>
        </header>';
        break;
  case "faq.php":
        echo'
        <header class="masthead mb-auto">
          <div class="inner">
            <nav class="nav nav-masthead justify-content-left">
              <a class="nav-link-active navBajar" href="index.php"><h1 class="masthead -brand"> <ion-icon name="beer"></ion-icon> BeerShop</h1></a>
              <a class="nav-link" href="contact.php"><ion-icon name="clipboard"></ion-icon> <br>Contacto</a>
              <a class="nav-link" href="index.php"> <ion-icon name="arrow-round-back"></ion-icon><br> Volver</a>
            </nav>
          </div>
        </header>';
        break;
  case   "contactSuccess.php":
        echo'
        <header class="masthead mb-auto">
          <div class="inner">
            <nav class="nav nav-masthead justify-content-left">
              <a class="nav-link-active navBajar" href="index.php"><h1 class="masthead -brand"> <ion-icon name="beer"></ion-icon> BeerNet</h1></a>
              <a class="nav-link" href="login.php"><ion-icon name="contact"></ion-icon> <br>Login</a>
              <a class="nav-link" href="faq.php"> <ion-icon name="help"></ion-icon> <br> F.A.Q.</a>
              <a class="nav-link" href="index.php"> <ion-icon name="arrow-round-back"></ion-icon><br> Volver</a>
            </nav>
          </div>
        </header>';
        break;
  case   "adminMenu.php":
        echo'
        <header class="masthead mb-auto">
          <div class="inner">
            <nav class="nav nav-masthead justify-content-left">
              <a class="nav-link-active navBajar" href="index.php"><h1 class="masthead -brand"> <ion-icon name="beer"></ion-icon> BeerShop</h1></a>
            </nav>
          </div>
        </header>';
        break;
  case "commentsList.php":
  case  "productsList.php":
  case "usersList.php":
        echo'
        <header class="masthead mb-auto">
          <div class="inner">
            <nav class="nav nav-masthead justify-content-left">
              <a class="nav-link-active navBajar" href="index.php"><h1 class="masthead -brand"> <ion-icon name="beer"></ion-icon> BeerShop</h1></a>
              <a class="nav-link" href="adminMenu.php"> <ion-icon name="arrow-round-back"></ion-icon>Volver</a>
            </nav>
          </div>
        </header>';
        break;
  case "shop.php":
        echo'
        <header class="masthead mb-auto">
          <div class="inner">
            <nav class="nav nav-masthead justify-content-left" >
              <a class="nav-link-active navBajar" href="index.php"><h1 class="masthead -brand"> <ion-icon name="beer"></ion-icon> BeerShop</h1></a>
            </nav>
          </div>
        </header>';
        break;
  case "addProduct.php":
      echo'
      <header class="masthead mb-auto">
        <div class="inner">
          <nav class="nav nav-masthead justify-content-left">
            <a class="nav-link-active navBajar" href="index.php"><h1 class="masthead -brand"> <ion-icon name="beer"></ion-icon> BeerShop</h1></a>
            <a class="nav-link" href="productsList.php"> <ion-icon name="arrow-round-back"></ion-icon><br> Volver</a>
          </nav>
        </div>
      </header>';
      break;
  case "product.php":
      if (isAdmin($db)==1){
        $stmt = "href=\"productsList.php\"";
      }
      else{
        $stmt = "href=\"javascript:history.back()\"";
      };
      echo'
      <header class="masthead mb-auto">
        <div class="inner">
          <nav class="nav nav-masthead justify-content-left">
            <a class="nav-link-active navBajar" href="index.php"><h1 class="masthead -brand"> <ion-icon name="beer"></ion-icon> BeerShop</h1></a>
            <a class="nav-link"' . $stmt . '> <ion-icon name="arrow-round-back"></ion-icon><br> Volver</a>
          </nav>
        </div>
      </header>';
      break;
  case "updateProduct.php":
      echo'
      <header class="masthead mb-auto">
        <div class="inner">
          <nav class="nav nav-masthead justify-content-left">
            <a class="nav-link-active navBajar" href="index.php"><h1 class="masthead -brand"> <ion-icon name="beer"></ion-icon> BeerShop</h1></a>
            <a class="nav-link" href="productsList.php"> <ion-icon name="arrow-round-back"></ion-icon><br> Volver</a>
          </nav>
        </div>
      </header>';
      break;
  case "cart.php":
  case "pay.php":
      echo'
      <header class="masthead mb-auto">
        <div class="inner">
          <nav class="nav nav-masthead justify-content-left" >
            <a class="nav-link-active navBajar" href="index.php"><h1 class="masthead -brand"> <ion-icon name="beer"></ion-icon> BeerShop</h1></a>
          </nav>
        </div>
      </header>';
      break;    
};

?>

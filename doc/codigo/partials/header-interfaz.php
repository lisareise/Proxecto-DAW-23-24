<header>
    <div class="container">
      <nav class="navbar">
        <img class="nav__logo" src="./src/images/logo-nutrismart.png" alt="NutriSmart" />
        
        <?php 
        if(isset($_SESSION['usuario'])){
          echo'<a href="cerrar-sesion.php" class="login"><i class="fa-solid fa-right-from-bracket"></i></a>';
        }else{
          echo '<a href="login.php" class="login"><i class="fa-regular fa-user"></i></a>';
        }
        ?>       
      </nav>
    </div>
  </header>
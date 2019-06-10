<?php
/*include_once("controladores/funciones.php");*/
require_once("autoload.php")
?>

<!DOCTYPE html>
<html lang="en">
<head>
 <?php
    include_once('parts/head.php');
 ?>
  <title>Queer Cheer - Home</title>
</head>
<body> 
<nav class="estilonav navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand logo_" href="index.php">QC!</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item ">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <?php if(!isset($_SESSION["email"])):?>
              <li class="nav-item">
                  <a class="nav-link" href="login.php">Login</a> 
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="signup.php">Registrate</a>  
              </li>
            <?php endif;?>
              <li class="nav-item ">
                  <a class="nav-link" href="preguntas.php">Preguntas Frecuentes</a> 
              </li>
              <li class="nav-item active">
                  <a class="nav-link" href="comprar.php">Comprar Ahora<span class="sr-only">(current)</span></a>  
              </li>
            <?php if(isset($_SESSION["email"])):?>
              <li class="nav-item">
              <a class="nav-link" href="perfil.php">Perfil</a>            
              </li>
             <li class="nav-item">
              <a class="nav-link" href="logout.php">Logout</a>            
              </li>
            <?php endif;?>
          </ul>
        </div>
      </nav>
    <!--CABECERA-->
    <div class="card bg-dark text-white ">
    <img src="img/inicio.jpg" class="fotoinicio  iniciocard  card-img" alt="fotodefondo">
    <div class="card-img-overlay">
      <div class="titulo">
        <h5 class="card-title tituloQC">Queer Cheer</h5>  
        <h2 class="premium" >PREMIUM</h2>
        </div>
        </div>
        </div>

<!--FOOTER-->
        <?php
        include_once('parts/footer.php');
       ?>  
</body>
</html>
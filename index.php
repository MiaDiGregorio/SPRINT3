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
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
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
              <li class="nav-item">
                  <a class="nav-link" href="comprar.php">Comprar Ahora</a>  
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
        <p class="about">
              Preparate para juegar Queer Cheer, juego
              <br>
              de preguntas y respuestas, basadas en la cultura queer.
              <br>
              Desde música, teatro, política y más! Listo para jugar?
            </p>
        <p>
       <a href="login.php"><button type="button" class="juguemos btn btn btn-primary btn-lg btn-info">JUGUEMOS</button></a> 
        </p>  
      </div>
    </div>
  </div>
    
 <!--SOBRE NOSOTROS-->
  <div class="card bg-dark text-white ">
    <img src="img/inicio2.jpg" class="fotoinicio card-img" alt="fotodefondo">
    <div class="card-img-overlay">
    <div class="row">
      <div class="d-none d-sm-block col-sm-6 col-md-12 about"> 
        <br>
        <section>
          <article>
            <h5 class="tituloabout">
              Nuestra Historia!
            </h5>
            <p class="about">
              Somos un grupo de desarrolladores que crearon Queer Cheer, juego
              <br>
              de preguntas y respuestas, basadas en la cultura queer.
              <br>
              Preguntas desde música, teatro, política y más! Listo para que juegues con tus amigos o solo!
            </p>
            <hr>
            </article> 
            </div>
         
            <div class="col-12 col-sm-6 col-md-12 about"> 
            <article>
            <h5 class="tituloabout">
            Comparte tu experiencia!
            </h5>
            <p class="about2">
            Puedes subir tu video jugando a las redes sociales etiquetandonos a <a href=""> @QueerCheer </a> !
              <br>
            Compartiremos los más divertidos!
            </p>        
            <hr>
          </div>
          </article> 
        </section>
</div>
</div>
</div>

<!--FOOTER-->
        <?php
        include_once('parts/footer.php');
       ?>  
</body>
</html>